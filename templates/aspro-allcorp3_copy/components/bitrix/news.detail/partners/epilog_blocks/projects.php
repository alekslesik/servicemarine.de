<?php

use \Bitrix\Main\Localization\Loc;

?>
<? if ($templateData['PROJECTS'] && $templateData['PROJECTS']['IBLOCK_ID'] && $templateData['PROJECTS']['VALUE']): ?>
	<? $GLOBALS['arrProjectsFilter'] = ['ID' => $templateData['PROJECTS']['VALUE']]; ?>
	<? ob_start(); ?>
	<?$bCheckAjaxBlock = CAllcorp3::checkRequestBlock("projects-list-inner");?>
	<? $APPLICATION->IncludeComponent(
		"bitrix:news.list",
		"items-list-inner",
		array(
			"IBLOCK_TYPE" => "aspro_allcorp3_content",
			"IBLOCK_ID" => $templateData['PROJECTS']['IBLOCK_ID'],
			"NEWS_COUNT" => "20",
			"SORT_BY1" => "SORT",
			"SORT_ORDER1" => "ASC",
			"SORT_BY2" => "ID",
			"SORT_ORDER2" => "DESC",
			"FILTER_NAME" => "arrProjectsFilter",
			"FIELD_CODE" => array(
				0 => "NAME",
				1 => "PREVIEW_TEXT",
				2 => "PREVIEW_PICTURE",
				3 => "",
			),
			"PROPERTY_CODE" => array(
				0 => "LINK",
				1 => "",
			),
			"CHECK_DATES" => "Y",
			"DETAIL_URL" => "",
			"AJAX_MODE" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"AJAX_OPTION_HISTORY" => "N",
			"CACHE_TYPE" => "A",
			"CACHE_TIME" => "36000000",
			"CACHE_FILTER" => "Y",
			"CACHE_GROUPS" => "N",
			"PREVIEW_TRUNCATE_LEN" => "",
			"ACTIVE_DATE_FORMAT" => "j F Y",
			"SET_TITLE" => "N",
			"SET_STATUS_404" => "N",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"ADD_SECTIONS_CHAIN" => "N",
			"HIDE_LINK_WHEN_NO_DETAIL" => "N",
			"PARENT_SECTION" => "",
			"PARENT_SECTION_CODE" => "",
			"INCLUDE_SUBSECTIONS" => "Y",
			"PAGER_TEMPLATE" => ".default",
			"DISPLAY_TOP_PAGER" => "N",
			"DISPLAY_BOTTOM_PAGER" => "N",
			"PAGER_TITLE" => "",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "N",
			"COUNT_IN_LINE" => "3",
			"AJAX_OPTION_ADDITIONAL" => "",

			"ROW_VIEW" => true,
			"BORDER" => true,
			"ITEM_HOVER_SHADOW" => true,
			"DARK_HOVER" => false,
			"ROUNDED" => true,
			"ROUNDED_IMAGE" => true,
			"ITEM_PADDING" => true,
			"ELEMENTS_ROW" => 1,
			"MAXWIDTH_WRAP" => false,
			"MOBILE_SCROLLED" => false,
			"NARROW" => false,
			"ITEMS_OFFSET" => false,
			"IMAGES" => "PICTURE",
			"IMAGE_POSITION" => "LEFT",
			"SHOW_PREVIEW" => true,
			"SHOW_TITLE" => false,
			"SHOW_SECTION" => "N",
			"TITLE_POSITION" => "",
			"TITLE" => "",
			"RIGHT_TITLE" => "",
			"RIGHT_LINK" => "",
			"CHECK_REQUEST_BLOCK" => $bCheckAjaxBlock,
			"IS_AJAX" => CAllcorp3::checkAjaxRequest() && $bCheckAjaxBlock,
			"NAME_SIZE" => "18",
			"SUBTITLE" => "",
			"SHOW_PREVIEW_TEXT" => "N",
		),
		false, array("HIDE_ICONS" => "Y")
	); ?>
	<? $html = trim(ob_get_clean()); ?>
	<? if ($html && strpos($html, 'error') === false): ?>
		<div class="detail-block ordered-block">
			<div class="ordered-block__title switcher-title font_22"><?= $arParams['T_PROJECTS'] ?: Loc::getMessage('EPILOG_BLOCK__PROJECTS') ?></div>
			<?= $html ?>
		</div>
	<? endif; ?>
<? endif; ?>