$(document).ready(function () {
  $(document).on("mouseenter", ".header-menu__item--dropdown.header-menu__item--wide", function () {
    var _this = $(this);
    if (!_this.hasClass("scroll-inited")) {
      var menu = _this.find("> .header-menu__dropdown-menu");
      if (menu.length) {
        menu.mCustomScrollbar({
          mouseWheel: {
            scrollAmount: 150,
            preventDefault: true,
          },
        });
        _this.addClass("scroll-inited");
      }
    }
  });

  $(document).on("click", ".header-menu__wide-submenu-item-inner .toggle_block", function (e) {
    e.preventDefault();

    var _this = $(this),
      menu = _this.closest(".header-menu__wide-submenu-item-inner").find("> .submenu-wrapper");

    if (!_this.hasClass("clicked")) {
      _this.addClass("clicked");

      menu.slideToggle(150, function () {
        _this.removeClass("clicked");
      });

      _this.closest(".header-menu__wide-submenu-item-inner").toggleClass("opened");
    }
  });

  $(document).on("click", ".header-menu__wide-submenu-item--more_items", function (e) {
    e.stopImmediatePropagation();

    var _this = $(this);
    var bOpened = _this.hasClass("opened");
    var childSpan = _this.find("span");
    var childSvg = childSpan.find(".svg");
    var parent = _this.closest(".header-menu__wide-submenu");
    var collapsed = parent.find(".collapsed");
    var useDelimetr = parent.hasClass("header-menu__wide-submenu--delimiter");
    var lastSeparator = parent.find(".last-visible");

    if (collapsed.length) {
      if (useDelimetr) {
        collapsed.fadeToggle(200);
        if (lastSeparator.length) lastSeparator.fadeToggle(200);
      } else {
        collapsed.slideToggle(200);
      }

      if (bOpened) {
        childSpan.text(BX.message("SHOW")).append(childSvg);
      } else {
        childSpan.text(BX.message("HIDE")).append(childSvg);
      }
      _this.toggleClass("opened");
    }
  });
});
