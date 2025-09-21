<?php
session_start();
require_once '../phpLogin/connect.php'; // Подключение к базе данных
require_once '../getDATA/getAncetaData.php';
require_once '../getDATA/getUserData.php';
require_once '../parts/formTour.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (m, e, t, r, i, k, a) {
            m[i] = m[i] || function () { (m[i].a = m[i].a || []).push(arguments) };
            m[i].l = 1 * new Date(); k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
            (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(89691443, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/89691443" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description"
        content="Scandi-путешествия и экскурсии по Москве, Московской области, России и странам СНГ, зарубеж!">
    <link rel="icon" sizes="120x120" href="/img/icon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="/style/clear.css">
    <link rel="stylesheet" href="/style/bootstrap.css">
    <link rel="stylesheet" href="/style/style.css?ver=<? echo time(); ?>">
    <link rel="stylesheet" href="/style/style-adaptive.css?ver=<? echo time(); ?>">
    <script defer src="/js/scroll.js"></script>
  
    <!-- <script src="/js/reg.js" defer></script> -->
    <script src="/js/fotoslide.js" defer></script>
    <style>
        .lim {
            list-style-type: disc;
            margin-left: 20px;
            color: #60326B;
            margin-top: 10px;
        }
        
    </style>
    <title>Туры</title>
</head>

<body>
    <header class="header" id="header">
        <?php
        // Используем относительный путь вместо абсолютного
        include '../parts/headerPHP.php';
        ?>
    </header>


    <section class="tour">
        <div class="container">

            <div class="tour__page__header">

                <div class="tour__page__imgBox">
                    <img class="tour__page__img" src="/img/act-tour/osetia.jpg" alt="">
                    <div class="tour__page__titleBox">
                        <h1 class="tour__page__title">
                            SCANDI-ТУР «СОЛНЕЧНАЯ ОСЕТИЯ»
                        </h1>
                        <h2 class="tour__page__date">Даты: 20 ноября – 23 ноября 2025г.</h2>
                    </div>

                </div>


            </div>
            <div class="tour__page__infoBlock">


                <p class="tour__page__desc">
                    Северная Осетия – это край гор, древних крепостей и гостеприимных людей. Здесь вас ждут
                    захватывающие дух виды Кавказских гор, исторические памятники, вкусная национальная кухня и
                    уникальная культура. Идеальное место для любителей активного отдыха трекинга и знакомства с
                    историей.<br><br>
                    И снова мы отправляемся в Северную Осетию. Мы были здесь не единожды, но только не зимой. Зимний
                    вариант путешествия тоже прекрасен. Мы будем путешествовать по солнечным котловинам, где почти не
                    выпадают осадки. Сопровождать нас будет наш веселый и постоянный гид в Северной Осетии Роберт
                    Баскаев, а значит, шутки, юмор, осетинские стихи и танцы нам гарантированы. Проживание в арт-отеле
                    «Фиагдон», в уютных видовых однокомнатных домиках, гарантирует нам зарядки с красивыми видами,
                    плавание в бассейне, а вечерами, при желании, нас ждут сауна или хаммам. Это хорошая возможность
                    расслабиться после насыщенного дня.



                </p>
                <hr>
                <div class="tour__page__bottom">

                    <div class="tour__page__gid">

                        <h2 class="tour__page__gid__title">Сопровождающие:</h2>
                        <ul class="tour__page__gid__list">
                            <li class="tour__page__gid__item">
                                <img class="tour__page__gid__img" src="/img/team/Lider.png" alt="">
                                <h3 class="tour__page__gid__title-member">Маргарита Волосюк</h3>
                                <p class="tour__page__gid__desc">Инструктор</p>

                            </li>
                        </ul>


                    </div>
                    <div class="tour__page__rate">
                        <h2 class="tour__page__rateTitle">Сложность маршрута</h2>
                        <img src="/img/rate/3.svg" alt="" srcset="">

                    </div>
                </div>

            </div>
        </div>

    </section>
    <!-- <section class="tour__foto">
        <h2 class="tour__foto__title">Фото</h2>
        <hr>
        <div class="container container__foto">

            <div class="tour__foto__display">
                <div class="tour__foto__container">
                    <img id="foto" src="/img/act-tour/altay2/altay2_1.jpg" class="tour__foto__imgMain">
                </div>
            </div>
            <div class="tour__foto__block">
                <ul class="tour__foto__list">
                    <li class="tour__foto__item">
                        <img class="tour__foto__img" src="/img/act-tour/altay2/altay2_1.jpg" alt="" srcset="">
                    </li>
                    <li class="tour__foto__item">
                        <img class="tour__foto__img" src="/img/act-tour/altay2/altay2_2.jpg" alt="" srcset="">
                    </li>
                    <li class="tour__foto__item">
                        <img class="tour__foto__img" src="/img/act-tour/altay2/altay2_3.jpg" alt="" srcset="">
                    </li>


                </ul>
            </div>

        </div>
        <hr>
    </section> -->


    <section class="diary">
        <h2 class="diary-title">
            Расписание
        </h2>
        <div class="container">

            <ul class="modal-tour-list accordion accordion-flush" id="accordionFlushExample">

                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading1">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse1" aria-expanded="false" aria-controls="flush-collaps1">
                            <h3>
                                День 1 (20 ноября)
                            </h3>
                        </button>
                    </h2>
                    <div id="flush-collapse1" class="accordion-collapse collapse" aria-labelledby="flush-heading1"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Прилетаем во Владикавказ ориентировочно в 11:20. Встреча в
                                    аэропорту с гидом. Трансфер.
                                </li>
                                <li class="modal-active-item">Приветственный бранч в кафе с местной кухней (входит в
                                    стоимость).
                                </li>
                                <li class="modal-active-item">После обеда отправляемся на прогулку по солнечной
                                    котловине с видом на Главный Кавказский хребет, идем от скальной крепости в селе
                                    Дзивгис до аула Гули, затем спускаемся в поселок Фиагдон. </li>
                                <li class="modal-active-item">Заселение в арт-отель «Фиагдон».</li>
                                <li class="modal-active-item">Ужин в ресторане гостиницы (не входит в стоимость).
                                    Свободное время: настольные игры, бассейн, сауна и т.д.</li>

                            </ul>
                            <!-- <div class="modal-imgBlock">

                                <img class="minimized modal-img" src="/img/img-day/abhazia/day1/gagra.jpg" alt="">
                                <img class="minimized modal-img" src="/img/img-day/abhazia/day1/park.png" alt="">
                                <img class="minimized modal-img" src="/img/img-day/abhazia/day1/uchele.jpg" alt="">
                            </div> -->
                        </div>
                    </div>
                </li>

                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse2" aria-expanded="false" aria-controls="flush-collapse2">
                            <h3>
                                День 2 (21 ноября)
                            </h3>
                        </button>
                    </h2>
                    <div id="flush-collapse2" class="accordion-collapse collapse" aria-labelledby="flush-heading2"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Утренняя сканди-зарядка. Бассейн для желающих (входит в
                                    стоимость). Завтрак в гостинице (входит в стоимость)</li>
                                <li class="modal-active-item">В 10:30 выезд на трек. </li>
                                <li class="modal-active-item">Идем к лавочке счастья, расположенную на вершине одной из
                                    гор Архонского перевала. Сначала поднимемся к ретранслятору на высоте 2000 м. Оттуда
                                    часа полтора будем идти на панорамную точку, где нас ждёт лавочка с прекрасным видом
                                    на горы. Устроим фотосессию и полюбуемся видами. После чего спускаемся вниз.
                                    Трансфер на обед в ресторан, где будет заказан комплексный обед (входит в
                                    стоимость).
                                </li>
                                <li class="modal-active-item">После обеда посетим башенный комплекс Цмити - развалины
                                    старого средневекового горного селения в Куртатинском ущелье. </li>
                                <li class="modal-active-item">Возвращение в гостиницу. Ужин ресторане гостиницы (не
                                    входит в стоимость). Свободное время. Возможно совместные настольные игры, сауна и
                                    т.д.
                                </li>


                            </ul>
                            <!-- <div class="modal-imgBlock">

                                <img class="minimized modal-img" src="/img/img-day/abhazia/day2/Guarap.jpg" alt="">
                                <img class="minimized modal-img" src="/img/img-day/abhazia/day2/luga.png" alt="">
                                <img class="minimized modal-img" src="/img/img-day/abhazia/day2/luga2.jpg" alt="">
                            </div> -->
                        </div>
                    </div>
                </li>
                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse3" aria-expanded="false" aria-controls="flush-collapse3">
                            <h3>
                                День 3 (22 ноября)
                            </h3>
                        </button>
                    </h2>
                    <div id="flush-collapse3" class="accordion-collapse collapse" aria-labelledby="flush-heading3"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Утренняя сканди-зарядка. Бассейн для желающих (входит в
                                    стоимость). Завтрак в гостинице (входит в стоимость).</li>
                                <li class="modal-active-item">В 10:30 выезд на трек в сосновый лес близ села Бад. Длина
                                    маршрута около 8 км. Мы будем принимать лесные ванны, любуясь горными панорамами.
                                    Обед возьмём с собой (входит в стоимость).</li>
                                <li class="modal-active-item"> На обратном пути мастер-класс по приготовлению осетинских
                                    пирогов в ресторане «Хохаг».
                                </li>
                                <li class="modal-active-item">Возвращение в гостиницу. Ужин ресторане гостиницы (не
                                    входит в стоимость), если не наедимся осетинскими пирогами. Свободное время.</li>


                            </ul>
                            <!-- <div class="modal-imgBlock">

                                <img class="minimized modal-img" src="/img/img-day/abhazia/day2/Guarap.jpg" alt="">
                                <img class="minimized modal-img" src="/img/img-day/abhazia/day2/luga.png" alt="">
                                <img class="minimized modal-img" src="/img/img-day/abhazia/day2/luga2.jpg" alt="">
                            </div> -->
                        </div>
                    </div>
                </li>
                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading4">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse4" aria-expanded="false" aria-controls="flush-collapse4">
                            <h3>
                                День 4 (23 ноября)
                            </h3>
                        </button>
                    </h2>
                    <div id="flush-collapse4" class="accordion-collapse collapse" aria-labelledby="flush-heading4"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Утренняя сканди-зарядка. Бассейн для желающих (входит в
                                    стоимость). Завтрак в гостинице (входит в стоимость). </li>
                                <li class="modal-active-item">Ориентировочно в 10:30 выезд из гостиницы с вещами. В этот
                                    день нас ждет экскурсия по Владикавказу с возможным посещением музеев. Прогулка в
                                    городском дендрарии.</li>
                                <li class="modal-active-item">Обед в ресторане около дендрария (не входит в стоимость).
                                    Покупка сувениров и вкусностей.
                                </li>
                                <li class="modal-active-item">Трансфер в аэропорт. Вылет после 19:00.</li>


                            </ul>
                            <!-- <div class="modal-imgBlock">

                                <img class="minimized modal-img" src="/img/img-day/abhazia/day2/Guarap.jpg" alt="">
                                <img class="minimized modal-img" src="/img/img-day/abhazia/day2/luga.png" alt="">
                                <img class="minimized modal-img" src="/img/img-day/abhazia/day2/luga2.jpg" alt="">
                            </div> -->
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <section class="order">
        <div class="container order__container">
            <div class="order__contant">
                <div class="tour__page__pricePart">
                    <p class="tour__page__price">Стоимость: 73 800 руб </p>
                    <p class="tour__page__priceIn">В стоимость входит двухместное проживание в отдельных домиках в
                        арт-отеле «Фиагдон» (доплата за одноместное размещение 24750 р.), завтраки, обеды (кроме
                        последнего дня), услуги местного гида, трансфер по программе, услуги инструктора по
                        скандинавской ходьбе, мастер-класс по осетинским пирогам.

                    </p>
                    <p class="tour__page__priceOff">
                        В стоимость НЕ входит авиабилеты, доплата за одноместное проживание 24750 р., ужины, обед в
                        последний день, страховка путешественника.

                    </p>
                </div>








                <a class="tour__page__btn" href="#openModal">Записаться</a>
                
            </div>
        </div>
    </section>
    <section class="questions" id="questions">
        <div class="container">
            <h2 class="questions__title">Задать вопрос</h2>
            <form action="/php/qTour/qTver.php" method="POST" class="questions__form">
                <input type="text" name="name" placeholder="Ваше имя" required>
                <input type="tel" name="tel" placeholder="Телефон" required>
                <input type="text" name="email" placeholder="email" required>
                <input required type="text" class="questions__input-text" name="message" placeholder="Ваш вопрос?">
                <input type="submit" value="Отправить" class="questions__btn">
            </form>
        </div>
    </section>

    <section class="contacts" id="contacts">
        <script src="/parts/contact.js?ver=<?echo time();?>"></script>
    </section>

    <script src="../node_modules/jquery/dist/jquery.js"></script>

    <footer class="footer"></footer>

    <?php formTour('Осетия'); ?>
    <script>
        <?php if ($_SESSION["user_id"] != '') { ?>
            let anceta = <?= json_encode($ancetaData); ?>[0];
            let fio = '<?= $user['user_name'] ?>';
            let email = '<?= $user['user_email'] ?>';
        <?php } ?>
    </script>
    <script src="../js/anceta.js"></script>


    <script src="../modal/zoom.js"></script>
    <script src="../modal/bootstrap.bundle.js"></script>

</body>

</html>