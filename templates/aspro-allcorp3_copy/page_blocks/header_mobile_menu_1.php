<?
include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
include($_SERVER['DOCUMENT_ROOT'].SITE_DIR.'include/header/settings.php');

// sites list 
$arShowSites = \Aspro\Functions\CAsproAllcorp3::getShowSites();
$countSites = count($arShowSites);

global $arTheme, $arRegion;
?>
<?if($ajaxBlock === 'MOBILE_MENU_MAIN_PART' && $bAjax){
	$APPLICATION->restartBuffer();
}?>
<div class="mobilemenu mobilemenu_1" data-ajax-load-block="MOBILE_MENU_MAIN_PART">
	<?// close icon?>
	<span class="mobilemenu__close stroke-theme-hover" title="<?=\Bitrix\Main\Localization\Loc::getMessage('CLOSE_BLOCK');?>">
		<?=CAllcorp3::showIconSvg('', SITE_TEMPLATE_PATH.'/images/svg/Close.svg')?>
	</span>

	<div class="mobilemenu__inner">
		<div class="mobilemenu__item">
			<?// logo?>
			<div class="logo no-shrinked <?=$logoClass?>">
				<?=CAllcorp3::ShowLogo();?>
			</div>
		</div>
		
		<?// top items?>
		<?if(
			($bShowLangMobileMenu && $bShowLangUpMobileMenu && $countSites > 1) ||
			(boolval($arRegion) && $bShowRegionUpMobileMenu) ||
			($bCabinet && $bShowCabinetUpMobileMenu) ||
			($bCompare && $bShowCompareUpMobileMenu) ||
			($bShowCartMobileMenu && $bShowCartUpMobileMenu)
		):?>
			<div class="mobilemenu__item">
				<?=\Aspro\Functions\CAsproAllcorp3::showMobileMenuBlock(
					array(
						'PARAM_NAME' => 'MOBILE_MENU_TOGGLE_LANG',
						'BLOCK_TYPE' => 'LANG',
						'IS_AJAX' => $bAjax,
						'AJAX_BLOCK' => $ajaxBlock,
						'VISIBLE' => $bShowLangMobileMenu && $bShowLangUpMobileMenu && $countSites > 1,
						'WRAPPER' => '',
						'SITE_SELECTOR_NAME' => $siteSelectorName,
						'TEMPLATE' => 'mobile',
						'SITE_LIST' => $arShowSites,
					)
				);?>

				<?// regions?>
				<?=\Aspro\Functions\CAsproAllcorp3::showMobileMenuBlock(
					array(
						'PARAM_NAME' => 'MOBILE_MENU_TOGGLE_REGION',
						'BLOCK_TYPE' => 'REGION',
						'IS_AJAX' => $bAjax,
						'AJAX_BLOCK' => $ajaxBlock,
						'VISIBLE' => boolval($arRegion) && $bShowRegionUpMobileMenu,
						'WRAPPER' => '',
					)
				);?>

				<?// cabinet?>
				<?=\Aspro\Functions\CAsproAllcorp3::showMobileMenuBlock(
					array(
						'PARAM_NAME' => 'MOBILE_MENU_TOGGLE_PERSONAL',
						'BLOCK_TYPE' => 'CABINET',
						'IS_AJAX' => $bAjax,
						'AJAX_BLOCK' => $ajaxBlock,
						'VISIBLE' => $bCabinet && $bShowCabinetUpMobileMenu,
						'WRAPPER' => '',
					)
				);?>
				
				<?// compare?>
				<?=\Aspro\Functions\CAsproAllcorp3::showMobileMenuBlock(
					array(
						'PARAM_NAME' => 'MOBILE_MENU_TOGGLE_COMPARE',
						'BLOCK_TYPE' => 'COMPARE',
						'IS_AJAX' => $bAjax,
						'AJAX_BLOCK' => $ajaxBlock,
						'VISIBLE' => $bCompare && $bShowCompareUpMobileMenu,
						'WRAPPER' => '',
					)
				);?>

				<?// cart?>
				<?=\Aspro\Functions\CAsproAllcorp3::showMobileMenuBlock(
					array(
						'PARAM_NAME' => 'MOBILE_MENU_TOGGLE_CART',
						'BLOCK_TYPE' => 'BASKET',
						'IS_AJAX' => $bAjax,
						'AJAX_BLOCK' => $ajaxBlock,
						'VISIBLE' => $bShowCartMobileMenu && $bShowCartUpMobileMenu && !CAllcorp3::IsBasketPage() && !CAllcorp3::IsOrderPage(),
						'WRAPPER' => '',
					)
				);?>
				
				<div class="mobilemenu__separator"></div>
			</div>
		<?endif;?>

		<div class="mobilemenu__item">
			<?if(CAllCorp3::nlo('menu-mobile', 'class="loadings" style="height:47px;"')):?>
			<!-- noindex -->
			<?$APPLICATION->IncludeComponent("bitrix:main.include", ".default",
				array(
					"COMPONENT_TEMPLATE" => ".default",
					"PATH" => SITE_DIR."include/header/menu_mobile.php",
					"AREA_FILE_SHOW" => "file",
					"AREA_FILE_SUFFIX" => "",
					"AREA_FILE_RECURSIVE" => "Y",
					"EDIT_TEMPLATE" => "include_area.php"
				),
				false, array("HIDE_ICONS" => "Y")
			);?>	
			<!-- /noindex -->
			<?endif;?>
			<?CAllCorp3::nlo('menu-mobile');?>

			<?// button?>
			<?=\Aspro\Functions\CAsproAllcorp3::showMobileMenuBlock(
				array(
					'PARAM_NAME' => 'MOBILE_MENU_TOGGLE_BUTTON',
					'BLOCK_TYPE' => 'BUTTON',
					'IS_AJAX' => $bAjax,
					'AJAX_BLOCK' => $ajaxBlock,
					'VISIBLE' => $bShowButtonMobileMenu,
					'WRAPPER' => '',
					'CLASS' => 'font_14',
				)
			);?>
		
			<?=\Aspro\Functions\CAsproAllcorp3::showMobileMenuBlock(
				array(
					'PARAM_NAME' => 'MOBILE_MENU_TOGGLE_LANG',
					'BLOCK_TYPE' => 'LANG',
					'IS_AJAX' => $bAjax,
					'AJAX_BLOCK' => $ajaxBlock,
					'VISIBLE' => $bShowLangMobileMenu && !$bShowLangUpMobileMenu && $countSites > 1,
					'WRAPPER' => '',
					'SITE_SELECTOR_NAME' => $siteSelectorName,
					'TEMPLATE' => 'mobile',
					'SITE_LIST' => $arShowSites,
				)
			);?>

			<?// regions?>
			<?=\Aspro\Functions\CAsproAllcorp3::showMobileMenuBlock(
				array(
					'PARAM_NAME' => 'MOBILE_MENU_TOGGLE_REGION',
					'BLOCK_TYPE' => 'REGION',
					'IS_AJAX' => $bAjax,
					'AJAX_BLOCK' => $ajaxBlock,
					'VISIBLE' => boolval($arRegion) && !$bShowRegionUpMobileMenu,
					'WRAPPER' => '',
				)
			);?>

			<?// cabinet?>
			<?=\Aspro\Functions\CAsproAllcorp3::showMobileMenuBlock(
				array(
					'PARAM_NAME' => 'MOBILE_MENU_TOGGLE_PERSONAL',
					'BLOCK_TYPE' => 'CABINET',
					'IS_AJAX' => $bAjax,
					'AJAX_BLOCK' => $ajaxBlock,
					'VISIBLE' => $bCabinet && !$bShowCabinetUpMobileMenu,
					'WRAPPER' => '',
				)
			);?>

			<?// compare?>
			<?=\Aspro\Functions\CAsproAllcorp3::showMobileMenuBlock(
				array(
					'PARAM_NAME' => 'MOBILE_MENU_TOGGLE_COMPARE',
					'BLOCK_TYPE' => 'COMPARE',
					'IS_AJAX' => $bAjax,
					'AJAX_BLOCK' => $ajaxBlock,
					'VISIBLE' => $bCompare && !$bShowCompareUpMobileMenu,
					'WRAPPER' => '',
				)
			);?>

			<?// cart?>
			<?=\Aspro\Functions\CAsproAllcorp3::showMobileMenuBlock(
				array(
					'PARAM_NAME' => 'MOBILE_MENU_TOGGLE_CART',
					'BLOCK_TYPE' => 'BASKET',
					'IS_AJAX' => $bAjax,
					'AJAX_BLOCK' => $ajaxBlock,
					'VISIBLE' => $bShowCartMobileMenu && !$bShowCartUpMobileMenu && !CAllcorp3::IsBasketPage() && !CAllcorp3::IsOrderPage(),
					'WRAPPER' => '',
				)
			);?>

			<?if(
				$bShowPhoneMobileMenu ||
				$bShowAddressMobileMenu ||
				$bShowEmailMobileMenu ||
				$bShowScheduleMobileMenu ||
				$bShowSocialMobileMenu
			):?>
				<div class="mobilemenu__separator"></div>
			<?endif;?>
		</div>

		<?// top items?>
		<?if(
			$bShowPhoneMobileMenu ||
			$bShowAddressMobileMenu ||
			$bShowEmailMobileMenu ||
			$bShowScheduleMobileMenu ||
			$bShowSocialMobileMenu
		):?>
			<div class="mobilemenu__item">
				<?=\Aspro\Functions\CAsproAllcorp3::showMobileMenuBlock(
					array(
						'PARAM_NAME' => 'MOBILE_MENU_TOGGLE_CONTACTS',
						'BLOCK_TYPE' => 'CONTACTS',
						'IS_AJAX' => $bAjax,
						'AJAX_BLOCK' => $ajaxBlock,
						'VISIBLE' => $bShowPhoneMobileMenu || $bShowAddressMobileMenu || $bShowEmailMobileMenu || $bShowScheduleMobileMenu,
						'WRAPPER' => '',
						'PHONES' => $bShowPhoneMobileMenu,
						'CALLBACK' => $bShowCallbackMobileMenu,
						'ADDRESS' => $bShowAddressMobileMenu,
						'EMAIL' => $bShowEmailMobileMenu,
						'SCHEDULE' => $bShowScheduleMobileMenu,
					)
				);?>

				<?// social?>
				<?=\Aspro\Functions\CAsproAllcorp3::showMobileMenuBlock(
					array(
						'PARAM_NAME' => 'MOBILE_MENU_TOGGLE_SOCIAL',
						'BLOCK_TYPE' => 'SOCIAL',
						'IS_AJAX' => $bAjax,
						'AJAX_BLOCK' => $ajaxBlock,
						'VISIBLE' => $bShowSocialMobileMenu,
						'WRAPPER' => '',
						'HIDE_MORE' => false,
					)
				);?>
			</div>
		<?endif;?>
	</div>
</div>
<?if($ajaxBlock === 'MOBILE_MENU_MAIN_PART' && $bAjax){
	die();
}?>