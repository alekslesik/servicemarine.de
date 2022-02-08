<?
/* category path */
if(
	$arResult['IBLOCK_SECTION_ID'] &&
	!$arResult['CATEGORY_PATH']
){
	$arCategoryPath = array();
	if(isset($arResult['SECTION']['PATH'])){
		foreach($arResult['SECTION']['PATH'] as $arCategory){
			$arCategoryPath[$arCategory['ID']] = $arCategory['NAME'];
		}
	}
	
	$arResult['CATEGORY_PATH'] = implode('/', $arCategoryPath);
}

$bShowSKU = $arParams['TYPE_SKU'] !== 'TYPE_2';

/* get sku tree props */
if ($bShowSKU) {
	$obSKU = new \Aspro\Allcorp3\Functions\CSKU($arParams);
	if ($arParams['SKU_IBLOCK_ID'] && $arParams['SKU_TREE_PROPS']) {
		$obSKU->getTreePropsByFilter([
			'=IBLOCK_ID' => $arParams['SKU_IBLOCK_ID'],
			'CODE' => $arParams['SKU_TREE_PROPS']
		]);
		$arResult['SKU_CONFIG'] = $obSKU->config;
		$arResult['SKU_CONFIG']['ADD_PICT_PROP'] = $arParams['ADD_PICT_PROP'];
		$arResult['SKU_CONFIG']['SHOW_GALLERY'] = $arParams['SHOW_GALLERY'];
	}
}
/* */

/* get SKU for item */
if ($bShowSKU) {
	$obSKU->setLinkedPropFromDisplayProps($arResult['DISPLAY_PROPERTIES']);

	if ($arParams['OID']) {
		$obSKU->setSelectedItem($arParams['OID']);
	}

	$obSKU->getItemsByProperty();
	$arResult['SKU'] = [
		'CURRENT' => $obSKU->currentItem,
		'OFFERS' => $obSKU->items,
		'PROPS' => $obSKU->treeProps
	];
}
/* */

/* main gallery */
$arResult['DETAIL_PICTURE'] = $arResult['DETAIL_PICTURE'] ?: $arResult['PREVIEW_PICTURE'];

$arResult['GALLERY'] = \Aspro\Functions\CAsproAllcorp3::getSliderForItem([
	'TYPE' => 'catalog_block',
	'PROP_CODE' => $arParams['ADD_PICT_PROP'],
	// 'ADD_DETAIL_SLIDER' => false,
	'ITEM' => $arResult,
	'PARAMS' => $arParams,
]);
array_splice($arResult['GALLERY'], $arParams['MAX_GALLERY_ITEMS']);

/* big gallery */
if($arParams['SHOW_BIG_GALLERY'] === 'Y'){
	$arResult['BIG_GALLERY'] = array();
	
	if(
		$arParams['BIG_GALLERY_PROP_CODE'] && 
		isset($arResult['PROPERTIES'][$arParams['BIG_GALLERY_PROP_CODE']]) && 
		$arResult['PROPERTIES'][$arParams['BIG_GALLERY_PROP_CODE']]['VALUE']
	){
		foreach($arResult['PROPERTIES'][$arParams['BIG_GALLERY_PROP_CODE']]['VALUE'] as $img){
			$arPhoto = CFile::GetFileArray($img);

			$alt = $arPhoto['DESCRIPTION'] ?: $arPhoto['ALT'] ?: $arResult['NAME'];
			$title = $arPhoto['DESCRIPTION'] ?: $arPhoto['TITLE'] ?: $arResult['NAME'];;

			$arResult['BIG_GALLERY'][] = array(
				'DETAIL' => $arPhoto,
				'PREVIEW' => CFile::ResizeImageGet($img, array('width' => 1500, 'height' => 1500), BX_RESIZE_PROPORTIONAL_ALT, true),
				'THUMB' => CFile::ResizeImageGet($img , array('width' => 60, 'height' => 60), BX_RESIZE_IMAGE_EXACT, true),
				'TITLE' => $title,
				'ALT' => $alt,
			);
		}
	}
}

/* brand item */
$arBrand = array();
if(
	strlen($arResult["DISPLAY_PROPERTIES"]["BRAND"]["VALUE"]) &&
	$arResult["PROPERTIES"]["BRAND"]["LINK_IBLOCK_ID"]
){
	$arBrand = CAllcorp3Cache::CIBLockElement_GetList(
		array(
			'CACHE' => array(
				"MULTI" =>"N", 
				"TAG" => CAllcorp3Cache::GetIBlockCacheTag($arResult["PROPERTIES"]["BRAND"]["LINK_IBLOCK_ID"])
			)
		),
		array(
			"IBLOCK_ID" => $arResult["PROPERTIES"]["BRAND"]["LINK_IBLOCK_ID"],
			"ACTIVE" => "Y", 
			"ID" => $arResult["DISPLAY_PROPERTIES"]["BRAND"]["VALUE"]
		),
		false,
		false,
		array("ID", "NAME", "CODE", "PREVIEW_TEXT", "PREVIEW_TEXT_TYPE", "DETAIL_TEXT", "DETAIL_TEXT_TYPE", "PREVIEW_PICTURE", "DETAIL_PICTURE", "DETAIL_PAGE_URL", "PROPERTY_SITE")
	);
	if($arBrand){
		$picture = ($arBrand["PREVIEW_PICTURE"] ? $arBrand["PREVIEW_PICTURE"] : $arBrand["DETAIL_PICTURE"]);
		if($picture){
			$arBrand["IMAGE"] = CFile::ResizeImageGet($picture, array("width" => 200, "height" => 40), BX_RESIZE_IMAGE_PROPORTIONAL, true);
			$arBrand["IMAGE"]["ALT"] = $arBrand["IMAGE"]["TITLE"] = $arBrand["NAME"];

			if($arBrand["DETAIL_PICTURE"]){
				$arBrand["IMAGE"]["INFO"] = CFile::GetFileArray($arBrand["DETAIL_PICTURE"]);

				$ipropValues = new \Bitrix\Iblock\InheritedProperty\ElementValues($arBrand["IBLOCK_ID"], $arBrand["ID"]);
				$arBrand["IMAGE"]["IPROPERTY_VALUES"] = $ipropValues->getValues();
				if($arBrand["IMAGE"]["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"])
					$arBrand["IMAGE"]["TITLE"] = $arBrand["IMAGE"]["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"];
				if($arBrand["IMAGE"]["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"])
					$arBrand["IMAGE"]["ALT"] = $arBrand["IMAGE"]["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"];
				if($arBrand["IMAGE"]["INFO"]["DESCRIPTION"])
					$arBrand["IMAGE"]["ALT"] = $arBrand["IMAGE"]["TITLE"] = $arBrand["IMAGE"]["INFO"]["DESCRIPTION"];
			}
		}
	}
}
$arResult["BRAND_ITEM"] = $arBrand;

// sef folder to include files
$sefFolder = rtrim($arParams["SEF_FOLDER"] ?? dirname($_SERVER['REAL_FILE_PATH']), '/');

// include text
ob_start();
$APPLICATION->IncludeFile($sefFolder."/index_garanty.php", array(), array("MODE" => "html", "NAME" => GetMessage('TITLE_INCLUDE')));
$arResult['INCLUDE_CONTENT'] = ob_get_contents();
ob_end_clean();

$arResult['CHARACTERISTICS'] = $arResult['VIDEO'] = $arResult['VIDEO_IFRAME'] = $arResult['POPUP_VIDEO'] = $arResult['TIZERS'] = array();

if($arResult['SECTION']){
	$arSectionSelect = array(
		'UF_INCLUDE_TEXT',
	);

	// get display properties
	$arDetailPageShowProps = \Bitrix\Iblock\Model\PropertyFeature::getDetailPageShowProperties(
		$arParams['IBLOCK_ID'],
		array('CODE' => 'Y')
	);
	if($arDetailPageShowProps === null){
		$arDetailPageShowProps = array();
	}
	
	if(
		in_array('POPUP_VIDEO', $arParams['PROPERTY_CODE']) || 
		in_array('POPUP_VIDEO', $arDetailPageShowProps)
	){
		$arSectionSelect[] = 'UF_POPUP_VIDEO';
	}
	
	$arInherite = CAllcorp3::getSectionInheritedUF(array(
		'sectionId' => $arResult['IBLOCK_SECTION_ID'],
		'iblockId' => $arParams['IBLOCK_ID'],
		'select' => $arSectionSelect,
		'filter' => array(
			'GLOBAL_ACTIVE' => 'Y', 
		),
	));

	if($arInherite['UF_INCLUDE_TEXT']){
		$arResult['INCLUDE_CONTENT'] = $arInherite['UF_INCLUDE_TEXT'];
	}

	if($arInherite['UF_POPUP_VIDEO']){
		$arResult['POPUP_VIDEO'] = $arInherite['UF_POPUP_VIDEO'];
	}
}

if($arResult['PROPERTIES']['INCLUDE_TEXT']['~VALUE']['TEXT']){
	$arResult['INCLUDE_CONTENT'] = $arResult['PROPERTIES']['INCLUDE_TEXT']['~VALUE']['TEXT'];
}

if(
	array_key_exists($docsProp, $arResult["DISPLAY_PROPERTIES"]) &&
	is_array($arResult["DISPLAY_PROPERTIES"][$docsProp]) &&
	$arResult["DISPLAY_PROPERTIES"][$docsProp]["VALUE"]
){
	foreach($arResult['DISPLAY_PROPERTIES'][$docsProp]['VALUE'] as $key => $value){
		if(!intval($value)){
			unset($arResult['DISPLAY_PROPERTIES'][$docsProp]['VALUE'][$key]);
		}
	}
}

if($arResult['DISPLAY_PROPERTIES']){
	$arResult['CHARACTERISTICS'] = CAllcorp3::PrepareItemProps($arResult['DISPLAY_PROPERTIES']);

	foreach($arResult['DISPLAY_PROPERTIES'] as $PCODE => $arProp){
		if(
			$arProp["VALUE"] ||
			strlen($arProp["VALUE"])
		){
			if($arProp['USER_TYPE'] === 'video') {
				if(count($arProp['PROPERTY_VALUE_ID']) >= 1) {
					foreach($arProp['VALUE'] as $val){
						if($val['path']){
							$arResult['VIDEO'][] = $val;
						}
					}
				}
				elseif($arProp['VALUE']['path']){
					$arResult['VIDEO'][] = $arProp['VALUE'];
				}
			}
			elseif($arProp['CODE'] === 'POPUP_VIDEO'){
				$arResult['POPUP_VIDEO'] = $arProp["VALUE"];
			}
		}
	}
}
