<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>
<?$this->setFrameMode(true);?>	
<?use \Bitrix\Main\Localization\Loc,
	\Aspro\Functions\CAsproAllcorp3;?>
<div class="service-head" style="background-image: url(<?=$arResult['DETAIL_PICTURE']['SRC']?>)">
   <span class="banner-after" style="background-image: url(<?=CFile::GetPath($arResult['PROPERTIES']['TRANSPARENT_PICTURE']['VALUE']);?>)"></span>
	<div class="maxwidth-theme">
		<? CAllcorp3::ShowPageType('page_title');?>
	</div>
</div>
<div class="service-detail maxwidth-theme">
	<div class="service-first">
		<div class="service-left">
			<div class="content">
				<?=$arResult['DETAIL_TEXT']?>
			</div>
		</div>	
		<div class="service-right">
			<? if($arResult['PREVIEW_PICTURE']['SRC']) { ?>
				<div class="preview">
					<img src="<?=$arResult['PREVIEW_PICTURE']['SRC']?>" alt="">
				</div>
			<? } ?>
			<? if($arResult['PROPERTIES']['ADVANTAGES']['VALUE']) { ?>
				<div class="service-advantages">
					<ul>
						<? foreach($arResult['PROPERTIES']['ADVANTAGES']['VALUE'] as $value) { ?>
							<li><?=$value?></li>
						<? } ?>
					</ul>
				</div>
			<? } ?>
		</div>
	</div>
	<? if($arResult['PROPERTIES']['CARDS']['VALUE']) { ?>
		<?
		global $arFilter;
		$arFilter['ID'] = $arResult['PROPERTIES']['CARDS']['VALUE'];
		?>
		<div class="products">
			<h3>System composition</h3>
			<div class="container">
				<? 
		$APPLICATION->IncludeComponent(
	"kasianov:slider", 
	"solutions-slider", 
	array(
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
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "arFilter",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => array(
			0 => "42",
			1 => "103",
		),
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
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
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
		"TITLE" => "Спецпредложения",
		"COMPONENT_TEMPLATE" => "solutions-slider",
		"SHOW_DETAIL_LINK" => "Y",
		"SHOW_SECTION" => "Y"
	),
	false
);
?>
			</div>
		</div>
	<? } ?>
	<? if($arResult['PROPERTIES']['POSSIBILITIES']['VALUE']['TEXT']) { ?>
		<h2>Overview of features</h2>
		<div class="possibilities">
			<?=$arResult['PROPERTIES']['POSSIBILITIES']['~VALUE']['TEXT']?>
		</div>
	<? } ?>
	<? if($arResult['PROPERTIES']['CONTROL']['VALUE']) { ?>
		<div class="control">
			<h2>Our partners</h2>
			<div class="control-list">
				<? foreach($arResult['PROPERTIES']['CONTROL']['VALUE'] as $key => $fileId) { ?>
					<div class="control-item">
						<img src="<?=CFile::GetPath($fileId);?>" alt="">
					</div>
				<? } ?>
			</div>
		</div>
	<? } ?>
	<? if($arResult['PROPERTIES']['SEO']['VALUE']['TEXT']) { ?>
		<div class="seo">
			<?=$arResult['PROPERTIES']['SEO']['~VALUE']['TEXT']?>
		</div>
	<? } ?>

</div>
