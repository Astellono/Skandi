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
                    <img class="tour__page__img" src="../img/act-tour/masl.jpeg" alt="Тобольск">
                    <div class="tour__page__titleBox">
                        <h1 class="tour__page__title">
                            Тур «Сибирская Масленица: Тобольск в ритме скандинавской ходьбы»
                        </h1>
                        <h2 class="tour__page__date">Даты: 19 – 23 февраля 2025г.</h2>
                    </div>

                </div>


            </div>
            <div class="tour__page__infoBlock">


                <p class="tour__page__desc">

                    Отправляйтесь навстречу сибирской зиме и самому яркому празднику! Этот тур создан для тех, кто любит
                    активный отдых, пешие прогулки и скандинавскую ходьбу. Вас ждут масленичные гуляния в сердце древней
                    столицы Сибири, уют заснеженных эко-троп, целебный отдых на термальных источниках и полное
                    погружение в атмосферу традиций с русской баней, народными мастер-классами и щедрыми застольями, с
                    традиционными зарядками и прогулками.
                    <br><br>
                    Этот тур идеально сочетает активность, культурное погружение и праздничное настроение! Мы погрузимся
                    в атмосферу настоящей сибирской Масленицы, совмещая активные прогулки с палками по живописным местам
                    Тобольска с культурными экскурсиями и традиционными развлечениями.

                </p>
                <hr>
                <div class="tour__page__bottom">

                    <div class="tour__page__gid">

                        <h2 class="tour__page__gid__title">Сопровождающие:</h2>
                        <ul class="tour__page__gid__list">
                            <li class="tour__page__gid__item">
                                <img class="tour__page__gid__img" src="../img/team/Lider.png" alt="Маргарита Волосюк">
                                <h3 class="tour__page__gid__title-member">Маргарита Волосюк</h3>
                                <p class="tour__page__gid__desc">Организатор, инструктор</p>
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
                            <h3>День 1 (19 февраля) - Сибирское гостеприимство</h3>
                        </button>
                    </h2>
                    <div id="flush-collapse1" class="accordion-collapse collapse" aria-labelledby="flush-heading1"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">12:00 Встреча в аэропорту Тобольска в русском стиле.</li>
                                <li class="modal-active-item">Размещение в парк-отеле «Абалак».</li>
                                <li class="modal-active-item">Обед.</li>
                                <li class="modal-active-item">Мастер-класс по квашению капусты с народными обрядами.
                                </li>
                                <li class="modal-active-item">Вечерняя баня с парением и сибирские вечёрки (народные
                                    игры и песни).</li>
                                <li class="modal-active-item">Ужин в трактире.</li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse2" aria-expanded="false" aria-controls="flush-collapse2">
                            <h3>День 2 (20 февраля) - Тобольский Кремль и история</h3>
                        </button>
                    </h2>
                    <div id="flush-collapse2" class="accordion-collapse collapse" aria-labelledby="flush-heading2"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">09:00 - 11:00 Завтрак.</li>
                                <li class="modal-active-item">11:00 - 13:30 Свободное время в Абалаке для
                                    самостоятельных прогулок.</li>
                                <li class="modal-active-item">14:00 Обед в историческом ресторане «Поварня» в Тобольском
                                    Кремле.</li>
                                <li class="modal-active-item">Обзорная экскурсия по величественному Тобольскому Кремлю.
                                </li>
                                <li class="modal-active-item">Посещение мемориального Музея Императора.</li>
                                <li class="modal-active-item">Прогулка по легендарному Прямскому взвозу и Базарной
                                    площади с купчихой.</li>
                                <li class="modal-active-item">18:30 Возвращение в Абалак.</li>
                                <li class="modal-active-item">21:00 Ужин в трактире.</li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse3" aria-expanded="false" aria-controls="flush-collapse3">
                            <h3>День 3 (21 февраля) - Монастырь, природа и термальные источники</h3>
                        </button>
                    </h2>
                    <div id="flush-collapse3" class="accordion-collapse collapse" aria-labelledby="flush-heading3"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">8:00 Завтрак.</li>
                                <li class="modal-active-item">Посещение Абалакского Свято-Знаменского монастыря.</li>
                                <li class="modal-active-item">Прогулка по эко-тропам для скандинавской ходьбы и
                                    дог-трекинга (идеально для любителей пеших маршрутов!).</li>
                                <li class="modal-active-item">Обед в колоритном трактире «Белая сова».</li>
                                <li class="modal-active-item">Поездка на термальные источники для релаксации и
                                    оздоровления.</li>
                                <li class="modal-active-item">Ужин в трактире.</li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading4">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse4" aria-expanded="false" aria-controls="flush-collapse4">
                            <h3>День 4 (22 февраля) - Широкая Масленица</h3>
                        </button>
                    </h2>
                    <div id="flush-collapse4" class="accordion-collapse collapse" aria-labelledby="flush-heading4"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">9:00 Завтрак.</li>
                                <li class="modal-active-item">Главное событие: программа «Широкая Масленица» с
                                    традиционными забавами, хороводами и угощениями.</li>
                                <li class="modal-active-item">Ужин.</li>
                                <li class="modal-active-item">Вечерний мастер-класс по рукоделию для творческого
                                    завершения дня.</li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading5">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse5" aria-expanded="false" aria-controls="flush-collapse5">
                            <h3>День 5 (23 февраля) - На прощание о Сибири</h3>
                        </button>
                    </h2>
                    <div id="flush-collapse5" class="accordion-collapse collapse" aria-labelledby="flush-heading5"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">8:00 Завтрак.</li>
                                <li class="modal-active-item">Свободное время для последних прогулок.</li>
                                <li class="modal-active-item">Обед.</li>
                                <li class="modal-active-item">Экскурсия в ботанический сад «Ермаково поле» и прогулка по
                                    Парку «Тобол».</li>
                                <li class="modal-active-item">18:00 Трансфер в аэропорт Тобольска.</li>
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
                    <p class="tour__page__price">Стоимость: 63 100 рублей (при двухместном размещении)<br>73 900 рублей
                        (при одноместном размещении)<br>Группа 10-12 человек</p>
                    <p class="tour__page__priceIn">В стоимость входят:
                        2-местное проживание в парк-отеле «Абалак» (Стрелецкие палаты), питание по программе (завтраки,
                        обеды, ужины), все трансферы и экскурсии по программе, входные билеты в музеи и на мероприятия,
                        услуги гида, мастер-классы.
                    </p>
                    <p class="tour__page__priceOff">Дополнительно оплачивается:
                        авиаперелет до Тобольска, доплата за 1-местное размещение 10810р, страховка путешественника.
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

    <?php formTour('Масленница'); ?>
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