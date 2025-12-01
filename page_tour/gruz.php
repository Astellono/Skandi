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
                    <img class="tour__page__img" src="../img/act-tour/gruz.jpeg" alt="Грузия">
                    <div class="tour__page__titleBox">
                        <h1 class="tour__page__title">
                            Тур: «Грузия в бархатный сезон: вино, стиль и сезон ртвели»
                        </h1>
                        <h2 class="tour__page__date">Даты: 7 – 13 сентября 2026г</h2>
                    </div>

                </div>


            </div>
            <div class="tour__page__infoBlock">


                <p class="tour__page__desc">

                    Сентябрь в Грузии — это время, когда воздух наполнен ароматом спелого винограда, а солнце ласкает кожу уже нежным, бархатным теплом. Это идеальный момент для нашего путешествия — красивого, вкусного и наполненного особенными моментами. Мы будем много гулять, пить лучший кофе, дегустировать вино, примерять наряды для потрясающих фото и, если повезет, станцуем в виноградном чане на празднике Ртвели! Каждое утро нас ждёт легкая и аутентичная зарядка. В свободное время в Тбилиси сможем прогуляться в парк Мтацминда, сходить в серные бани или в Тбилисский театр марионеток.
                    <br><br>
                    Этот тур — идеальное сочетание активного отдыха, культурного погружения и гастрономических удовольствий. Мы откроем для себя настоящую Грузию — гостеприимную, живописную и наполненную древними традициями.

                </p>
                <hr>
                <div class="tour__page__bottom">

                    <div class="tour__page__gid">

                        <h2 class="tour__page__gid__title">Сопровождающие:</h2>
                        <ul class="tour__page__gid__list">
                            <li class="tour__page__gid__item">
                                <img class="tour__page__gid__img" src="../img/team/Lider.png" alt="Маргарита Волосюк">
                                <h3 class="tour__page__gid__title-member">Маргарита Волосюк</h3>
                                <p class="tour__page__gid__desc">Организатор, инструктор</p>
                            </li>
                        </ul>
                    </div>
                    <div class="tour__page__rate">
                        <h2 class="tour__page__rateTitle">Сложность маршрута</h2>
                        <img src="../img/rate/1.svg" alt="" srcset="">
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
                            <h3>День 1 (7 сентября) - Знакомство с Тбилиси</h3>
                        </button>
                    </h2>
                    <div id="flush-collapse1" class="accordion-collapse collapse" aria-labelledby="flush-heading1"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Прибытие: Прилет в Тбилиси, встреча в аэропорту и трансфер в гостиницу.</li>
                                <li class="modal-active-item">Размещение: Останавливаемся в уютном City Hotel, расположенном в самом центре города.</li>
                                <li class="modal-active-item">Вечер: Свободное время, чтобы отдохнуть после перелета или сделать первую неспешную прогулку. Найдем уютную кофейню и выпьем чашечку ароматного грузинского кофе — он здесь особенный!</li>
                                <li class="modal-active-item">Ужин свободный (оплачивается дополнительно)</li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse2" aria-expanded="false" aria-controls="flush-collapse2">
                            <h3>День 2 (8 сентября) - Дыхание древней столицы</h3>
                        </button>
                    </h2>
                    <div id="flush-collapse2" class="accordion-collapse collapse" aria-labelledby="flush-heading2"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Утро: Завтрак в отеле. Отправляемся на пешеходную экскурсию по Старому Тбилиси. Будем петлять по мощенным улочкам, любоваться резными балкончиками и дышать историей.</li>
                                <li class="modal-active-item">День: Посетим грандиозный мемориал «Летопись Грузии» — от его масштабов захватывает дух! А после окунемся в роскошь и прохладу сада Гардения, где почувствуем себя героинями восточной сказки.</li>
                                <li class="modal-active-item">Вечер: Нас ждет душевный ужин в традиционном ресторане с грузинской кухней. Первое «Тост!» или «Гамарджоба!» (оплачивается дополнительно)</li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse3" aria-expanded="false" aria-controls="flush-collapse3">
                            <h3>День 3 (9 сентября) - Город любви и благословение Святой Нино</h3>
                        </button>
                    </h2>
                    <div id="flush-collapse3" class="accordion-collapse collapse" aria-labelledby="flush-heading3"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Утро: Завтрак, чек-аут из отеля. На комфортном минивене в сопровождении гида отправляемся в Кахетию — винную душу Грузии.</li>
                                <li class="modal-active-item">День: Первая остановка — женский монастырь Бодбе. Это одно из самых почитаемых мест, где покоится святая Нино, просветительница Грузии. Здесь особая, очень светлая атмосфера.</li>
                                <li class="modal-active-item">Размещение: Заселяемся в отель BelleVue в Сигнахи.</li>
                                <li class="modal-active-item">Вечер: Прогулка по самому «городу любви» Сигнахи. Поднимемся на древнюю крепостную стену, откуда открывается захватывающий вид на Алазанскую долину — готовьте фотоаппараты!</li>
                                <li class="modal-active-item">Ужин в колоритном ресторанчике с блюдами кахетинской кухни (оплачивается дополнительно)</li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading4">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse4" aria-expanded="false" aria-controls="flush-collapse4">
                            <h3>День 4 (10 сентября) - Вкус Кахетии и дух вина</h3>
                        </button>
                    </h2>
                    <div id="flush-collapse4" class="accordion-collapse collapse" aria-labelledby="flush-heading4"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Утро: Завтрак с видом на долину.</li>
                                <li class="modal-active-item">День: Посещение настоящего семейного винного погреба. Здесь мы не просто продегустируем несколько сортов вина, а узнаем его душу, услышим истории семьи и, возможно, поможем хозяевам! У нас есть все шансы попасть на начало Ртвели — сбора урожая и винодельческого праздника.</li>
                                <li class="modal-active-item">Вечер: Свободное время в Сигнахи. Можно купить уникальные сувениры ручной работы, сходить в местные музеи или прогуляться по тихим улочкам или просто насладиться атмосферой безмятежности за чашкой чая.</li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading5">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse5" aria-expanded="false" aria-controls="flush-collapse5">
                            <h3>День 5 (11 сентября) - Легенды Киндзмараули и монастырь в горах</h3>
                        </button>
                    </h2>
                    <div id="flush-collapse5" class="accordion-collapse collapse" aria-labelledby="flush-heading5"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Утро: Завтрак, чек-аут.</li>
                                <li class="modal-active-item">День: Трансфер на легендарный винный завод «Киндзмараули». Нас ждет экскурсия по современным производствам и дегустация прославленных вин.</li>
                                <li class="modal-active-item">Размещение: Заселяемся в роскошный Шато Киндзмараули в Кварели — это будет наш дом на сегодня.</li>
                                <li class="modal-active-item">Экскурсия: Поедем в старинный монастырь Некреси, затерянный в горах. Дорога и вид на Алазанскую долину с высоты стоят того!</li>
                                <li class="modal-active-item">Вечер: Возвращение в Кварели, отдых и ужин в ресторане отеля (оплачивается дополнительно)</li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading6">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse6" aria-expanded="false" aria-controls="flush-collapse6">
                            <h3>День 6 (12 сентября) - Прощание с Кахетией и прощальный вечер в Тбилиси</h3>
                        </button>
                    </h2>
                    <div id="flush-collapse6" class="accordion-collapse collapse" aria-labelledby="flush-heading6"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Утро: Завтрак, чек-аут.</li>
                                <li class="modal-active-item">День: Трансфер в Тбилиси. По пути заедем в Телави — столицу Кахетии. Обед, посещение крепости Батонис-цихе и встреча с древним платаном-великаном. По желанию, остановка на Гомборском перевале.</li>
                                <li class="modal-active-item">Размещение: Возвращаемся в City Hotel в Тбилиси.</li>
                                <li class="modal-active-item">Вечер: Прощальный ужин в ресторане с панорамным видом на ночной Тбилиси! Живая музыка, вкуснейшая еда, море эмоций и воспоминаний — идеальный финал нашего путешествия (оплачивается дополнительно)</li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading7">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse7" aria-expanded="false" aria-controls="flush-collapse7">
                            <h3>День 7 (13 сентября) - Последние сувениры и сладкое «до свидания!»</h3>
                        </button>
                    </h2>
                    <div id="flush-collapse7" class="accordion-collapse collapse" aria-labelledby="flush-heading7"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Утро: Завтрак, чек-аут.</li>
                                <li class="modal-active-item">День: Если позволит время до вылета, заскочим на знаменитый базар за сувенирами. Обязательно купим чурчхелу, грузинские специи и, конечно, бутылочку-другую вина на память.</li>
                                <li class="modal-active-item">Окончание программы: Трансфер в аэропорт Тбилиси.</li>
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
                    <p class="tour__page__price">Стоимость: 1015 долларов <br>Группа 6 человек</p>
                    <p class="tour__page__priceIn">В стоимость входят:
                        2-местное проживание в указанных отелях (Тбилиси: City Hotel, Сигнахи: BelleVue, Кварели: Шато Киндзмараули), завтраки, все трансферы по программе, экскурсии с гидом.
                    </p>
                    <p class="tour__page__priceOff">Дополнительно оплачивается:
                        Авиаперелет, одноместное проживание (доплата ориентировочно 150 долларов), обеды и ужины, личные расходы, входные билеты в музеи в Сингнаги, дегустационные программы.
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

    <?php formTour('Грузия'); ?>
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