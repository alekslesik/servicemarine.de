<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>
<?$this->setFrameMode(true);?>
<?if($arResult['ITEMS']['TOP']['ITEMS']):?>
	<?
	$templateData = array(
		'BANNERS_COUNT' => count($arResult['ITEMS']['TOP']['ITEMS']),
	);

	$currentBannerIndex = intval($arParams['CURRENT_BANNER_INDEX']) > 0 ? intval($arParams['CURRENT_BANNER_INDEX']) - 1 : 0;
	$bannerMobile = $arParams['BIGBANNER_MOBILE'];
	$bHideOnNarrow = $arParams['BIGBANNER_HIDEONNARROW'] === 'Y';
	$slideshowSpeed = abs(intval($arParams['BIGBANNER_SLIDESSHOWSPEED']));
	$animationSpeed = abs(intval($arParams['BIGBANNER_ANIMATIONSPEED']));
	$bAnimation = $slideshowSpeed && strlen($arParams['BIGBANNER_ANIMATIONTYPE']);
	$bOneSlide = count($arResult['ITEMS']['TOP']['ITEMS']) == 1;
	if($arParams['BIGBANNER_ANIMATIONTYPE'] === 'FADE'){
		$animationType = 'fade';
	}
	else{
		$animationType = 'slide';
		$animationDirection = 'horizontal';
		if($arParams['BIGBANNER_ANIMATIONTYPE'] === 'SLIDE_VERTICAL'){
			$animationDirection = 'vertical';
		}
	}

	$bBgImage = !$arParams['IMG_POSITION'] || $arParams['IMG_POSITION'] == 'COVER';
	$bWideText = $arParams['WIDE_TEXT'];
	$sliderItems = $arParams['SLIDER_ITEMS'] ? $arParams['SLIDER_ITEMS'] : 1;
	$bSmallPreview = $sliderItems > 1 || $arResult['HAS_CHILD_BANNERS'];

	$bLowBanner = $arParams['HEIGHT_BANNER'] === 'LOW';
	$bNormalBanner = $arParams['HEIGHT_BANNER'] === 'NORMAL';
	$bHighBanner = !$bLowBanner && !$bNormalBanner;

	$titleSizeClass = 'banners-big__title--small';
	if(
		$bWideText &&
		$bHighBanner
	) {
		$titleSizeClass = 'banners-big__title--large';
	} else if(
		$bHighBanner ||
		$bWideText
	) {
		$titleSizeClass = 'banners-big__title--middle';
		$textClass = ' banners-big__text-block--margin-top-more';
	}

	if($sliderItems > 1) {
		if($bHighBanner) {
			$titleSizeClass = 'banners-big__title--xs';
		} else {
			$titleSizeClass = 'banners-big__title--xxs';
		}
	}

	$bannerClasses = ' swipeignore';
	if($bHighBanner) {
		$bannerClasses .= ' banners-big--high';
	}
	else{
		$bannerClasses .= ' banners-big--nothigh';

		if($bNormalBanner) {
			$bannerClasses .= ' banners-big--normal';
		}
		else {
			$bannerClasses .= ' banners-big--low';
		}
	}
	if($arParams['NARROW_BANNER']) {
		$bannerClasses .= ' banners-big--narrow';
	}
	if($sliderItems > 1) {
		$bannerClasses .= ' banners-big--multi-slide';
	}
	if(!$arParams['NO_OFFSET_BANNER']) {
		$bannerClasses .= ' banners-big--paddings-32';
	}
	if($arResult['HAS_CHILD_BANNERS']) {
		$bannerClasses .= ' banners-big--side-banners';
	}
	if($sliderItems < 2) {
		$bannerClasses .= ' banners-big--adaptive-'.$bannerMobile;
	} else {
		$bannerClasses .= ' banners-big--adaptive-1';
	}
	if($arParams['IMG_POSITION'] == 'SQUARE') {
		$bannerClasses .= ' banners-big--img-square';
	}

	$carouselClasses = 'banners-big__depend-height';

	if (!$arParams['HEADER_OPACITY']) {
		$bannerClasses .= ' banners-no-header-opacity';
	} else {
		$carouselClasses .= ' banners-big__depend-padding';
	}

	if($arParams['ALL_WIDTH_BUTTONS']) {
		$carouselClasses .= ' owl-carousel--button-wide';
	} else {
		$carouselClasses .= ' owl-carousel--button-bottom-right';
	}
	if($arParams['HEADER_OPACITY']) {
		$carouselClasses .= ' owl-carousel--button-maxwidth-theme';
	}
	if(!$arParams['HEADER_OPACITY'] && !$arParams['NARROW_BANNER'] && $arParams['IMG_POSITION'] != 'SQUARE') {
		$carouselClasses .= ' owl-carousel--button-maxwidth-theme';
	}
	if($sliderItems > 1) {
		$carouselClasses .= ' owl-carousel--button-offset-32';
	}
	if($arResult['HAS_CHILD_BANNERS'] || $arParams['IMG_POSITION'] == 'SQUARE') {
		$carouselClasses .= ' owl-carousel--button-bottom-right-32-1200';
	}
	$carouselClasses .= ' owl-carousel--light';

	$bShowH1 = false;
	?>
	<div class="banners-big front<?=($bHideOnNarrow ? ' hidden_narrow' : '')?> <?=$bannerClasses?>">
		<div class="maxwidth-banner <?=$arParams['NARROW_BANNER'] ? 'maxwidth-theme' : ''?>">
			<div class="banners-big__wrapper">
				<div class="owl-carousel <?=$carouselClasses?>" data-plugin-options='{"startPosition": <?=$currentBannerIndex?>, "nav": true, "loop": <?=($bAnimation && !$bOneSlide ? 'true' : 'false')?>, "items": <?=$sliderItems?> <?=($animationType ? ', "animation": "'.$animationType.'"' : '')?> <?=($slideshowSpeed >= 0 ? ', "autoplay": true, "autoplayHoverPause": true, "autoplayTimeout": '.$slideshowSpeed : '')?> <?=($animationSpeed >= 0 ? ', "smartSpeed": '.$animationSpeed : '')?> <?=$sliderItems > 1 ? ', "autoWidth": true' : ''?> <?=($arResult['HAS_CHILD_BANNERS'] ? ', "margin": 1' : '')?>}' >
					<?foreach($arResult['ITEMS']['TOP']['ITEMS'] as $i => $arItem):?>
						<div class="banners-big__item-wrapper">
							<?
							$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_EDIT'));
							$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_DELETE'), array('CONFIRM' => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
							$bHasUrl = boolval(strlen($arItem["PROPERTIES"]["LINKIMG"]["VALUE"]));
							$target = $arItem["PROPERTIES"]["TARGETS"]["VALUE_XML_ID"];

							$imageBgSrc = $this->GetFolder().'/images/background.jpg';

							if (is_array($arItem['DETAIL_PICTURE'])) {
								$imageBgSrc = $arItem['DETAIL_PICTURE']['SRC'];
							}
							if (!$bHighBanner && $arItem['PROPERTIES']['NORMAL_BG_IMAGE']['VALUE']) {
								$imageBgSrc = CFile::GetPath($arItem['PROPERTIES']['NORMAL_BG_IMAGE']['VALUE']);
							}
							if ($bLowBanner && $arItem['PROPERTIES']['LOW_BG_IMAGE']['VALUE']) {
								$imageBgSrc = CFile::GetPath($arItem['PROPERTIES']['LOW_BG_IMAGE']['VALUE']);
							}

							$type = $arItem['PROPERTIES']['BANNERTYPE']['VALUE_XML_ID'];
							$bOnlyImage = $type == 'T1' || !$type;
							$bLinkOnName = strlen($arItem['PROPERTIES']['LINKIMG']['VALUE']);
							$bOpacity = $arItem['PROPERTIES']['BANNER_OPACITY']['VALUE_XML_ID'] == 'Y';
							$bCenterText = $arItem['PROPERTIES']['TEXT_CENTER']['VALUE_XML_ID'] == 'Y';

							if($sliderItems < 2) {
								include('video.php');
							}

							$bannerColor = $arItem['PROPERTIES']['MAIN_COLOR']['VALUE'] ? $arItem['PROPERTIES']['MAIN_COLOR']['VALUE_XML_ID'] : '';

							$bannerItemClasses = '';
							if($bShowVideo) {
								$bannerItemClasses .= ' vvideo';
							}
							if($bannerColor) {
								if($arParams['IMG_POSITION'] == 'SQUARE') {
									$bannerItemClasses .= ' banners-big__item--'.$bannerColor.'-767';
									$bannerItemClasses .= ' banners-big__item--video-half';
								} else {
									$bannerItemClasses .= ' banners-big__item--'.$bannerColor;
								}
							}
							if($sliderItems > 1) {
								$bannerItemClasses .= ' banners-big__item--opacity-bottom';
								$bannerItemClasses .= ' banners-big__item--light';
							}else if($bOpacity) {
								if($arParams['IMG_POSITION'] == 'SQUARE'){
									$bannerItemClasses .= ' banners-big__item--opacity-767';
								}
								else{
									$bannerItemClasses .= ' banners-big__item--opacity';
								}
							}

							$bannerInnerClasses = '';
							if($arParams['INNER_PADDING_NARROW'] && $arParams['NARROW_BANNER']) {
								$bannerInnerClasses .= ' banners-big__inner--padding-left-narrow';
							}
							if($type == 'T3') {
								$bannerInnerClasses .= ' banners-big__inner--righttext';
							}
							if($arParams['IMG_POSITION'] == 'SQUARE') {
								$bannerInnerClasses .= 'banners-big__inner--paddings-24-767';
							}
							?>
							<?$needShowBG = $arParams['IMG_POSITION'] == 'SQUARE' && $bOnlyImage;?>
							<div class="box<?=($bHasUrl ? ' wurl' : '')?> banners-big__item  banners-big__depend-height <?=(!$arParams['HEADER_OPACITY'] ? '' : 'banners-big__depend-padding');?> <?=$bannerItemClasses?> <?=$bOnlyImage && $bShowVideo ? 'banners-big__item--img-with-video' : '';?>" id="<?=$this->GetEditAreaId($arItem['ID'])?>" <?=$bBgImage || $needShowBG ? 'style="background-image:url('.$imageBgSrc.') !important;"' : ''?> data-slide_index="<?=$i?>" <?=($bannerColor ? ' data-color="'.$bannerColor.'"' : '')?> <?=$videoInfoItem?>>
								<?if($bHasUrl):?>
									<span class="banner-after" style="background-image: url(<?=CFile::GetPath($arItem['PROPERTIES']['BANNER_AFTER']['VALUE']);?>)"></span>
									<a class="target" href="<?=$arItem["PROPERTIES"]["LINKIMG"]["VALUE"]?>" <?=(strlen($target) ? 'target="'.$target.'"' : '')?>></a>
								<?endif;?>
								<div class="<?=$arParams['NO_MAXWITH_THEME_WIDE'] ? '' : 'maxwidth-theme'?> pos-static <?=($bOnlyImage && $bLinkOnName ? ' fulla' : '')?> <?=($bVideoAutoStart ? 'loading' : '');?>">
									<div class="banners-big__inner <?=$bannerInnerClasses?>">
										<?$name = ($arItem['DETAIL_TEXT'] ? $arItem['DETAIL_TEXT'] : strip_tags($arItem["~NAME"], "<br><br/>"));?>
										<?ob_start();?>
										<?if(!$bOnlyImage):?>
											<?if($arItem['PROPERTIES']['TOP_TEXT']['VALUE']):?>
												<div class="banners-big__top-text <?=$bSmallPreview ? 'banners-big__top-text--small' : ''?>"><?=$arItem['PROPERTIES']['TOP_TEXT']['VALUE']?></div>
											<?endif;?>

											<?if($bLinkOnName):?>
												<a href="<?=$arItem['PROPERTIES']['LINKIMG']['VALUE']?>" class="banners-big__title-link">
											<?endif;?>

												<?if($arItem['PROPERTIES']['TITLE_H1']['VALUE_XML_ID'] == 'Y' && !$bShowH1):?>
													<h1 class="banners-big__title switcher-title <?=$titleSizeClass?>"><?=$name?></h1>
												<?else:?>
													<div class="banners-big__title switcher-title <?=$titleSizeClass?>"><?=$name?></div>
												<?endif;?>

											<?if($bLinkOnName):?>
												</a>
											<?endif;?>

											<div class="banners-big__text-wrapper <?=$bWideText && !$bCenterText ? 'banners-big__text-wrapper--row' : ''?>">
												<?if(strlen($arItem['PREVIEW_TEXT'])):?>
													<div class="banners-big__text-block <?=$bSmallPreview ? 'banners-big__text-block--small' : ''?> <?=$textClass?>">
														<?=$arItem['PREVIEW_TEXT']?>
													</div>
												<?endif;?>

												<?if($sliderItems < 2) {
													include('tizers.php');
												}?>
											</div>

											<?include('buttons.php');?>
										<?endif;?>
										<?$text = ob_get_clean();?>

										<?ob_start();?>
											<?
											$image = false;
											if( array_key_exists('SRC', $arItem['PREVIEW_PICTURE']) ) {
												$image = $arItem['PREVIEW_PICTURE'];
											}
											if(!$bHighBanner && $arItem['PROPERTIES']['NORMAL_BANNER_IMAGE']['VALUE']) {
												$image = CFile::GetFileArray($arItem['PROPERTIES']['NORMAL_BANNER_IMAGE']['VALUE']);
											}
											if($bLowBanner && $arItem['PROPERTIES']['LOW_BANNER_IMAGE']['VALUE']) {
												$image = CFile::GetFileArray($arItem['PROPERTIES']['LOW_BANNER_IMAGE']['VALUE']);
											}
											?>
											<?if($image):?>
												<?
												$arImage360 = CFile::ResizeImageGet($image['ID'], array('width' => 360, 'height' => 10000), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);
												$arImage720 = CFile::ResizeImageGet($image['ID'], array('width' => 720, 'height' => 10000), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);
												$arImage1080 = CFile::ResizeImageGet($image['ID'], array('width' => 1080, 'height' => 10000), BX_RESIZE_IMAGE_PROPORTIONAL_ALT);
												?>
												<?if($bLinkOnName):?>
													<a href="<?=$arItem['PROPERTIES']['LINKIMG']['VALUE']?>" class="image">
												<?endif;?>
														<?if($i == $currentBannerIndex):?>
															<link href="<?=$arImage360['src']?>" rel="preload" as="image" media="(max-width: 360px)">
															<link href="<?=$arImage720['src']?>" rel="preload" as="image" media="(min-width: 361px) and (max-width: 720px)">
															<link href="<?=$arImage1080['src']?>" rel="preload" as="image" media="(min-width: 721px) and (max-width: 1080px)">
															<link href="<?=$image['SRC']?>" rel="preload" as="image" media="(min-width: 1081px)">
														<?endif;?>

														<img class="plaxy banners-big__img <?=$arParams['IMG_POSITION'] == 'SQUARE' ? 'banners-big__img--center' : ''?>"  src="<?=$image['SRC']?>" srcset="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" data-srcset="<?=$arImage360['src'].' 360w,'.$arImage720['src'].' 720w,'.$arImage1080['src'].' 1080w'?>" alt="<?=($image['ALT'] ? $image['ALT'] : $arItem['NAME'])?>" title="<?=($image['TITLE'] ? $image['TITLE'] : $arItem['NAME'])?>" />

												<?if($bLinkOnName):?>
													</a>
												<?endif;?>

											<?endif;?>
										<?$img = ob_get_clean();?>

										<?if(!$bOnlyImage):?>
											<div class="banners-big__text <?=$bWideText ? 'banners-big__text--wide' : ''?> <?=$bCenterText ? 'banners-big__text--center' : ''?> <?=$sliderItems > 1 ? 'banners-big__text--bottom' : 'banners-big__depend-height'?> <?=$arParams['TEXT_PADDING_RIGHT'] ? 'banners-big__text--padding-right' : ''?> <?=$arParams['TEXT_PADDING_LEFT_WIDE'] && !$arParams['NARROW_BANNER'] ? ' banners-big__text--padding-left-wide' : ''?> <?=$arParams['TEXT_PADDING_LEFT_NARROW'] && $arParams['NARROW_BANNER'] ? ' banners-big__text--padding-left-narrow' : ''?>">
												<?=$text?>
											</div>
											<?if($image || $arParams['IMG_POSITION'] == 'SQUARE'):?>
												<?if($i == $currentBannerIndex):?>
													<link href="<?=$imageBgSrc?>" rel="preload" as="image">
												<?endif;?>

												<div class="banners-big__img-wrapper banners-big__depend-height <?=$bWideText ? 'banners-big__img-wrapper--back-right' : ''?> <?=$sliderItems > 1 ? 'banners-big__img-wrapper--back-center' : ''?> <?=$arParams['IMG_POSITION'] == 'SQUARE' ? 'banners-big__img-wrapper--square' : ''?>" <?=$arParams['IMG_POSITION'] == 'SQUARE' ? 'style="background-image: url('.$imageBgSrc.');"' : ''?>>
													<?=$image ? $img : ''?>
												</div>
											<?endif;?>
										<?elseif($bOnlyImage && $bLinkOnName):?>
											<a href="<?=$arItem['PROPERTIES']['LINKIMG']['VALUE']?>"></a>
										<?elseif($bOnlyImage):?>
											<?if($bShowVideo):?>
												<div class="video_block only_img--video ">
													<span class="play btn-video bg-theme-after <?=($bVideoAutoStart ? 'loading' : '');?> <?=$buttonVideoClass;?>" title="<?=$buttonVideoText?>"></span>
												</div>
											<?endif;?>
										<?endif;?>
										<div class="banner-bottom">
											<?=$arItem['PROPERTIES']['FULL_NAME']['VALUE'];?>
										</div>
									</div>
								</div>
							</div>

							<?if($sliderItems < 2):?>
								<?if($bannerMobile == 2):?>
									<?if(strlen($text)):?>
										<div class="banners-big__adaptive-block">
											<?=$text?>
										</div>
									<?endif;?>
								<?elseif($bannerMobile == 3):?>
									<?$tabletImgSrc = ($arItem["PROPERTIES"]['TABLET_IMAGE']['VALUE'] ? CFile::GetPath($arItem["PROPERTIES"]['TABLET_IMAGE']['VALUE']) : $background);?>
											<?if($i == $currentBannerIndex):?>
												<link href="<?=$tabletImgSrc?>" rel="preload" as="image" media="(max-width: 767px)">
											<?endif;?>
										<div class="banners-big__adaptive-img" style="background-image:url(<?=$tabletImgSrc?>);"></div>
								<?endif;?>
							<?endif;?>

						</div>
					<?endforeach;?>
				</div>
				<?
				$dotsClasses = '';
				if($arParams['ALL_WIDTH_BUTTONS']) {
					$dotsClasses .= ' owl-carousel__dots--line';
				} else {
					$dotsClasses .= ' owl-carousel__dots--bottom-56';
					$dotsClasses .= ' owl-carousel__dots--right';
				}
				if($arParams['HEADER_OPACITY']) {
					$dotsClasses .= ' owl-carousel__dots--maxwidth-theme';
				}
				if(!$arParams['HEADER_OPACITY'] && !$arParams['NARROW_BANNER'] && $arParams['IMG_POSITION'] != 'SQUARE') {
					$dotsClasses .= ' owl-carousel__dots--maxwidth-theme';
				}
				if($sliderItems > 1) {
					$dotsClasses .= ' owl-carousel__dots--bottom-32';
					$dotsClasses .= ' owl-carousel__dots--center';
				} else if($slideshowSpeed >= 0) {
					$dotsClasses .= ' owl-carousel__dots--autoplay';
				}
				if($arResult['HAS_CHILD_BANNERS'] || $arParams['IMG_POSITION'] == 'SQUARE') {
					$dotsClasses .= ' owl-carousel__dots--right-bottom-32-1200';
				}
				\Aspro\Functions\CAsproAllcorp3::getDotsHTML(count($arResult['ITEMS']['TOP']['ITEMS']),  $dotsClasses, $slideshowSpeed);?>
			</div>

			<?if($arResult['HAS_CHILD_BANNERS']):?>
				<?include('float_banners.php');?>
			<?endif;?>
		</div>


	</div>
	<?if($bInitYoutubeJSApi):?>
		<script type="text/javascript">
		BX.ready(function(){
			var tag = document.createElement('script');
			tag.src = "https://www.youtube.com/iframe_api";
			var firstScriptTag = document.getElementsByTagName('script')[0];
			firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
		});
		</script>
	<?endif;?>
<?endif;?>