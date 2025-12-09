<?php
session_start();
require_once '../phpLogin/connect.php'; // Подключение к базе данных
require_once '../getDATA/getAncetaData.php';
require_once '../getDATA/getUserData.php';
require_once '../parts/formTour.php';
require_once '../getDATA/tourPageData.php';

$currentPagePath = 'page_tour/' . basename(__FILE__);
$tourData = getTourPageData($connect, $currentPagePath, [
    'name' => 'Тур: «Дыхание Казахстана: Алматинские горы и легенды Великой Степи»',
    'date' => '4 – 11 октября 2026г',
    'price' => '1405 долларов'
]);
$dateText = $tourData['date']
    ? 'Даты: ' . htmlspecialchars($tourData['date'], ENT_QUOTES, 'UTF-8')
    : 'Даты: 4 – 11 октября 2026г';

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
                    <img class="tour__page__img" src="../img/act-tour/kazah.jpeg" alt="Казахстан">
                    <div class="tour__page__titleBox">
                        <h1 class="tour__page__title">
                            <?php echo htmlspecialchars($tourData['name'] ?? 'Тур: «Дыхание Казахстана: Алматинские горы и легенды Великой Степи»', ENT_QUOTES, 'UTF-8'); ?>
                        </h1>
                        <h2 class="tour__page__date"><?php echo $dateText; ?></h2>
                    </div>

                </div>


            </div>
            <div class="tour__page__infoBlock">


                <p class="tour__page__desc">

                    Активный тур с элементами скандинавской ходьбы для тех, кто ищет силу природы и мудрость кочевников.
                    <br><br>
                    Это путешествие для тех, кто хочет не просто увидеть, а почувствовать Казахстан всем телом и душой. Мы совместим активность на свежем воздухе с погружением в культуру кочевников. Каждое утро нас будет будить зарядка с инструктором, а день наполнят пешие походы, во время которых гиды откроют вам секреты этих удивительных мест. Это тур для тех, кто ценит комфортную активность, живую природу и глубокие впечатления.
                    <br><br>
                    Мы посетим бирюзовое озеро Есик, поднимемся к Медвежьему водопаду, услышим загадочный гул Поющего бархана, увидим легендарное озеро Кайынды с затопленным лесом и восхитимся мощью Чарынского каньона.

                </p>
                <hr>
                <div class="tour__page__bottom">

                    <div class="tour__page__gid">

                        <h2 class="tour__page__gid__title">Сопровождающие:</h2>
                        <ul class="tour__page__gid__list">
                            <li class="tour__page__gid__item">
                                <img class="tour__page__gid__img" src="../img/team/Lider.png" alt="Маргарита Волосюк">
                                <h3 class="tour__page__gid__title-member">Маргарита Волосюк</h3>
                                <p class="tour__page__gid__desc">Организатор, инструктор по скандинавской ходьбе</p>
                            </li>
                        </ul>
                    </div>
                    <div class="tour__page__rate">
                        <h2 class="tour__page__rateTitle">Сложность маршрута</h2>
                        <img src="../img/rate/3.svg" alt="" srcset="">
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
                            <h3>День 1 (4 октября) - Знакомство с Южной столицей</h3>
                        </button>
                    </h2>
                    <div id="flush-collapse1" class="accordion-collapse collapse" aria-labelledby="flush-heading1"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Прибытие и комфорт: Встреча в аэропорту Алматы, трансфер и заселение в отель.</li>
                                <li class="modal-active-item">Первое свидание с городом: Насыщенная пешеходная экскурсия по историческому центру. Мы погуляем по знаменитому Парку 28 панфиловцев, восхитимся уникальной деревянной архитектурой Кафедрального собора и окунемся в яркую атмосферу Зелёного базара, где можно попробовать местные сладости и знаменитые казахские фрукты.</li>
                                <li class="modal-active-item">Погружение в культуру: Посетим Музей народных музыкальных инструментов, где оживают мелодии степи.</li>
                                <li class="modal-active-item">Вечер: Знакомство с казахской кухней начинается с Welcome-ужина в колоритном ресторане. Отличный повод выпить за новое путешествие! (оплачивается дополнительно)</li>
                                <li class="modal-active-item">Ночь в отеле в Алматы.</li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse2" aria-expanded="false" aria-controls="flush-collapse2">
                            <h3>День 2 (5 октября) - Легенды Заилийского Алатау: от кочевой жизни к бирюзовому озеру</h3>
                        </button>
                    </h2>
                    <div id="flush-collapse2" class="accordion-collapse collapse" aria-labelledby="flush-heading2"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Утро: Завтрак, сборы и переезд в село Гунов.</li>
                                <li class="modal-active-item">В гостях у кочевников: Посещение этно-туристического комплекса. Вы познакомитесь с бытом, традициями и гостеприимством казахского народа.</li>
                                <li class="modal-active-item">День: Переезд к жемчужине дня — бирюзовому озеру Есик, спрятавшемуся на высоте 1750 метров. Легкая прогулка вдоль берега и время для фотографий на фоне потрясающих пейзажей.</li>
                                <li class="modal-active-item">Вечер: Переезд в ущелье Тургень, размещение в оздоровительном комплексе «Ден Соалык». Ужин и отдых на свежем горном воздухе.</li>
                                <li class="modal-active-item">Активный компонент: Легкая разминка-прогулка у озера Есик.</li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse3" aria-expanded="false" aria-controls="flush-collapse3">
                            <h3>День 3 (6 октября) - Тургеньское ущелье и Медвежий водопад</h3>
                        </button>
                    </h2>
                    <div id="flush-collapse3" class="accordion-collapse collapse" aria-labelledby="flush-heading3"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Утро: Питательный завтрак и утренняя зарядка с инструктором на природе.</li>
                                <li class="modal-active-item">Главный хайлайт: Настоящий пеший поход к Медвежьему водопаду (около 2 часов в спокойном темпе). Шум падающей воды и мощь гор оставят незабываемые впечатления.</li>
                                <li class="modal-active-item">День: Переезд через перевал имени Кунаева в село Басши.</li>
                                <li class="modal-active-item">Вечер: Размещение в уютном гостевом доме, ужин и отдых в атмосфере горного селения.</li>
                                <li class="modal-active-item">Активный компонент: Пеший поход к водопаду (2 часа).</li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading4">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse4" aria-expanded="false" aria-controls="flush-collapse4">
                            <h3>День 4 (7 октября) - День чудес в национальном парке «Алтын-Эмель»</h3>
                        </button>
                    </h2>
                    <div id="flush-collapse4" class="accordion-collapse collapse" aria-labelledby="flush-heading4"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Утро: Ранний завтрак и выезд на целый день в нацпарк на внедорожниках.</li>
                                <li class="modal-active-item">Феномен «Поющего бархана»: Услышим загадочный гул песчаной дюны и поднимемся на нее для фантастических видов.</li>
                                <li class="modal-active-item">День: Экскурсия по разноцветным горам Катытау и Актау — древним кладбищам динозавров и памятникам палеонтологии. Среди этих инопланетных пейзажей нас ждет пикник на природе.</li>
                                <li class="modal-active-item">Вечер: Возвращение в гостевой дом в Басши, ужин.</li>
                                <li class="modal-active-item">Активный компонент: Подъем на Поющий бархан и прогулки среди гор.</li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading5">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse5" aria-expanded="false" aria-controls="flush-collapse5">
                            <h3>День 5 (8 октября) - В сердце Тянь-Шаня: переезд к Кольсайским озерам</h3>
                        </button>
                    </h2>
                    <div id="flush-collapse5" class="accordion-collapse collapse" aria-labelledby="flush-heading5"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Утро: Завтрак, зарядка и долгий, но невероятно живописный переезд в село Саты — врата к Кольсайским озерам.</li>
                                <li class="modal-active-item">День: Обед в придорожном кафе, фотоостановки в самых красивых местах.</li>
                                <li class="modal-active-item">Вечер: Прибытие в гостевой дом в селе Саты, ужин и отдых перед новыми открытиями.</li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading6">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse6" aria-expanded="false" aria-controls="flush-collapse6">
                            <h3>День 6 (9 октября) - Двуликий Кайынды и очарование Кольсая</h3>
                        </button>
                    </h2>
                    <div id="flush-collapse6" class="accordion-collapse collapse" aria-labelledby="flush-heading6"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Утро: Завтрак и выезд на легендарных «уазиках» к озеру Кайынды — знаменитому озеру с затопленным лесом.</li>
                                <li class="modal-active-item">День: Пешая прогулка к озеру (около 1 часа). Возвращение в гостевой дом на обед и небольшой отдых.</li>
                                <li class="modal-active-item">Вечер: Поездка к первому из озер Кольсайской долины. Неспешная прогулка по берегу хрустального озера, окруженного хвойными лесами.</li>
                                <li class="modal-active-item">Активный компонент: Пешая прогулка к озеру Кайынды (1 час) и прогулка по берегу озера Кольсай.</li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading7">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse7" aria-expanded="false" aria-controls="flush-collapse7">
                            <h3>День 7 (10 октября) - Чарынский каньон: казахский Гранд-Каньон и возвращение в Алматы</h3>
                        </button>
                    </h2>
                    <div id="flush-collapse7" class="accordion-collapse collapse" aria-labelledby="flush-heading7"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Утро: Завтрак, выселение из гостевого дома.</li>
                                <li class="modal-active-item">Главный аккорд: Посещение Чарынского каньона — «Долины замков». Прогулка и фотосессия среди величественных песчаных скал, создающих ощущение другой планеты.</li>
                                <li class="modal-active-item">День: Возвращение в Алматы.</li>
                                <li class="modal-active-item">Вечер: Торжественный прощальный ужин в ресторане города, где мы поделимся впечатлениями и эмоциями.</li>
                                <li class="modal-active-item">Ночь в отеле в Алматы.</li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading8">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse8" aria-expanded="false" aria-controls="flush-collapse8">
                            <h3>День 8 (11 октября) - До новых встреч, Казахстан!</h3>
                        </button>
                    </h2>
                    <div id="flush-collapse8" class="accordion-collapse collapse" aria-labelledby="flush-heading8"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Завершение: Завтрак в отеле, трансфер в аэропорт Алматы.</li>
                                <li class="modal-active-item">Вылет домой с багажом незабываемых воспоминаний.</li>
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
                    <p class="tour__page__price">Стоимость: <?php echo htmlspecialchars($tourData['price'] ?? '1405 долларов', ENT_QUOTES, 'UTF-8'); ?> <br>Группа 8-12 человек</p>
                    <p class="tour__page__priceIn">В стоимость включено:
                        комфортабельный транспорт по всему маршруту, услуги русско-говорящего гида, сопровождение инструктора по скандинавской ходьбе, входные билеты в музеи и на экопосты, питание (завтрак, обед, ужин) кроме обеда и ужина в первый день, 2-местное проживание в гостевых домах, в оздоровительном комплексе Ден Соалык, гостинице в Алматы.
                    </p>
                    <p class="tour__page__priceOff">Дополнительно оплачивается:
                        авиаперелет до Алматы и обратно, обед и ужин в первый день, страховка путешественника.
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

    <?php formTour('Казахстан'); ?>
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