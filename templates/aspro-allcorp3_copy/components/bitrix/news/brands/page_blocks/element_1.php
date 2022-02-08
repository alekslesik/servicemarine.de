<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
<? global $arTheme; ?>

<?
// link goods
$GLOBALS["SHOW_TYPE_ITEMS"] = ["items"];
?>

<? $APPLICATION->IncludeComponent(
	"bitrix:news.detail",
	"partners",
	array(
		"T_DOCS" => $arParams["T_DOCS"],
		"DOCS_PROP_CODE" => $arParams["DOCS_PROP_CODE"],
		"SHOW_LINK_GOODS" => $arParams["SHOW_LINK_GOODS"],
		"T_LINK_GOODS" => $arParams["T_LINK_GOODS"],
		"LINK_GOODS_IBLOCK_ID" => $arParams["LINK_GOODS_IBLOCK_ID"],
		"LINK_GOODS_PROP_CODE" => $arParams["LINK_GOODS_PROP_CODE"],
		"T_COMMENTS" => $arParams["T_COMMENTS"],
		"DETAIL_USE_COMMENTS" => $arParams["DETAIL_USE_COMMENTS"],
		"DETAIL_BLOG_USE" => $arParams["DETAIL_BLOG_USE"],
		"DETAIL_BLOG_URL" => $arParams["DETAIL_BLOG_URL"],
		"COMMENTS_COUNT" => $arParams["COMMENTS_COUNT"],
		"DETAIL_BLOG_TITLE" => $arParams["DETAIL_BLOG_TITLE"],
		"DETAIL_BLOG_EMAIL_NOTIFY" => $arParams["DETAIL_BLOG_EMAIL_NOTIFY"],
		"DETAIL_VK_USE" => $arParams["DETAIL_VK_USE"],
		"DETAIL_VK_TITLE" => $arParams["DETAIL_VK_TITLE"],
		"DETAIL_VK_API_ID" => $arParams["DETAIL_VK_API_ID"],
		"DETAIL_FB_USE" => $arParams["DETAIL_FB_USE"],
		"DETAIL_FB_TITLE" => $arParams["DETAIL_FB_TITLE"],
		"DETAIL_FB_APP_ID" => $arParams["DETAIL_FB_APP_ID"],
		"DETAIL_BLOCKS_ORDER" => $arParams["DETAIL_BLOCKS_ORDER"],
		"SHOW_DETAIL_LINK" => $arParams["SHOW_DETAIL_LINK"],
		"USE_SHARE" => $arParams["USE_SHARE"],

		"SKU_IBLOCK_ID"	=>	$arParams["SKU_IBLOCK_ID"],
		"SKU_TREE_PROPS"	=>	$arParams["SKU_TREE_PROPS"],
		"SKU_PROPERTY_CODE"	=>	$arParams["SKU_PROPERTY_CODE"],
		"SKU_SORT_FIELD" => $arParams["SKU_SORT_FIELD"],
		"SKU_SORT_ORDER" => $arParams["SKU_SORT_ORDER"],
		"SKU_SORT_FIELD2" => $arParams["SKU_SORT_FIELD2"],
		"SKU_SORT_ORDER2" =>$arParams["SKU_SORT_ORDER2"],

		"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
		"DISPLAY_NAME" => $arParams["DISPLAY_NAME"],
		"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"FIELD_CODE" => $arParams["DETAIL_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
		"DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["detail"],
		"SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
		"META_KEYWORDS" => $arParams["META_KEYWORDS"],
		"META_DESCRIPTION" => $arParams["META_DESCRIPTION"],
		"BROWSER_TITLE" => $arParams["BROWSER_TITLE"],
		"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
		"SET_CANONICAL_URL" => $arParams["DETAIL_SET_CANONICAL_URL"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
		"ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
		"ADD_ELEMENT_CHAIN" => $arParams["ADD_ELEMENT_CHAIN"],
		"ACTIVE_DATE_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
		"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
		"DISPLAY_TOP_PAGER" => $arParams["DETAIL_DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER" => $arParams["DETAIL_DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE" => $arParams["DETAIL_PAGER_TITLE"],
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => $arParams["DETAIL_PAGER_TEMPLATE"],
		"PAGER_SHOW_ALL" => $arParams["DETAIL_PAGER_SHOW_ALL"],
		"CHECK_DATES" => $arParams["CHECK_DATES"],
		"ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
		"ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
		"IBLOCK_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["news"],
		"SHARE_HIDE" => $arParams["SHARE_HIDE"],
		"SHARE_TEMPLATE" => $arParams["SHARE_TEMPLATE"],
		"SHARE_HANDLERS" => $arParams["SHARE_HANDLERS"],
		"SHARE_SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
		"SHARE_SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
	),
	$component
); ?>

