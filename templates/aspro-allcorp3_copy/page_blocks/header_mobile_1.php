<?
include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
include($_SERVER['DOCUMENT_ROOT'].SITE_DIR.'include/header/settings.php');

global $arTheme;
$cabinetClass = $cartClass = '';

$baseColor = $arTheme['BASE_COLOR']['VALUE'] === 'CUSTOM' ? $arTheme['BASE_COLOR_CUSTOM']['VALUE'] : $arTheme['BASE_COLOR']['VALUE'];
$moreColor = $arTheme['USE_MORE_COLOR']['VALUE'] === 'N' ? $baseColor : ($arTheme['MORE_COLOR']['VALUE'] === 'CUSTOM' ? $arTheme['MORE_COLOR_CUSTOM']['VALUE'] : $arTheme['MORE_COLOR']['VALUE']);
if(
	(
		$colorMobileHeader === 'colored' &&
		$baseColor == $moreColor
	) ||
	(
		$colorMobileHeader === 'dark' &&
		$moreColor === '333333'
	)
){
	$cartClass = 'header-cart--hcolor-count';
	$cabinetClass = 'header-cabinet__fill-white-link';
}
?>
<?if($ajaxBlock === 'HEADER_MOBILE_MAIN_PART' && $bAjax){
	$APPLICATION->restartBuffer();
}?>
<div class="mobileheader mobileheader_1 mobileheader--color-<?=$colorMobileHeader?>" data-ajax-load-block="HEADER_MOBILE_MAIN_PART">
	<div class="mobileheader__inner">
		<div class="mobileheader__item">
			<div class="line-block">
				<?// burger?>
				<?=\Aspro\Functions\CAsproAllcorp3::showMobileHeaderBlock(
					array(
						'PARAM_NAME' => 'HEADER_MOBILE_TOGGLE_BURGER_LEFT',
						'BLOCK_TYPE' => 'BURGER',
						'IS_AJAX' => $bAjax,
						'AJAX_BLOCK' => $ajaxBlock,
						'VISIBLE' => $bShowBurgerMobileHeader && !$bShowRightBurgerMobileHeader,
						'WRAPPER' => 'line-block__item',
					)
				);?>

				<?// logo?>
				<div class="logo no-shrinked line-block__item <?=$logoClass?>">
					<?=CAllcorp3::ShowLogo(
						array(
							'IS_WHITE' => $bWhiteLogoMobileHeader,
						)
					);?>
				</div>
			</div>
		</div>

		<div class="mobileheader__item mobileheader__item--right-icons">
			<div class="line-block">
				<?// phones and callback?>
				<?=\Aspro\Functions\CAsproAllcorp3::showMobileHeaderBlock(
					array(
						'PARAM_NAME' => 'HEADER_MOBILE_TOGGLE_PHONE',
						'BLOCK_TYPE' => 'PHONE',
						'IS_AJAX' => $bAjax,
						'AJAX_BLOCK' => $ajaxBlock,
						'VISIBLE' => $bShowPhoneMobileHeader && $bPhone,
						'WRAPPER' => 'line-block__item no-shrinked',
						'CALLBACK' => $bShowCallbackMobileHeader,
					)
				);?>

				<?// search?>
				<?=\Aspro\Functions\CAsproAllcorp3::showMobileHeaderBlock(
					array(
						'PARAM_NAME' => 'HEADER_MOBILE_TOGGLE_SEARCH',
						'BLOCK_TYPE' => 'SEARCH',
						'IS_AJAX' => $bAjax,
						'AJAX_BLOCK' => $ajaxBlock,
						'VISIBLE' => $bShowSearchMobileHeader,
						'WRAPPER' => 'line-block__item icon-block--only_icon',
					)
				);?>

				<?// cabinet?>
				<?=\Aspro\Functions\CAsproAllcorp3::showMobileHeaderBlock(
					array(
						'PARAM_NAME' => 'HEADER_MOBILE_TOGGLE_PERSONAL',
						'BLOCK_TYPE' => 'CABINET',
						'IS_AJAX' => $bAjax,
						'AJAX_BLOCK' => $ajaxBlock,
						'VISIBLE' => $bCabinet,
						'WRAPPER' => 'line-block__item '.$cabinetClass,
						'CABINET_PARAMS' => array(
							'TEXT_LOGIN' => '',
							'TEXT_NO_LOGIN' => '',
							'SHOW_MENU' => false,
						),
					)
				);?>
				
				<?// compare?>
				<?=\Aspro\Functions\CAsproAllcorp3::showMobileHeaderBlock(
					array(
						'PARAM_NAME' => 'HEADER_MOBILE_TOGGLE_COMPARE',
						'BLOCK_TYPE' => 'COMPARE',
						'IS_AJAX' => $bAjax,
						'AJAX_BLOCK' => $ajaxBlock,
						'VISIBLE' => $bCompare,
						'WRAPPER' => 'line-block__item '.$cartClass,
						'MESSAGE' => '',
						'CLASS_LINK' => 'light-opacity-hover fill-theme-hover banner-light-icon-fill',
						'CLASS_ICON' => 'menu-light-icon-fill ',
					)
				);?>
				
				<?// cart?>
				<?=\Aspro\Functions\CAsproAllcorp3::showMobileHeaderBlock(
					array(
						'PARAM_NAME' => 'HEADER_MOBILE_TOGGLE_CART',
						'BLOCK_TYPE' => 'BASKET',
						'IS_AJAX' => $bAjax,
						'AJAX_BLOCK' => $ajaxBlock,
						'VISIBLE' => $bShowCartMobileHeader && !CAllcorp3::IsBasketPage() && !CAllcorp3::IsOrderPage(),
						'WRAPPER' => 'line-block__item '.$cartClass,
						'MESSAGE' => '',
					)
				);?>

				<?// right burger?>
				<?=\Aspro\Functions\CAsproAllcorp3::showMobileHeaderBlock(
					array(
						'PARAM_NAME' => 'HEADER_MOBILE_TOGGLE_BURGER_RIGHT',
						'BLOCK_TYPE' => 'BURGER',
						'IS_AJAX' => $bAjax,
						'AJAX_BLOCK' => $ajaxBlock,
						'VISIBLE' => $bShowBurgerMobileHeader && $bShowRightBurgerMobileHeader,
						'WRAPPER' => 'line-block__item',
					)
				);?>
			</div>
		</div>
	</div>
</div>
<?if($ajaxBlock === 'HEADER_MOBILE_MAIN_PART' && $bAjax){
	die();
}?>