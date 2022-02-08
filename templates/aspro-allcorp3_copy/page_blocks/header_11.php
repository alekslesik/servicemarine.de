<?
include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
include($_SERVER['DOCUMENT_ROOT'].SITE_DIR.'include/header/settings.php');

global $bodyDopClass, $arTheme;
$bodyDopClass .= ' header_padding-160';

/* set classes for header parts */
$topPartClasses = '';
$topPartClasses .= ' header__top-part--height_80';
$topPartClasses .= ' header__top-part--no_border';
$topPartClasses .= ' header__top-part--can-transparent bg_none';
$topPartClasses .= ' header__top-part--items-bottom';
if($bNarrowHeader) {
	if($bMarginHeader) {
	} else {
		$topPartClasses .= ' header--color_'.$mainBlockColor;
	}
} else {
	$topPartClasses .= ' header--color_'.$mainBlockColor;
	$topPartClasses .= ' header__top-part--paddings';
}

$mainPartClasses = '';
$mainPartClasses .= ' header__main-part--height_66';
$mainPartClasses .= ' header__main-part--can-transparent bg_none';
$mainPartClasses .= ' header__main-part--bordered';
$mainPartClasses .= ' hide-dotted';
if($bNarrowHeader) {
	if($bMarginHeader) {
		$mainPartClasses .= ' header__main-part--margin';
	} else {
		$mainPartClasses .= ' header--color_'.$mainBlockColor;
	}
} else {
	$mainPartClasses .= ' header--color_'.$mainBlockColor;
	if($bMarginHeader) {
		$mainPartClasses .= ' header__main-part--margin';
	}
}

$innerClasses = '  bg_none';
?>

<header class="header_11 header <?=($arRegion ? 'header--with_regions' : '')?> <?=$bNarrowHeader ? 'header--narrow' : ''?> <?=CAllcorp3::ShowPageProps('HEADER_COLOR')?>">
	<div class="header__inner">

		<?if($ajaxBlock == "HEADER_TOPEST_PART" && $bAjax) {
			$APPLICATION->restartBuffer();
		}?>
			<?/*
			<div class="header__topest-part" data-ajax-load-block="HEADER_TOPEST_PART">
				<?
				$blockOptions = array(
					'PARAM_NAME' => 'HEADER_TOGGLE_TOPEST_BUTTON',
					'BLOCK_TYPE' => 'TOPEST_BUTTON',
					'IS_AJAX' => $bAjax,
					'AJAX_BLOCK' => $ajaxBlock,
					'VISIBLE' => $bShowTopestButton,
				);
				?>
				<?=\Aspro\Functions\CAsproAllcorp3::showHeaderBlock($blockOptions);?>
			</div>
			*/?>

		<?if($ajaxBlock == "HEADER_TOPEST_PART" && $bAjax) {
			die();
		}?>

		<?if($ajaxBlock == "HEADER_TOP_PART" && $bAjax) {
			$APPLICATION->restartBuffer();
		}?>

		<div class="header__top-part <?=$topPartClasses?>" data-ajax-load-block="HEADER_TOP_PART">
			<?if($bNarrowHeader):?>
				<div class="maxwidth-theme">
			<?endif;?>
				
			<div class="header__top-inner">

				<div class="header__flex-part header__flex-part--left">
					<div class="header__top-item">
						<div class="line-block line-block--40">
							<?
							$blockOptions = array(
								'PARAM_NAME' => 'HEADER_TOGGLE_MEGA_MENU_LEFT',
								'BLOCK_TYPE' => 'MEGA_MENU',
								'IS_AJAX' => $bAjax,
								'AJAX_BLOCK' => $ajaxBlock,
								'VISIBLE' => $bShowMegaMenu && !$bRightMegaMenu,
								'WRAPPER' => 'line-block__item',
							);
							?>
							<?=\Aspro\Functions\CAsproAllcorp3::showHeaderBlock($blockOptions);?>

							<?if($arRegion):?>
								<?//regions?>
								<div class="line-block__item icon-block--with_icon icon-block--only_icon-1100">
									<?
									$arRegionsParams = array();
									if($bAjax) {
										$arRegionsParams['POPUP'] = 'N';
									}
									CAllcorp3::ShowListRegions($arRegionsParams);?>
								</div>
							<?endif;?>

							<?//show phone and callback?>
							<?
							$blockOptions = array(
								'PARAM_NAME' => 'HEADER_TOGGLE_PHONE',
								'BLOCK_TYPE' => 'PHONE',
								'IS_AJAX' => $bAjax,
								'AJAX_BLOCK' => $ajaxBlock,
								'VISIBLE' => $bShowPhone && $bPhone,
								'WRAPPER' => 'line-block__item no-shrinked icon-block--only_icon-1100',
								'CALLBACK' => $bShowCallback && $bCallback,
								'CALLBACK_CLASS' => 'hide-1400 hide-narrow',
								'MESSAGE' => GetMessage("S_CALLBACK"),
							);
							?>
							<?=\Aspro\Functions\CAsproAllcorp3::showHeaderBlock($blockOptions);?>
						</div>
					</div>
				</div>

				<div class="header__flex-part header__flex-part--center">

					<?//show logo?>
					<div class="logo no-shrinked <?=$logoClass?> header__top-item">
						<?=CAllcorp3::ShowLogo();?>
					</div>

				</div>

				<div class="header__flex-part header__flex-part--right">
					<div class="header__top-item">
						<div class="line-block line-block--40 line-block--24-1100 hide-basket-message">
							<?//show site list?>
							<?
							$arShowSites = \Aspro\Functions\CAsproAllcorp3::getShowSites();
							$countSites = count($arShowSites);
							$blockOptions = array(
								'PARAM_NAME' => 'HEADER_TOGGLE_LANG',
								'BLOCK_TYPE' => 'LANG',
								'IS_AJAX' => $bAjax,
								'AJAX_BLOCK' => $ajaxBlock,
								'VISIBLE' => $bShowLang && $countSites > 1,
								'WRAPPER' => 'line-block__item icon-block--only_icon-1200',
								'SITE_SELECTOR_NAME' => $siteSelectorName,
								'TEMPLATE' => 'main',
								'SITE_LIST' => $arShowSites,
							);
							?>
							<?=\Aspro\Functions\CAsproAllcorp3::showHeaderBlock($blockOptions);?>

							<?
							$blockOptions = array(
								'PARAM_NAME' => 'HEADER_TOGGLE_SEARCH',
								'BLOCK_TYPE' => 'SEARCH',
								'IS_AJAX' => $bAjax,
								'AJAX_BLOCK' => $ajaxBlock,
								'VISIBLE' => $bShowSearch,
								'WRAPPER' => 'line-block__item',
							);
							?>
							<?=\Aspro\Functions\CAsproAllcorp3::showHeaderBlock($blockOptions);?>

							<?$blockOptions = array(
								'PARAM_NAME' => 'HEADER_TOGGLE_CABINET',
								'BLOCK_TYPE' => 'CABINET',
								'IS_AJAX' => $bAjax,
								'AJAX_BLOCK' => $ajaxBlock,
								'VISIBLE' => $bCabinet,
								'WRAPPER' => 'line-block__item hide-name-narrow',
								'CABINET_PARAMS' => array(
									'TEXT_LOGIN' => '',
									'TEXT_NO_LOGIN' => '',
								),
							);?>
							<?=\Aspro\Functions\CAsproAllcorp3::showHeaderBlock($blockOptions);?>

							<?$blockOptions = array(
								'PARAM_NAME' => 'HEADER_TOGGLE_COMPARE',
								'BLOCK_TYPE' => 'COMPARE',
								'IS_AJAX' => $bAjax,
								'AJAX_BLOCK' => $ajaxBlock,
								'VISIBLE' => $bCompare,
								'WRAPPER' => 'line-block__item',
								'MESSAGE' => '',
								'CLASS_LINK' => 'light-opacity-hover fill-theme-hover banner-light-icon-fill',
								'CLASS_ICON' => 'menu-light-icon-fill ',
							);?>
							<?=\Aspro\Functions\CAsproAllcorp3::showHeaderBlock($blockOptions);?>
							
							<?$blockOptions = array(
								'PARAM_NAME' => 'HEADER_TOGGLE_BASKET',
								'BLOCK_TYPE' => 'BASKET',
								'IS_AJAX' => $bAjax,
								'AJAX_BLOCK' => $ajaxBlock,
								'VISIBLE' => $bOrder && !CAllcorp3::IsBasketPage() && !CAllcorp3::IsOrderPage(),
								'WRAPPER' => 'line-block__item',
								'MESSAGE' => '',
							);?>
							<?=\Aspro\Functions\CAsproAllcorp3::showHeaderBlock($blockOptions);?>

							<?
							$blockOptions = array(
								'PARAM_NAME' => 'HEADER_TOGGLE_BUTTON',
								'BLOCK_TYPE' => 'BUTTON',
								'IS_AJAX' => $bAjax,
								'AJAX_BLOCK' => $ajaxBlock,
								'VISIBLE' => $bShowButton,
								'WRAPPER' => 'line-block__item',
								'MESSAGE' => GetMessage("S_CALLBACK"),
							);
							?>
							<?=\Aspro\Functions\CAsproAllcorp3::showHeaderBlock($blockOptions);?>

							<?
							$blockOptions = array(
								'PARAM_NAME' => 'HEADER_TOGGLE_MEGA_MENU_RIGHT',
								'BLOCK_TYPE' => 'MEGA_MENU',
								'IS_AJAX' => $bAjax,
								'AJAX_BLOCK' => $ajaxBlock,
								'VISIBLE' => $bShowMegaMenu && $bRightMegaMenu,
								'WRAPPER' => 'line-block__item',
							);
							?>
							<?=\Aspro\Functions\CAsproAllcorp3::showHeaderBlock($blockOptions);?>
						</div>
					</div>
				</div>
			</div>

			<?if($bNarrowHeader):?>
				</div>
			<?endif;?>
		</div>

		<?if($ajaxBlock == "HEADER_TOP_PART" && $bAjax) {
			die();
		}?>

		<?if($ajaxBlock == "HEADER_MAIN_PART" && $bAjax) {
			$APPLICATION->restartBuffer();
		}?>

		<div class="header__main-part  <?=$mainPartClasses?> sliced"  data-ajax-load-block="HEADER_MAIN_PART">

			<?if($bNarrowHeader):?>
				<div class="maxwidth-theme">
			<?endif;?>

			<div class="header__main-inner <?=$innerClasses?>">

				<?//show menu?>
				<div class="header__main-item header__main-item--shinked header-menu header-menu--height_66 header-menu--centered header-menu--64">
					<nav class="mega-menu sliced">
						<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default",
							array(
								"COMPONENT_TEMPLATE" => ".default",
								"PATH" => SITE_DIR."include/header/menu_new.php",
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "",
								"AREA_FILE_RECURSIVE" => "Y",
								"EDIT_TEMPLATE" => "include_area.php"
							),
							false, array("HIDE_ICONS" => "Y")
						);?>
					</nav>
				</div>

			</div>

			<?if($bNarrowHeader):?>
				</div>
			<?endif;?>	
		</div>

		<?if($ajaxBlock == "HEADER_MAIN_PART" && $bAjax) {
			die();
		}?>
	</div>
</header>