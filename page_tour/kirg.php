<?php
session_start();
require_once '../phpLogin/connect.php'; // Подключение к базе данных
require_once '../getDATA/getAncetaData.php';
require_once '../getDATA/getUserData.php';
require_once '../parts/formTour.php';
require_once '../getDATA/tourPageData.php';

$currentPagePath = 'page_tour/' . basename(__FILE__);
$tourData = getTourPageData($connect, $currentPagePath, [
    'name' => 'Трекинговый тур «Южный Кыргызстан: От священных гор к ледникам Памира»',
    'date' => '6 – 15 августа 2026г. (10 дней /9 ночей)',
    'price' => '1435 долларов'
]);
$dateText = $tourData['date']
    ? 'Даты: ' . htmlspecialchars($tourData['date'], ENT_QUOTES, 'UTF-8')
    : 'Даты: 6 – 15 августа 2026г. (10 дней /9 ночей)';
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
    <title><?php echo htmlspecialchars($tourData['name'] ?? 'Туры', ENT_QUOTES, 'UTF-8'); ?></title>
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
                    <img class="tour__page__img" src="../img/act-tour/kirg.jpg" alt="Южный Кыргызстан">
                    <div class="tour__page__titleBox">
                        <h1 class="tour__page__title">
                            <?php echo htmlspecialchars($tourData['name'] ?? 'Трекинговый тур «Южный Кыргызстан: От священных гор к ледникам Памира»', ENT_QUOTES, 'UTF-8'); ?>
                        </h1>
                        <h2 class="tour__page__date"><?php echo $dateText; ?></h2>
                    </div>

                </div>


            </div>
            <div class="tour__page__infoBlock">


                <p class="tour__page__desc">

                    Этот тур создан специально для ценителей пешего туризма и активных путешественников, практикующих
                    скандинавскую ходьбу. Мы предлагаем уникальное сочетание глубокого погружения в культуру и историю
                    Южного Кыргызстана и настоящего горного приключения в сердце Памира.
                    <br><br>
                    Вы начнете свое путешествие с древнего города Ош, познакомитесь с колоритом восточных базаров и
                    совершите первое восхождение на священную гору Сулейман-Тоо. Далее вас ждет погружение в нетронутый
                    быт традиционных киргизских сел, где время, кажется, остановилось.
                    <br><br>
                    Кульминацией тура станет трекинг к подножию легендарного пика Ленина (7134 м). Вы пройдете по одному
                    из самых живописных высокогорных маршрутов мира, испытаете свои силы на высотах более 5000 метров и
                    насладитесь видами, которые доступны лишь самым упорным путешественникам. Вашими верными спутниками
                    на этом пути станут трекинговые палки, которые помогут с легкостью преодолевать и горные тропы, и
                    ледниковые морены.
                    <br><br>
                    Это путешествие для тех, кто ищет не просто отдых, а настоящее преодоление и единение с природой.
                    Обязательно в программе наши зарядки и упражнения для растяжки после походов.

                </p>
                <hr>
                <div class="tour__page__bottom">

                    <div class="tour__page__gid">

                        <h2 class="tour__page__gid__title">Сопровождающие:</h2>
                        <ul class="tour__page__gid__list">
                            <li class="tour__page__gid__item">
                                <img class="tour__page__gid__img" src="/img/partner/Azamat.png" alt="Азамат Курманалиев">
                                <h3 class="tour__page__gid__title-member">Курманалиев Азамат</h3>
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
                        <img src="/img/rate/5.svg" alt="Сложность 5 из 5" srcset="">

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
                                <h3>День 1 (6 августа) – Добро пожаловать в Ош – сердце Великого Шелкового пути</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse1" class="accordion-collapse collapse" aria-labelledby="flush-heading1"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <h4>«Знакомство с древним городом»</h4>
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">✈️ Прибытие в город Ош (900 м). Встреча с гидом и
                                        водителем.</li>
                                    <li class="modal-active-item">🏨 Размещение в отеле и короткий отдых.</li>
                                    <li class="modal-active-item">🛍️ Знакомство с атмосферой восточного базара.</li>
                                    <li class="modal-active-item">⛰️ Подъем на священную гору Сулейман-Тоо (объект
                                        Всемирного наследия ЮНЕСКО).</li>
                                    <li class="modal-active-item">🌄 Панорамный вид на весь город со смотровой площадки.
                                    </li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Особенности дня:</h5>
                                    <ul>
                                        <li>✔️ Отличная разминка перед предстоящими треками</li>
                                        <li>✔️ Знакомство с одним из древнейших городов Центральной Азии</li>
                                        <li>✔️ Адаптация к местному климату и времени</li>
                                    </ul>

                                    <h5>Питание и ночевка:</h5>
                                    <ul>
                                        <li>🍽️ Питание: зависит от времени прибытия</li>
                                        <li>🏨 Ночевка: отель в Оше</li>
                                    </ul>

                                    <p class="next-day">Завтра: погружение в аутентичный быт киргизских сел! 🏔️</p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- День 2 -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="flush-heading2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse2" aria-expanded="false" aria-controls="flush-collapse2">
                                <h3>День 2 (7 августа) – Погружение в аутентичный быт. Село Кожо-Келен</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse2" class="accordion-collapse collapse" aria-labelledby="flush-heading2"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <h4>«Традиционная киргизская деревня»</h4>
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🍳 После завтрака – переезд в живописное село
                                        Кожо-Келен (95 км, 2300 м)</li>
                                    <li class="modal-active-item">🍜 Обед в селе</li>
                                    <li class="modal-active-item">🕋 Посещение Святого Грота – места паломничества и
                                        силы</li>
                                    <li class="modal-active-item">🚶 Пешая прогулка по деревне с знакомством с укладом
                                        жизни</li>
                                    <li class="modal-active-item">🏠 Традиционные дома из красной глины, водяные
                                        мельницы</li>
                                    <li class="modal-active-item">🥾 Неспешная ходьба с палками по окрестным холмам</li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Особенности дня:</h5>
                                    <ul>
                                        <li>✔️ Идеальный день для адаптации к высоте</li>
                                        <li>✔️ Знакомство с традиционным бытом, не менявшимся веками</li>
                                        <li>✔️ Практика скандинавской ходьбы в живописной местности</li>
                                    </ul>

                                    <h5>Питание и ночевка:</h5>
                                    <ul>
                                        <li>🍽️ Питание: завтрак, обед, ужин</li>
                                        <li>🏠 Ночевка: в доме местных жителей</li>
                                    </ul>

                                    <p class="next-day">Завтра: зрелищный переезд по Памирскому тракту! 🛣️</p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- День 3 -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="flush-heading3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse3" aria-expanded="false" aria-controls="flush-collapse3">
                                <h3>День 3 (8 августа) – По Памирскому тракту к подножию великанов</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse3" class="accordion-collapse collapse" aria-labelledby="flush-heading3"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <h4>«Дорога в высокогорье»</h4>
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🍳 После завтрака – переезд по Памирскому тракту</li>
                                    <li class="modal-active-item">⏱️ Дорога займет 5-6 часов</li>
                                    <li class="modal-active-item">🏔️ Незабываемые виды на высокогорные долины и
                                        заснеженные хребты</li>
                                    <li class="modal-active-item">🏕️ Прибытие в Базовый лагерь (3600 м) у начала
                                        ледника</li>
                                    <li class="modal-active-item">🌬️ Настоящий горный воздух и подготовка к трекам</li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Особенности дня:</h5>
                                    <ul>
                                        <li>✔️ Один из самых зрелищных переездов в мире</li>
                                        <li>✔️ Постепенная акклиматизация к высоте</li>
                                        <li>✔️ Первое знакомство с высокогорной атмосферой</li>
                                    </ul>

                                    <h5>Питание и ночевка:</h5>
                                    <ul>
                                        <li>🍽️ Питание: завтрак, обед, ужин</li>
                                        <li>⛺ Ночевка: в палатках в Базовом лагере</li>
                                    </ul>

                                    <p class="next-day">Завтра: акклиматизация и прогулка к "Плечу Петровского"! ⛰️</p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- День 4 -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="flush-heading4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse4" aria-expanded="false" aria-controls="flush-collapse4">
                                <h3>День 4 (9 августа) – Акклиматизация и прогулка к «Плечу Петровского»</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse4" class="accordion-collapse collapse" aria-labelledby="flush-heading4"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <h4>«Адаптация к высоте»</h4>
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🍳 После сытного завтрака – акклиматизационная
                                        прогулка</li>
                                    <li class="modal-active-item">🥾 Выход к «Плечу пика Петровского» (4200 м)</li>
                                    <li class="modal-active-item">👣 Маршрут не технически сложен, но важен для
                                        подготовки организма</li>
                                    <li class="modal-active-item">🏞️ Потрясающие виды на долину и базовый лагерь</li>
                                    <li class="modal-active-item">🏔️ Скандинавские палки будут как никогда кстати</li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Особенности дня:</h5>
                                    <ul>
                                        <li>✔️ Ключевой день для успешной акклиматизации</li>
                                        <li>✔️ Постепенное увеличение высоты</li>
                                        <li>✔️ Великолепные возможности для фотосъемки</li>
                                    </ul>

                                    <h5>Питание и ночевка:</h5>
                                    <ul>
                                        <li>🍽️ Питание: завтрак, обед, ужин</li>
                                        <li>⛺ Ночевка: в палатках в Базовом лагере</li>
                                    </ul>

                                    <p class="next-day">Завтра: первое знакомство с ледником! ❄️</p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- День 5 -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="flush-heading5">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse5" aria-expanded="false" aria-controls="flush-collapse5">
                                <h3>День 5 (10 августа) – Первое знакомство с ледником. Перевал Путешественников</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse5" class="accordion-collapse collapse" aria-labelledby="flush-heading5"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <h4>«Ледниковые пейзажи»</h4>
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🥾 Радиальный выход к Перевалу Путешественников</li>
                                    <li class="modal-active-item">⏱️ Путь в одну сторону: 2-3 часа</li>
                                    <li class="modal-active-item">🏔️ Первый впечатляющий вид на гигантский ледник
                                        Ленина и пик Ленина (7134 м)</li>
                                    <li class="modal-active-item">📸 Фантастические возможности для фотографий</li>
                                    <li class="modal-active-item">🌄 Прочувствование масштаба Памирских гор</li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Особенности дня:</h5>
                                    <ul>
                                        <li>✔️ Первый близкий контакт с ледником</li>
                                        <li>✔️ Отличная акклиматизационная тренировка</li>
                                        <li>✔️ Незабываемые панорамные виды</li>
                                    </ul>

                                    <h5>Питание и ночевка:</h5>
                                    <ul>
                                        <li>🍽️ Питание: завтрак, обед, ужин</li>
                                        <li>⛺ Ночевка: в палатках в Базовом лагере</li>
                                    </ul>

                                    <p class="next-day">Завтра: начало настоящего горного приключения! 🚶♂️</p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- День 6 -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="flush-heading6">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse6" aria-expanded="false" aria-controls="flush-collapse6">
                                <h3>День 6 (11 августа) – Трекинг в Первый лагерь (4200 м)</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse6" class="accordion-collapse collapse" aria-labelledby="flush-heading6"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <h4>«Начало высокогорного приключения»</h4>
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🚶 Переход из Базового лагеря (3600 м) в Первый лагерь
                                        (4200 м)</li>
                                    <li class="modal-active-item">📏 Протяженность: около 12 км</li>
                                    <li class="modal-active-item">🏔️ Маршрут через Перевал Путешественников и осыпной
                                        гребень</li>
                                    <li class="modal-active-item">🎨 Невероятные виды разноцветных гор и ледника</li>
                                    <li class="modal-active-item">🐎 По желанию: основной груз можно отдать на лошадь
                                    </li>
                                    <li class="modal-active-item">👥 Встреча с командой поддержки в первом лагере</li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Особенности дня:</h5>
                                    <ul>
                                        <li>✔️ Первый серьезный переход на высоте</li>
                                        <li>✔️ Постепенное увеличение нагрузки</li>
                                        <li>✔️ Великолепные горные пейзажи</li>
                                    </ul>

                                    <h5>Питание и ночевка:</h5>
                                    <ul>
                                        <li>🍽️ Питание: завтрак, ланч-бокс, ужин</li>
                                        <li>⛺ Ночевка: в палатках в Первом лагере</li>
                                    </ul>

                                    <p class="next-day">Завтра: день главного испытания и триумфа! 💪</p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- День 7 -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="flush-heading7">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse7" aria-expanded="false" aria-controls="flush-collapse7">
                                <h3>День 7 (12 августа) – Восхождение на пик Юхина (5130 м)</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse7" class="accordion-collapse collapse" aria-labelledby="flush-heading7"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <h4>«Главное испытание»</h4>
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🥾 Восхождение на пик Юхина (5130 м)</li>
                                    <li class="modal-active-item">💪 Маршрут не требует альпинистской подготовки, но
                                        нужна хорошая физическая форма</li>
                                    <li class="modal-active-item">🥾 Главные помощники: треккинговые ботинки и палки
                                    </li>
                                    <li class="modal-active-item">🏆 Награда: чувство невероятного достижения</li>
                                    <li class="modal-active-item">🏔️ Панорама высочайших вершин Памира с вершины</li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Особенности дня:</h5>
                                    <ul>
                                        <li>✔️ Кульминация всего тура</li>
                                        <li>✔️ Проверка физической и моральной подготовки</li>
                                        <li>✔️ Незабываемые виды с высоты более 5000 метров</li>
                                    </ul>

                                    <h5>Питание и ночевка:</h5>
                                    <ul>
                                        <li>🍽️ Питание: завтрак, обед, ужин</li>
                                        <li>⛺ Ночевка: в палатках в Первом лагере</li>
                                    </ul>

                                    <p class="next-day">Завтра: спуск в Базовый лагерь и прощальный вечер в горах! 🔥
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- День 8 -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="flush-heading8">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse8" aria-expanded="false" aria-controls="flush-collapse8">
                                <h3>День 8 (13 августа) – Спуск в Базовый лагерь. Прощальный вечер в горах</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse8" class="accordion-collapse collapse" aria-labelledby="flush-heading8"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <h4>«Возвращение и празднование»</h4>
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🍳 После завтрака – спуск в Базовый лагерь (3600 м)
                                    </li>
                                    <li class="modal-active-item">👀 Новые ракурсы знакомых пейзажей</li>
                                    <li class="modal-active-item">🚿 Долгожданный душ по возвращении</li>
                                    <li class="modal-active-item">🍽️ Отдых и прощальный ужин в кругу команды</li>
                                    <li class="modal-active-item">🎉 Обмен впечатлениями с новыми друзьями</li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Особенности дня:</h5>
                                    <ul>
                                        <li>✔️ Отдых после восхождения</li>
                                        <li>✔️ Возможность еще раз насладиться горными пейзажами</li>
                                        <li>✔️ Торжественное завершение горной части путешествия</li>
                                    </ul>

                                    <h5>Питание и ночевка:</h5>
                                    <ul>
                                        <li>🍽️ Питание: завтрак, обед, ужин</li>
                                        <li>⛺ Ночевка: в палатках в Базовом лагере</li>
                                    </ul>

                                    <p class="next-day">Завтра: возвращение в цивилизацию! 🏙️</p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- День 9 -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="flush-heading9">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse9" aria-expanded="false" aria-controls="flush-collapse9">
                                <h3>День 9 (14 августа) – Возвращение в Ош</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse9" class="accordion-collapse collapse" aria-labelledby="flush-heading9"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <h4>«Дорога домой»</h4>
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🍳 После завтрака – прощание с горами Памира</li>
                                    <li class="modal-active-item">🚗 Обратный путь по Памирскому тракту в Ош (300 км,
                                        5-6 часов)</li>
                                    <li class="modal-active-item">🏨 Размещение в отеле</li>
                                    <li class="modal-active-item">🛍️ Свободное время для отдыха и покупки сувениров
                                    </li>
                                    <li class="modal-active-item">🤔 Осмысление пережитого приключения</li>
                                </ul>

                                <div class="tour-details">
                                    <h5>Особенности дня:</h5>
                                    <ul>
                                        <li>✔️ Возвращение к комфортным условиям</li>
                                        <li>✔️ Время для рефлексии и обмена впечатлениями</li>
                                        <li>✔️ Возможность купить традиционные сувениры</li>
                                    </ul>

                                    <h5>Питание и ночевка:</h5>
                                    <ul>
                                        <li>🍽️ Питание: завтрак, обед</li>
                                        <li>🏨 Ночевка: отель в Оше</li>
                                    </ul>

                                    <p class="next-day">Завтра: вылет домой с багажом ярких воспоминаний! ✈️</p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- День 10 -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="flush-heading10">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse10" aria-expanded="false"
                                aria-controls="flush-collapse10">
                                <h3>День 10 (15 августа) – Вылет из Оша</h3>
                            </button>
                        </h2>
                        <div id="flush-collapse10" class="accordion-collapse collapse" aria-labelledby="flush-heading10"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <h4>«До новых встреч, Кыргызстан!»</h4>
                                <ul class="modal-active-list">
                                    <li class="modal-active-item">🍳 Завтрак в отеле</li>
                                    <li class="modal-active-item">🚗 Трансфер в аэропорт</li>
                                    <li class="modal-active-item">✈️ Вылет домой с багажом ярких воспоминаний и
                                        фотографий</li>
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
                                        <li>🍽️ Питание: завтрак</li>
                                    </ul>

                                    <p class="next-day">Спасибо за путешествие по Кыргызстану! До новых встреч в горах!
                                        🇰🇬❤️</p>
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
                    <p class="tour__page__price">Стоимость: <?php echo htmlspecialchars($tourData['price'] ?? '1435 долларов', ENT_QUOTES, 'UTF-8'); ?><br> Группа 7 человек </p>
                    <p class="tour__page__priceIn">В стоимость входит: проживание в гостинице в Оше (2 ночи) с
                        завтраками, размещение в доме местных жителей в селе Кожо-Келен (1 ночь), размещение в
                        двухместных палатках в Базовом лагере и Первом лагере, полный пансион в течение активного тура,
                        все трансферы по программе, трансфер личного багажа, услуги русскоговорящего гида-инструктора,
                        услуги местных гидов и команды поддержки, все необходимые разрешения, групповое снаряжение,
                        сопровождение инструктора по скандинавской ходьбе.

                    </p>
                    <p class="tour__page__priceOff">Не входит в стоимость: авиаперелеты до Оша и обратно, медицинская
                        страховка, питание в День 1, ужин в День 9 в Оше, алкогольные напитки, доплата за одноместное
                        размещение, услуги портеров, аренда личного снаряжения, личные расходы, чаевые.

                    </p>
                    <p class="tour__page__notice">** ВНИМАНИЕ! Программа может меняться в зависимости от погодных
                        условий<br>
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

    <?php formTour('Киргизия'); ?>
    <script>
        <?php if ($_SESSION["user_id"] != '') { ?>
            let anceta = <?= json_encode($ancetaData); ?>[0];
            let fio = '<?= $user['user_familia'] . ' ' . $user['user_name'] . ' ' . $user['user_otch'] ?>';
            let email = '<?= $user['user_email'] ?>';
        <?php } ?>
    </script>
    <script src="../js/anceta.js"></script>


    <script src="../modal/zoom.js"></script>
    <script src="../modal/bootstrap.bundle.js"></script>



</body>

</html>