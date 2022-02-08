$(document).on("click", ".detail-info__tabs__item", function () {
  var $this = $(this);

  if (!$this.hasClass("current")) {
    var index = $this.index();
    $this.addClass("current").siblings().removeClass("current");

    var $price = $this
      .closest(".detail-info__tabs")
      .next(".detail-info__tabs-content")
      .find(".detail-info__tabs-content__item")
      .eq(index);
    $price.removeClass("hidden").siblings().addClass("hidden");

    var name = $this.data("name");
    var $popupBlock = $this.closest(".js-popup-block");

    var $data = $popupBlock.find("[data-item]");
    if ($data.length) {
      var data = $data.data("item");
      if (typeof data !== "undefined" && data) {
        data.NAME = name;
        data.PROPERTY_FILTER_PRICE_VALUE = $this.data("filter_price");
        data.PROPERTY_PRICE_VALUE = $this.data("price");
        data.PROPERTY_PRICEOLD_VALUE = $this.data("oldprice");
        $data.data("item", data);
      }
    }

    var $buttonForm = $popupBlock.find(".btn-actions__inner .btn[data-event=jqm]");
    if ($buttonForm.length) {
      $buttonForm.attr("data-autoload-need_product", name);
      $buttonForm.attr("data-autoload-product", name);
      $buttonForm.attr("data-autoload-service", name);
      $buttonForm.attr("data-autoload-project", name);
      $buttonForm.attr("data-autoload-news", name);
      $buttonForm.attr("data-autoload-sale", name);
      $buttonForm.clone().insertAfter($buttonForm);
      $buttonForm.remove();
    }
  }
});
$(document).ready(function(){
  //logo src
  var logoOpacity = $('body.header_opacity').length && (!$('header.header--offset').length || $('header .logo').closest('.header__top-part').length);
  var bLogoImg = $("body:not(.left_header_column) header .logo img").length && logoOpacity;
  var banner = $('.banners-big--detail .banners-big__item');
  //header color
  if (banner.length && typeof banner.data("color") != "undefined") {
      if (bLogoImg) {
          if (arAsproOptions.THEME.LOGO_IMAGE_WHITE && banner.data("color") == "light")
              $("header .logo img").attr("src", arAsproOptions.THEME.LOGO_IMAGE_WHITE);
      }
  }
});