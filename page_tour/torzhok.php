<?php
session_start();
require_once '../phpLogin/connect.php'; // Подключение к базе данных
require_once '../getDATA/getAncetaData.php';
require_once '../getDATA/getUserData.php';
require_once '../parts/formTour.php';
// Проверяем подключение к базе данных\

// Получаем данные пользователя для автозаполнения

?>

<!DOCTYPE html>
<html lang="ru">

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
    <meta name="description" content="Торжок: Императорский шаг — тур скандинавской ходьбы по пушкинским местам.">
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
    <title>Торжок: Императорский шаг</title>
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
                    <img class="tour__page__img" src="/img/act-tour/torzhok.jpg" alt="Торжок: Императорский шаг">
                    <div class="tour__page__titleBox">
                        <h1 class="tour__page__title">
                            SCANDI-ТУР «Торжок: Императорский шаг. Тур скандинавской ходьбы по пушкинским местам»
                        </h1>
                        <h2 class="tour__page__date">Даты: 12 – 14 декабря 2025 г.</h2>
                        <p class="tour__page__date">Маршрут: Торжок – усадьба «Грузины» – усадьба «Раёк»</p>
                    </div>

                </div>


            </div>
            <div class="tour__page__infoBlock">


                <p class="tour__page__desc">
                    <em>Путешествие для активных и любознательных: усадьбы Львова, монастыри и купеческая история.</em>
                    <br><br>
                    Отправляемся в сердце России, в древний Торжок — город, где каждый камень дышит историей. Этот тур
                    создан для тех, кто любит совмещать активный отдых с погружением в культуру. С палками для
                    скандинавской ходьбы мы пройдем по следам Николая Львова, Александра Пушкина и купцов Новоторов.
                    <br>
                    Нас ждут:<br><br>

                    - Оздоровительные прогулки с утренними зарядками на набережной Тверцы. <br>
                    - Знакомство с шедеврами церковной и усадебной архитектуры. <br>
                    - История от древнего кремля до легендарных пожарских котлет. <br>
                    - Парки и ансамбли усадеб «Грузины» и «Раёк». <br>

                </p>
                <hr>
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
                                День 1 (12 декабря). Вечерний переезд в Торжок
                            </h3>
                        </button>
                    </h2>
                    <div id="flush-collapse1" class="accordion-collapse collapse" aria-labelledby="flush-heading1"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">18:30 – Сбор группы и отправление от м. Ховрино на
                                    комфортабельном микроавтобусе.</li>
                                <li class="modal-active-item">Остановка для перекуса в дорожном кафе (за доп. плату).
                                </li>
                                <li class="modal-active-item">~22:30 – Прибытие в Торжок. Заселение в гостиницу «Оникс».
                                    Отдых.</li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse2" aria-expanded="false" aria-controls="flush-collapse2">
                            <h3>
                                День 2 (13 декабря). Архитектурный бриллиант Львова
                            </h3>
                        </button>
                    </h2>
                    <div id="flush-collapse2" class="accordion-collapse collapse" aria-labelledby="flush-heading2"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">8:00 – Зарядка с палками на набережной Тверцы.</li>
                                <li class="modal-active-item">9:00 – Завтрак в гостинице.</li>
                                <li class="modal-active-item">10:00 – Пешая экскурсия по Торжку: памятник Львову,
                                    часовня, магистрат, храмы Спасский и Входоиерусалимский (работы Львова), валы
                                    Кремля, смотровая площадка.</li>
                                <li class="modal-active-item">Посещение Борисоглебского монастыря, Тихвинской деревянной
                                    церкви, Путевого дворца.</li>
                                <li class="modal-active-item">14:00 – Обед в монастырской трапезной (за доп. плату).
                                </li>
                                <li class="modal-active-item">Переезд в усадьбу «Грузины»: каменный мост, система
                                    прудов, руины.</li>
                                <li class="modal-active-item">Возвращение в Торжок. По выбору: Музей золотного шитья или
                                    Музей А.С. Пушкина.</li>
                                <li class="modal-active-item">Вечер: прогулка по набережной, гостиница Пожарских. Ужин
                                    (за доп. плату).</li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse3" aria-expanded="false" aria-controls="flush-collapse3">
                            <h3>
                                День 3 (14 декабря). Усадебная гармония «Райка»
                            </h3>
                        </button>
                    </h2>
                    <div id="flush-collapse3" class="accordion-collapse collapse" aria-labelledby="flush-heading3"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">8:00 – Утренняя зарядка. Завтрак. Освобождение номеров.
                                </li>
                                <li class="modal-active-item">10:00 – Осмотр гостиницы Пожарских и посещение Музея
                                    фарфора.</li>
                                <li class="modal-active-item">Переезд в усадьбу «Раёк». Экскурсия по усадьбе и прогулка
                                    по парку (за доп. плату).</li>
                                <li class="modal-active-item">Обед в кафе по пути в Москву (за доп. плату). Трансфер в
                                    Москву.</li>
                                <li class="modal-active-item">~19:00 – Ориентировочное прибытие к м. Ховрино.</li>
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
                    <p class="tour__page__price">Стоимость: 32 700 рублей<br> Сложность: 1</p>
                    <p class="tour__page__priceIn">В стоимость входят:
                        Проезд на комфортабельном микроавтобусе, размещение в гостинице «Оникс» (2‑местные номера,
                        санузел в номере),
                        питание: 2 завтрака, сопровождение инструктора по скандинавской ходьбе, все экскурсии по
                        программе (кроме музеев, оплачиваемых дополнительно), радиогиды.
                    </p>
                    <p class="tour__page__priceOff">Оплачивается дополнительно:
                        одноместное размещение 4 090 р, питание (обеды, ужины), входные билеты в музеи и усадьбы,
                        экскурсия в усадьбе «Раёк», страховка путешественника.
                    </p>
                </div>

                <a class="tour__page__btn" href="#openModal">Записаться</a>

            </div>
        </div>
    </section>
    <section class="questions" id="questions">
        <div class="container">
            <h2 class="questions__title">Задать вопрос</h2>
            <form action="/php/qTour/qTorzhok.php" method="POST" class="questions__form">
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

    <?php formTour('Торжок'); ?>
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
    <!-- <script src="../modal/Burger.js"></script> -->



</body>

</html>