/* Please ❤ this if you like it! */

(function ($) {
    "use strict";

    $(function () {
        var header = $(".start-style");
        $(window).scroll(function () {
            var scroll = $(window).scrollTop();

            if (scroll >= 10) {
                header.removeClass("start-style").addClass("scroll-on");
            } else {
                header.removeClass("scroll-on").addClass("start-style");
            }
        });
    });

    //Animation

    $(document).ready(function () {
        $("body.hero-anime").removeClass("hero-anime");
        const theme = localStorage.getItem("theme");
        $("body").addClass(theme);
        $("#switch").addClass(theme ? "switched" : "");
    });

    //Menu On Hover

    $("body").on("mouseenter mouseleave", ".nav-item", function (e) {
        if ($(window).width() > 750) {
            var _d = $(e.target).closest(".nav-item");
            _d.addClass("show");
            setTimeout(function () {
                _d[_d.is(":hover") ? "addClass" : "removeClass"]("show");
            }, 1);
        }
    });

    //Switch light/dark

    $("#switch").on("click", function () {
        if ($("body").hasClass("dark")) {
            localStorage.setItem("theme", "");
            $("body").removeClass("dark");
            $("#switch").removeClass("switched");
        } else {
            localStorage.setItem("theme", "dark");
            $("body").addClass("dark");
            $("#switch").addClass("switched");
        }
    });
})(jQuery);
