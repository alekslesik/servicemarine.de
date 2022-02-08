$(document).ready(function () {
  $(document).on("click", ".js-item-action", function () {
    const action = $(this).data("action");
    const _this = $(this);

    _this.blur();
    _this.toggleClass("active");
    _this.parent().toggleClass("active");

    if (typeof window[action + "Action"] === "function") {
      window[action + "Action"](_this);
    }
  });
});

function compareAction(item) {
  const id = item.data("id");
  $.ajax({
    url: arAsproOptions["SITE_DIR"] + "ajax/item.php",
    type: "POST",
    dataType: "json",
    data: $.extend(item.data("item"), { sessid: BX.bitrix_sessid(), action: item.data("action") }),
  })
    .done(function (data) {
      arAsproOptions["COMPARE_ITEMS"] = data.items;

      if (arAsproOptions["COMPARE_ITEMS"].length > 0) {
        $(".js-compare-block").addClass("icon-block-with-counter--count");
      } else {
        $(".js-compare-block").removeClass("icon-block-with-counter--count");
      }
      $(".js-compare-block .count").text(arAsproOptions["COMPARE_ITEMS"].length);

      if (BX.util.in_array(id, arAsproOptions["COMPARE_ITEMS"])) {
        $(".js-item-action[data-id=" + id + "]").addClass("active");
        $(".js-item-action[data-id=" + id + "]")
          .parent()
          .addClass("active");
        $(".js-item-action[data-id=" + id + "]").attr(
          "title",
          $(".js-item-action[data-id=" + id + "]").data("title_compared")
        );
      } else {
        $(".js-item-action[data-id=" + id + "]").removeClass("active");
        $(".js-item-action[data-id=" + id + "]")
          .parent()
          .removeClass("active");
        $(".js-item-action[data-id=" + id + "]").attr("title", $(".js-item-action[data-id=" + id + "]").data("title"));
      }

      var eventdata = { action: "loadCompare" };
      BX.onCustomEvent("onCompleteAction", [eventdata, arAsproOptions["COMPARE_ITEMS"]]);
    })
    .fail(function (res) {
      console.error(res);
    });
}
