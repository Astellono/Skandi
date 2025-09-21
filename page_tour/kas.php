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
                    <img class="tour__page__img" src="../img/act-tour/kas.jpg" alt="Осенняя Мещера">
                    <div class="tour__page__titleBox">
                        <h1 class="tour__page__title">
                            SCANDI-ТУР «Осенняя Мещера: Скандинавские маршруты от Паустовского до Касимова»
                        </h1>
                        <h2 class="tour__page__date">Даты: 18 – 19 октября 2025г.</h2>
                    </div>

                </div>


            </div>
            <div class="tour__page__infoBlock">


                <p class="tour__page__desc">

                    Приглашаем вас на двухдневный тур выходного дня для любителей скандинавской ходьбы и живописной
                    природы! В середине октября, когда лес одевается в золото и багрянец, мы отправимся в самое сердце
                    Мещеры — национального парка, воспетого Константином Паустовским. Вас ждут увлекательные пешие
                    маршруты, знакомство с уникальным городом Касимов, где веками переплетаются русская и татарская
                    культуры, а также посещение старинных храмов, усадеб и современных музеев. Это идеальное сочетание
                    активного отдыха, культурного просвещения и гастрономических открытий.

                </p>
                <hr>
                <div class="tour__page__bottom">

                    <div class="tour__page__gid">

                        <h2 class="tour__page__gid__title">Сопровождающие:</h2>
                        <ul class="tour__page__gid__list">
                            <li class="tour__page__gid__item">
                                <img class="tour__page__gid__img" src="/img/otziv/zagl1.png" alt="Николай Литвинов">
                                <h3 class="tour__page__gid__title-member">Литвинов Николай</h3>
                                <p class="tour__page__gid__desc">Гид</p>
                            </li>
                            <li class="tour__page__gid__item">
                                <img class="tour__page__gid__img" src="/img/team/Lider.png" alt="Маргарита Волосюк">
                                <h3 class="tour__page__gid__title-member">Волосюк Маргарита</h3>
                                <p class="tour__page__gid__desc">Инструктор</p>
                            </li>
                        </ul>


                    </div>
                    <div class="tour__page__rate">
                        <h2 class="tour__page__rateTitle">Сложность маршрута</h2>
                        <img src="/img/rate/2.svg" alt="" srcset="">

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

                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <!-- День 1 -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="flush-heading1">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse1" aria-expanded="false" aria-controls="flush-collapse1">
                                <h3>День 1 (18 октября) – По тропам Паустовского и купеческая слава</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse1" class="accordion-collapse collapse" aria-labelledby="flush-heading1"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <h4>«Мещерские легенды и купеческое наследие»</h4>
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🚆 08.24 – Отправление на поезде с Казанского вокзала
                                    </li>
                                    <li class="modal-active-item">🏙 10:40 — Прибытие на железнодорожный вокзал Рязани.
                                        Встреча с гидом.</li>
                                    <li class="modal-active-item">🚐 11:00 — Выезд из Рязани на комфортабельном
                                        микроавтобусе. Начинаем наше путешествие.</li>
                                    <li class="modal-active-item">🌲 12:30 — Прибытие в посёлок Заводская Слобода.
                                        Начало активной части программы.</li>
                                    <li class="modal-active-item">🥾 12:30 – 14:30 — Пеший маршрут по Национальному
                                        парку «Мещера». Пройдем около 10 км по знаменитой Тропе Паустовского. Свежий
                                        осенний воздух, хрустящая под ногами листва, бескрайние лесные просторы — лучший
                                        способ зарядиться энергией и погрузиться в атмосферу мещерских легенд.
                                        Радиальный маршрут до кордона №273</li>
                                    <li class="modal-active-item">🍲 14:30 – 15:30 — Обед в живописном месте —
                                        парк-отеле «Паруса» (оплачивается дополнительно).</li>
                                    <li class="modal-active-item">⛪ 16:10 — Посещение посёлка Тума. Осмотр
                                        величественного Троицкого храма — уникального архитектурного памятника.</li>
                                    <li class="modal-active-item">🏰 17:00 — Остановка в Гусь-Железном. Здесь нас ждет
                                        знакомство с грандиозным Троицким собором в стиле псевдоготики и таинственными
                                        руинами усадьбы промышленников Баташевых, окутанной легендами.</li>
                                    <li class="modal-active-item">🏨 18:00 — Прибытие в Касимов. Заселение в гостиницу
                                        «Касимов» (размещение в одноместных номерах).</li>
                                    <li class="modal-active-item">🍽 19:00 — Ужин в колоритном ресторане «Касимовский
                                        дворик» или аналогичном (оплачивается дополнительно). Свободный вечер.</li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Особенности дня:</h5>
                                    <ul>
                                        <li>✔️ Погружение в природу Мещерского края по тропам, описанным Паустовским
                                        </li>
                                        <li>✔️ Знакомство с уникальной архитектурой и историей региона</li>
                                        <li>✔️ Комфортное размещение в гостинице после активного дня</li>
                                    </ul>

                                    <h5>Рекомендации для участников:</h5>
                                    <ul>
                                        <li>- Для пешего маршрута необходима удобная непромокаемая обувь</li>
                                        <li>- Возьмите скандинавские палки, рюкзак, ветровку</li>
                                        <li>- Не забудьте фотоаппарат для осенних пейзажей</li>
                                    </ul>

                                    <p class="next-day">Завтра: знакомство с Касимовым и мещерскими промыслами! 🏛️🎨
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- День 2 -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="flush-heading2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse2" aria-expanded="false" aria-controls="flush-collapse2">
                                <h3>День 2 (19 октября) – Две культуры одного города и мещерские промыслы</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse2" class="accordion-collapse collapse" aria-labelledby="flush-heading2"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <h4>«Касимов - переплетение культур и ремесел»</h4>
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">💪 7:30 — Бодрая утренняя зарядка для подготовки к
                                        новому дню.</li>
                                    <li class="modal-active-item">🍳 8:00 — Завтрак в гостинице (включен в стоимость
                                        тура).</li>
                                    <li class="modal-active-item">🎒 9:00 — Выезд из гостиницы с вещами.</li>
                                    <li class="modal-active-item">🏭 9:00 – 10:00 — Экскурсия на Касимовскую
                                        овчинно-меховую фабрику. Узнаем историю предприятия и увидим современную
                                        площадку, где снимались популярные фильмы и сериалы.</li>
                                    <li class="modal-active-item">🚶 10:00 – 12:00 — Авторская пешеходная экскурсия по
                                        Касимову. Пройдем нетуристическим маршрутом: от фабрики через живописные овраги
                                        в татарскую слободу, а затем — к историческому центру. Осмотрим Торговые ряды и
                                        Соборную площадь. В этот день, возможно, будет работать воскресный базар — у вас
                                        будет время (20-30 минут) погулять и почувствовать его authentic атмосферу.</li>
                                    <li class="modal-active-item">🎨 12:00 – 13:00 — Посещение частной галереи
                                        Лебедевых. Знакомство с творчеством местных художников и уникальной коллекцией.
                                    </li>
                                    <li class="modal-active-item">🍜 13:00 – 14:00 — Обед (предположительно в ресторане
                                        «Касимовский дворик», оплачивается дополнительно).</li>
                                    <li class="modal-active-item">🏺 14:00 – 15:00 — Посещение одного из лучших музеев
                                        области — «Вырковский промысел». Погрузимся в историю гончарного искусства
                                        Мещерского края.</li>
                                    <li class="modal-active-item">🛍️ 15:00 – 15:30 — Свободное время для покупки
                                        сувениров и касимовских сладостей.</li>
                                    <li class="modal-active-item">🚐 15:30 — Отправление в сторону Рязани.</li>
                                    <li class="modal-active-item">🚂 17:30 – 18:30 — Посещение Музея «Мещерская кукушка»
                                        в г. Спас-Клепики. Узнаем историю узкоколейной железной дороги и одноимённого
                                        народного промысла.</li>
                                    <li class="modal-active-item">🏙 ~19:30 — Прибытие в Рязань. Свободное время для
                                        лёгкого ужина (не входит в стоимость).</li>
                                    <li class="modal-active-item">🚆 21:30 — Отправление на поезде в Москву с
                                        железнодорожного вокзала Рязани.</li>
                                    <li class="modal-active-item">🏠 23:58 — Прибытие в Москву на Казанский вокзал.</li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Что взять с собой:</h5>
                                    <ul>
                                        <li>✔ Удобную обувь для пешей экскурсии по городу</li>
                                        <li>✔ Деньги на сувениры и местные сладости</li>
                                        <li>✔ Хорошее настроение для завершения путешествия!</li>
                                    </ul>

                                    <h5>Интересный факт:</h5>
                                    <p>Касимов - уникальный город, где на протяжении веков мирно сосуществуют
                                        православная и мусульманская культуры, что отражается в архитектуре и традициях
                                        города.</p>

                                    <p class="next-day">Спасибо за путешествие по Мещерскому краю! До новых встреч! 🍂❤️
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>
                </div>
            </ul>
        </div>
    </section>
    <section class="order">
        <div class="container order__container">
            <div class="order__contant">
                <div class="tour__page__pricePart">
                    <p class="tour__page__price">Стоимость: 21350 рублей<br> Группа 10-12 человек </p>
                    <p class="tour__page__priceIn">В стоимость входят: трансфер на комфортабельном микроавтобусе по
                        всему маршруту, проживание в гостинице «Касимов» в одноместном номере, завтрак в гостинице во
                        второй день, услуги гида-сопровождающего и экскурсионное обслуживание по программе,
                        сопровождение инструктора по скандинавской ходьбе, входные билеты и экскурсии в музеи (галерея
                        Лебедевых, «Вырковский промысел», «Мещерская кукушка»).

                    </p>
                    <p class="tour__page__priceOff">Оплачивается дополнительно: ж/д билеты Москва – Рязань – Москва,
                        питание: обеды, ужин, перекус.

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



    <footer class="footer"></footer>



    <script src="../node_modules/jquery/dist/jquery.js"></script>

    <footer class="footer"></footer>

    <?php formTour('Касимов'); ?>
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