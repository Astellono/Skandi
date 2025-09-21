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
        content="Пешее путешествие с палками по следам рунопевцев и коробейников. Калевальский национальный парк, деревни Вокнаволок и Суднозеро, карельская кухня.">
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
    <title>Тур «В краю калевальских песен»</title>
</head>

<body>
    <header class="header" id="header">
        <?php
        include '../parts/headerPHP.php';
        ?>
    </header>


    <section class="tour uzbek-pattern">
        <div class="container">

            <div class="tour__page__header">

                <div class="tour__page__imgBox">
                    <img class="tour__page__img" src="../img/act-tour/kalev.jpg"
                        alt="Калевальский национальный парк">
                    <div class="tour__page__titleBox">
                        <h1 class="tour__page__title">
                            SCANDI-ТУР «В КРАЮ КАЛЕВАЛЬСКИХ ПЕСЕН»
                        </h1>
                        <h2 class="tour__page__date">Пешее путешествие с палками по следам рунопевцев и коробейников: 6–11 июня 2026 года (6 дней)</h2>
                    </div>

                </div>


            </div>
            <div class="tour__page__infoBlock">


                <p class="tour__page__desc">
                    Беломорская Карелия – это край, где оживают легенды. Край сказителей-рунопевцев, отважных путешественников и старинных торговцев-коробейников. Здесь саамы слагали сказания о великих героях, позднее воспетых в знаменитом на весь мир эпосе «Калевала».
                    <br><br>
                    Этот тур создан для ценителей пеших маршрутов, истории и подлинной культуры. Мы предлагаем не просто прогулку, а глубокое погружение в наследие Севера. С палками для скандинавской ходьбы мы пройдем по тропам Калевальского национального парка и Костомукшского заповедника, побываем в древних деревнях, услышим истории от хранителей традиций и попробуем настоящую карельскую кухню.
                    <br><br>
                    Это путешествие для тех, кто хочет на шесть дней отключиться от шума больших городов и оказаться среди первозданной природы, в месте, где время течет иначе.
                    <br><br>
                    <strong>Особенности тура:</strong>
                </p>
                <ul class="lim">
                    <li>Пешие маршруты с палками по подготовленным тропам заповедника и национального парка.</li>
                    <li>Погружение в культуру: экскурсии по старинным рунопевческим деревням Вокнаволок и Суднозеро.</li>
                    <li>Карельская кухня: дегустации блюд и гастрономические мастер-классы от местных жителей.</li>
                    <li>Водные приключения: прогулки на каяках по чистейшим озерам (за дополнительную плату).</li>
                    <li>Уникальные гиды: общение с инспекторами парка и хранительницами традиций.</li>
                    <li>Aутентичный быт: проживание в гостевых домах и традиционная баня «по-черному».</li>
                    <li>Комфортная логистика: передвижение между локациями на автомобилях.</li>
                    <li>Небольшая группа: всего 7 человек для максимально глубокого погружения.</li>
                </ul>
                <p>
                    <strong>Внимание!</strong> При ухудшении погодных условий (предупреждение МЧС) организаторы оставляют право изменить, отменить или перенести программу. Оповещение участников происходит за 2-3 дня.
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
                        <img src="/img/rate/3.svg" alt="Сложность 3 из 5" srcset="">

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
                                <h3>День 1 (6 июня) – Знакомство с заповедником и Тропа коробейников</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse1" class="accordion-collapse collapse" aria-labelledby="flush-heading1"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🕘 09:10 — Встреча группы на ж/д станции Костомукша. Завтрак в кафе города.</li>
                                    <li class="modal-active-item">🚗 Переезд в Визит-центр заповедника «Костомукшский». Экскурсия, знакомство с правилами и историей этих мест.</li>
                                    <li class="modal-active-item">🚶 Небольшая разминка: прогулка с палками по эко-тропе вдоль озера Контоккиярви.</li>
                                    <li class="modal-active-item">🍽️ Обед в кафе.</li>
                                    <li class="modal-active-item">🌲 Главный ход: пеший маршрут по территории заповедника – «Тропа коробейников». Мы почувствуем себя отважными торговцами, шедшими через леса и болота в Финляндию.</li>
                                    <li class="modal-active-item">🏨 Возвращение в Костомукшу, размещение в гостинице (2-х местные номера с удобствами).</li>
                                    <li class="modal-active-item">🍴 Ужин (самостоятельно, не входит в стоимость).</li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Питание и ночевка:</h5>
                                    <ul>
                                        <li>🍽️ Питание: завтрак, обед</li>
                                        <li>🏠 Ночевка: гостиница в Костомукше</li>
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
                                <h3>День 2 (7 июня) – Деревня Вокнаволок: руны и карельская кухня</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse2" class="accordion-collapse collapse" aria-labelledby="flush-heading2"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🍳 Завтрак. Сбор вещей, выезд из гостиницы.</li>
                                    <li class="modal-active-item">🚗 Переезд на автомобилях в старинную рунопевческую деревню Вокнаволок.</li>
                                    <li class="modal-active-item">🏡 Размещение в большом гостевым доме на опушке леса.</li>
                                    <li class="modal-active-item">📚 Экскурсия по деревне с местной хранительницей традиций. Погружение в историю рунопевцев.</li>
                                    <li class="modal-active-item">🍽️ Обед из блюд карельской кухни.</li>
                                    <li class="modal-active-item">👩‍🍳 Гастрономический мастер-класс: учимся готовить традиционные угощения (калитки, супы по-карельски).</li>
                                    <li class="modal-active-item">🍲 Дегустация собственноручно приготовленного ужина.</li>
                                    <li class="modal-active-item">🔥 Вечер: отдых, общение, баня.</li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Питание и ночевка:</h5>
                                    <ul>
                                        <li>🍽️ Питание: завтрак, обед, ужин</li>
                                        <li>🏠 Ночевка: гостевой дом в Вокнаволоке</li>
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
                                <h3>День 3 (8 июня) – Поход к порогу Кёунас</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse3" class="accordion-collapse collapse" aria-labelledby="flush-heading3"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🍳 Завтрак. Сбор ланч-пакетов.</li>
                                    <li class="modal-active-item">🌲 Пеший поход к порогу Кёунас (12 км в оба конца). Идем с палками по живописному лесному маршруту. Порог, чье название с саамского означает «крутой, пенистый», — одно из чудес первозданного края и часть древнего пути коробейников.</li>
                                    <li class="modal-active-item">🧺 Пикник с чаем на берегу.</li>
                                    <li class="modal-active-item">🏡 Возвращение в Вокнаволок.</li>
                                    <li class="modal-active-item">🍲 Ужин.</li>
                                    <li class="modal-active-item">🔥 Вечерняя баня для снятия усталости.</li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Питание и ночевка:</h5>
                                    <ul>
                                        <li>🍽️ Питание: завтрак, обед (ланч-пакет), ужин</li>
                                        <li>🏠 Ночевка: гостевой дом в Вокнаволоке</li>
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
                                <h3>День 4 (9 июня) – Переезд в деревню Суднозеро</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse4" class="accordion-collapse collapse" aria-labelledby="flush-heading4"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🍳 Завтрак. Сбор вещей, прощание с гостеприимным Вокнаволоком.</li>
                                    <li class="modal-active-item">🚗 Переезд на автомобилях в Национальный парк «Калевальский», в деревню Суднозеро.</li>
                                    <li class="modal-active-item">👨‍👩‍👧‍👦 Знакомство с уникальным местом и его жителями — семьей Лесонен, чей род является одним из древнейших в этих краях.</li>
                                    <li class="modal-active-item">🏡 Размещение в уютных гостевых домиках.</li>
                                    <li class="modal-active-item">📚 Экскурсия от инспектора парка Александра Лесонена: история деревни, легенды, рассказ о визите Элиаса Леннрота, создателя «Калевалы».</li>
                                    <li class="modal-active-item">🍲 Ужин и отдых в полной тишине и единении с природой.</li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Питание и ночевка:</h5>
                                    <ul>
                                        <li>🍽️ Питание: завтрак, обед (ланч-пакет), ужин</li>
                                        <li>🏠 Ночевка: гостевой дом в Суднозеро</li>
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
                                <h3>День 5 (10 июня) – Тропа Шаманов и каякирование</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse5" class="accordion-collapse collapse" aria-labelledby="flush-heading5"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🍳 Завтрак.</li>
                                    <li class="modal-active-item">🌲 Пеший поход по самой мистической тропе парка — «Тропе Шаманов». Ищем древние сейды (культовые сооружения из камней), слушаем легенды о саамах и древних металлургах.</li>
                                    <li class="modal-active-item">🧺 Обед-пикник на маршруте.</li>
                                    <li class="modal-active-item">🏡 Возвращение в деревню.</li>
                                    <li class="modal-active-item">🛶 Водная прогулка на каяках по озеру (за доп. плату, по желанию и при хорошей погоде).</li>
                                    <li class="modal-active-item">🍲 Прощальный ужин в Суднозеро.</li>
                                    <li class="modal-active-item">🔥 Настоящая баня «по-черному» — уникальный опыт и кульминация путешествия.</li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Питание и ночевка:</h5>
                                    <ul>
                                        <li>🍽️ Питание: завтрак, обед (пикник), ужин</li>
                                        <li>🏠 Ночевка: гостевой дом в Суднозеро</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- День 6 -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="flush-heading6">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse6" aria-expanded="false" aria-controls="flush-collapse6">
                                <h3>День 6 (11 июня) – Возвращение в Костомукшу и отъезд</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse6" class="accordion-collapse collapse" aria-labelledby="flush-heading6"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🍳 Завтрак. Сбор вещей, прощание с гостеприимными хозяевами.</li>
                                    <li class="modal-active-item">🚗 Переезд на автомобилях в Костомукшу.</li>
                                    <li class="modal-active-item">🍽️ Обед в кафе города.</li>
                                    <li class="modal-active-item">🎭 Знакомство с культурой: визит в общество карельской культуры «Viena».</li>
                                    <li class="modal-active-item">🎯 Мастер-класс по игре в «кюккя» — карельские городки.</li>
                                    <li class="modal-active-item">🛍️ Свободное время, покупка сувениров.</li>
                                    <li class="modal-active-item">🍴 Ужин (самостоятельно, не входит в стоимость).</li>
                                    <li class="modal-active-item">🚗 ~18:00 — Трансфер на ж/д вокзал Костомукши.</li>
                                    <li class="modal-active-item">🚂 19:03 — Отправление поезда в Санкт-Петербург.</li>
                                    <li class="modal-active-item">👋 Окончание программы. До новых встреч!</li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Питание:</h5>
                                    <ul>
                                        <li>🍽️ Питание: завтрак, обед</li>
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
                    <p class="tour__page__price">Стоимость: 108 000 рублей<br> Группа 6 человек </p>
                    <p class="tour__page__priceIn">В стоимость входит: все трансферы по программе на автомобилях, проживание (1 ночь в гостинице в Костомукше, 2 ночи в гостевом доме в Вокнаволоке, 2 ночи в гостевых домиках в Суднозеро), питание (завтраки со 2 по 6 день, обеды и ужины со 2 по 5 день, перекусы на маршрутах), все экскурсии, мастер-классы и входные билеты по программе, работа гида-инструктора и сопровождающих, баня в Вокнаволоке и Суднозере.</p>
                    <p class="tour__page__priceOff">Не входит в стоимость: ж/д билеты до Костомукши и обратно, питание в 1-й и 6-й день (завтрак, обед, ужин 6 июня; обед, ужин 11 июня), аренда каяков и снаряжения для водной прогулки (~1500 руб./чел.), личные расходы (сувениры, дополнительное питание).</p>
                    <p class="tour__page__notice">** ВНИМАНИЕ! При ухудшении погодных условий (предупреждение МЧС) организаторы оставляют право изменить, отменить или перенести программу. Оповещение участников происходит за 2-3 дня.<br>
                        *** Вся основная организационная информация будет в организационном чате. Билеты покупаем после формирования группы.</p>
                </div>

                <a class="tour__page__btn" href="#openModal">Записаться</a>

            </div>
        </div>
    </section>

    <section class="info-block">
        <div class="container">
            <h2>Проживание и питание</h2>
            <p style="margin-bottom: 20px">
                <strong>Проживание:</strong> Комфортабельное походное. В Костомукше — гостиница с удобствами в номере. В деревнях — размещение в гостевых домах и домиках с условиями, максимально приближенными к природе (туалет и душ могут быть на улице или в отдельном помещении). Это часть погружения в атмосферу!
                <br><br>
                <strong>Питание:</strong> Домашнее и походное. В Вокнаволоке вас ждет настоящая карельская кухня. В Суднозере питание организуется силами группы из закупленных продуктов. Повар — ваш гид или участники.
            </p>

            <h2>Что взять с собой: список снаряжения</h2>
            
            <h5>Обязательное снаряжение:</h5>
            <ul class="lim">
                <li>Палки для скандинавской ходьбы!</li>
                <li>Рюкзак туристический (30-40 л) для личных вещей и воды на дневные переходы.</li>
                <li>Треккинговые ботинки или надежные разношенные кроссовки.</li>
                <li>Непромокаемая ветровка и штаны (дождевик).</li>
                <li>Термобелье и флисовая кофта даже летом — вечера бывают прохладными.</li>
                <li>Несколько пар носков (х/б и треккинговых).</li>
                <li>Удобная одежда для ходовых дней и для отдыха.</li>
                <li>Головной убор от солнца и комаров.</li>
                <li>Перчатки для работы с палками.</li>
                <li>Термос или бутылка для воды (0,7-1 л).</li>
                <li>Личная посуда: кружка, миска, ложка (легкие, небьющиеся).</li>
                <li>Туалетные принадлежности, быстро сохнущее полотенце.</li>
                <li>Резиновые тапочки для бани и дома.</li>
                <li>Фонарик/налобник.</li>
                <li>Powerbank большой емкости (розетки в деревнях могут быть редкостью).</li>
            </ul>

            <h5>Рекомендуется:</h5>
            <ul class="lim">
                <li>Фотоаппарат.</li>
                <li>Репелленты от комаров и клещей (обязательно!).</li>
                <li>Солнцезащитный крем.</li>
                <li>Личная аптечка с вашими лекарствами.</li>
                <li>Купальник/плавки.</li>
                <li>Хорошее настроение и любовь к природе!</li>
            </ul>

            <h5>Документы:</h5>
            <ul class="lim">
                <li>Паспорт РФ.</li>
                <li>Полис ОМС (или ДМС).</li>
            </ul>

            <h2>Важная информация о здоровье</h2>
            <p>Тур требует хорошей физической формы. Участникам с хроническими заболеваниями, недавними травмами или ограничениями по здоровью необходимо проконсультироваться с врачом и предупредить организаторов.</p>
            <p style="margin-bottom: 20px"><strong>Аптечка:</strong> У организаторов есть общая аптечка первой помощи. Однако вы обязаны взять все ваши личные лекарства, которые принимаете регулярно или которые могут вам понадобиться.</p>

            <h2>Как добраться до точки старта</h2>
            <p style="margin-bottom: 10px">Организованная встреча группы происходит 6 июня в 09:10 на железнодорожной станции Костомукша (Республика Карелия).</p>
            <p style="margin-bottom: 10px"><strong>Для путешественников из Москвы и других городов заранее надо приобрести билеты до Санкт-Петербурга.</strong></p>
            <p style="margin-bottom: 10px"><strong>Для путешественников из Санкт-Петербурга (рекомендованный вариант):</strong></p>
            
            <ul class="lim">
                <li>Поезд № 022Ч/021Ч (Санкт-Петербург — Костомукша).</li>
                <li>Отправление: 5 июня в 17:08 с Ладожского вокзала.</li>
                <li>Прибытие: 6 июня в 09:10 на станцию Костомукша.</li>
                <li>В пути: около 16 часов.</li>
            </ul>

            <p><strong>Обратная дорога:</strong></p>
            <ul class="lim">
                <li>11 июня мы прибудем на станцию Костомукша к ~18:00.</li>
                <li>Обратный поезд: № 022Ч/021Ч (Костомукша — Санкт-Петербург).</li>
                <li>Отправление из Костомукши: в 19:03.</li>
                <li>Прибытие в Санкт-Петербург: 12 июня в 10:51 на Ладожский вокзал.</li>
            </ul>
            
            <p><strong>Важно:</strong> Покупку ж/д билетов следует осуществлять только после команды организаторов при полном наборе группы.</p>
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

    <?php formTour('Карелия Калевальские'); ?>
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