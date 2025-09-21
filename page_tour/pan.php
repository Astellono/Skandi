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
        content="Зимняя снегоходная экспедиция в сердце дикой Карелии. Национальный парк Паанаярви, восхождения на горы Нуорунен и Кивакка, жизнь в охотничьих избах.">
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
            list-style-type: disc  !important; 
         
            margin-bottom: 20px;
            margin-left: 20px;
            
        }
        .lim > li {
            list-style-type: disc  !important; 
           
            
        }
        .info-block h2 {
            margin-bottom: 20px;
        }
    </style>
    <title>Тур «Паанаярви: Северная сказка»</title>
</head>

<body>
    <header class="header" id="header">
        <?php
        // Используем относительный путь вместо абсолютного
        include '../parts/headerPHP.php';
        ?>
    </header>


    <section class="tour uzbek-pattern">
        <div class="container">

            <div class="tour__page__header">

                <div class="tour__page__imgBox">
                    <img class="tour__page__img" src="../img/act-tour/pan.jpg"
                        alt="Национальный парк Паанаярви зимой">
                    <div class="tour__page__titleBox">
                        <h1 class="tour__page__title">
                            ТУР «ПААНАЯРВИ: СЕВЕРНАЯ СКАЗКА»
                        </h1>
                        <h2 class="tour__page__date">Зимняя снегоходная экспедиция в сердце дикой Карелии: 7–11 марта
                            2026 года (5 дней / 4 ночи)</h2>
                    </div>

                </div>


            </div>
            <div class="tour__page__infoBlock">


                <p class="tour__page__desc">
                    Забудьте о цивилизации и отправляйтесь в настоящее зимнее приключение в один из самых удаленных и
                    красивых национальных парков России — Паанаярви. Это тур для тех, кто ищет не комфортный отдых, а
                    подлинность, суровую красоту северной природы и готов к испытаниям.
                    <br><br>
                    <strong>Вас ждут:</strong>
                </p>
                <ul class="lim">
                    <li>Снегоходные сафари к главным достопримечательностям парка.</li>
                    <li>Жизнь в условиях дикой природы: проживание в охотничьих избах с печным отоплением.</li>
                    <li>Восхождения на две высочайшие вершины Карелии — Нуорунен и Кивакку.</li>
                    <li>Невероятные виды на заснеженные леса и озера, простирающиеся до Финляндии.</li>
                    <li>Карельская баня каждый вечер после активного дня.</li>
                    <li>Шанс увидеть Северное сияние в условиях идеально темного неба.</li>
                    <li>Утренние сканди-зарядки.</li>
                </ul>
                <p>
                    <strong>Внимание!</strong> Это экспедиционный тур, а не экскурсионный. Здесь нет привычного
                    комфорта, Wi-Fi, теплых туалетов и душа. Здесь есть суровая, нетронутая природа, дух приключений и
                    команда единомышленников.
                </p>
                <hr>
                <div class="tour__page__bottom">

                    <div class="tour__page__gid">

                        <h2 class="tour__page__gid__title">Сопровождающие:</h2>
                        <ul class="tour__page__gid__list">
                            <li class="tour__page__gid__item">
                                <img class="tour__page__gid__img" src="/img/partner/karGid.png" alt="Масалов Виталий">
                                <h3 class="tour__page__gid__title-member">Масалов Виталий</h3>
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
                        <img src="/img/rate/4.svg" alt="Сложность 4 из 5" srcset="">

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
                                <h3>День 1 (7 марта) – Знакомство с диким краем</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse1" class="accordion-collapse collapse" aria-labelledby="flush-heading1"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🕜 13:30 — Встреча группы на железнодорожной станции
                                        Лоухи.</li>
                                    <li class="modal-active-item">🚗 Трансфер на автомобилях до Визит-центра
                                        национального парка «Паанаярви».</li>
                                    <li class="modal-active-item">❄️ Начало приключения: пересадка на сани, запряженные
                                        снегоходами, которые доставят нас к месту нашего проживания — уютной лесной избе
                                        на берегу озера.</li>
                                    <li class="modal-active-item">🏠 Размещение, ужин и первое знакомство с жизнью в
                                        зимней карельской глуши.</li>
                                    <li class="modal-active-item">🔥 Вечер: инструктаж, планирование дней, баня
                                        по-черному.</li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Питание и ночевка:</h5>
                                    <ul>
                                        <li>🍽️ Питание: ужин</li>
                                        <li>🏠 Ночевка: лесная изба в национальном парке</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- День 2 -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="flush-heading2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse2" aria-expanded="false" aria-controls="flush-collapse2">
                                <h3>День 2 (8 марта) – Водопад Киваккакоски и дух прошлого</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse2" class="accordion-collapse collapse" aria-labelledby="flush-heading2"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🌅 Утро: завтрак, бодрящая зарядка на морозном
                                        воздухе.</li>
                                    <li class="modal-active-item">🏍️ Экскурсия на снегоходах (в санях-прицепах) к
                                        семикаскадному водопаду Киваккакоски — самому мощному в Карелии, скованному
                                        зимними льдами.</li>
                                    <li class="modal-active-item">🏚️ По пути посещение заброшенной деревни Вартиолампи,
                                        где вы узнаете о жизни и быте карелов-староверов.</li>
                                    <li class="modal-active-item">☕ Перекус с горячим чаем на свежем воздухе.</li>
                                    <li class="modal-active-item">🏠 Возвращение в избу.</li>
                                    <li class="modal-active-item">🚶 После обеда: пешая прогулка по замерзшему озеру
                                        Пааняярви к урочищу Арола (место старинного финского хутора).</li>
                                    <li class="modal-active-item">🍲 Вечер: сытный ужин, баня, настольные игры и
                                        общение.</li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Питание и ночевка:</h5>
                                    <ul>
                                        <li>🍽️ Питание: завтрак, обед (перекус), ужин</li>
                                        <li>🏠 Ночевка: лесная изба в национальном парке</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- День 3 -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="flush-heading3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse3" aria-expanded="false" aria-controls="flush-collapse3">
                                <h3>День 3 (9 марта) – Восхождение на крышу Карелии – гору Нуорунен (577 м)</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse3" class="accordion-collapse collapse" aria-labelledby="flush-heading3"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🌅 Ранний завтрак и подготовка к самому длинному
                                        маршруту.</li>
                                    <li class="modal-active-item">🏍️ Экспедиция на снегоходах к подножию самой высокой
                                        горы Карелии — Нуорунен (40 км в оба пути).</li>
                                    <li class="modal-active-item">⛰️ Подъем на вершину, откуда открываются панорамные
                                        виды на бескрайние заснеженные леса и озера России и Финляндии.</li>
                                    <li class="modal-active-item">🥪 Обед-перекус с горячим чаем и бутербродами на
                                        вершине.</li>
                                    <li class="modal-active-item">🏠 Возвращение в избу под вечер.</li>
                                    <li class="modal-active-item">🍲 Вечер: восстанавливающий ужин, баня и заслуженный
                                        отдых.</li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Питание и ночевка:</h5>
                                    <ul>
                                        <li>🍽️ Питание: завтрак, обед (перекус), ужин</li>
                                        <li>🏠 Ночевка: лесная изба в национальном парке</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- День 4 -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="flush-heading4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse4" aria-expanded="false" aria-controls="flush-collapse4">
                                <h3>День 4 (10 марта) – Панорамы горы Кивакка и прощание с тайгой</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse4" class="accordion-collapse collapse" aria-labelledby="flush-heading4"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🌅 Утро: завтрак, бодрящая зарядка на морозном
                                        воздухе.</li>
                                    <li class="modal-active-item">🏍️ Снегоходная экскурсия на гору Кивакка. Подъем на
                                        смотровую площадку, откуда видно гигантское озеро Пяозеро и бескрайнюю тайгу.
                                    </li>
                                    <li class="modal-active-item">📸 Фотосессия, прогулка по вершине, прощание с
                                        величественными пейзажами.</li>
                                    <li class="modal-active-item">🏠 Возвращение в избу, свободное время: можно
                                        прогуляться по окрестностям, попробовать пройтись на лыжах.</li>
                                    <li class="modal-active-item">🍲 Прощальный ужин, баня, обмен впечатлениями.</li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Питание и ночевка:</h5>
                                    <ul>
                                        <li>🍽️ Питание: завтрак, обед (перекус), ужин</li>
                                        <li>🏠 Ночевка: лесная изба в национальном парке</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- День 5 -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="flush-heading5">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse5" aria-expanded="false" aria-controls="flush-collapse5">
                                <h3>День 5 (11 марта) – Паанаярви в сердце навсегда!</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse5" class="accordion-collapse collapse" aria-labelledby="flush-heading5"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🍳 Завтрак, сбор вещей, уборка избы.</li>
                                    <li class="modal-active-item">🏍️ Трансфер на снегоходах до Визит-центра парка.</li>
                                    <li class="modal-active-item">🚗 Пересадка в автомобиль и выезд в сторону станции
                                        Лоухи.</li>
                                    <li class="modal-active-item">🕔 ~17:00 — Прибытие на станцию Лоухи к поезду Лоухи —
                                        Санкт-Петербург (отправление в 17:57).</li>
                                    <li class="modal-active-item">👋 Окончание программы. Группа расходится.</li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Питание:</h5>
                                    <ul>
                                        <li>🍽️ Питание: завтрак</li>
                                    </ul>
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
                    <p class="tour__page__price">Стоимость: 86 400 рублей<br> Группа 6 человек </p>
                    <p class="tour__page__priceIn">В стоимость входит: проживание в избах национального парка на 4 ночи,
                        все трансферы по программе, три запланированные снегоходные экскурсии с гидом-инструктором,
                        питание по программе (ужины в дни 1-4, завтраки и перекусы/обеды в дни 2-4), работа инструктора
                        и сопровождение сотрудников парка, баня каждый вечер, постельное белье.</p>
                    <p class="tour__page__priceOff">Не входит в стоимость: ж/д билеты до ст. Лоухи и обратно, питание в
                        первый день (завтрак, обед) и в последний день (обед, ужин), аренда личного снаряжения
                        (спальники, термосы и т.д.), личные расходы.</p>
                    <p class="tour__page__notice">** ВНИМАНИЕ! Это экспедиционный тур с минимальным комфортом. Программа
                        может меняться в зависимости от погодных условий.<br>
                        *** Вся основная организационная информация будет в организационном чате. Билеты покупаем после
                        формирования группы.</p>
                </div>

                <a class="tour__page__btn" href="#openModal">Записаться</a>

            </div>
        </div>
    </section>

    <section class="info-block">
        <div class="container">
            <h2>Проживание</h2>
            <p style="margin-bottom: 20px">Размещение в традиционных карельских «избах» — деревянных домиках с печным отоплением. Условия
                минималистичны: деревянные кровати (двухъярусные), стол, скамьи, освещение от генератора. Туалет — на
                улице. Помывка — только в бане. Отдельных комнат нет, участники проживают все вместе на одном этаже. Это
                место для ночлега и укрытия от стужи, а не отель. Настоятельно рекомендуем брать теплый спальный мешок!
            </p>

            <h2>Что взять с собой: важный список</h2>
            <h5>Документы:</h5>
            <ul class="lim">
                <li>Паспорт РФ.</li>
                <li>Полис ОМС.</li>
            </ul>

            <h5>Одежда и обувь (основное):</h5>
            <ul class="lim">
                <li>Обувь: утепленные зимние ботинки (например, зимние треккинговые) или валенки с теплым носком.
                    Главное — не промокаемые и не продуваемые.</li>
                <li>Гамаши («фонарики») — защитят от снега за голенище.</li>
                <li>Носки: 2 пары термо, 2-3 пары флисовых/шерстяных на смену.</li>
                <li>Термобелье (верх и низ), флисовый костюм/толстовка как средний слой.</li>
                <li>Верхняя одежда: теплая непродуваемая куртка (пуховик или синтетический утеплитель), непродуваемые
                    штаны (горнолыжные или сноубордические отлично подойдут).</li>
                <li>Шапка, балаклава или широкий шарф, теплые непромокаемые варежки + запасная пара.</li>
                <li>Отдельный комплект теплой одежды для сна (термобелье, кофта, носки).</li>
            </ul>

            <h5>Снаряжение и личные вещи:</h5>
            <ul class="lim">
                <li>Теплый спальный мешок (комфортная температура не выше -5°C) и каремат (пенка).</li>
                <li>Рюкзак (20-30 л) для личных вещей на радиальные выходы.</li>
                <li>Термос (0,7-1 л) для горячего чая в походах.</li>
                <li>Личная посуда: миска, кружка, ложка/вилка (желательно металлические/небьющиеся).</li>
                <li>Фонарик/налобный фонарь + запас батареек.</li>
                <li>Powerbank большой емкости (розетки будут только при работе генератора).</li>
                <li>Средства личной гигиены, быстрое полотенце.</li>
                <li>Личная аптечка с вашими лекарствами.</li>
                <li>Крем от солнца и ветра, гигиеническая помада.</li>
            </ul>

            <h5>По желанию:</h5>
            <ul class="lim">
                <li>Фотоаппарат</li>
                <li>Небольшой запас любимых снеков (шоколад, орехи).</li>
            </ul>

            <h2>Важная информация о здоровье</h2>
            <p>Тур требует хорошей физической формы и отсутствия серьезных проблем со здоровьем.</p>
            <p><strong>Участие противопоказано</strong> людям с:</p>
            <ul class="lim">
                <li>Хроническими заболеваниями сердечно-сосудистой и дыхательной систем.</li>
                <li>Проблемами с опорно-двигательным аппаратом.</li>
                <li>В недавнем прошлом: перенесенными операциями, инсультами, травмами.</li>
                <li>Беременностью.</li>
            </ul>
            <p style="margin-bottom: 20px  "><strong>Аптечка:</strong> У организаторов есть общая аптечка первой помощи. Однако вы обязаны взять все
                ваши личные лекарства, которые принимаете регулярно или которые могут вам понадобиться.</p>

            <h2>Как добраться до точки старта</h2>
            <p>Организованная встреча группы происходит 7 марта в 13:30 на железнодорожной станции Лоухи (Республика
                Карелия).</p>
            <p style="margin-bottom: 10px"><strong>Для путешественников из Москвы и Санкт-Петербурга:</strong></p>
            <p style="margin-bottom: 10px">1. <strong>Поездом через Санкт-Петербург</strong> (самый удобный вариант)</p>
            <ul class="lim">
                <li style="margin-bottom: 10px">Из Москвы: Необходимо заранее взять билеты на любой скоростной или ночной поезд до Санкт-Петербурга,
                    чтобы успеть на поезд до Лоухи.</li>
                <li>Из Санкт-Петербурга:
                    <ul class="lim">
                        <li>Поезд № 011Ч/012Ч «Карелия» (Санкт-Петербург — Костомукша).</li>
                        <li>Отправление: 6 марта в 21:24 с Ладожского вокзала.</li>
                        <li>Прибытие: 7 марта в 13:27 на станцию Лоухи.</li>
                        <li>В пути: около 16 часов.</li>
                        <li><strong>Важно:</strong> Это единственный поезд, который прибывает в Лоухи к нашему времени
                            встречи. Берите билеты заранее!</li>
                    </ul>
                </li>
            </ul>
            <p><strong>Обратная дорога:</strong></p>
            <ul class="lim">
                <li>11 марта мы прибудем на станцию Лоухи к ~17:00.</li>
                <li>Обратный поезд: № 011Ч/012Ч «Карелия» (Костомукша — Санкт-Петербург).</li>
                <li>Отправление из Лоухи: в 17:57.</li>
                <li>Прибытие в Санкт-Петербург: 12 марта в 10:09 на Ладожский вокзал.</li>
                <li>Далее вы можете продолжить путь в Москву или другой город.</li>
            </ul>
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

    <?php formTour('Карелия Паанаярви'); ?>
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