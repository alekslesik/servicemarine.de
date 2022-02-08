<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true ) die();

$bMobileCompact = $GLOBALS['arTheme']['MOBILE_LIST_ELEMENTS_COMPACT_IN_SECTIONS']['VALUE'] === 'Y';
$bShowPreviewText = $arParams['SHOW_SECTION_PREVIEW_DESCRIPTION'] !== 'N';
if($arParams['SECTIONS_TYPE_VIEW'] === 'FROM_MODULE'){
	$blockTemplateOptions = $GLOBALS['arTheme']['SECTIONS_TYPE_VIEW_SERVICES']['LIST'][$GLOBALS['arTheme']['SECTIONS_TYPE_VIEW_SERVICES']['VALUE']];
	$bItemsOffset = $blockTemplateOptions['ADDITIONAL_OPTIONS']['SECTIONS_ITEMS_OFFSET_SERVICES']['VALUE'] === 'Y';
	$elementsCount = $blockTemplateOptions['ADDITIONAL_OPTIONS']['SECTIONS_ELEMENTS_COUNT_SERVICES']['VALUE'];
	$images = $blockTemplateOptions['ADDITIONAL_OPTIONS']['SECTIONS_IMAGES_SERVICES']['VALUE'];
}
else{
	$bItemsOffset = $arParams['SECTIONS_ITEMS_OFFSET'] === 'Y';
	$elementsCount = $arParams['SECTIONS_ELEMENTS_COUNT'];
	$images = $arParams['SECTIONS_IMAGES'];
}
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"services-list",
	Array(
		"SHOW_CHILD_SECTIONS" => $arParams["SHOW_CHILD_SECTIONS"],
		"SHOW_CHILD_ELEMENTS" => $arParams["SHOW_CHILD_ELEMENTS"],
		"SHOW_ELEMENTS_IN_LAST_SECTION" => $arParams["SHOW_ELEMENTS_IN_LAST_SECTION"],
		"DEPTH_LEVEL" => 1,
		"IBLOCK_TYPE"	=>	$arParams["IBLOCK_TYPE"],
		"IBLOCK_ID"	=>	$arParams["IBLOCK_ID"],
		"NEWS_COUNT"	=>	9999,
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
		"CACHE_TYPE"	=>	$arParams["CACHE_TYPE"],
		"CACHE_TIME"	=>	$arParams["CACHE_TIME"],
		"CACHE_FILTER"	=>	$arParams["CACHE_FILTER"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"DISPLAY_TOP_PAGER"	=>	"N",
		"DISPLAY_BOTTOM_PAGER"	=>	"N",
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
		"SHOW_DETAIL_LINK"	=>	'Y',//$arParams["SHOW_DETAIL_LINK"],
		"FILTER_NAME"	=>	$arParams["FILTER_NAME"],
		"HIDE_LINK_WHEN_NO_DETAIL"	=>	'N',//$arParams["HIDE_LINK_WHEN_NO_DETAIL"],
		"CHECK_DATES"	=>	$arParams["CHECK_DATES"],
		"PARENT_SECTION"	=>	$arResult["VARIABLES"]["SECTION_ID"],
		"PARENT_SECTION_CODE"	=>	$arResult["VARIABLES"]["SECTION_CODE"],
		"DETAIL_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
		"SECTION_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"IBLOCK_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
		"INCLUDE_SUBSECTIONS" => (isset($arParams["INCLUDE_SUBSECTIONS"])) ? $arParams["INCLUDE_SUBSECTIONS"] : "N",
		"ROW_VIEW" => false,
		"BORDER" => true,
		"ITEM_HOVER_SHADOW" => true,
		"DARK_HOVER" => false,
		"ROUNDED" => true,
		"ROUNDED_IMAGE" => true,
		"ELEMENTS_ROW" => $elementsCount,
		"MAXWIDTH_WRAP" => false,
		"MOBILE_SCROLLED" => $bMobileCompact,
		"NARROW" => true,
		"ITEMS_OFFSET" => $bItemsOffset,
		"IMAGES" => $images,
		"IMAGE_POSITION" => "TOP",
		"STICKY_IMAGES" => "N",
		"ITEMS_TYPE" => "SECTIONS",
		"SHOW_PREVIEW" => $bShowPreviewText,
		"IS_AJAX" => CAllcorp3::checkAjaxRequest(),
		"NAME_SIZE" => $elementsCount==4?18:22,
	),
	$component
);?>