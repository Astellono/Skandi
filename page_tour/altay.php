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
                    <img class="tour__page__img" src="/img/act-tour/altay.jpg" alt="Зимний Алтай">
                    <div class="tour__page__titleBox">
                        <h1 class="tour__page__title">
                            SCANDI-ТУР «Алтайская снежная сказка: скандинавская ходьба и приключения»
                        </h1>
                        <h2 class="tour__page__date">Даты: 2 января – 9 января 2025г.</h2>
                    </div>

                </div>


            </div>
            <div class="tour__page__infoBlock">


                <p class="tour__page__desc">
                    <br>
                    ❄️ 8 дней / 7 ночей зимнего приключения на Алтае
                    <br><br>
                    🌲 Уникальные природные достопримечательности тура:  
                    <ul class="lim">
                        <li>Телецкое озеро – "Младший брат Байкала" с кристально чистой водой и отвесными скалами, покрытыми снежными шапками</li>
                        <li>Гора Кукуя – смотровая площадка с панорамными видами на заснеженные хребты</li>
                        <li>Лебединое озеро – единственное в Сибири место, где зимуют лебеди-кликуны среди парящих источников</li>
                        <li>Чуйский тракт – легендарная дорога среди горных каньонов и ледяных водопадов</li>
                        <li>Плато Манжерок – царство пушистого снега и бескрайних горизонтов</li>
                    </ul>
                    <br>
                    Этот тур - идеальный баланс активности и отдыха с ежедневными прогулками 5-8 км. Вы услышите, как поёт снег под палками, и увидите Алтай таким, каким его знают лишь местные жители.
                </p>
                <hr>
                <div class="tour__page__bottom">

                    <div class="tour__page__gid">

                        <h2 class="tour__page__gid__title">Сопровождающие:</h2>
                        <ul class="tour__page__gid__list">
                            <li class="tour__page__gid__item">
                                <img class="tour__page__gid__img" src="/img/partner/mihail.png" alt="Михаил Механошин">
                                <h3 class="tour__page__gid__title-member">Михаил Механошин</h3>
                                <p class="tour__page__gid__desc">Гид</p>
                            </li>
                            <li class="tour__page__gid__item">
                                <img class="tour__page__gid__img" src="/img/team/Lider.png" alt="Маргарита Волосюк">
                                <h3 class="tour__page__gid__title-member">Маргарита Волосюк</h3>
                                <p class="tour__page__gid__desc">Организатор</p>
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
                                День 1 (2 января)
                            </h3>
                        </button>
                    </h2>
                    <div id="flush-collapse1" class="accordion-collapse collapse" aria-labelledby="flush-heading1"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Прилёт в Горно-Алтайск</li>
                                <li class="modal-active-item">Встреча в аэропорту (08:00–09:00) с гидом</li>
                                <li class="modal-active-item">Обзорная прогулка по городу (3 км):
                                    <ul>
                                        <li>Площадь Ленина с новогодней ёлкой</li>
                                        <li>Национальный музей им. Анохина (внешний осмотр)</li>
                                        <li>Смотровая площадка на реке Майма</li>
                                    </ul>
                                </li>
                                <li class="modal-active-item">Восхождение на священную гору Тугая (2 часа, перепад высот 150 м):
                                    <ul>
                                        <li>Лёгкий трекинг по утоптанной тропе</li>
                                        <li>Фотосессия с панорамой города и окрестных хребтов</li>
                                    </ul>
                                </li>
                                <li class="modal-active-item">Трансфер в село Черга (1 час)</li>
                                <li class="modal-active-item">Размещение в гостевом доме у гида</li>
                                <li class="modal-active-item">Знакомство с группой с алтайским чаем</li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse2" aria-expanded="false" aria-controls="flush-collapse2">
                            <h3>
                                День 2 (3 января)
                            </h3>
                        </button>
                    </h2>
                    <div id="flush-collapse2" class="accordion-collapse collapse" aria-labelledby="flush-heading2"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Переезд к Телецкому озеру через Каракольскую долину с остановкой у ледяных "бухт"</li>
                                <li class="modal-active-item">Сканди-маршрут: тропа "Каменный залив" (5 км) среди замёрзших водопадов</li>
                                <li class="modal-active-item">Ночь на турбазе с видом на озеро</li>
                            </ul>
                            <p><em>Природный феномен:</em> Зимой озеро не замерзает полностью – у берегов образуются причудливые ледяные гроты.</p>
                        </div>
                    </div>
                </li>
                
                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse3" aria-expanded="false" aria-controls="flush-collapse3">
                            <h3>
                                День 3 (4 января)
                            </h3>
                        </button>
                    </h2>
                    <div id="flush-collapse3" class="accordion-collapse collapse" aria-labelledby="flush-heading3"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Варианты активности:
                                    <ul>
                                        <li><strong>Снегоходы</strong> (доп. плата): подъём к подножью горы</li>
                                        <li><strong>Свободное время:</strong> отдых на базе или самостоятельная прогулка к водопаду Корбу</li>
                                    </ul>
                                </li>
                                <li class="modal-active-item">Общий трекинг: восхождение на Кукуя с палками (2 часа) – виды на "спящие" хребты</li>
                                <li class="modal-active-item">Ночуем на Телецком озере</li>
                            </ul>
                        </div>
                    </div>
                </li>
                
                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading4">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse4" aria-expanded="false" aria-controls="flush-collapse4">
                            <h3>
                                День 4 (5 января)
                            </h3>
                        </button>
                    </h2>
                    <div id="flush-collapse4" class="accordion-collapse collapse" aria-labelledby="flush-heading4"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Выезд в Советское – единственное место в Сибири, где лебеди остаются на зиму</li>
                                <li class="modal-active-item">Сканди-пикник у тёплых источников (термос с чаем + алтайский мёд)</li>
                                <li class="modal-active-item">Прогулка по заснеженной тайге с наблюдением за птицами</li>
                                <li class="modal-active-item">Возвращение в Чергу</li>
                            </ul>
                            <p><em>Факт:</em> Температура воды в озере зимой +4°C – здесь растут редкие водоросли, привлекающие лебедей.</p>
                        </div>
                    </div>
                </li>
                
                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading5">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse5" aria-expanded="false" aria-controls="flush-collapse5">
                            <h3>
                                День 5 (6 января)
                            </h3>
                        </button>
                    </h2>
                    <div id="flush-collapse5" class="accordion-collapse collapse" aria-labelledby="flush-heading5"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Утренний выезд на подготовленных УАЗах в горы Чергинского хребта</li>
                                <li class="modal-active-item">Экстремально-живописный маршрут: движение по заснеженным серпантинам с остановками у смотровых площадок</li>
                                <li class="modal-active-item">Трекинг с палками (3–4 км) по старому Чуйскому тракту</li>
                                <li class="modal-active-item">Пикник в горах: горячий чай из алтайских трав, бутерброды с копчёной олениной (включено)</li>
                                <li class="modal-active-item">Фотосессия на фоне заснеженных вершин и ледяных склонов</li>
                                <li class="modal-active-item">Возвращение в Чергу с остановкой у термального источника (по желанию – купание за доп. плату)</li>
                            </ul>
                            <p><strong>Важно! Безопасность:</strong></p>
                            <ul>
                                <li>Используем только полноприводные УАЗы с опытными водителями</li>
                                <li>Маршрут адаптирован под зимние условия</li>
                            </ul>
                        </div>
                    </div>
                </li>
                
                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading6">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse6" aria-expanded="false" aria-controls="flush-collapse6">
                            <h3>
                                День 6 (7 января)
                            </h3>
                        </button>
                    </h2>
                    <div id="flush-collapse6" class="accordion-collapse collapse" aria-labelledby="flush-heading6"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Экскурсия по Чуйскому тракту – дороге легенд</li>
                                <li class="modal-active-item">Остановки:
                                    <ul>
                                        <li>Ледяные скалы-великаны</li>
                                        <li>"Перевал Чике-Таман" – обзорная площадка на 360°</li>
                                    </ul>
                                </li>
                                <li class="modal-active-item">Финальный сканди-маршрут по долине реки Катунь (4 км)</li>
                            </ul>
                        </div>
                    </div>
                </li>
                
                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading7">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse7" aria-expanded="false" aria-controls="flush-collapse7">
                            <h3>
                                День 7 (8 января)
                            </h3>
                        </button>
                    </h2>
                    <div id="flush-collapse7" class="accordion-collapse collapse" aria-labelledby="flush-heading7"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Экскурсия на плато Манжерок – царство пушистого снега</li>
                                <li class="modal-active-item">Катание на ватрушках/лыжах/горных лыжах (не включено)</li>
                                <li class="modal-active-item">Подъём на подъёмнике к смотровой "Ангел мира"</li>
                                <li class="modal-active-item">Прощальный ужин (не включен)</li>
                            </ul>
                        </div>
                    </div>
                </li>
                
                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading8">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse8" aria-expanded="false" aria-controls="flush-collapse8">
                            <h3>
                                День 8 (9 января)
                            </h3>
                        </button>
                    </h2>
                    <div id="flush-collapse8" class="accordion-collapse collapse" aria-labelledby="flush-heading8"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Трансфер в аэропорт (06:00)</li>
                                <li class="modal-active-item">Возвращение домой</li>
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
                    <p class="tour__page__price">Стоимость: 109 700 рублей <br> Группа до 6 человек </p>
                    <p class="tour__page__priceIn">В стоимость входят:
                        трансфер по программе, 2-3-местное проживание в селе Черга и на Телецком озере, все экскурсии и сканди-тренировки, сопровождение гида, сопровождение инструктора по скандинавской ходьбе, питание (завтраки, пикники по программе).
                    </p>
                    <p class="tour__page__priceOff">В стоимость НЕ входят:
                        Авиабилеты (от 20 000 руб.), завтраки, обеды и ужины (≈3000 руб./день), снегоходы (по желанию), катание на лыжах, подъемник в Манжероке, страховка путешественника.

                    </p>
                    <strong class="tour__page__notice">ВНИМАНИЕ!! Программа может меняться по погодным условиям <br>
                    Рекомендация: Возьмите термобельё и трекинговые ботинки – в январе может быть температура до -25°C!</strong>
                </div>

                <a class="tour__page__btn" href="#openModal">Записаться</a>

            </div>
        </div>
    </section>
    <section class="questions" id="questions">
        <div class="container">
            <h2 class="questions__title">Задать вопрос</h2>
            <form action="/php/qTour/qAltayWinter.php" method="POST" class="questions__form">
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

    <?php formTour('Алтай'); ?>
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