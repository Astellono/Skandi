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
    <link rel="stylesheet" href="../style/clear.css">
    <link rel="stylesheet" href="../style/bootstrap.css">
    <link rel="stylesheet" href="../style/style.css?ver=<? echo time(); ?>">
    <link rel="stylesheet" href="../style/style-adaptive.css?ver=<? echo time(); ?>">
    <script defer src="../js/scroll.js"></script>

    <!-- <script src="../js/reg.js" defer></script> -->
    <script src="../js/fotoslide.js" defer></script>
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
                    <img class="tour__page__img" src="../img/act-tour/dmit.jpeg" alt="Дмитров">
                    <div class="tour__page__titleBox">
                        <h1 class="tour__page__title">
                            Тур выходного дня «Дмитровский вояж: осенние прогулки с палками по древнему городу и
                            дворянским усадьбам»
                        </h1>
                        <h2 class="tour__page__date">Даты: 15 – 16 ноября 2025 года</h2>
                    </div>

                </div>


            </div>
            <div class="tour__page__infoBlock">


                <p class="tour__page__desc">

                    Приглашаем любителей скандинавской ходьбы и ценителей русской истории на активные осенние выходные в
                    подмосковный Дмитров! Нас ждут живописные прогулки с палками по древнему городу, насыщенная
                    экскурсионная программа по знаменитому кремлю и величественным монастырям, а также путешествие в
                    прошлое с посещением старинных дворянских усадеб. Всё это — в компании профессионального
                    гида-историка Василия Злотникова, в комфортном темпе, созданном специально для нашей группы.
                    Готовьте палки и хорошее настроение!

                </p>
                <hr>
                <div class="tour__page__bottom">

                    <div class="tour__page__gid">

                        <h2 class="tour__page__gid__title">Сопровождающие:</h2>
                        <ul class="tour__page__gid__list">
                            <li class="tour__page__gid__item">
                                <img class="tour__page__gid__img" src="../img/partner/zlot.png" alt="Василий Злотников">
                                <h3 class="tour__page__gid__title-member">Василий Злотников</h3>
                                <p class="tour__page__gid__desc">Гид</p>

                            </li>

                        </ul>


                    </div>
                    <div class="tour__page__rate">
                        <h2 class="tour__page__rateTitle">Сложность маршрута</h2>
                        <img src="../img/rate/1.svg" alt="" srcset="">

                    </div>
                </div>

            </div>
        </div>

    </section>

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
                                День 1 (15 ноября, суббота) - Дмитров: от воинской славы к купеческому величию
                            </h3>
                        </button>
                    </h2>
                    <div id="flush-collapse1" class="accordion-collapse collapse" aria-labelledby="flush-heading1"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">08:30 – Сбор и выезд из Москвы от м. Петровско-Разумовская
                                    на комфортабельном микроавтобусе.</li>
                                <li class="modal-active-item">~10:00 – Перемиловские высоты. Остановка на одной из
                                    ключевых точек Битвы за Москву. Осмотрим видовую площадку с панорамным видом на
                                    канал имени Москвы, памятник защитникам Москвы и посетим Вознесенский храм.</li>
                                <li class="modal-active-item">~11:30 – Прибытие в Дмитров. Начинаем знакомство с городом
                                    с его сердца – Дмитровского кремля. Обзорная экскурсия по земляным валам, осмотр
                                    величественного Успенского собора с уникальными изразцовыми рельефами. Кофе-пауза.
                                </li>
                                <li class="modal-active-item">~13:00 – Посещение музея «Дом художественных коллекций»
                                    (за дополнительную плату).</li>
                                <li class="modal-active-item">~14:00 – Обед в кафе «Помидоро» или «Мидийное место»
                                    (оплачивается отдельно).</li>
                                <li class="modal-active-item">~15:00 – Осмотр изящной Церкви Святой Троицы (Тихвинской)
                                    – великолепного образца классицизма.</li>
                                <li class="modal-active-item">~16:00 – Посещение Борисоглебского мужского монастыря,
                                    одного из древнейших в Подмосковье, с его мощными стенами и собором XVI века.</li>
                                <li class="modal-active-item">~17:00 – Внешний осмотр усадьбы Подлипечье, связанной с
                                    родом Голицыных.</li>
                                <li class="modal-active-item">~17:30 – Посещение Дома-музея П.А. Кропоткина (за
                                    дополнительную плату).</li>
                                <li class="modal-active-item">~18:30 – Завершим день осмотром Введенской церкви на
                                    окраине города.</li>
                                <li class="modal-active-item">~19:30 – Ужин в грузинском ресторане «Хинкальная Старый
                                    дукан» (оплачивается отдельно).</li>
                                <li class="modal-active-item">~21:00 – Размещение в гостинице «Кристалл».</li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse2" aria-expanded="false" aria-controls="flush-collapse2">
                            <h3>
                                День 2 (16 ноября, воскресенье) - Монастыри, купеческие села и дворянские гнезда
                            </h3>
                        </button>
                    </h2>
                    <div id="flush-collapse2" class="accordion-collapse collapse" aria-labelledby="flush-heading2"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">07:30 – Утренняя зарядка и бодрая прогулка с палками по
                                    историческому центру Дмитрова. Идеальное начало дня!</li>
                                <li class="modal-active-item">08:30 – Завтрак в гостинице (включен в стоимость).
                                    Освобождение номеров.</li>
                                <li class="modal-active-item">09:30 – Продолжаем экскурсию: осматриваем Сретенскую
                                    церковь и памятник строителям канала Москва-Волга.</li>
                                <li class="modal-active-item">10:00 – Знакомимся с уникальным Троицким храмом,
                                    построенным по проекту знаменитого архитектора Ивана Ропета в неорусском
                                    («ропетовском») стиле.</li>
                                <li class="modal-active-item">11:00 – Переезд к Николо-Пешношскому монастырю –
                                    «Северному Лавру», одному из самых впечатляющих монастырских ансамблей Подмосковья.
                                    Экскурсия по территории.</li>
                                <li class="modal-active-item">~13:00 – Переезд в старинное купеческое село Рогачёво.
                                    Осмотр грандиозного Никольского собора и прогулка по бывшей Торговой площади.
                                    Кофе-пауза в местном кафе.</li>
                                <li class="modal-active-item">~14:30 – Посещение усадьбы Ольгово – родового имения
                                    Апраксиных, великолепного образца классицизма с обширным парком.</li>
                                <li class="modal-active-item">~16:00 – Обед в кафе «Мои перепела» (оплачивается
                                    отдельно).</li>
                                <li class="modal-active-item">~17:00 – Посещение Спасо-Влахернского женского монастыря в
                                    селе Деденево.</li>
                                <li class="modal-active-item">~18:00 – Завершающий аккорд: по возможности, осмотр
                                    усадьбы Никольское-Обольяниново и села Подъячево.</li>
                                <li class="modal-active-item">~20:00 – Ориентировочное время возвращения к м.
                                    Петровско-Разумовская.</li>
                            </ul>
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
                    <p class="tour__page__price">Стоимость: 20 500 рублей <br> Группа 10-12 человек </p>
                    <p class="tour__page__priceIn">В стоимость входят:
                        проезд на комфортабельном микроавтобусе, все экскурсии по программе от гида Василия Злотникова,
                        проживание в гостинице «Кристалл» (2-местное размещение), завтрак в гостинице в воскресенье.
                    </p>
                    <p class="tour__page__priceOff">Дополнительно оплачивается:
                        одноместное размещение (доплата 1950 р), питание (обеды, ужины), входные билеты в музеи («Дом
                        художественных коллекций», Дом-музей П.А. Кропоткина), дополнительные личные расходы
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
        <script src="/parts/contact.js?ver=<? echo time(); ?>"></script>
    </section>


    <script src="../node_modules/jquery/dist/jquery.js"></script>

    <footer class="footer"></footer>

    <?php formTour('Дмитров'); ?>
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