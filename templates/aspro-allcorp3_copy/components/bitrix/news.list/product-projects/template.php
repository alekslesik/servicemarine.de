<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true ) die();?>
<?$this->setFrameMode(true);?>
<?use \Bitrix\Main\Localization\Loc;?>
<div class="projects-list">
	<? foreach($arResult['ITEMS'] as $arItem) { ?>
		<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="project" style="background-image: url(<?=$arItem['PREVIEW_PICTURE']['SRC']?>);">
			<span class="project-name">
				<?=$arItem['NAME']?>
			</span>
		</a>
	<? } ?>
</div>