/* ==================== ДОПОЛНИТЕЛЬНЫЕ ФУНКЦИИ
 ========================================================================== */
$.fn.padding = function (direction) {
    return parseFloat(this.css("padding-" + direction));
};

function windowHeight() {
    return parseFloat(window.innerHeight) || parseFloat($(window).height());
}

function windowWidth() {
    return parseFloat(window.innerWidth) || parseFloat($(window).width());
}

/* ==================== НАСТРОЙКИ ARCTICMODAL
 ========================================================================== */
function arcticModalMaxHG(modal) {
    var modalParent = $(modal).parent();
    var maxHg = windowHeight() - modalParent.padding("top") - modalParent.padding("bottom");
    $(modal).css("max-height", maxHg);
}

arcticmodal_settings["beforeOpen"] = function (data, el) {
    arcticModalMaxHG(el);
};

$(window).resize(function () {
    arcticModalMaxHG(".intopModal:visible");
});

/* ====== ДЕЙСТВИЕ НА КНОКУ ОТПРАВКИ ЗАЯВКИ
 ========================================================================== */
$("body").on("click", ".g-recall", function () {
    var reqModal = $(".intopModal-request"),
        reqFrom = reqModal.find(".request__from"),
        reqH = reqModal.find(".request__h"),
        reqSubmit = reqModal.find(".request__submit");

    reqModal.arcticmodal(arcticmodal_settings);
    reqFrom.val("");
    if ($.trim($(this).data("from")) != "") {
        reqFrom.val($(this).data("from"));
    } else {
        reqFrom.val("Кнопка: " + $(this).text());
    }
    var labelH = $(this).text();
    var labelSubmit = labelH;
    if ($.trim($(this).data("h")) != "") {
        labelH = $(this).data("h");
        labelSubmit = labelH;
    }
    if ($.trim($(this).data("btn")) != "") {
        labelSubmit = $(this).data("btn");
    }
    reqH.html(labelH);
    reqSubmit.html(labelSubmit);
});

/* ======== КНОПКА ОТПРАВЛЕНИЯ ПИСЬМА
 ========================================================================== */
$(".request__submit").on("click", function () {
    var form = $(this).parent(""),
        reqName = form.find(".request__field-name").val(),
        reqPhone = form.find(".request__field-phone").val(),
        reqEmail = form.find(".request__field-email").val(),
        reqComment = form.find(".request__field-comment").val(),
        reqFrom = form.find(".request__from").val();

    if (reqEmail) {
        reqEmail = reqEmail.replace(/\s/g, "");
    }

    if (form.find(".request__privacy").prop("checked")) {
        if ($.trim(reqName) && $.trim(reqPhone)) {
            alert("Здесь должна быть функция отправки заявки");
        } else {
            alert("Пожалуйста, укажите Ваше имя и номер телефона, чтобы мы смогли позвонить Вам!");
        }
    } else {
        alert("Пожалуйста, дайте согласие на обработку ваших персональных данных.");
    }
});

/* ========= КНОПКИ ОТПРАВКИ ЗАЯВКИ ПОЯВЛЯЮТСЯ ТОЛЬКО КОГДА НАЧНИАЮТ РАБОТАТЬ
 ========================================================================== */
$(".g-recall, .request__submit").css("visibility", "visible");

/* ======= ПЕРЕНАЗНАЧЕНИЕ СТАНДАРТНОЙ ФУНКЦИИ alert()
 ========================================================================== */
function alert(html) {
    $(".alert-html").html(html).closest(".alert-modal").arcticmodal();
}

/* ======== СОГЛАШЕНИЕ ОБ ОБРАБОТКЕ ПЕРСОНАЛЬНЫХ ДАННЫХ
 ========================================================================== */
$(".request__agreement").click(function () {
    $(".intopModal-privacy").arcticmodal(arcticmodal_settings);
});

/* ====== КЛИК ПО ОБЁРТКЕ ИНПУТА АКТИВИРУЕТ САМ ИНПУТ
 ========================================================================== */
$(".g-input").on("click", function () {
    $(this).find(".g-input__field").focus();
});

/* ====== ПРОДВИНУТЫЙ NO SELECT
 ========================================================================== */
$.fn.extend({
    disableSelection: function () {
        this.each(function () {
            this.onselectstart = function () {
                return false;
            };
            this.unselectable = "on";
        });
        return this;
    }
});

$(".g-noSelect, .g-btn").disableSelection();

/* ======= МЕНЮ
 ========================================================================== */
$(".menu__btn").on("click", menu_open);
$(".menu__closer, .menu__header").on("click", menu_close);
$(".menu__item").on("click", function () {
    if (is_mobile) {
        menu_close();
    }
    menu_scroll($(this)); // ПРОКРУТКА К БЛОКАМ
});

/* ======== УВЕЛИЧЕНИЕ КАРТИНОК
 ========================================================================== */
// 2 варианта подключения слайдера:
// Откроется только та картинка, по которой был клик
$(".g-zoomImgSingle").each(function () {
    sliderInit($(this));
});

// Откроются картинки с классом js-zoomImg в контейнере js-zoomImgGroup
// Таких контейнеров может быть много. Откроется только нужный.
$(".g-zoomImgGroup").each(function () {
    sliderInit($(this).find(".g-zoomImg"));
});

/* ========== ОТЛОЖЕННАЯ ЗАГРУЗКА КАРТИНОК
 ========================================================================== */
$(window).scroll(function () {
    var scrollTop = $(window).scrollTop();
    $(".g-lazy").each(function () {
        var $landingWrap = $(this).hasClass("landing__wrap") ? $(this) : $(this).parents(".landing__wrap");
        if (scrollTop >= ($landingWrap.offset().top - 1500)) {
            if ($(this).is("img")) {
                $(this).attr("src", $(this).data("lazy"));
            } else {
                $(this).addClass($(this).data("lazy"));
            }
            $(this).removeClass("g-lazy");
        }
    });
});

/* ========== СЛАЙДЕРЫ
 ========================================================================== */
$(".slider").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    infinite: false,
    dots: false,
    adaptiveHeight: false,
    responsive: [{
        breakpoint: 920,
        settings: {
            slidesToShow: 2
        }
    }, {
        breakpoint: 660,
        settings: {
            slidesToShow: 1
        }
    }]
});
