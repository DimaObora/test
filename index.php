<?php
$phone_src = "88612018428";

// Приведем номер телефона к красивому формату
$phone_formatted = '+7(' . substr($phone_src, 1, 3) . ')' . substr($phone_src, 4, 3) . '-' . substr($phone_src, 7, 2) . '-' . substr($phone_src, 9, 2);
$phone_desktop = '<span class="g-phone__num">' . $phone_formatted . '</span>';
$phone_mobile = '<span class="g-phone__num"><a class="g-phone__link g-link" href="tel:' . $phone_src . '">' . $phone_formatted . '</a></span>';

// Итоговая переменная телефона, которую можно дальше юзать
$PHONE = '<span class="g-phone g-phone-pc">' . $phone_desktop . '</span><span class="g-phone g-phone-mobile">' . $phone_mobile . '</span>';
?><!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Тестовое задание</title>
    <meta name="description" content="Тестовое задание">
    <meta name="viewport" content="width=device-width">
    <script src="js/base.min.js"></script>
    <script>


        <?//=file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/js/loadfonts.min.js"), "\n\n";
        /*!!!!!!!!!!!!!!!!!!!!!!
        TODO: НУЖНО СОЗДАТЬ CSS ФАЙЛЫ СО ШРИФТАМИ КАК ОПИСАНО ЗДЕСЬ https://goo.gl/e1EF4c ok
        Раскомментировать функцию подключения шрифтов, задать Имя_набора_шрифтов_в_local_storage
        !!!!!!!!!!!!!!!!!!!!!!*/
        ?>
        loadFont("open_sansregular","/fonts-woff.css/open-sans_allfont.ru-webfont.css","/css/fonts-woff2.min.css");
        //loadFont("Имя_набора_шрифтов_в_local_storage", "/css/fonts-woff.min.css", "/css/fonts-woff2.min.css");
    </script>



    <link rel="apple-touch-icon" href="/apple-touch-icon.png">


    <link rel="stylesheet" href="fonts-woff.css/stylesheet.css">
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/jquery.arcticmodal.min.css">
    <link rel="stylesheet" href="css/slick.min.css">
    <link rel="stylesheet" href="css/slick-theme.css">
    <link rel="stylesheet" href="css/intop.slider.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/main_tabs.css">

    <?
    /* !!!!!!!!!!!!!!!!!!!!!!
        TODO: Проверить верстку в разных браузерах ok
     !!!!!!!!!!!!!!!!!!!!! */
    ?>
</head>
<body>
<div class="landing">
    <? // Блоки, которые загружаются в первую очередь ?>

    <? // MENU ?>
    <!--    <header class="landing__wrap landing__wrap-menu g-bg-the-wall-is-blue" role="banner">-->
    <!--        <div class="landing__line landing__line-menu">-->
    <!--            <div class="header g-clearfix">-->
    <!--                <div class="header__item header__item-menu">-->
    <!--                    <nav class="menu menu-opened" role="navigation">-->
    <!--                        <div class="menu__btn"></div>-->
    <!--                        <div class="menu__closer">-->
    <!--                            <div class="menu__closerIcon">&times;</div>-->
    <!--                        </div>-->
    <!--                        <div class="menu__content">-->
    <!--                            <ul class="menu__list">-->
    <!--                                <li class="menu__item menu__item-1" data-link="landing__wrap-first">Главная</li>-->
    <!--                                <li class="menu__item menu__item-2" data-link="landing__wrap-about">О комплексе</li>-->
    <!--                                <li class="menu__item menu__item-3" data-link="landing__wrap-plans">Планировки</li>-->
    <!--                                <li class="menu__item menu__item-4" data-link="landing__wrap-infra">Инфраструктура</li>-->
    <!--                                <li class="menu__item menu__item-5" data-link="landing__wrap-payment">Ипотека</li>-->
    <!--                                <li class="menu__item menu__item-6" data-link="landing__wrap-payment">Оплата</li>-->
    <!--                                <li class="menu__item menu__item-7" data-link="landing__wrap-map">Расположение</li>-->
    <!--                                <li class="menu__item menu__item-8" data-link="landing__wrap-contacts">Контакты</li>-->
    <!--                            </ul>-->
    <!--                        </div>-->
    <!--                    </nav>-->
    <!--                </div>-->
    <!--                <div class="header__item header__item-contacts">-->
    <!--                    <div class="header__phone">--><? //= $PHONE ?><!--</div>-->
    <!--                    <div class="header__name">ЖК «...»</div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </header>-->

    <?
    /* !!!!!!!!!!!!!!!!!!!!!!
        TODO: сдедать lazyLoad - добавить g-lazy к блокам с картинками, а блокам с фоновой картинкой прописывать эту картинку в отдельном классе g-bg... чтобы работал лейзилоад фоновых картинок
     !!!!!!!!!!!!!!!!!!!!! */
    ?>
    <main role="main">
        <? // FIRST ?>
        <div class="landing__wrap landing__wrap-first g-bgaquamarine g-p">
            <div class="landing__line landing__line-first g-pb50 g-pt50">
                <div class="first">
                    <?
                    /* !!!!!!!!!!!!!!!!!!!!!!
                            TODO: проверить все блоки на отсутствие одиночных кусков текста в конце (при разных размерах экрана в мобильной версии) - не забывать &nbsp; там, где нужно (например, вместо пробела между цифрами в цене), либо оборачивать блоки в <span class="g-wsnw"></span>
                         !!!!!!!!!!!!!!!!!!!!! */
                    ?>
                    <h1 class="first__h1 g-h1h2 g-white">Планировки по кол-ву комнат</h1>

                    <div class="container-flex">
                        <ul class="tabs__controls">
                            <li class="tabs__controls-item active" data-class="first">
                                <a href="#" class="tabs__controls-link">1-комнатные</a>
                            </li>
                            <li class="tabs__controls-item " data-class="second">
                                <a href="#" class="tabs__controls-link">2-комнатные</a>
                            </li>
                            <li class="tabs__controls-item " data-class="third">
                                <a href="#" class="tabs__controls-link">3-комнатные</a>
                            </li>

                        </ul>
                    </div>
                    <div class=" landing__wrap-slider">
                        <div class="landing__line landing__line-slider">
                            <div class="slider">
                                <div class="slider__itemWrap">
                                    <div class="slider__item">
                                        <div class="slider__item-img g-lazy">
                                            <img class="slider__item-img-width" src="img/hous-1rom-1.png" alt="">
                                        </div>
                                        <div class="slider__item_price g-price"><p>1 630 000р</p></div>
                                        <button class="slider__item__btn g-btn">
                                            <div class="slider__item__btn more_detailed-arrow">Подробнее</div>
                                        </button>
                                    </div>
                                </div>
                                <div class="slider__itemWrap">
                                    <div class="slider__item">
                                        <div class="slider__item-img g-lazy">
                                            <img class="slider__item-img-width" src="img/hous-1rom-2.png" alt="">
                                        </div>
                                        <div class="slider__item_price g-price"><p>1 740 000р</p></div>
                                        <button class="slider__item__btn g-btn">
                                            <div class="slider__item__btn more_detailed-arrow">Подробнее</div>
                                        </button>
                                    </div>
                                </div>
                                <div class="slider__itemWrap">
                                    <div class="slider__item">
                                        <div class="slider__item-img g-lazy">
                                            <img class="slider__item-img-width" src="img/hous-1rom-3.png" alt="">
                                        </div>
                                        <div class="slider__item_price g-price"><p>1 740 000р</p></div>
                                        <button class="slider__item__btn g-btn">
                                            <div class="slider__item__btn more_detailed-arrow">Подробнее</div>
                                        </button>
                                    </div>
                                </div>
                                <div class="slider__itemWrap">
                                    <div class="slider__item">
                                        <div class="slider__item-img g-lazy">
                                            <img class="slider__item-img-width" src="img/hous-1rom-2.png" alt="">
                                        </div>
                                        <div class="slider__item_price g-price"><p>1 740 000р</p></div>
                                        <button class="slider__item__btn g-btn">
                                            <div class="slider__item__btn more_detailed-arrow">Подробнее</div>
                                        </button>
                                    </div>
                                </div>
                                <div class="slider__itemWrap">
                                    <div class="slider__item">
                                        <div class="slider__item-img g-lazy">
                                            <img class="slider__item-img-width" src="img/hous-1rom-2.png" alt="">
                                        </div>
                                        <div class="slider__item_price g-price"><p>1 740 000р</p></div>
                                        <button class="slider__item__btn g-btn">
                                            <div class="slider__item__btn more_detailed-arrow">Подробнее</div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <? /*!!!!!!!!!!!!!!!!!!!!!!
//                        TODO: Для все кнопок g-recall заполнить data-from   ???
                        Указать название блока, в котором расположена кнопка
                        Также указать корректные data-h и data-btn
                     !!!!!!!!!!!!!!!!!!!!!*/ ?>

                </div>
            </div>

            <?
            /* !!!!!!!!!!!!!!!!!!!!!!
                TODO: назвать все landing__wrap, landing__line и сами блоки
             !!!!!!!!!!!!!!!!!!!!! */
            ?>
            <? // BLOCK1 ?>
            <div class="landing__wrap g-bgblue g-pb50 g-pt50">
                <div class="landing__line">

                    <h2 class="g-h1h2 g-white">Способ оплаты</h2>
                    <div class="mortgage__background-white">
                        <h2 class="mortgage__background-white-title">
                            Ипотека
                        </h2>
                        <p class="mortgage__background-white-text">Квартиры от официального застройщика в
                            Ростове-на-Дону или Аксае с возможностью ипотечного кредитования — это выгодно от 6%
                            годовых!
                            Мастер-Хаус предлагает своим клиентам специальные условия покупки квартир в новостройках в
                            Ростове-на-Дону и Аксае в рамках программ ипотечного кредитования от партнерских банков от
                            6% годовых!</p>
                        <button class="mortgage__background-white-btn btn-light-green g-mb10">
                            <img class="mortgage__background-white-btn-img" src="img/brn-light-green.png" alt="">
                        </button>
                        <button class="mortgage__background-white-btn btn-dark-green g-mb10">
                            Мне интересна ипотека
                        </button>
                        <a class="mortgage__background-white-link" href="#">Изменить</a>
                    </div>
                    <div class="container-flex">
                        <div class="mortgage__background_white_block">
                            <div class="mortgage__background_white_rassrochka-img disp-in-bl g-mr-20 g-lazy">
                                <img src="img/calculator.png" alt="">
                            </div>
                            <div class="mortgage__background_white_rassrochka-text disp-in-bl g-mb10">
                                <h3>Рассрочка</h3>
                                <p>Беспроцентная рассрочка <br>на весь период</p>
                            </div>
                            <button class="mortgage__background_white_btn g-btn">
                                <div class="mortgage__background_white_btn ">Выбрать рассорчку</div>
                            </button>
                        </div>

                        <div class="mortgage__background_white_block">
                            <div class="mortgage__background-white-mat-kap-img disp-in-bl g-mr-20 g-lazy">
                                <img src="img/mat.kap.png" alt="">
                            </div>
                            <div class="mortgage__background-white-mat-kap-box-text disp-in-bl">
                                <h3>Материнский <br> капетал</h3>
                            </div>
                            <button class="mortgage__background_white_btn g-btn">
                                <div class="mortgage__background_white_btn ">Выбрать макт. капитал</div>
                            </button>
                        </div>
                    </div>

                </div>
            </div>

            <? // BLOCK2 ?>
            <div class="landing__wrap g-bgparking g-pb80 g-pt80">
                <div class="landing__line ">

                    <h1 class="g-white g-h1h2">О компании</h1>
                    <div class="container-flex">
                        <div class="about_us">
                            <div class="about-us__img g-lazy">
                                <img src="img/1.png" alt="">
                            </div>
                            <div class="about-as__text">
                                <p>3-х этажные кирпичные дома
                                    общее количество - 29 домов</p>
                            </div>
                        </div>
                        <div class="about_us">
                            <div class="about-us__img g-lazy">
                                <img src="img/2.png" alt="">
                            </div>
                            <div class="about-as__text">
                                <p>Уже сдано и продано 11 домов</p>
                            </div>
                        </div>
                        <div class="about_us">
                            <div class="about-us__img g-lazy">
                                <img src="img/3.png" alt="">
                            </div>
                            <div class="about-as__text">
                                <p>Ближайшая сдача
                                    3 квартал 2018 г.</p>
                            </div>
                        </div>
                        <div class="about_us">
                            <div class="about-us__img g-lazy">
                                <img src="img/4.png" alt="">
                            </div>
                            <div class="about-as__text">
                                <p>Застройщик на рынке с 2009 года.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <? // BLOCK3 ?>
            <div class="landing__wrap landing__wrap-contacts g-bg-the-wall-is-blue g-white g-lazy g-pb80 g-pt80"
                 data-lazy="g-bgRender">
                <div class="landing__line">
                    <h1 class="g-h1h2">Отделка на ваш выбор</h1>
                    <div class="container-flex">
                        <div class="finish">
                            <div class="finish__img g-lazy">
                                <img src="img/draft.png" alt="">
                            </div>
                            <div class="finish__text ">
                                <p><span class="g-price">0</span> руб/м<sup>
                                        <small>2</small>
                                    </sup><br>Без отделки
                                </p>
                            </div>
                        </div>
                        <div class="finish">
                            <div class="finish__img g-lazy">
                                <img src="img/otd1.png" alt="">
                            </div>
                            <div class="finish__text">
                                <p><span class="g-price">5 500</span> руб/м<sup>
                                        <small>2</small>
                                    </sup><br>Черновая отделка
                                </p>
                            </div>
                        </div>
                        <div class="finish">
                            <div class="finish__img g-lazy">
                                <img src="img/otd2.png" alt="">
                            </div>
                            <div class="finish__text">
                                <p><span class="g-price">10 000</span> руб/м <sup>
                                        <small>2</small>
                                    </sup><br>Отделка под ключ
                                </p>
                            </div>
                        </div>
                        <div class="finish__sign-up">
                            <p>Запишитесь на экскурсию на объект и посмотрите как выглядит каждый вариант отделки</p>
                        </div>
                        <button class="mortgage__background_white_btn g-btn_bac-whi g-mt30">
                            <div class="mortgage__background_white_btn ">Записаться на экскурсию</div>
                        </button>

                    </div>
                </div>
            </div>
    </main>

    <? // INTOP ?>
    <footer class="landing__wrap g-bg-the-wall-is-blue">
        <div class="landing__line g-mt30 g-mb30">
            <div class="intop">
                <a href="https://intopweb.ru/" target="_blank" class="intop__link"
                   style="color: #222; text-decoration: none;">
                    Сайт разработан <img height="40" width="130"
                                         src="data:image/png;base64,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"
                                         alt="Разработка и продвижение сайта интернет-агентство InTop">
                </a>
            </div>
        </div>
    </footer>

    <? // Модальные окошки ?>
    <div class="intopModal__wrap">
        <? // Модальное окошко для кнопок обратного звонка ?>
        <div class="intopModal intopModal-request">
            <button class="intopModal__close arcticmodal-close"></button>
            <div class="intopModal__whiteContent">
                <div class="request request-modal">
                    <h3 class="request__h">Заказать обратный звонок</h3>
                    <div class="request__input g-input g-icon g-icon-name"><input
                                class="g-input__field request__field request__field-name" type="text"
                                placeholder="Ваше имя"></div>
                    <br/>
                    <div class="request__input g-input g-icon g-icon-phone"><input
                                class="g-input__field request__field request__field-phone" type="tel"
                                placeholder="Ваш телефон"></div>
                    <br/>
                    <div class="request__input g-input g-icon g-icon-mail"><input
                                class="g-input__field request__field request__field-email" type="email"
                                placeholder="Ваш email"></div>
                    <br/>
                    <div class="request__input g-input g-icon g-icon-comment"><textarea
                                class="g-input__field request__field request__field-comment" placeholder="Комментарий"
                                rows="4"></textarea></div>
                    <br/>
                    <table class="request__save">
                        <tr>
                            <td class="g-input-required"><input class="request__privacy " type="checkbox" checked/></td>
                            <td><span class="request__saveText">Принимаю <span class="request__agreement">соглашение об обработке персональных данных</span></span>
                            </td>
                        </tr>
                    </table>
                    <button class="g-btn request__submit">Заказать звонок</button>
                    <input class="request__from" type="hidden" value="">
                </div>
            </div>
        </div>

        <? // Модальное окошко для функции alert ?>
        <div class="intopModal alert-modal">
            <button class="intopModal__close arcticmodal-close"></button>
            <div class="intopModal__whiteContent">
                <div class="alert-html g-mb10 g-mt10"></div>
            </div>
        </div>
        <? // Модальное окошко для соглашения на обработку персональных данных ?>
        <div class="intopModal intopModal-privacy">
            <button class="intopModal__close arcticmodal-close"></button>
            <div class="intopModal__whiteContent">
                <div class="privacyAgreement">
                    <h2 class="privacyAgreement__h"><span class="g-upper">Согласие</span><br> посетителя сайта на
                        обработку персональных данных</h2>
                    <p> Настоящим свободно, своей волей и в своем интересе даю согласие <strong><em>название
                                компании</em></strong>, которое находится по адресу: <strong><em>адрес
                                компании</em></strong> (далее – Компания), на автоматизированную и неавтоматизированную
                        обработку моих персональных данных, в том числе с использованием интернет-сервисов Google
                        analytics, Яндекс.Метрика, LiveInternet, Рейтинг Mail.ru, Google Doubleclick в соответствии со
                        следующим перечнем:</p>
                    <ul>
                        <li>фамилия, имя;</li>
                        <li>источник захода на сайт <strong><em>сайт компании</em></strong> (далее – Сайт Компании) и
                            информация поискового или рекламного запроса;
                        </li>
                        <li>данные о пользовательском устройстве (среди которых разрешение, версия и другие атрибуты,
                            характеризующие пользовательское устройство);
                        </li>
                        <li>пользовательские клики, просмотры страниц, заполнения полей, показы и просмотры баннеров и
                            видео;
                        </li>
                        <li>данные, характеризующие аудиторные сегменты;</li>
                        <li>параметры сессии;</li>
                        <li>данные о времени посещения;</li>
                        <li>идентификатор пользователя, хранимый в cookie,</li>
                    </ul>
                    <p>для целей повышения осведомленности посетителей Сайта Компании о продуктах и услугах Компании,
                        предоставления релевантной рекламной информации и оптимизации рекламы.</p>
                    <p>Компания вправе осуществлять обработку моих персональных данных следующими способами: сбор,
                        запись, систематизация, накопление, хранение, обновление, изменение, использование, передача
                        (распространение, предоставление, доступ).</p>
                    <p>Настоящее согласие вступает в силу с момента моего перехода на Сайт Компании и действует в
                        течение сроков, установленных действующим законодательством РФ.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/vendor/jquery-3.2.1.min.js"></script>
<script src="js/vendor/jquery.arcticmodal.min.js"></script>
<script src="js/vendor/slick.min.js"></script>
<script src="js/vendor/jquery.scrollTo.min.js"></script>
<script src="js/vendor/jquery.intop.menu.min.js"></script>
<script src="js/vendor/jquery.intop.slider.min.js"></script>
<script src="js/main.min.js"></script>
<script src="js/vendor/modernizr-3.5.0.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main_tabs.js"></script>

</body>
</html>

