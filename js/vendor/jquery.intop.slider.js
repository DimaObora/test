var effect = 0, sliderImages, slideRight, slideLeft, imgCount = 0, arrSrc = [], isHoveredRight = true;

function sliderInit(containerImg, arrSrcPre) {
    var container = containerImg;
    // Если параметр не задан, то все картинки находятся в одной группе
    if (containerImg == undefined) {
        containerImg = $("img");
    }

    // Если текущий элемент не является картинкой, то искать картинки внутри него
    if (!containerImg.is("img") && containerImg.attr("data-imgSrc") == undefined && containerImg.attr("data-imgSrcArr") == undefined) {
        containerImg = containerImg.find("img");
    }

    // Устанавливаем нужный курсор для выбранных картинок
    containerImg.css("cursor", "pointer");

    container.click(function () {
        var thisIndex = containerImg.index(this);
        if (thisIndex == -1) {
            thisIndex = 0;
        }

        // Получение и сортировка картинок
        if ((arrSrcPre != undefined) && (arrSrcPre != null) && (Object.prototype.toString.call(arrSrcPre) === "[object Array]")) {
            arrSrc = arrSrcPre;
        } else if (containerImg.attr("data-imgSrcArr") != undefined) {
            arrSrc = containerImg.attr("data-imgSrcArr").split(", ");
        } else {
            arrSrc = containerImg.map(function () {
                return ($(this).attr("data-imgSrc") != undefined) ? $(this).attr("data-imgSrc").split("m.").join(".") : $(this).attr("src").split("m.").join(".");
            }).get();
        }
        arrSrc = (arrSrc.slice(thisIndex)).concat(arrSrc.slice(0, thisIndex));
        imgCount = arrSrc.length;

        // Eсли в группе всего одна картинка, то прячем стрелки
        if (imgCount == 1) {
            slideLeft.hide();
            slideRight.hide()
        } else {
            slideLeft.show();
            slideRight.show()
        }

        // Предварительно очищаем контейнер со слайдами
        sliderImages.width("99999").html("");	// из-за этой ширины слайдер не центрируется в IE7

        // Добавляем нужное количество картинок в контейнер
        for (var i = 0; i < imgCount; i++) {
            $("<img>").addClass("intopModal__sliderImgLeft").appendTo(sliderImages);
        }

        // Подгрузка картинок
        var sliderImagesImg = sliderImages.find("img");
        sliderImagesImg.eq(0).attr("src", arrSrc[0]);
        sliderImagesImg.eq(1).attr("src", arrSrc[1]);
        sliderImagesImg.eq(-1).attr("src", arrSrc[imgCount - 1]);

        checkSize(sliderImagesImg.first());
        $(".intopModal-slider").arcticmodal(arcticmodal_settings);
    });
}

function checkSize(img) {
    var maxHeight = document.documentElement.clientHeight - 60, maxWidth = document.documentElement.clientWidth - 100;

    img.width("auto").height("auto");

    // Получаем размер картинки
    if (img.height() > 30) {
        var nWidth = img.width(), nHeight = img.height(), k = 0.0;

        if (nWidth > maxWidth) {
            k = maxWidth / nWidth;
            nWidth = parseInt(nWidth * k);
            nHeight = parseInt(nHeight * k);
        }
        if (nHeight > maxHeight) {
            k = maxHeight / nHeight;
            nWidth = parseInt(nWidth * k);
            nHeight = parseInt(nHeight * k);
        }

        img.width(nWidth).height(nHeight);
        $(".intopModal-slider").width(nWidth).height(nHeight);
    } else {
        setTimeout(function () {
            checkSize(img)
        }, 2);
    }
}

$(document).ready(function () {

    var myModal = '<div class="intopModal__wrap">' + '<div class="intopModal intopModal-slider">' + '<button class="intopModal__close arcticmodal-close"></button>' + '<div class="intopModal__sliderBox">' + '<div class="intopModal__sliderImages"></div>' + '</div>' + '<div class="intopModal__sliderBtnLeft"></div>' + '<div class="intopModal__sliderBtnRight"></div>' + '</div>' + '</div>';
    $(myModal).appendTo("body");

    // Значения глобальных переменных
    sliderImages = $(".intopModal__sliderImages");
    slideRight = $(".intopModal__sliderBtnRight");
    slideLeft = $(".intopModal__sliderBtnLeft");

    // Обновление размеров слайдера при изменении размера окна
    $(window).resize(function () {
        checkSize(sliderImages.find("img").first())
    });

    // Листание слайдов с клавиатуры - стрелочки, пробел
    document.onkeydown = function checkKeydown(event) {
        var keycode;
        if (!event) {
            var event = window.event;
        }
        if (event.keyCode) {
            keycode = event.keyCode;
        }// IE
        else if (event.which) {
            keycode = event.which;
        } // all browsers
        if (keycode == 39) {
            moveRight_0();
        } else if (keycode == 37) {
            moveLeft_0();
        } else if (keycode == 32) {
            moveRight_0();
        }
    }

    // Клик по стрелкам слайдера
    if (effect == 0) {
        slideRight.click(function () {
            moveRight_0();
        });
        slideLeft.click(function () {
            moveLeft_0();
        });
    }

    // Клик по картинке. Этот код избавляет нас от кнопки "увеличить".
    $(".intopModal__sliderImages").on("mousemove", (function (event) {
        if (isHoveredRight) {
            if (event.pageX < window.innerWidth / 2) {
                isHoveredRight = false;
                slideRight.removeClass("hovered");
                slideLeft.addClass("hovered");
            }
        } else {
            if (event.pageX > window.innerWidth / 2) {
                isHoveredRight = true;
                slideLeft.removeClass("hovered");
                slideRight.addClass("hovered");
            }
        }
    }))
        .on("mouseup", (function (event) {
            /* переключаем только по нажатию левой кнопки мыши */
            if (event.which === 1) {
                if (event.pageX > window.innerWidth / 2) {
                    moveRight_0();
                } else {
                    moveLeft_0();
                }
            }
        }));

    // Mobile swipe (сдвиг влево / вправо на мобильных)
    var dragStartX, dragDiff, dragGap = 10, touch;
    $(".intopModal-slider").on("touchstart", (function (event) {
        touch = event.originalEvent.touches[0] || event.originalEvent.changedTouches[0];
        dragStartX = touch.pageX;

    })).on("touchend", (function (event) {
        touch = event.originalEvent.touches[0] || event.originalEvent.changedTouches[0];
        dragDiff = dragStartX - touch.pageX;

        if (Math.abs(dragDiff) > dragGap) {
            if (dragDiff > 0) {
                moveRight_0();
            } else {
                moveLeft_0();
            }
        } else {

        }
    }));

});

function moveRight_0() {
    var img = sliderImages.find("img").first(), nextImg = img.next();

    // Подгружаем следующее изображение
    if (nextImg.attr("src") == undefined) {
        nextImg.attr("src", arrSrc[1]);
    }

    // Подгружаем еще парочку изображений
    if (nextImg.next().attr("src") == undefined) {
        nextImg.next().attr("src", arrSrc[2]);
    }
    if (nextImg.next().next().attr("src") == undefined) {
        nextImg.next().next().attr("src", arrSrc[3]);
    }

    checkSize(nextImg);
    img.appendTo(sliderImages);

    // Сортируем массив
    arrSrc.push(arrSrc.shift());
}

function moveLeft_0() {
    var img = sliderImages.find("img").first(), nextImg = sliderImages.find("img").last();

    // Подгружаем следующее изображение
    if (nextImg.attr("src") == undefined) {
        nextImg.attr("src", arrSrc[imgCount - 1]);
    }

    // Подгружаем еще парочку изображений
    if (nextImg.prev().attr("src") == undefined) {
        nextImg.prev().attr("src", arrSrc[imgCount - 2]);
    }
    if (nextImg.prev().prev().attr("src") == undefined) {
        nextImg.prev().prev().attr("src", arrSrc[imgCount - 3]);
    }

    checkSize(nextImg);
    nextImg.prependTo(sliderImages);

    // Сортируем массив
    arrSrc.unshift(arrSrc.pop());
}