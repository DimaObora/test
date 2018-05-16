var $menu = $(".menu"),
    $menu_content = $menu.find(".menu__content"),
    $menu_closer = $menu.find(".menu__closer"),
    $global_wrap = $(".landing"),
    header_height = 70,
    first_offset = 0,
    is_mobile = window.innerWidth <= 1000 ? true : false;

$(window).resize(function () {
    if (window.innerWidth <= 1000)
        is_mobile = true;
    else {
        if (is_mobile) menu_close();
        is_mobile = false;
    }
});


function menu_open() {
    $menu.addClass("menu-opened");
    first_offset = $(".header").offset().top; // запоминаем смещение первого блока
    $global_wrap.addClass("landing-noScroll"); // убираем скролл
    $(".landing__wrap-first").css("margin-top", -first_offset - 1); // смещаем первый блок так, как он был до открытия меню

    $menu_content.fadeIn();
    $menu_closer.fadeIn();
}

function menu_close() {
    $menu.removeClass("menu-opened");
    $global_wrap.removeClass("landing-noScroll");
    $(".landing__wrap-first").css("margin-top", ""); // убираем смещение первого блока
    $(window).queue([]).scrollTo(first_offset); // скроллим сайт туда, где он был до открытия меню

    $menu_content.fadeOut();
    $menu_closer.fadeOut();
}

function menu_scroll($btn, speed) {
    if (speed === undefined) speed = 800;
    if ($btn.data("link") !== undefined) {
        $(window).queue([]).scrollTo("." + $btn.data("link"), 300, {
            offset: {top: -header_height}
        });
    }
}
