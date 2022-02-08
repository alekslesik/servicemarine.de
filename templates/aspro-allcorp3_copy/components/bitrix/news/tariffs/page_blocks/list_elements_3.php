<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true ) die();

$bMobileCompact = false;
$bShowPreviewText = $arParams['SHOW_SECTION_PREVIEW_DESCRIPTION'] !== 'N';
$bTariffsUseDetail = $GLOBALS['arTheme']['TARIFFS_USE_DETAIL']['VALUE'] === 'Y';
if($arParams['SECTION_ELEMENTS_TYPE_VIEW'] === 'FROM_MODULE'){
	$blockTemplateOptions = $GLOBALS['arTheme']['ELEMENTS_PAGE_TARIFFS']['LIST'][$GLOBALS['arTheme']['ELEMENTS_PAGE_TARIFFS']['VALUE']];
	$bItemsOffset = $blockTemplateOptions['ADDITIONAL_OPTIONS']['ELEMENTS_OFFSET_TARIFFS']['VALUE'] === 'Y';
	$images = $blockTemplateOptions['ADDITIONAL_OPTIONS']['ELEMENTS_IMAGES_TARIFFS']['VALUE'];
}
else{
	$bItemsOffset = $arParams['ELEMENTS_ITEMS_OFFSET'] === 'Y';
	$images = $arParams['ELEMENTS_IMAGES'];
}
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"tariffs-list",
	Array(
		"SHOW_CHILD_SECTIONS" => $arParams["SHOW_CHILD_SECTIONS"],
		"SHOW_CHILD_ELEMENTS" => $arParams["SHOW_CHILD_ELEMENTS"],
		"SHOW_ELEMENTS_IN_LAST_SECTION" => $arParams["SHOW_ELEMENTS_IN_LAST_SECTION"],
		"DEPTH_LEVEL" => $arSubSections[0]["DEPTH_LEVEL"],
		"IBLOCK_TYPE"	=>	$arParams["IBLOCK_TYPE"],
		"IBLOCK_ID"	=>	$arParams["IBLOCK_ID"],
		"NEWS_COUNT"	=>	$arParams["NEWS_COUNT"],
		"SORT_BY1"	=>	$arParams["SORT_BY1"],
		"SORT_ORDER1"	=>	$arParams["SORT_ORDER1"],
		"SORT_BY2"	=>	$arParams["SORT_BY2"],
		"SORT_ORDER2"	=>	$arParams["SORT_ORDER2"],
		"FIELD_CODE"	=>	$arParams["LIST_FIELD_CODE"],
		"PROPERTY_CODE"	=>	$arParams["LIST_PROPERTY_CODE"],
		"DISPLAY_PANEL"	=>	$arParams["DISPLAY_PANEL"],
		"SET_TITLE"	=>	$arParams["SET_TITLE"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"INCLUDE_IBLOCK_INTO_CHAIN"	=>	$arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
		"ADD_SECTIONS_CHAIN"	=>	$arParams["ADD_SECTIONS_CHAIN"],
		"CACHE_TYPE"	=>	$arParams["CACHE_TYPE"],
		"CACHE_TIME"	=>	$arParams["CACHE_TIME"],
		"CACHE_FILTER"	=>	$arParams["CACHE_FILTER"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"DISPLAY_TOP_PAGER"	=>	$arParams["DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER"	=>	$arParams["DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE"	=>	$arParams["PAGER_TITLE"],
		"PAGER_TEMPLATE"	=>	$arParams["PAGER_TEMPLATE"],
		"PAGER_SHOW_ALWAYS"	=>	$arParams["PAGER_SHOW_ALWAYS"],
		"PAGER_DESC_NUMBERING"	=>	$arParams["PAGER_DESC_NUMBERING"],
		"PAGER_DESC_NUMBERING_CACHE_TIME"	=>	$arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
		"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
		"DISPLAY_DATE"	=>	$arParams["DISPLAY_DATE"],
		"DISPLAY_NAME"	=>	$arParams["DISPLAY_NAME"],
		"DISPLAY_PICTURE"	=>	$arParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT"	=>	$arParams["DISPLAY_PREVIEW_TEXT"],
		"PREVIEW_TRUNCATE_LEN"	=>	$arParams["PREVIEW_TRUNCATE_LEN"],
		"ACTIVE_DATE_FORMAT"	=>	$arParams["LIST_ACTIVE_DATE_FORMAT"],
		"USE_PERMISSIONS"	=>	$arParams["USE_PERMISSIONS"],
		"GROUP_PERMISSIONS"	=>	$arParams["GROUP_PERMISSIONS"],
		"SHOW_DETAIL_LINK"	=>	$arParams["SHOW_DETAIL_LINK"],
		"FILTER_NAME"	=>	$arParams["FILTER_NAME"],
		"HIDE_LINK_WHEN_NO_DETAIL"	=>	$arParams["HIDE_LINK_WHEN_NO_DETAIL"],
		"CHECK_DATES"	=>	$arParams["CHECK_DATES"],
		"SHOW_SECTION"	=>	$arParams["SHOW_SECTION"],
		"PARENT_SECTION"	=>	$arResult["VARIABLES"]["SECTION_ID"],
		"PARENT_SECTION_CODE"	=>	$arResult["VARIABLES"]["SECTION_CODE"],
		"DETAIL_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
		"SECTION_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"IBLOCK_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
		"INCLUDE_SUBSECTIONS" => (isset($arParams["INCLUDE_SUBSECTIONS"])) ? $arParams["INCLUDE_SUBSECTIONS"] : "N",

		"USE_DETAIL"	=>	$bTariffsUseDetail?"Y":"N",
		"VISIBLE_PROP_COUNT" => $arParams['LIST_VISIBLE_PROP_COUNT'],
		"ROW_VIEW" => true,
		"BORDER" => true,
		"ITEM_HOVER_SHADOW" => true,
		"DARK_HOVER" => false,
		"ROUNDED" => true,
		"ROUNDED_IMAGE" => false,
		"ELEMENTS_ROW" => "1",
		"MAXWIDTH_WRAP" => false,
		"MOBILE_SCROLLED" => true,
		"HIDE_PAGINATION" => "N",
		"SLIDER" => false,
		"VIEW_TYPE" => "type_3",
		"ORDER_VIEW" => CAllcorp3::GetFrontParametrValue('ORDER_VIEW') == 'Y',
		"NARROW" => false,
		"ITEMS_OFFSET" => $bItemsOffset,
		"IMAGES" => $images,
		"HIDE_LEFT_TEXT_BLOCK" => "Y",
		"TABS" => "INSIDE",
		"DEFAULT_PRICE_KEY" => "",
		"SHOW_TITLE" => false,
		"TITLE_POSITION" => "",
		"TITLE" => "",
		"RIGHT_TITLE" => "",
		"RIGHT_LINK" => "",
		"CHECK_REQUEST_BLOCK" => CAllcorp3::checkRequestBlock("tariffs"),
		"IS_AJAX" => CAllcorp3::checkAjaxRequest(),
		"NAME_SIZE" => "22",
		"SUBTITLE" => "",
		"SHOW_PREVIEW_TEXT" => "Y",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	$component
);?>