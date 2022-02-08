$(document).ready(function () {
    $(".phones__inner").hover(function (e) {
        var target = $(this)[0];
        var target2 = $(this).find('.phones__dropdown');
        var targetPosition = target.getBoundingClientRect().right,
          windowPosition = document.documentElement.clientWidth;
        if (targetPosition + (target2.width()/2) > windowPosition ) { 
            $(".header .phones__dropdown").addClass("position_block");
        }
        else {
            $(".header .phones__dropdown").removeClass("position_block");
        }
    });
});    