<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true ) die();
$this->setFrameMode(true);
use \Bitrix\Main\Localization\Loc;
?>
<div class="cards-slider">
	<? foreach($arResult['ITEMS'] as $arItem) { ?>
		<div class="catalog-block__wrapper grid-list__item grid-list-border-outer  " data-hovered="false">
			<div class="catalog-block__item  bordered side-icons-hover bg-theme-parent-hover border-theme-parent-hover js-popup-block shadow-hovered shadow-hovered-f600 shadow-no-border-hovered rounded-4" id="bx_3966226736_742">
				<div class="catalog-block__inner flexbox height-100">
					<div class="js-config-img" data-img-config="{&quot;TYPE&quot;:&quot;catalog_block&quot;,&quot;ADDITIONAL_IMG_CLASS&quot;:&quot;js-replace-img&quot;,&quot;ADDITIONAL_WRAPPER_CLASS&quot;:&quot;&quot;}"></div>
					<div class="image-list ">
						<div class="image-list-wrapper js-image-block">
							<!-- <div class="side-icons js-replace-icons ">
								<div class="side-icons__item side-icons__item--fast-view bordered rounded-4">
									<a href="javascript:void(0)" rel="nofollow" data-event="jqm" title="" data-name="fast_view" data-param-form_id="fast_view" data-param-iblock_id="42" data-param-id="742" data-param-item_href="%2Fproduct%2Fvoda%2Flookout-pro-%2F">
										<i class="svg inline  svg-inline-side-search" aria-hidden="true"><svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
											<circle r="6" transform="matrix(1 0 0 -1 7 7)" stroke="#999999" stroke-width="2"></circle>
											<path d="M12 12L14 14" stroke="#999999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											<path d="M7 5V9M9 7H5" stroke="#999999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>
										</i>
									</a>
								</div>
							</div> -->
<!-- 							<div class="sticker sticker--upper">
								<div>
									<div class="sticker__item sticker_item--hit font_9">Хит</div>
								</div>
							</div>		 -->																				
							<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="image-list__link">
								<? if($arItem['PREVIEW_PICTURE']['SRC']) { ?>
									<img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="">
								<? } else { ?>
									<img class="img-responsive js-replace-img lazyloaded" src="/bitrix/templates/aspro-allcorp3/images/svg/noimage_product.svg" loading="lazy" data-src="/bitrix/templates/aspro-allcorp3/images/svg/noimage_product.svg" alt="LookOut Pro " title="<?=$arItem['NAME']?>">
								<? } ?>							
							</a>
						</div>
					</div>
					<div class="catalog-block__info flex-1 flexbox flexbox--justify-beetwen" data-id="742">
						<div class="catalog-block__info-top">
<!-- 							<div class="catalog-block__info-section color_999 font_12 linecamp-2">Вода</div> -->
							<div class="catalog-block__info-inner">
								<div class="catalog-block__info-title linecamp-4 height-auto-t600 font_16">
									<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="dark_link switcher-title js-popup-title">
										<span><?=$arItem['NAME']?></span>
									</a>
								</div>
								<div class="catalog-block__info-tech compact-hidden-t600">
									<div class="line-block line-block--20 flexbox--wrap js-popup-info">
										<div class="line-block__item font_13">
											<span class="status-icon instock js-replace-status" data-state="instock" data-code="instock" data-value="В наличии">В наличии</span>
										</div>
									</div>
								</div>
							</div>
							<div class="catalog-block__info-bottom">
								<div class="line-block line-block--20 flexbox--wrap flexbox--justify-beetwen ">
									<div class="line-block__item catalog-block__info-bottom--margined js-popup-price catalog-block__info-price">
									</div>
									<div class="line-block__item catalog-block__info-bottom--margined catalog-block__info-btn ">
										<div class="js-replace-btns js-config-btns" data-btn-config="{&quot;BASKET_URL&quot;:&quot;&quot;,&quot;BASKET&quot;:false,&quot;ORDER_BTN&quot;:true,&quot;BTN_CLASS_MORE&quot;:&quot;bg-theme-target border-theme-target&quot;,&quot;SHOW_COUNTER&quot;:false}">
											<span class="buy_block btn-actions__inner">
												<span class="buttons">
													<span class="btn btn-default btn-md btn-transparent-border bg-theme-target border-theme-target animate-load" data-event="jqm" data-param-id="6" data-autoload-product="LookOut Pro " data-autoload-service="LookOut Pro " data-autoload-project="LookOut Pro " data-autoload-news="LookOut Pro " data-autoload-sale="LookOut Pro " data-name="order_product_742">Заказать</span>
												</span>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
	<? } ?>
</div>