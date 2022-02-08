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

    $('.cards-slider').owlCarousel({
        loop:true,
        nav: true,
        dots: true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            },
            1300: {
                items: 4
            }
        }
    });

    $('.control-list').owlCarousel({
        loop:true,
        nav: true,
        dots: true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            },
            1300: {
                items: 4
            }
        }
    });

});