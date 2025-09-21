<?php
session_start();
require_once '../phpLogin/connect.php'; // Подключение к базе данных
require_once '../getDATA/getAncetaData.php';
require_once '../getDATA/getUserData.php';
require_once '../parts/formTour.php';
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
    <meta name="description"
        content="Сканди-путешествия: Псков – Талабские острова – Изборск – Печоры. Скандинавская ходьба и прогулки.">
    <link rel="icon" sizes="120x120" href="/img/icon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="../style/clear.css">
    <link rel="stylesheet" href="../style/bootstrap.css">
    <link rel="stylesheet" href="../style/style.css?ver=<? echo time(); ?>">
    <link rel="stylesheet" href="../style/style-adaptive.css?ver=<? echo time(); ?>">
    <script defer src="../js/scroll.js"></script>

    <!-- <script src="../js/reg.js" defer></script> -->
    <script src="../js/fotoslide.js" defer></script>
    <style>
        .lim { list-style-type: disc; margin-left: 20px; color: #60326B; margin-top: 10px; }
        
    
    </style>
    <title>Псковское ожерелье</title>
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
                    <img class="tour__page__img" src="/img/act-tour/pskov.jpg" alt="Псковское ожерелье">
                    <div class="tour__page__titleBox">
                        <h1 class="tour__page__title">
                            SCANDI-ТУР «Псковское ожерелье: острова, крепости и монастыри»
                        </h1>
                        <h2 class="tour__page__date">Даты: 10 — 12 октября 2025 г.</h2>
                    </div>

                </div>


            </div>
            <div class="tour__page__infoBlock">


                <p class="tour__page__desc">
                    <em>Скандинавская ходьба и пешие экскурсии и прогулки по Пскову, Талабским островам и Печорам.</em>
                    <br><br>
                    Откройте для себя Северо-Запад России с новым дыханием! Этот трёхдневный тур создан специально для любителей
                    скандинавской ходьбы и пешеходного туризма. Мы совместим активность на свежем воздухе с погружением в
                    богатейшую историю Псковской земли. Вас ждут:<br><br>
                   
                        - Оздоровительные практики: утренние зарядки с палками на живописных набережных. <br>
                        - Пешие маршруты: древний Псков, заповедные Талабские острова и крепости Изборска. <br>
                        - Гастрономические впечатления: греческий вечер на сыроварне и монастырская трапеза. <br>
                        - Духовное наследие: Псково-Печерский монастырь и островные храмы. <br>
                    
                </p>
                <hr>
                <div class="tour__page__bottom">

                    <div class="tour__page__gid">

                        <h2 class="tour__page__gid__title">Сопровождающие:</h2>
                        <ul class="tour__page__gid__list">
                            <li class="tour__page__gid__item">
                                <img class="tour__page__gid__img" src="/img/team/Lider.png" alt="Маргарита Волосюк">
                                <h3 class="tour__page__gid__title-member">Маргарита Волосюк</h3>
                                <p class="tour__page__gid__desc">Инструктор</p>
                            </li>
                            <li class="tour__page__gid__item">
                                <img class="tour__page__gid__img" src="/img/partner/PskovEks.png" alt="Анна Холмова">
                                <h3 class="tour__page__gid__title-member">Анна Холмова</h3>
                                <p class="tour__page__gid__desc">Экскурсовод</p>
                            </li>
                        </ul>


                    </div>
                    <div class="tour__page__rate">
                        <h2 class="tour__page__rateTitle">Сложность маршрута</h2>
                        <img src="/img/rate/2.svg" alt="Сложность 2 из 5">

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
                                День 1 (10 октября). Знакомство с Псковом и Греческий вечер
                            </h3>
                        </button>
                    </h2>
                    <div id="flush-collapse1" class="accordion-collapse collapse" aria-labelledby="flush-heading1"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">~09:30 – Прибытие в Псков (поезд/самолет). Трансфер до отеля за доп. плату.</li>
                                <li class="modal-active-item">10:00 – Встреча с гидом в холле бутик-отеля «Псков». Начало экскурсии.</li>
                                <li class="modal-active-item">10:00 – 13:30 – Пешая прогулка: набережная Великой, Покровский комплекс, храмы-близнецы, Гремячая башня, Финский парк, Запсковье.</li>
                                <li class="modal-active-item">13:30 – 14:30 – Обед в кафе «Наше место» (включен).</li>
                                <li class="modal-active-item">15:00 – 16:00 – Палаты Постниковых. Программа «Изразцовый ковёр цветной» (экскурсия + роспись изразца).</li>
                                <li class="modal-active-item">16:30 – Возвращение в отель. Свободное время.</li>
                                <li class="modal-active-item">18:00 – 21:00 – «Греческий вечер» на сыроварне «Тремплене» (трансфер включен). Дегустация сыров, вина, ужин, программа.</li>
                                <li class="modal-active-item">21:30 – Возвращение в отель.</li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse2" aria-expanded="false" aria-controls="flush-collapse2">
                            <h3>
                                День 2 (11 октября). Заповедные Талабские острова
                            </h3>
                        </button>
                    </h2>
                    <div id="flush-collapse2" class="accordion-collapse collapse" aria-labelledby="flush-heading2"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">7:30 – Зарядка с элементами скандинавской ходьбы на набережной.</li>
                                <li class="modal-active-item">8:45 – Завтрак (включен).</li>
                                <li class="modal-active-item">9:50 – Выезд в деревню Толба.</li>
                                <li class="modal-active-item">10:30 – 15:00 – Катер на острова Верхний и Талабск. Прогулки по тропам, храмы, келья старца Николая (Гурьянова). Перекус в пекарне (за доп. плату).</li>
                                <li class="modal-active-item">16:00 – Возвращение в Псков.</li>
                                <li class="modal-active-item">16:00 – 18:00 – Псковский Кремль: Варлаамовская башня, Троицкий собор, Довмонтов город.</li>
                                <li class="modal-active-item">18:15 – Возвращение в отель. Окончание программы. Ужин в городе (за доп. плату).</li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse3" aria-expanded="false" aria-controls="flush-collapse3">
                            <h3>
                                День 3 (12 октября). Печоры и Изборск
                            </h3>
                        </button>
                    </h2>
                    <div id="flush-collapse3" class="accordion-collapse collapse" aria-labelledby="flush-heading3"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">7:30 – Утренняя зарядка на набережной.</li>
                                <li class="modal-active-item">8:30 – Завтрак. Освобождение номеров.</li>
                                <li class="modal-active-item">9:30 – Выезд в г. Печоры.</li>
                                <li class="modal-active-item">10:30 – 14:30 – Псково-Печерский монастырь: Успенский собор, крепость, святые пещеры (по согласованию). Свободное время для лавок.</li>
                                <li class="modal-active-item">14:30 – Обед в монастырском кафе (шведский стол, за доп. плату).</li>
                                <li class="modal-active-item">15:00 – 17:45 – Изборск: Труворово городище, Словенские ключи, внешние стены крепости XIV века.</li>
                                <li class="modal-active-item">18:30 – Прибытие в Псков. Трансфер на ж/д вокзал/аэропорт (вылет после 21:00).</li>
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
                    <p class="tour__page__price">Стоимость: 37 800 рублей<br> Группа: 10 – 12 человек</p>
                    <p class="tour__page__priceIn">В стоимость входят:
                        Проживание в бутик-отеле «Псков» (2 ночи, 2-местное), питание: 2 завтрака, 1 обед,
                        все экскурсии по программе с профессиональным гидом, входные билеты (Палаты Постниковых),
                        трансферы по программе (автобус+катер), «Греческий вечер», утренние оздоровительные занятия.
                    </p>
                    <p class="tour__page__priceOff">Дополнительно оплачивается:
                        авиа/жд билеты, трансфер в первый день от вокзала/аэропорта, питание не по программе (ужины, перекусы),
                        доплата за одноместное размещение 10 700 р, вход в пещеры (при согласовании), личные расходы, страховка путешественника.
                    </p>
                 
                </div>

                <a class="tour__page__btn" href="#openModal">Записаться</a>

            </div>
        </div>
    </section>
    <section class="questions" id="questions">
        <div class="container">
            <h2 class="questions__title">Задать вопрос</h2>
            <form action="/php/qTour/qPskov.php" method="POST" class="questions__form">
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

    <?php formTour('Псков'); ?>
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

