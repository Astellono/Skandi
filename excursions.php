<?php
session_start();
require_once 'phpLogin/connect.php'; // Подключение к базе данных
require_once 'getDATA/getAncetaData.php';
require_once 'getDATA/getUserData.php';
require_once 'parts/formEx.php';

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
        content="Сканди-путешествия и экскурсии по Москве, Московской области, России и странам СНГ, зарубеж!">
    <link rel="stylesheet" href="style/clear.css">
    <link rel="stylesheet" href="style/bootstrap.css">
    <link rel="stylesheet" href="style/style.css?ver=<? echo time(); ?>">
    <link rel="stylesheet" href="style/style-adaptive.css?ver=<? echo time(); ?>">
    <link rel="icon" sizes="120x120" href="img/icon.svg" type="image/svg+xml">

    <script defer src="js/scroll.js"></script>
    <title>Сканди-экскурсии</title>
</head>

<body>
    <header class="header" id="header">

        <?php include 'parts/headerPHP.php'; ?>

    </header>

    <section class="excursions">
        <div class="container">
            <h1 class="excursions__title">Сканди-мероприятия</h1>
            <ul class="excursions__list">
                <!-- Карточка тура 1 -->




                <li class="excursions__item" onclick="expandCard(this)" id="kinoprogram">
                    <img style="object-position: 50% 50%;" class="excursions__img" src="img/excursion/kinoprogram.jpeg"
                        alt="SCANDI-прогулка «По следам кино: от Волжского бульвара до закулисья Кинозавода»">
                    <div class="excursions__info">

                        <h2 class="excursions__info__title">SCANDI-прогулка «По следам кино: от Волжского бульвара до
                            закулисья Кинозавода»</h2>
                        <hr>
                        <p class="excursions__info__date">25 октября 2025г<br><strong>НАЧАЛО: 08:45</strong></p>
                        <hr>
                        <p class="excursions__info__description">
                            Приглашаем всех любителей скандинавской ходьбы и кинематографа на уникальную комбинированную
                            прогулку!
                            Этот маршрут идеально сочетает активность на свежем воздухе и погружение в волшебный мир
                            кино.
                        </p>
                        <div class="excursions__details">
                            <p class="excursions__details__desc">
                                Программа прогулки:<br>
                                🔹 Сбор: 8:45 у выхода из метро Волжская.<br>
                                🔹 Начало: бодрящая разминка с палками в уютном парке Шкулева.<br>
                                🔹 Динамичная прогулка по живописному Волжскому бульвару (~6 км в комфортном темпе).<br>
                                🔹 Кофе-брейк: привал с горячим кофе, чтобы согреться и набраться сил.<br>
                                🔹 Экскурсия в 11:00: посещение Кинозавода «Метмаш» и самого большого киносклада России
                                — «Жар-Птица».<br>
                                🔹 Окончание программы: ~13:30.<br><br>

                                Что вас ждет на экскурсии?<br>
                                ✅ Настоящая сокровищница для кино и театра!<br>
                                ✅ Реквизит из любимых фильмов — от советской классики до самых кассовых новинок.<br>
                                ✅ Уникальные коллекции предметов быта, которые стали историей.<br>
                                ✅ Мастерские, где искусные реставраторы дают вещам вторую жизнь.<br>
                                ✅ Удивительные истории о том, как обычные вещи становятся звездами экрана.<br><br>

                                Особенности маршрута:<br>
                                ✅ Идеален для скандинавской ходьбы — удобные городские тропы.<br>
                                ✅ Уникальное сочетание активной прогулки и культурного погружения в мир кино.<br>
                                ✅ Несложный уровень — для разных уровней подготовки.<br><br>

                                Что взять с собой?<br>
                                ✔ Скандинавские палки (обязательно!)<br>
                                ✔ Удобную спортивную обувь и одежду по погоде<br>
                                ✔ Хорошее настроение и любопытство!<br><br>

                                Продолжительность: ~5 часов (пешая часть + экскурсия)<br>
                                Инструктор: Волосюк Маргарита
                            </p>

                            <hr>
                            <p class="excursions__price" style="margin: 0; text-align: left;"><strong>Стоимость:
                                    <br>2500р – при регистрации до 19 октября<br>
                                    3000р – при регистрации с 20 октября
                                </strong>
                                <br>В стоимость входит: работа инструктора и экскурсионная программа
                            </p>
                            <hr>

                            <br>

                            <a class="excursions__link" onclick="event.stopPropagation();"
                                data-name="Кинозавод">Записаться</a>
                        </div>
                    </div>
                </li>
                <li class="excursions__item" onclick="expandCard(this)" id="kino">
                    <img style="object-position: 50% 50%;" class="excursions__img" src="img/excursion/kino.jpg"
                        alt="Scandi-экскурсия «Энергия ходьбы и магия кино: музей-мастерская Л.М.Гурченко»">
                    <div class="excursions__info">

                        <h2 class="excursions__info__title">Scandi-экскурсия «Энергия ходьбы и магия кино:
                            музей-мастерская Л.М.Гурченко»</h2>
                        <hr>
                        <p class="excursions__info__date">29 ноября 2025г<br><strong>СБОР: 14:00</strong></p>
                        <hr>
                        <p class="excursions__info__description">
                            Приглашаем на особую прогулку со скандинавскими палками! Совместим фитнес, стиль и культуру
                            в самом сердце Москвы.
                        </p>
                        <div class="excursions__details">
                            <p class="excursions__details__desc">
                                Программа экскурсии:<br>
                                🔹 Сбор: 14:00 у кинотеатра «Художественный» (м. Арбатская).<br>
                                🔹 Прогулка по знаковым местам: Никитский бульвар, Малая Бронная, Патриаршие пруды.<br>
                                🔹 Фотосессия на маршруте.<br>
                                🔹 Кофе-брейк в легендарном кафе «Волконский» (оплачивается дополнительно).<br>
                                🔹 Экскурсия в музее-мастерской Л.М. Гурченко.<br>
                                🔹 Окончание программы: ~17:30.<br><br>

                                Экскурсия в музее Людмилы Гурченко:<br>
                                ✅ Погрузимся в мир великой актрисы<br>
                                ✅ Уникальная мемориальная мастерская<br>
                                ✅ Личные вещи и сценические костюмы легенды<br>
                                ✅ Интересные истории из жизни Людмилы Гурченко<br><br>

                                Особенности маршрута:<br>
                                ✅ Идеален для скандинавской ходьбы — удобные городские тропы<br>
                                ✅ Уникальное сочетание активной прогулки и культурного погружения<br>
                                ✅ Несложный уровень — для разных уровней подготовки<br><br>

                                Что взять с собой?<br>
                                ✔ Скандинавские палки (обязательно!)<br>
                                ✔ Удобную спортивную обувь и одежду по погоде<br>
                                ✔ Хорошее настроение и любопытство!<br><br>

                                Продолжительность: ~3.5 часа (пешая часть + экскурсия)<br>
                                Инструктор: Волосюк Маргарита<br>
                                Группа: 10-12 человек
                            </p>

                            <hr>
                            <p class="excursions__price" style="margin: 0; text-align: left;"><strong>Стоимость:
                                    <br>3000р – при регистрации до 23 ноября<br>
                                    3500р – при регистрации с 24 ноября
                                </strong>
                                <br>В стоимость входит: работа инструктора и экскурсионная программа
                            </p>
                            <hr>

                            <br>

                            <a class="excursions__link" onclick="event.stopPropagation();"
                                data-name="Гурченко">Записаться</a>
                        </div>
                    </div>
                </li>
            </ul>

        </div>
    </section>

    <section class="questions" id="questions">
        <script src="parts/questions.js?ver=<? echo time(); ?>"></script>
    </section>
    <section class="contacts" id="contacts">
        <script src="parts/contact.js?ver=<? echo time(); ?>"></script>
    </section>


    <!-- Модальные   ------------------------------------>
    <!-- <div onclick="location.href='#'" class="mod">
        <div onclick="event.stopPropagation()" class="modal-d">
            <div class="modal-c">
                <div class="modal-h">
                    <h3 class="modal-title">Запись на Сканди-мерориятие</h3>
                    <button class="modal-form-btn btn-auto" id="btnAuto">Автозаполнение</button>
                    <button title="Close" class="close">×</button>
                </div>
                <div class="modal-b">

                    <form action="" method="POST" id="exForm" class="modal__form">

                        Фамилия, имя и отчество:
                        <input required type="text" id="fio" name="fio" placeholder="Ваш ответ">
                        Дата рождения:
                        <input required type="text" id="age" name="age" placeholder="Дата рождения 31.12.2000">
                        Ваш телефон:
                        <input required type="tel" id="tel" name="tel" placeholder="Ваш ответ">
                        Ваш email:
                        <input required type="email" id="email" name="email" placeholder="Ваш ответ">
                        Коментарий, промокод (необязательное поле)
                        <input type="text" name="comment" placeholder="Ваш ответ">



                        <input type="submit" value="Отправить" id="btn" class="modal-form-btn">

                        <a href="#" class="btn btn-secondary form-btn close" title="Close">Закрыть</a>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
    <?php formEx(); ?>

    <footer class="footer"></footer>
    <script>
        <?php if ($_SESSION["user_id"] != '') { ?>
            let anceta = <?= json_encode($ancetaData); ?>[0];
            let fio = '<?= $user['user_name'] ?>';
            let email = '<?= $user['user_email'] ?>';
        <?php } ?>
    </script>
    <script src="js/anceta.js"></script>
    <!-- <script src="js/regEx.js?ver=<? echo time(); ?>"></script> -->
    <script defer src="parts/exForm.js?ver=<? echo time(); ?>"></script>
    <script defer src="js/ex.js?ver=<? echo time(); ?>"></script>
    <script src="modal/bootstrap.bundle.js"></script>

    <!-- <script src="modal/modal.js"></script> -->
    <script src="node_modules/jquery/dist/jquery.js"></script>



</body>

</html>