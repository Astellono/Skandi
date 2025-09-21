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
        content="Тур по Узбекистану для активных путешественников: Фергана, Ташкент, Самарканд, озеро Айдаркуль, Бухара">
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
    <title>Тур по Узбекистану</title>
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
                    <img class="tour__page__img" src="../img/act-tour/uz.jpg" alt="Узбекистан">
                    <div class="tour__page__titleBox">
                        <h1 class="tour__page__title">
                            Оазисы Востока: тур по Узбекистану для активных путешественников
                        </h1>
                        <h2 class="tour__page__date">Даты: 3 – 10 мая 2026 года (8 дней /7 ночей)</h2>
                    </div>

                </div>


            </div>
            <div class="tour__page__infoBlock">


                <p class="tour__page__desc">
                    Откройте для себя волшебный Узбекистан в идеальном ритме — ритме скандинавской ходьбы! Это уникальное путешествие сочетает насыщенную экскурсионную программу по главным жемчужинам Великого Шёлкового пути с ежедневной активностью на свежем воздухе.
                    <br><br>
                    Нас ждут утренние зарядки с инструктором, пешеходные экскурсии по древним городам и незабываемая ночь в юртах на берегу бирюзового озера Айдаркуль. Мы погрузимся в атмосферу восточных легенд, полюбуемся высокими минаретами и грандиозными медресе, почувствуем неповторимый колорит восточных базаров и оценим знаменитое узбекское гостеприимство.
                    <br><br>
                    Этот тур — идеальный способ не только увидеть сокровища Узбекистана, но и прочувствовать их всей душой, оставаясь в тонусе и наслаждаясь движением.
                </p>
                <hr>
                <div class="tour__page__bottom">

                    <div class="tour__page__gid">

                        <h2 class="tour__page__gid__title">Сопровождающие:</h2>
                        <ul class="tour__page__gid__list">
                            <li class="tour__page__gid__item">
                                <img class="tour__page__gid__img" src="/img/partner/Razakov.png" alt="Хуршид Разаков">
                                <h3 class="tour__page__gid__title-member">Хуршид Разаков</h3>
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
                        <img src="/img/rate/2.svg" alt="Сложность 2 из 5" srcset="">

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
                                <h3>День 1 (3 мая) – Добро пожаловать в солнечную Фергану!</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse1" class="accordion-collapse collapse" aria-labelledby="flush-heading1"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <h4>«Знакомство с Узбекистаном»</h4>
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">✈️ Прилет в Фергану в 15:00. Встреча в аэропорту с гидом.</li>
                                    <li class="modal-active-item">🚗 Трансфер и заселение в отель «Grand Fergana» (или аналогичный).</li>
                                    <li class="modal-active-item">🚶 Первая прогулка с палками: легкая ознакомительная прогулка по уютным улицам Ферганы.</li>
                                    <li class="modal-active-item">🍽️ Знакомство с группой и приветственный ужин в национальном ресторане с узбекской кухней.</li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Особенности дня:</h5>
                                    <ul>
                                        <li>✔️ Разминка после перелета и настройка на путешествие</li>
                                        <li>✔️ Первое знакомство с узбекской кухней</li>
                                        <li>✔️ Адаптация к местному климату и времени</li>
                                    </ul>

                                    <h5>Питание и ночевка:</h5>
                                    <ul>
                                        <li>🍽️ Питание: ужин</li>
                                        <li>🏨 Ночевка: отель в Фергане (Grand Fergana или аналогичный)</li>
                                    </ul>

                                    <p class="next-day">Завтра: знакомство с шелковым сердцем Ферганской долины! 🧵</p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- День 2 -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="flush-heading2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse2" aria-expanded="false" aria-controls="flush-collapse2">
                                <h3>День 2 (4 мая) – Шёлковое сердце Ферганской долины</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse2" class="accordion-collapse collapse" aria-labelledby="flush-heading2"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <h4>«Традиции и ремесла»</h4>
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🌅 Утренняя зарядка: бодрящая сессия скандинавской ходьбы с инструктором в парке.</li>
                                    <li class="modal-active-item">🍳 Завтрак в отеле.</li>
                                    <li class="modal-active-item">🚗 Переезд в древний город Маргилан.</li>
                                    <li class="modal-active-item">🏛️ Экскурсия: посещение медресе Саид Ахмад-ходжи, фабрики шёлка «Едгорлик», где рождается знаменитый узбекский икат, и колоритного местного базара.</li>
                                    <li class="modal-active-item">🍜 Обед в ресторане Маргилана или Ферганы.</li>
                                    <li class="modal-active-item">🍷 Свободное время. За дополнительную плату: дегустация уникальных местных вин (айвовое, гранатовое) на винзаводе.</li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Особенности дня:</h5>
                                    <ul>
                                        <li>✔️ Знакомство с традиционным шелковым производством</li>
                                        <li>✔️ Погружение в атмосферу восточного базара</li>
                                        <li>✔️ Практика скандинавской ходьбы в живописной местности</li>
                                    </ul>

                                    <h5>Питание и ночевка:</h5>
                                    <ul>
                                        <li>🍽️ Питание: завтрак, обед</li>
                                        <li>🏨 Ночевка: отель в Фергане</li>
                                    </ul>

                                    <p class="next-day">Завтра: города мастеров и переезд в столицу! 🚂</p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- День 3 -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="flush-heading3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse3" aria-expanded="false" aria-controls="flush-collapse3">
                                <h3>День 3 (5 мая) – Города мастеров и переезд в столицу</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse3" class="accordion-collapse collapse" aria-labelledby="flush-heading3"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <h4>«Ремесла и архитектура»</h4>
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🌅 Утренняя зарядка: прогулка с палками по окрестностям отеля.</li>
                                    <li class="modal-active-item">🍳 Завтрак в отеле.</li>
                                    <li class="modal-active-item">🚗 Переезд в Риштан — город гончаров.</li>
                                    <li class="modal-active-item">🏺 Посещение мастерской знаменитого керамиста Рустама Усманова.</li>
                                    <li class="modal-active-item">🏰 Переезд в Коканд. Экскурсия по дворцу Худояр-хана и мечети Джами.</li>
                                    <li class="modal-active-item">🍜 Обед в ресторане Коканда.</li>
                                    <li class="modal-active-item">🚂 Трансфер на железнодорожный вокзал. Переезд в Ташкент на комфортабельном поезде.</li>
                                    <li class="modal-active-item">🏨 Прибытие в Ташкент, встреча на вокзале и трансфер в отель «Reikartz Xon» (или аналогичный).</li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Особенности дня:</h5>
                                    <ul>
                                        <li>✔️ Знакомство с традиционными ремеслами Узбекистана</li>
                                        <li>✔️ Посещение исторических памятников архитектуры</li>
                                        <li>✔️ Комфортный переезд на поезде</li>
                                    </ul>

                                    <h5>Питание и ночевка:</h5>
                                    <ul>
                                        <li>🍽️ Питание: завтрак, обед</li>
                                        <li>🏨 Ночевка: отель в Ташкенте (Reikartz Xon или аналогичный)</li>
                                    </ul>

                                    <p class="next-day">Завтра: величественный Самарканд! 🏛️</p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- День 4 -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="flush-heading4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse4" aria-expanded="false" aria-controls="flush-collapse4">
                                <h3>День 4 (6 мая) – Сквозь века: величественный Самарканд</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse4" class="accordion-collapse collapse" aria-labelledby="flush-heading4"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <h4>«Жемчужина Востока»</h4>
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🍳 Завтрак в отеле.</li>
                                    <li class="modal-active-item">🚂 Трансфер на вокзал и переезд в Самарканд на скоростном поезде «Афросиаб».</li>
                                    <li class="modal-active-item">🚶 Начало пешеходной экскурсии: нас ждет целый день открытий в жемчужине Востока!</li>
                                    <li class="modal-active-item">🏛️ Посещение легендарной площади Регистан, мавзолея Гур-Эмир (усыпальница Тамерлана), грандиозной мечети Биби-Ханум.</li>
                                    <li class="modal-active-item">🍜 Обед в ресторане города.</li>
                                    <li class="modal-active-item">🏺 Продолжение экскурсии: погружение в историю в некрополе Шахи-Зинда и знакомство с местными вкусностями на базаре Сиаб.</li>
                                    <li class="modal-active-item">🏨 Заселение в отель «Mevlana» (или аналогичный).</li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Особенности дня:</h5>
                                    <ul>
                                        <li>✔️ Знакомство с архитектурными шедеврами Самарканда</li>
                                        <li>✔️ Погружение в богатую историю региона</li>
                                        <li>✔️ Знакомство с местной кухней на традиционном базаре</li>
                                    </ul>

                                    <h5>Питание и ночевка:</h5>
                                    <ul>
                                        <li>🍽️ Питание: завтрак, обед</li>
                                        <li>🏨 Ночевка: отель в Самарканде (Mevlana или аналогичный)</li>
                                    </ul>

                                    <p class="next-day">Завтра: ночь в юртах на озере Айдаркуль! ⛺</p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- День 5 -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="flush-heading5">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse5" aria-expanded="false" aria-controls="flush-collapse5">
                                <h3>День 5 (7 мая) – От древностей к приключениям: ночь в юртах на Айдаркуле</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse5" class="accordion-collapse collapse" aria-labelledby="flush-heading5"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <h4>«Природа и традиции»</h4>
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🌅 Утренняя зарядка: прогулка с палками у памятников Самарканда.</li>
                                    <li class="modal-active-item">🍳 Завтрак в отеле.</li>
                                    <li class="modal-active-item">🚗 Выселение из отеля и выезд в сторону озера Айдаркуль.</li>
                                    <li class="modal-active-item">🏰 По пути — остановка у древней крепости времен Александра Македонского и святого источника.</li>
                                    <li class="modal-active-item">⛺ Прибытие в юртовый лагерь на берегу озера. Размещение в традиционных юртах.</li>
                                    <li class="modal-active-item">🍜 Обед в юрте или национальном доме.</li>
                                    <li class="modal-active-item">🚶 Свободное время для активностей: самостоятельные прогулки с палками по побережью, фотографирование на закате.</li>
                                    <li class="modal-active-item">🔥 Ужин-пикник у костра под настоящие народные песни акына.</li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Особенности дня:</h5>
                                    <ul>
                                        <li>✔️ Уникальный опыт ночевки в традиционных юртах</li>
                                        <li>✔️ Знакомство с природными красотами Узбекистана</li>
                                        <li>✔️ Аутентичные культурные впечатления</li>
                                    </ul>

                                    <h5>Питание и ночевка:</h5>
                                    <ul>
                                        <li>🍽️ Питание: завтрак, обед, ужин</li>
                                        <li>⛺ Ночевка: в юртах на берегу озера Айдаркуль</li>
                                    </ul>

                                    <p class="next-day">Завтра: бирюзовые воды Айдаркуля и дорога в Бухару! 💧</p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- День 6 -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="flush-heading6">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse6" aria-expanded="false" aria-controls="flush-collapse6">
                                <h3>День 6 (8 мая) – Бирюзовые воды Айдаркуля и дорога в сказочную Бухару</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse6" class="accordion-collapse collapse" aria-labelledby="flush-heading6"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <h4>«Отдых и путешествие»</h4>
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🍳 Завтрак на свежем воздухе.</li>
                                    <li class="modal-active-item">🚶 Утренняя прогулка с палками: наслаждаемся чистейшим воздухом и невероятными пейзажами озера.</li>
                                    <li class="modal-active-item">🏊 Свободное время: можно искупаться (в мае вода может быть прохладной) или просто отдохнуть на берегу.</li>
                                    <li class="modal-active-item">🍜 После обеда — переезд в Бухару.</li>
                                    <li class="modal-active-item">🏨 Прибытие, заселение в отель «Bibi Khanim» (или аналогичный).</li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Особенности дня:</h5>
                                    <ul>
                                        <li>✔️ Отдых на природе в уникальном месте</li>
                                        <li>✔️ Возможность насладиться природными красотами Узбекистана</li>
                                        <li>✔️ Переезд в один из самых знаменитых городов страны</li>
                                    </ul>

                                    <h5>Питание и ночевка:</h5>
                                    <ul>
                                        <li>🍽️ П питание: завтрак, обед</li>
                                        <li>🏨 Ночевка: отель в Бухаре (Bibi Khanim или аналогичный)</li>
                                    </ul>

                                    <p class="next-day">Завтра: пешее погружение в священную Бухару! 🕌</p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- День 7 -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="flush-heading7">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse7" aria-expanded="false" aria-controls="flush-collapse7">
                                <h3>День 7 (9 мая) – Пешее погружение в священную Бухару</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse7" class="accordion-collapse collapse" aria-labelledby="flush-heading7"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <h4>«Город-музей»</h4>
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🌅 Утренняя зарядка: легкая разминка с палками в историческом центре Бухары.</li>
                                    <li class="modal-active-item">🍳 Завтрак в отеле.</li>
                                    <li class="modal-active-item">🚶 Целый день пеших экскурсий: Бухара — город-музей под открытым небом.</li>
                                    <li class="modal-active-item">🏛️ Мы увидим: ансамбль Пои-Калян (минарет Калян, мечеть Калян, медресе Мири-Араб).</li>
                                    <li class="modal-active-item">📚 Медресе Улугбека и Абдулазиз-хана.</li>
                                    <li class="modal-active-item">💧 Ансамбль Ляби-Хауз — сердце старого города.</li>
                                    <li class="modal-active-item">🏰 Торговые купола и цитадель Арк.</li>
                                    <li class="modal-active-item">⚰️ Мавзолей Саманидов — шедевр архитектуры.</li>
                                    <li class="modal-active-item">🍜 Обед в ресторане города.</li>
                                    <li class="modal-active-item">🍽️ Прощальный ужин в ресторане города (по рекомендации гида).</li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Особенности дня:</h5>
                                    <ul>
                                        <li>✔️ Полное погружение в историю и архитектуру Бухары</li>
                                        <li>✔️ Пешие экскурсии по городу-музею под открытым небом</li>
                                        <li>✔️ Прощальный ужин в кругу группы</li>
                                    </ul>

                                    <h5>Питание и ночевка:</h5>
                                    <ul>
                                        <li>🍽️ Питание: завтрак, обед, ужин</li>
                                        <li>🏨 Ночевка: отель в Бухаре</li>
                                    </ul>

                                    <p class="next-day">Завтра: возвращение домой с сокровищами воспоминаний! ✈️</p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- День 8 -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="flush-heading8">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse8" aria-expanded="false" aria-controls="flush-collapse8">
                                <h3>День 8 (10 мая) – Возвращение домой с сокровищами воспоминаний</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse8" class="accordion-collapse collapse" aria-labelledby="flush-heading8"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <h4>«До новых встреч, Узбекистан!»</h4>
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🚗 Трансфер в аэропорт Бухары для вылета в Москву.</li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Особенности дня:</h5>
                                    <ul>
                                        <li>✔️ Торжественное завершение путешествия</li>
                                        <li>✔️ Время прощания с новой командой друзей</li>
                                        <li>✔️ Багаж незабываемых впечатлений</li>
                                    </ul>

                                    <h5>Питание:</h5>
                                    <ul>
                                        <li>🍽️ Питание: зависит от времени вылета</li>
                                    </ul>

                                    <p class="next-day">Спасибо за путешествие по Узбекистану! До новых встреч на Шелковом пути! 🇺🇿❤️</p>
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
                    <p class="tour__page__price">Стоимость: 1410 долларов<br> Группа 6 – 10 человек </p>
                    <p class="tour__page__priceIn">В стоимость входит: проживание в отелях 3* (7 ночей) и юртах (1 ночь) двухместное, питание: завтраки + 6 обедов + 2 ужина, весь трансфер по маршруту на комфортабельном транспорте, ж/д билеты (Фергана-Ташкент, Ташкент-Самарканд), экскурсии с русскоязычным гидом по программе, входные билеты в памятники, услуги инструктора по скандинавской ходьбе.</p>
                    <p class="tour__page__priceOff">Не входит в стоимость: международные авиабилеты, доплата за одноместное размещение 150 долларов, страховка, дополнительные питание (ужины), личные расходы.</p>
                    <p class="tour__page__notice">** ВНИМАНИЕ! Программа может меняться в зависимости от погодных условий<br>
                        *** Организационная информация по вылетам будет в оргчате</p>
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

    <?php formTour('Узбекистан'); ?>
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