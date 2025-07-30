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

    <script src="../js/reg.js" defer></script>
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
        $root = $_SERVER['DOCUMENT_ROOT'];
        $path = $root . '/parts/headerPHP.php';
        include $path;
        ?>
    </header>


    <section class="tour">
        <div class="container">

            <div class="tour__page__header">

                <div class="tour__page__imgBox">
                    <img class="tour__page__img" src="../img/act-tour/koreya.jpg" alt="">
                    <div class="tour__page__titleBox">
                        <h1 class="tour__page__title">
                            Тур «От Сеула до Чеджу: Скандинавская ходьба сквозь красоты Кореи»
                        </h1>
                        <h2 class="tour__page__date">Даты: 29 марта – 6 апреля 2026г.</h2>
                    </div>

                </div>


            </div>
            <div class="tour__page__infoBlock">


                <p class="tour__page__desc">

                    Отправляйтесь в уникальное путешествие, где скандинавская ходьба станет вашим проводником по
                    красотам Южной Кореи! Мы совместим активные прогулки с палками по живописным тропам, погружение в
                    культуру и гастрономические открытия. Вас ждут горные маршруты, древние дворцы, чайные церемонии,
                    морские пейзажи и даже прогулка на яхте по реке Ханган!<br><br>

                    Почему это идеальный тур для любителей ходьбы?<br>
                    ✔️ Тренировки в необычных местах – от парков Сеула до горных троп Пукхансана.<br>
                    ✔️ Комфортный темп – маршруты подходят даже для новичков.<br>
                    ✔️ Культурный микс – дворцы, традиционные деревни, океанариум и даже капсула времени!<br>
                    ✔️ Вкус Кореи – от риса в листе лотоса до ханганского рамёна.


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
                        <img src="/img/rate/2.svg" alt="" srcset="">

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

                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <!-- День 1 -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="flush-heading1">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse1" aria-expanded="false" aria-controls="flush-collapse1">
                                <h3>День 1 (29 марта) – Прибытие в Сеул</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse1" class="accordion-collapse collapse" aria-labelledby="flush-heading1"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <h4>«Первые шаги по Корее: знакомство с Сеулом»</h4>
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">✈️ Вылет из Москвы в Сеул рейсом китайской
                                        авиакомпании (с пересадкой).</li>
                                    <li class="modal-active-item">🇰🇷 Прибытие в аэропорт Инчхон, встреча с гидом,
                                        трансфер до отеля.</li>
                                    <li class="modal-active-item">💱 Обмен валюты (рядом с отелем).</li>
                                    <li class="modal-active-item">🏨 Заселение в отель Travelodge Dongdaemun Seoul (или
                                        аналогичный).</li>
                                    <li class="modal-active-item">🍜 Свободное время – самостоятельный ужин в одном из
                                        кафе Сеула (рекомендации гида).</li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Особенности дня:</h5>
                                    <ul>
                                        <li>✔️ Первое знакомство с корейской атмосферой – вечерние огни города.</li>
                                        <li>✔️ Удобное расположение отеля в районе Тондэмун – рядом магазины, кафе и
                                            рынки.</li>
                                        <li>✔️ Возможность обменять валюту по выгодному курсу перед началом тура.</li>
                                    </ul>

                                    <h5>Рекомендации для участников:</h5>
                                    <ul>
                                        <li>- Если не устали после перелета, можно прогуляться до DDP (Dongdaemun Design
                                            Plaza) – футуристического архитектурного комплекса с ночной подсветкой.</li>
                                        <li>- Попробовать корейскую уличную еду на рынке Кванджан (в 10 минутах на
                                            такси).</li>
                                    </ul>

                                    <p class="next-day">Завтра: ранний подъем – нас ждут первые прогулки со
                                        скандинавскими палками! 🚶♂️🌿</p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- День 2 -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="flush-heading2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse2" aria-expanded="false" aria-controls="flush-collapse2">
                                <h3>День 2 (30 марта) – Горные тропы, озеро Сокчон и панорамы Сеула</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse2" class="accordion-collapse collapse" aria-labelledby="flush-heading2"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <h4>«От горных вершин к водной глади: активный старт в Корее»</h4>
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">☀ Завтрак в отеле (шведский стол, включен в
                                        стоимость).</li>
                                    <li class="modal-active-item">⏰ 09:30 – Встреча с гидом в лобби отеля, выезд к
                                        подножию гор.</li>
                                    <li class="modal-active-item">🌿 Утренний трекинг со скандинавскими палками:
                                        <ul>
                                            <li>- 10:00 – Начало прогулки в горы (набор высоты ~300 м, низкая
                                                сложность).</li>
                                            <li>- Маршрут проходит через живописный парк с водопадами – идеально для
                                                фото и медитативной ходьбы.</li>
                                            <li>- Длительность: ~2 часа, с остановками на отдых.</li>
                                        </ul>
                                    </li>
                                    <li class="modal-active-item">🍜 12:30 – Обед в традиционном ресторане (включен в
                                        стоимость, меню с корейскими блюдами).</li>
                                    <li class="modal-active-item">💧 Озеро Сокчон и океанариум:
                                        <ul>
                                            <li>- 14:00 – Переезд к озеру Сокчон – месту спокойствия и гармонии.</li>
                                            <li>- 15:00–17:00 – Посещение океанариума (один из крупнейших в Корее) и
                                                смотровой площадки с видом на Сеул с высоты 500 м.</li>
                                        </ul>
                                    </li>
                                    <li class="modal-active-item">🚇 17:00 – Окончание программы у станции Jamsil (гид
                                        поможет с трансфером до отеля при необходимости).</li>
                                    <li class="modal-active-item">🍽 Совместный ужин:
                                        <ul>
                                            <li>- Ужин в уютном кафе Сеула (включен в стоимость, возможность обсудить
                                                впечатления в группе).</li>
                                        </ul>
                                    </li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Что взять с собой:</h5>
                                    <ul>
                                        <li>✔ Удобную трекинговую обувь и скандинавские палки.</li>
                                        <li>✔ Ветровку/свитер – в горах может быть прохладно.</li>
                                        <li>✔ Фотоаппарат для панорамных видов.</li>
                                        <li>✔ Корейскую транспортную карту T-money для самостоятельных поездок.</li>
                                    </ul>

                                    <h5>Интересный факт:</h5>
                                    <p>Озеро Сокчон – искусственный водоем, созданный для экологического баланса, а в
                                        его океанариуме живут азиатские выдры, которых можно покормить (за доп. плату).
                                    </p>

                                    <p class="next-day">Завтра: новый маршрут и погружение в традиционную Корею! 🌄</p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- День 3 -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="flush-heading3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse3" aria-expanded="false" aria-controls="flush-collapse3">
                                <h3>День 3 (31 марта) – Традиции и панорамы: от ханбанга до телебашни Намсан</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse3" class="accordion-collapse collapse" aria-labelledby="flush-heading3"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <h4>«Оздоровление по-корейски: энергия гор и древних рецептов»</h4>
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🌿 Утро: погружение в корейскую традиционную медицину
                                        <ul>
                                            <li>☀️ Завтрак в отеле (включен).</li>
                                            <li>⏰ 09:30 – Встреча с гидом, выезд в центр традиционной медицины.</li>
                                            <li>10:20–11:50 – Релакс-программа:
                                                <ul>
                                                    <li>- Травяные ванночки для ног с целебными травами.</li>
                                                    <li>- Аппаратный массаж рук и ног (стимуляция энергетических точек).
                                                    </li>
                                                    <li>- Массаж на кровати с камнями.</li>
                                                    <li>- Посещение музея ханбанга (история корейских лечебных практик).
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="modal-active-item">🍱 12:00 – Обед с корейской «изюминкой»:
                                        <ul>
                                            <li>- Рис в листе лотоса (символ долголетия) + травяные напитки для
                                                иммунитета.</li>
                                        </ul>
                                    </li>
                                    <li class="modal-active-item">🏯 День: крепостные стены и восхождение на Намсан
                                        <ul>
                                            <li>13:00 – Переезд к крепостной стене Сеула (объект ЮНЕСКО).</li>
                                            <li>13:30–16:30 – Пеший маршрут со скандинавскими палками:
                                                <ul>
                                                    <li>- Прогулка вдоль древних стен с видами на город.</li>
                                                    <li>- Подъем на гору Намсан (~300 м, плавный набор высоты).</li>
                                                    <li>- Фото у телебашни N Seoul Tower и «замков любви».</li>
                                                    <li>- Возможность выпить женьшеневый латте в кафе на вершине (за
                                                        доплату).</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="modal-active-item">🚇 17:30 – Окончание программы у станции Myeong-dong
                                        (гид поможет с трансфером).</li>
                                    <li class="modal-active-item">🌃 Вечер: свободное время в «кулинарном раю»
                                        <ul>
                                            <li>- Ужин (не включен) – рекомендуем попробовать:
                                                <ul>
                                                    <li>Самгетан (суп с женьшенем) в ресторане Tosokchon.</li>
                                                    <li>Уличную еду на рынке Мёндон (хотток, ттокпокки).</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Что взять с собой:</h5>
                                    <ul>
                                        <li>✔️ Удобную обувь для ходьбы по камням (крепость) и горным тропам.</li>
                                        <li>✔️ Крем для рук – после массажа кожа будет особенно нежной.</li>
                                        <li>✔️ Монеты для «замков любви» у башни (если захотите оставить символ).</li>
                                    </ul>

                                    <h5>Интересный факт:</h5>
                                    <ul>
                                        <li>- Рис в лотосовом листе раньше готовили только для королевской семьи –
                                            сейчас это блюдо-лекарство для детокса.</li>
                                        <li>- Гора Намсан – место силы: здесь зажигали сигнальные огни, чтобы
                                            предупредить город об опасности.</li>
                                    </ul>

                                    <p class="next-day">Завтра: Корея в стиле ханбок – перевоплощение в корейских
                                        аристократов! 👘</p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- День 4 -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="flush-heading4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse4" aria-expanded="false" aria-controls="flush-collapse4">
                                <h3>День 4 (1 апреля) – Путешествие во времени: дворцы, ханбок и дух старого Сеула</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse4" class="accordion-collapse collapse" aria-labelledby="flush-heading4"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <h4>«Корея в стиле ханбок: от дворцов до традиционных улиц»</h4>
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">👘 Утро: перевоплощение в корейских аристократов
                                        <ul>
                                            <li>☀️ Завтрак в отеле (включен).</li>
                                            <li>⏰ 09:30 – Встреча с гидом, аренда ханбока (традиционный костюм, выбор
                                                расцветок и аксессуаров).</li>
                                            <li>10:00–12:30 – Исторический маршрут в ханбоке:
                                                <ul>
                                                    <li>- Дворец Кёнбоккун – главный символ династии Чосон, смена
                                                        караула (фото у павильона Кёнхверу!).</li>
                                                    <li>- Деревня ханоков (Bukchon Hanok Village) – прогулка по узким
                                                        улочкам среди традиционных домов.</li>
                                                    <li>- Смотровая площадка с видом на «старый и новый» Сеул.</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="modal-active-item">👗 13:00 – Возвращение ханбока, переодевание.</li>
                                    <li class="modal-active-item">🍜 13:30 – Обед в ресторане с корейской кухней
                                        (включен: меню с блюдами эпохи Чосон).</li>
                                    <li class="modal-active-item">🏯 День: тайны ЮНЕСКО и атмосфера Инсадон
                                        <ul>
                                            <li>14:30 – Посещение дворца Чхандоккун (в списке ЮНЕСКО):
                                                <ul>
                                                    <li>- Тайный сад Хувон (билеты включены, сезонная зелень или
                                                        цветущие деревья).</li>
                                                    <li>- Легенды о королевских интригах.</li>
                                                </ul>
                                            </li>
                                            <li>16:00 – Район Инсадон:
                                                <ul>
                                                    <li>- Сувениры из ханди (традиционная бумага).</li>
                                                    <li>- Дегустация чхунъяндэ (леденцы с женьшенем) или тток (рисовые
                                                        пирожные).</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="modal-active-item">🚇 17:00 – Окончание программы у станции Jongno 3-ga
                                        (гид поможет с трансфером).</li>
                                    <li class="modal-active-item">🌙 Вечер: свободное время
                                        <ul>
                                            <li>- Ужин (не включен):
                                                <ul>
                                                    <li>Ресторан «Gogung» – блюда по рецептам дворцовой кухни.</li>
                                                    <li>Кафе «Sikmul» – современные десерты в ханоке.</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Что взять с собой:</h5>
                                    <ul>
                                        <li>✔️ Удобную обувь – ханбок красиво смотрится, но длинная юбка может мешать
                                            при ходьбе.</li>
                                        <li>✔️ Косметичку – для коррекции макияжа после переодевания.</li>
                                        <li>✔️ Наличные – в Инсадоне многие лавки не принимают карты.</li>
                                    </ul>

                                    <h5>Интересный факт:</h5>
                                    <ul>
                                        <li>- В ханбоке можно бесплатно войти во дворцы (экономия ~3 000 вон)!</li>
                                        <li>- Узоры на одежде раньше указывали на статус: например, пионы носили только
                                            королевы.</li>
                                    </ul>

                                    <p class="next-day">Завтра: путешествие в эпоху Силла – древний Кёнджу ждет нас! 🏯
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- День 5 -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="flush-heading5">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse5" aria-expanded="false" aria-controls="flush-collapse5">
                                <h3>День 5 (2 апреля) – Путешествие в эпоху Силла: древности и цветущая весна Кёнджу
                                </h3>
                            </button>
                        </h2>
                        <div id="flush-collapse5" class="accordion-collapse collapse" aria-labelledby="flush-heading5"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <h4>«Кёнджу — музей под открытым небом: от курганов до храмов»</h4>
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🚅 Утро: переезд в древнюю столицу
                                        <ul>
                                            <li>☀️ Завтрак в отеле (включен).</li>
                                            <li>⏰ 08:30 – Встреча с гидом, трансфер на вокзал.</li>
                                            <li>- Поезд в Кёнджу (путешествие займет ~ 2 часа, комфортные сидячие
                                                места).</li>
                                        </ul>
                                    </li>
                                    <li class="modal-active-item">🏛 День: погружение в историю государства Силла
                                        <ul>
                                            <li>12:00 – Обед с блюдами региона (включен: попробуйте хве – маринованную
                                                рыбу по-кёнджуски).</li>
                                            <li>13:00–17:00 – Экскурсия по главным достопримечательностям:
                                                <ul>
                                                    <li>- Гробницы в парке Туммули – загадочные курганы королей Силла.
                                                    </li>
                                                    <li>- Обсерватория Чхомсондэ – древнейшая в Восточной Азии
                                                        (построена в 647 году!).</li>
                                                    <li>- Храм Пульгукса (ЮНЕСКО) – шедевр буддийской архитектуры с
                                                        пагодами-реликвиями.</li>
                                                    <li>- Парк Экспо – смотровая площадка с видом на озеро Помун, музей
                                                        культуры Силла.</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="modal-active-item">19:00 – Ужин в ресторане с панорамным видом (включен:
                                        меню с сезонными продуктами).</li>
                                    <li class="modal-active-item">🏨 Заселение в отель в Кёнджу (например, K-Hotel).
                                    </li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Что взять с собой:</h5>
                                    <ul>
                                        <li>✔️ Зонт/дождевик – весной возможны кратковременные дожди.</li>
                                        <li>✔️ Крем от солнца – многие объекты находятся под открытым небом.</li>
                                        <li>✔️ Легкий шарф – в храмах рекомендуется скромная одежда.</li>
                                    </ul>

                                    <h5>Интересный факт:</h5>
                                    <ul>
                                        <li>- В Пульгукса хранится «Сокровище №24» – позолоченная статуя Будды VIII
                                            века.</li>
                                        <li>- Курганы Туммули не вскрывали 1500 лет – их исследуют с помощью томографии!
                                        </li>
                                    </ul>

                                    <p class="next-day">Завтра: морская романтика Пусана – цветные дома и фуникулеры над
                                        морем! 🌊</p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- День 6 -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="flush-heading6">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse6" aria-expanded="false" aria-controls="flush-collapse6">
                                <h3>День 6 (3 апреля) – Морская романтика Пусана: от цветных домов до морских просторов
                                </h3>
                            </button>
                        </h2>
                        <div id="flush-collapse6" class="accordion-collapse collapse" aria-labelledby="flush-heading6"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <h4>«Пусан: фуникулеры, морепродукты и атмосфера юга Кореи»</h4>
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🌅 Утро: переезд в город-порт
                                        <ul>
                                            <li>☀️ Завтрак в отеле (включен).</li>
                                            <li>⏰ 09:00 – Встреча с гидом, трансфер на вокзал.</li>
                                            <li>🚄 Поезд в Пусан (скоростной KTX, ~30 минут в пути).</li>
                                        </ul>
                                    </li>
                                    <li class="modal-active-item">🎨 День: культура, море и адреналин
                                        <ul>
                                            <li>10:40 – Культурная деревня Камчхон:
                                                <ul>
                                                    <li>- Разноцветные домики на склонах, стрит-арт и сцены из фильма
                                                        «Пусанский вальс».</li>
                                                    <li>- Фотостоп у «крыльев ангела» и винтажных кафе.</li>
                                                </ul>
                                            </li>
                                            <li>12:30 – Обед с пусанскими деликатесами (включен:
                                                <ul>
                                                    <li>- Хве (маринованная рыба) или мильмён (холодная лапша).</li>
                                                </ul>
                                            </li>
                                            <li>13:30 – Пляж Кванналли:
                                                <ul>
                                                    <li>- Прогулка по золотому песку, вид на мост Гванан».</li>
                                                    <li>- Кофе с видом на океан (рекомендуем кафе Waveon).</li>
                                                </ul>
                                            </li>
                                            <li>14:30–16:00 – Фуникулер над морем:
                                                <ul>
                                                    <li>- Подъем над морем до холмов Amnam Park.</li>
                                                    <li>- Маршрут вдоль скал Орюкдо (легенда о 5 островах).</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="modal-active-item">🚄 Вечер: возвращение в Сеул
                                        <ul>
                                            <li>16:00 – Трансфер на вокзал.</li>
                                            <li>🍽 17:00 – Ранний ужин (включен: пусанский ссаль-гвимэ (креветки на
                                                гриле)).</li>
                                            <li>🚆 18:00 – Поезд в Сеул.</li>
                                            <li>🏨 21:30 – Заселение в отель.</li>
                                        </ul>
                                    </li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Что взять с собой:</h5>
                                    <ul>
                                        <li>✔️ Ветровку – на фуникулере может быть прохладно.</li>
                                        <li>✔️ Powerbank – в Камчхоне слишком много фото-зон!</li>
                                    </ul>

                                    <h5>Интересный факт:</h5>
                                    <ul>
                                        <li>- Деревня Камчхон появилась благодаря беженцам после Корейской войны –
                                            теперь это арт-хаб.</li>
                                        <li>- Фуникулер Songdo Cloud Trails – первый в Корее (1913 г.), но полностью
                                            модернизированный!</li>
                                    </ul>

                                    <p class="next-day">Завтра: свободный день – выбирайте между шопингом и восхождением
                                        на Пукхансан! 🛍️⛰️</p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- День 7 -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="flush-heading7">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse7" aria-expanded="false" aria-controls="flush-collapse7">
                                <h3>День 7 (4 апреля) – Свободный день в Сеуле</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse7" class="accordion-collapse collapse" aria-labelledby="flush-heading7"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <h4>«Ваш Сеул: шопинг, релакс или восхождение на Пукхансан»</h4>
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🛍️ Основной вариант: день для себя
                                        <ul>
                                            <li>☀️ Завтрак в отеле (включен).</li>
                                        </ul>
                                    </li>
                                    <li class="modal-active-item">Рекомендации от гида (бесплатно):
                                        <ul>
                                            <li>- Шопинг:
                                                <ul>
                                                    <li>Мёндон – косметика, мода, уличная еда.</li>
                                                    <li>Донгдэмун – оптовые рынки (ночью!).</li>
                                                    <li>Инсадон – сувениры ручной работы.</li>
                                                </ul>
                                            </li>
                                            <li>- Релакс:
                                                <ul>
                                                    <li>SPA-центр Dragon Hill (джимчильбан + сауны).</li>
                                                    <li>Чхонгечхон – прогулка вдоль городского ручья.</li>
                                                </ul>
                                            </li>
                                            <li>- Культура:
                                                <ul>
                                                    <li>Музей оптических иллюзий (Trick Eye Museum).</li>
                                                    <li>Кванхвамун – смена караула (в 10:00/14:00).</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="modal-active-item">⛰️ Дополнительная программа: восхождение на Пукхансан
                                        <ul>
                                            <li>Стоимость: $70/чел (включено: гид, трансфер, обед).</li>
                                            <li>Программа:
                                                <ul>
                                                    <li>⏰ 08:00 – Встреча в лобби отеля.</li>
                                                    <li>🚌 Переезд к подножию горы (40 мин).</li>
                                                    <li>🥾 Поход (3–4 часа, маршрут Baegundae Peak – высшая точка Сеула,
                                                        836 м).</li>
                                                    <li>- Награда: панорама мегаполиса и гранитные скалы.</li>
                                                    <li>🍲 13:00 – Обед в горном ресторане (пряный суп чоноль или лапша
                                                        наэнмён).</li>
                                                    <li>🏨 15:00 – Возвращение в отель.</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Что учесть:</h5>
                                    <ul>
                                        <li>✔️ Для похода: трекинговые ботинки, ветровка, вода (1,5 л).</li>
                                        <li>✔️ Для шопинга: налог-фри чекы (возврат НДС в аэропорту).</li>
                                        <li>✔️ Транспорт: карта T-money (пополнять удобно в метро).</li>
                                    </ul>

                                    <h5>Фишка дня:</h5>
                                    <p>- В кафе «Seoulism» (район Сонгсу) можно сфотографироваться с неоновой надписью
                                        «Seoul» и видом на Lotte World Tower.</p>

                                    <p class="next-day">Завтра: финал путешествия – чайные церемонии и ночные огни
                                        Хангана! 🍵🌉</p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- День 8 -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="flush-heading8">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse8" aria-expanded="false" aria-controls="flush-collapse8">
                                <h3>День 8 (5 апреля) – Финал путешествия: от чайных традиций до огней Хангана</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse8" class="accordion-collapse collapse" aria-labelledby="flush-heading8"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <h4>«Прощание с Кореей: горы, ханок и ночная магия реки»</h4>
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🌿 Утро: гармония чая и истории
                                        <ul>
                                            <li>☀️ Завтрак в отеле (включен).</li>
                                            <li>⏰ 10:00 – Встреча с гидом.</li>
                                            <li>11:00 – Чайная церемония в традиционном ханоке:
                                                <ul>
                                                    <li>- Ритуал заваривания и философия «медленного времени».</li>
                                                </ul>
                                            </li>
                                            <li>12:30 – Обед (включен):
                                                <ul>
                                                    <li>- Пибимпап в глиняном горшочке или суп из корня лопуха
                                                        (детокс-меню).</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="modal-active-item">⛰️ День: легкий трекинг и капсула времени
                                        <ul>
                                            <li>13:30 – Прогулка к горе Ачхасан (290 м, низкая сложность):
                                                <ul>
                                                    <li>- Вид на деревню ханоков с капсулой времени (послания
                                                        потомкам!).</li>
                                                    <li>- Смотровые площадки.</li>
                                                </ul>
                                            </li>
                                            <li>16:00 – Свободное время в деревне.</li>
                                        </ul>
                                    </li>
                                    <li class="modal-active-item">🌉 Вечер: рамён и радуги на воде
                                        <ul>
                                            <li>17:00 – Переезд на набережную Ханган.</li>
                                            <li>18:00 – Ужин-пикник (включен):
                                                <ul>
                                                    <li>- Завариваем рамён у реки (как настоящие корейцы!).</li>
                                                    <li>- Добавляем кимчи и яйцо – секреты от гида.</li>
                                                </ul>
                                            </li>
                                            <li>19:00 – Прогулка на яхте:
                                                <ul>
                                                    <li>- Вид на Радужный мост (Banpo Bridge) и световое шоу фонтанов.
                                                    </li>
                                                    <li>- Фото с N Seoul Tower в огнях.</li>
                                                </ul>
                                            </li>
                                            <li>🚕 20:00 – Трансфер в отель.</li>
                                        </ul>
                                    </li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Что взять с собой:</h5>
                                    <ul>
                                        <li>✔️ Удобную обувь для горы (тропы каменистые).</li>
                                        <li>✔️ Теплую кофту – на реке вечером прохладно.</li>
                                        <li>✔️ Желание загадать желание у фонтана (местная примета!).</li>
                                    </ul>

                                    <h5>Фишка дня:</h5>
                                    <p>- Радужный фонтан Banpo – самый длинный в мире (1,140 м), работает под K-pop.</p>

                                    <p class="next-day">Завтра: возвращение домой с чемоданами впечатлений! ✈️</p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- День 9 -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="flush-heading9">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse9" aria-expanded="false" aria-controls="flush-collapse9">
                                <h3>День 9 (6 апреля) – Возвращение домой</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse9" class="accordion-collapse collapse" aria-labelledby="flush-heading9"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <h4>«До новых встреч, Корея!»</h4>
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">✈️ Отъезд
                                        <ul>
                                            <li>☀️ Завтрак в отеле (в зависимости от времени вылета).</li>
                                            <li>📌 Индивидуальные трансферы в аэропорт Инчхон (время уточняется в
                                                организационном чате).</li>
                                        </ul>
                                    </li>
                                    <li class="modal-active-item">Перед вылетом:
                                        <ul>
                                            <li>✔️ Возврат tax-free (если покупали товары с налоговым чеком).</li>
                                            <li>✔️ Регистрация на рейс – рекомендуем прибыть за 3 часа.</li>
                                            <li>✔️ Последний шанс купить корейские снэки в дьюти-фри (попробуйте медовые
                                                козинаки «Яква» или печенье «Choco Pie»).</li>
                                        </ul>
                                    </li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Что проверить перед выездом:</h5>
                                    <ol>
                                        <li>Документы: паспорт, посадочный талон, миграционная карта (ее заберут на
                                            паспортном контроле).</li>
                                        <li>Сувениры: косметика, чай, фотографии в ханбоке – ничего не забыли?</li>
                                        <li>Батарейки в чемодане: power bank можно перевозить только в ручной клади.
                                        </li>
                                    </ol>

                                    <p class="next-day">Спасибо за путешествие с нами! До новых встреч в Корее! 🇰🇷❤️
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>
                </div>
                <!-- Продолжение дня 3 и остальных дней -->
            </ul>
            <!-- Блоки с особенностями дня, рекомендациями и т.д. -->
        </div>
        </div>
        </li>

        <!-- Остальные дни (4-9) оформляются аналогично -->


        </ul>
        </div>
    </section>
    <section class="order">
        <div class="container order__container">
            <div class="order__contant">
                <div class="tour__page__pricePart">
                    <p class="tour__page__price">Стоимость: 2960 долларов<br> Группа 6-9 человек </p>
                    <p class="tour__page__priceIn">В стоимость входят: 2-местное проживание в отеле в Сеуле и Кёнджу,
                        завтраки, обеды и ужины согласно программе,
                        сопровождение местного гида, сопровождение инструктора по скандинавской ходьбе, общий трансфер
                        из и в аэропорт, безлимитная транспортная карта на 7 дней, проезд на поезде в Кёнджу и Пусан,
                        все входные блеты на достопримечательности, посещение медицинского центра в 3-й день.

                    </p>
                    <p class="tour__page__priceOff">В стоимость НЕ входят:
                        авиаперелет до Сеула, питание не входящее в программу, расходы в 7-й свободный день, страховка
                        путешественника, электронная виза в Корею (с оформлением будет оказана помощь).

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
    <script>
        $(function () {
            $('.minimized').click(function (event) {
                var i_path = $(this).attr('src');
                $('body').append('<div id="overlay"></div><div id="magnify"><img src="' + i_path + '"><div id="close-popup"><i></i></div></div>');
                $('#magnify').css({
                    left: ($(document).width() - $('#magnify').outerWidth()) / 2,
                    // top: ($(document).height() - $('#magnify').outerHeight())/2 upd: 24.10.2016
                    top: ($(window).height() - $('#magnify').outerHeight()) / 2
                });
                $('#overlay, #magnify').fadeIn('fast');
            });

            $('body').on('click', '#close-popup, #overlay', function (event) {
                event.preventDefault();
                $('#overlay, #magnify').fadeOut('fast', function () {
                    $('#close-popup, #magnify, #overlay').remove();
                });
            });
        });
    </script>

    <footer class="footer"></footer>




    <div onclick="location.href='#'" id="openModal" class="mod">
        <div onclick="event.stopPropagation()" class="modal-d">
            <div class="modal-c">
                <div class="modal-h">
                    <h3 class="modal-title">Заполните анкету путешественника</h3>
                    <button class="modal-form-btn btn-auto" id="btnAuto">Автозаполнение</button>
                    <a href="#close" title="Close" class="close">×</a>
                </div>
                <div class="modal-b">
                    <form action="/php/tour/sendTour.php?name=Корея" method="POST" class="modal__form">

                        Фамилия, имя и отчество:
                        <input type="text" id="fio" name="fio" value="" required>

                        Дата рождения:
                        <input type="text" id="age" name="age" placeholder="Дата рождения 31.12.2000" required>
                        Ваш телефон:
                        <input type="tel" id="tel" name="tel" placeholder="Ваш ответ" required>
                        Город в котором вы проживаете:
                        <input type="text" id="city" name="city" placeholder="Ваш ответ" required>
                        Ваш email:
                        <input type="email" name="email" placeholder="Email" id="email">
                        Ваш рост:
                        <input type="text" id="rost" name="rost" placeholder="Ваш ответ" required>
                        Ваш вес (на некоторых маршрутах лишиний вес является
                        противопоказанием):
                        <input type="text" id="ves" name="ves" placeholder="Ваш ответ" required>
                        Стаж занятия Скандинавской ходьбой:
                        <input type="text" id="staj" name="staj" placeholder="Ваш ответ" required>
                        Занимаетесь ли Вы активно физическими нагрузками? Какими?
                        <input type="text" id="fizNagr" name="fizNagr" placeholder="Ваш ответ" required>
                        Есть ли сердечно-сосудистные заболевания?
                        <input type="text" id="zabolevania" name="zabolevaniya" placeholder="Ваш ответ" required>
                        Бывает ли повышенное или пониженное давление? Какое именно?
                        <input type="text" id="davlenie" name="davlenie" placeholder="Ваш ответ" required>
                        Хронические заболевания? Аллергия?
                        <input type="text" id="chrono" name="chrono" placeholder="Ваш ответ" required>
                        Заболевания опорно-двигательного аппарата?
                        <input type="text" id="opora" name="opora" placeholder="Ваш ответ" required>
                        На какие расстояния ходите?
                        <input type="text" id="perenosimost" name="perenosimost" placeholder="Ваш ответ" required>
                        Как переносите сложные маршруты со спусками и подъемами?
                        <input type="text" id="level" name="level" placeholder="Ваш ответ" required>
                        Готовы ли проходить в среднем 15 - 20 км?
                        <input type="text" id="prohod" name="prohod" placeholder="Ваш ответ" required>
                        Как переносите нагрузки на горных маршрутах?
                        <input type="text" id="perenosimostGori" name="perenosimostGori" placeholder="Ваш ответ"
                            required>
                        Вам подходят только равнинные маршруты?
                        <input type="text" id="ravn" name="ravn" placeholder="Ваш ответ" required>
                        Коментарий, промокод (необязательное поле)
                        <input type="text" id="comment" name="comment" placeholder="Ваш ответ">
                        <ul class="modal-form-submit">
                            <li class="modal-form-item">
                                <p class="modal-form-sumit-text">Подтвердите что вы ознакомились с <a
                                        class="modal-form-dogovor" href="/files/Договор.pdf" download>договором</a>
                                </p>
                                <input class="modal-form-checkbox" name="dogovor" type="checkbox" required
                                    oninvalid="this.setCustomValidity('Подтвердите если ознакомились с договором!')"
                                    oninput="setCustomValidity('')">
                            </li>
                            <li class="modal-form-item">
                                <p class="modal-form-sumit-text">Подтвердите что вы ознакомились с <a
                                        class="modal-form-dogovor" href="/files/Правила.docx" download>правилами</a>
                                </p>
                                <input class="modal-form-checkbox" name="dogovor" type="checkbox" required
                                    oninvalid="this.setCustomValidity('Подтвердите если ознакомились с правилами!')"
                                    oninput="setCustomValidity('')">
                            </li>
                            <li class="modal-form-item">
                                <p class="modal-form-sumit-text">Подтвердите <a class="modal-form-dogovor"
                                        href="/files/Cогласие на обработку персональных данных.docx" download>согласие
                                        на
                                        обработку персональных данных</a></p>
                                <input class="modal-form-checkbox" name="dogovor" type="checkbox" required
                                    oninvalid="this.setCustomValidity('Подтвердите если дали согласие!')"
                                    oninput="setCustomValidity('')">
                            </li>




                            <input type="submit" id="btn" value="Отправить" class="modal-form-btn">
                        </ul>
                        <a href="#close" class="btn btn-secondary form-btn close" title="Close">Закрыть</a>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="../modal/zoom.js"></script>
    <script src="../modal/bootstrap.bundle.js"></script>
    <script src="../modal/Burger.js"></script>
    <script defer src="../modal/modal.js"></script>

</body>

</html>