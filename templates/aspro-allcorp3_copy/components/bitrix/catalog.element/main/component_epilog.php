<?
use \Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
global $arTheme, $APPLICATION;

CJSCore::Init('aspro_fancybox');

// top banner
if($templateData['SECTION_BNR_CONTENT']){
	$GLOBALS['SECTION_BNR_CONTENT'] = true;
	$GLOBALS['bodyDopClass'] .= ' has-long-banner '.($templateData['SECTION_BNR_UNDER_HEADER'] === 'YES' ? 'header_opacity front_page' : '');
	if($templateData['SECTION_BNR_COLOR'] !== 'dark'){
		$APPLICATION->SetPageProperty('HEADER_COLOR', 'light');
	}
}

// can order?
$bOrderViewBasket = $templateData["ORDER"];

// use tabs?
if($arParams['USE_DETAIL_TABS'] === 'Y'){
	$bUseDetailTabs = true;
}
elseif($arParams['USE_DETAIL_TABS'] === 'N'){
	$bUseDetailTabs = false;
}
else{
	$bUseDetailTabs = $arTheme['USE_DETAIL_TABS']['VALUE'] != 'N';
}

// blocks order
if(
	!$bUseDetailTabs &&
	array_key_exists('DETAIL_BLOCKS_ALL_ORDER', $arParams) &&
	$arParams["DETAIL_BLOCKS_ALL_ORDER"]
){
	$arBlockOrder = explode(",", $arParams["DETAIL_BLOCKS_ALL_ORDER"]);
}
else{
	$arBlockOrder = explode(",", $arParams["DETAIL_BLOCKS_ORDER"]);
	$arTabOrder = explode(",", $arParams["DETAIL_BLOCKS_TAB_ORDER"]);
}
?>
<div class="catalog-detail__bottom-info">
	<?include_once 'epilog_blocks/tizers.php';?>

	<?foreach($arBlockOrder as $blockCode):?>
		<?if($blockCode !== 'sale'):?>
			<?include 'epilog_blocks/'.$blockCode.'.php';?>
		<?endif;?>
	<?endforeach;?>
</div>
<?

global $arFilter;
$arFilter = [];
    $res = CIBlockElement::GetProperty(42, $arResult['ID'], "sort", "asc", array("CODE" => "SOLUTIONS"));
    while ($ob = $res->GetNext())
    {
        $arFilter['ID'][] = $ob['VALUE'];
    }

?>
<h3>Other solutions</h3>
<div class="products">
	<div class="container minicontainer">

		<? 
		$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"solutions-slider",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"FILTER_NAME" => "arFilter",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "41",
		"IBLOCK_TYPE" => "aspro_allcorp3_catalog",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"",1=>"",),
		"RIGHT_LINK" => "company/reviews/",
		"RIGHT_TITLE" => "Все акции",
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SHOW_PREVIEW_TEXT" => "Y",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"SUBTITLE" => "",
		"TITLE" => "Спецпредложения"
	)
);
?>
	</div>
</div>
<?
$res = CIBlockElement::GetProperty(42, $arResult['ID'], "sort", "asc", array("CODE" => "CERTIFICATES"));
while ($ob = $res->GetNext())
{
    $certificates[] = $ob['VALUE'];
}
?>
<? if($certificates[0] != NULL) { ?>
<h3>Сертификаты</h3>
<div class="certificates">
	<div class="container minicontainer">
		<div class="cards-slider">
			<? foreach($certificates as $item) { ?>
				<div class="card-slide">
					<img class="ls-is-cached lazyloaded" src="<?=CFile::GetPath($item)?>" loading="lazy" alt="">
				</div>
			<? } ?>
		</div>
	</div>
</div>
<? } ?>
<?
global $projects;
$res = CIBlockElement::GetProperty(42, $arResult['ID'], "sort", "asc", array("CODE" => "PROJECTS"));
while ($ob = $res->GetNext())
{
    $projects[] = $ob['VALUE'];
}
?>
<? if($projects[0] != NULL) { ?>
<h3>Реализованные проекты</h3>
<div class="projects">
	<div class="container minicontainer">
		<?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"product-projects",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("NAME", "PREVIEW_PICTURE", ""),
		"FILTER_NAME" => "projects",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "40",
		"IBLOCK_TYPE" => "aspro_allcorp3_content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("", ""),
		"RIGHT_LINK" => "company/reviews/",
		"RIGHT_TITLE" => "Все акции",
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SHOW_PREVIEW_TEXT" => "Y",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"SUBTITLE" => "",
		"TITLE" => "Спецпредложения"
	)
);?>
	</div>
</div>
<? } ?>



<? if($arResult['PROPERTIES']['ORGANISATIONS']['VALUE']) { ?>
   <div class="cards">
      <h3>Our partners</h3>
      <div class="reg">
         <div class="cards-slider">
            <? foreach($arResult['PROPERTIES']['ORGANISATIONS']['VALUE'] as $fileId) { ?>
               <div class="card-slide certificate">
                  <img src="<?=CFile::GetPath($fileId);?>" alt="">
               </div>
            <? } ?>
         </div>
      </div>
   </div>
<? } ?>
