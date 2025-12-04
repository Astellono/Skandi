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
                    <img class="tour__page__img" src="../img/act-tour/sever.png" alt="">
                    <div class="tour__page__titleBox">
                        <h1 class="tour__page__title">
                            Тур «СЕВЕРНЫЙ ШАГ: Архангельск, Поморье и Каргополье»
                        </h1>
                        <h2 class="tour__page__date">Даты: 12 июля – 18 июля 2026г.</h2>
                    </div>

                </div>


            </div>
            <div class="tour__page__infoBlock">


                <p class="tour__page__desc">

                    Активный познавательный тур со скандинавской ходьбой по Русскому Северу
                    <br> <br>
                    Приглашаем любителей скандинавской ходьбы и ценителей русской истории в уникальное семидневное путешествие по Русскому Северу! Этот тур — идеальный симбиоз активного отдыха, глубокого погружения в культуру Поморья и неспешного изучения достопримечательностей с палками в руках.
                    <br> <br>
                    Мы пройдемся по мощеным улицам первого морского порта России — Архангельска, ощутим свежий ветер Белого моря на песчаных пляжах Ярских дюн, помедитируем под сенью древних деревянных церквей в музее «Малые Корелы» и старинном селе Нёнокса. Нас ждет путешествие на настоящем пароходе-колеснике, прогулки по сосновым борам Каргополья и по уникальному Беломоро-Балтийскому водоразделу.
                    <br> <br>
                    Этот маршрут специально разработан так, чтобы у вас была возможность регулярно заниматься скандинавской ходьбой в невероятно живописных локациях, совмещая любимое хобби с экскурсиями. Северная природа, богатейшая история и гостеприимство поморов, а также любимые утренние зарядки сделают это путешествие незабываемым.


                </p>
                <hr>
                <div class="tour__page__bottom">

                    <div class="tour__page__gid">

                        <h2 class="tour__page__gid__title">Сопровождающие:</h2>
                        <ul class="tour__page__gid__list">
                            <li class="tour__page__gid__item">
                                <img class="tour__page__gid__img" src="../img/team/Lider.png" alt="">
                                <h3 class="tour__page__gid__title-member">Маргарита Волосюк</h3>
                                <p class="tour__page__gid__desc">Инструктор</p>

                            </li>

                        </ul>


                    </div>
                    <div class="tour__page__rate">
                        <h2 class="tour__page__rateTitle">Сложность маршрута</h2>
                        <img src="../img/rate/2.svg" alt="" srcset="">

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
                                День 1 (12 июля, воскресенье)
                            </h3>
                        </button>
                    </h2>
                    <div id="flush-collapse1" class="accordion-collapse collapse" aria-labelledby="flush-heading1"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Прибытие: Встреча на ж/д вокзале Архангельска. Трансфер в город.</li>
                                <li class="modal-active-item">Обзорная экскурсия «Архангельск – первый морской порт России»: Погружение в морскую историю города. Посещение судоверфи «Поморский коч», где возрождают старинные технологии судостроения.</li>
                                <li class="modal-active-item">Обед.</li>
                                <li class="modal-active-item">Экскурсия в «Малые Корелы»: Легкая прогулка с палками по территории крупнейшего в России музея деревянного зодчества под открытым небом. Знакомство с уникальными памятниками архитектуры, вписанными в природный ландшафт.</li>
                                <li class="modal-active-item">Размещение на легендарном пароходе-колеснике «Н.В. Гоголь».</li>
                                <li class="modal-active-item">Речная прогулка: Двухчасовой круиз по Северной Двине с радиоэкскурсией. Идеальное начало путешествия для разминки и первых северных впечатлений.</li>
                                <li class="modal-active-item">Ужин: (за дополнительную плату по предварительному заказу)</li>
                                <li class="modal-active-item">*Ночевка на пароходе на рейде</li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse2" aria-expanded="false" aria-controls="flush-collapse2">
                            <h3>
                                День 2 (13 июля, понедельник)
                            </h3>
                        </button>
                    </h2>
                    <div id="flush-collapse2" class="accordion-collapse collapse" aria-labelledby="flush-heading2"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Завтрак.</li>
                                <li class="modal-active-item">Большая речная прогулка (4 часа): На пароходе «Н.В. Гоголь» отправимся по дельте Северной Двины к Белому морю. Экскурсия по закулисью парохода: машинное отделение, капитанская рубка.</li>
                                <li class="modal-active-item">Обед в Северодвинске.</li>
                                <li class="modal-active-item">Остров Ягры: Посетим мемориалы, посвященные морской истории и подвигам. Активная часть дня: прогулка с палками в сказочном сосновом бору по песчаным дюнам с выходом к беломорским пляжам. Отличная возможность для тренировки на мягком песчаном грунте и невероятные фото на фоне моря.</li>
                                <li class="modal-active-item">Возвращение в Архангельск.</li>
                                <li class="modal-active-item">Ужин: самостоятельно.</li>
                                <li class="modal-active-item">* Ночуем в гостинице «Столица Поморья» или подобной</li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse3" aria-expanded="false" aria-controls="flush-collapse3">
                            <h3>
                                День 3 (14 июля, вторник)
                            </h3>
                        </button>
                    </h2>
                    <div id="flush-collapse3" class="accordion-collapse collapse" aria-labelledby="flush-heading3"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Завтрак.</li>
                                <li class="modal-active-item">Выезд в Нёноксу (требуется оформление пропуска заранее).</li>
                                <li class="modal-active-item">Экскурсия по старинному поморскому селу: Знакомство с жизнью поморов, их историей и главным промыслом — солеварением.</li>
                                <li class="modal-active-item">Храмовый ансамбль Нёноксы: Осмотр жемчужины русского деревянного зодчества XVIII века.</li>
                                <li class="modal-active-item">Обед в гостевом доме.</li>
                                <li class="modal-active-item">Музеи: Посещение Музея соли и краеведческого музея села.</li>
                                <li class="modal-active-item">Возвращение в Архангельск.</li>
                                <li class="modal-active-item">Ужин: самостоятельно.</li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading4">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse4" aria-expanded="false" aria-controls="flush-collapse4">
                            <h3>
                                День 4 (15 июля, среда)
                            </h3>
                        </button>
                    </h2>
                    <div id="flush-collapse4" class="accordion-collapse collapse" aria-labelledby="flush-heading4"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Завтрак. Освобождение номеров.</li>
                                <li class="modal-active-item">в 7.40 Загородная экскурсия в Холмогоры: Путешествие на родину М.В. Ломоносова.</li>
                                <li class="modal-active-item">13.30 Паромная переправа в село Ломоносово: Посещение музея ученого, знакомство с искусством холмогорской резьбы по кости и мастер-класс.</li>
                                <li class="modal-active-item">15.00 Обед.</li>
                                <li class="modal-active-item">Возвращение в Архангельск. Свободное время.</li>
                                <li class="modal-active-item">* Ужин свободный</li>
                                <li class="modal-active-item">Вечерний переезд: Трансфер на вокзал. В 22.40 отправление на поезде в Няндому (билеты покупаем самостоятельно)</li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading5">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse5" aria-expanded="false" aria-controls="flush-collapse5">
                            <h3>
                                День 5 (16 июля, четверг)
                            </h3>
                        </button>
                    </h2>
                    <div id="flush-collapse5" class="accordion-collapse collapse" aria-labelledby="flush-heading5"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">04.42 Прибытие в Няндому, трансфер в Каргополь. Раннее размещение в гостинице. Завтрак.</li>
                                <li class="modal-active-item">11.45 - 19.00 Загородная экскурсия в Ошевенск: Пешая прогулка к «святому» источнику с часовней-купелью. Осмотр камня-следовика.</li>
                                <li class="modal-active-item">Посещение Александро-Ошевенского монастыря (XV в.).</li>
                                <li class="modal-active-item">Обед: Деревенский обед с блюдами каргопольской кухни.</li>
                                <li class="modal-active-item">Знакомство с Архангельским погостом и его уникальными расписными «небесами».</li>
                                <li class="modal-active-item">Возвращение в Каргополь и размещение в гостинице.</li>
                                <li class="modal-active-item">Ужин: самостоятельно.</li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading6">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse6" aria-expanded="false" aria-controls="flush-collapse6">
                            <h3>
                                День 6 (17 июля, пятница)
                            </h3>
                        </button>
                    </h2>
                    <div id="flush-collapse6" class="accordion-collapse collapse" aria-labelledby="flush-heading6"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Завтрак.</li>
                                <li class="modal-active-item">Путешествие в Кенозерский национальный парк (Масельга): По пути — осмотр шедевров деревянного зодчества в Саунино и Красной Ляге.</li>
                                <li class="modal-active-item">Главная активность дня: прогулка с палками по Беломоро-Балтийскому водоразделу. Уникальный маршрут по озовой гряде, разделяющей бассейны двух океанов. Подъем на Хижгору к церкви Александра Свирского для панорамного вида.</li>
                                <li class="modal-active-item">Обед: Деревенский обед в Масельге.</li>
                                <li class="modal-active-item">Посещение частного музея «Лядинские узоры» в деревне Лядины.</li>
                                <li class="modal-active-item">Возвращение в Каргополь.</li>
                                <li class="modal-active-item">Ужин: самостоятельно.</li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="modal-tour-item accordion-item">
                    <h2 class="accordion-header" id="flush-heading7">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse7" aria-expanded="false" aria-controls="flush-collapse7">
                            <h3>
                                День 7 (18 июля, суббота)
                            </h3>
                        </button>
                    </h2>
                    <div id="flush-collapse7" class="accordion-collapse collapse" aria-labelledby="flush-heading7"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul class="modal-active-list">
                                <li class="modal-active-item">Завтрак.</li>
                                <li class="modal-active-item">Обзорная пешеходная экскурсия по Каргополю «Город пяти губерний»: Прогулка с палками по историческому центру, Соборной площади, набережной реки Онеги.</li>
                                <li class="modal-active-item">Посещение центра ремесел «Берегиня»: Знакомство с технологией создания знаменитой каргопольской глиняной игрушки.</li>
                                <li class="modal-active-item">Свободное время для покупки сувениров.</li>
                                <li class="modal-active-item">Обед: Каргопольская похлебка и традиционная выпечка.</li>
                                <li class="modal-active-item">Трансфер на ж/д станцию Няндома.</li>
                                <li class="modal-active-item">Ориентировочное время отправления около 15.30</li>
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
                    <p class="tour__page__price">Стоимость: 114 700 рублей <br> Группа 10-12 человек </p>
                    <p class="tour__page__priceIn">В стоимость включено: автобусные трансферы внутри программы, полностью экскурсионное обслуживание и входные билеты, прогулки и проживание на пароходе Н.В.Гоголь, двухместное проживание в гостинице «Столица Поморья» или аналогичной, проживание в гостинице в Каргополе, услуги инструктора по скандинавской ходьбе, питание: завтраки (кроме 1-го дня) и обеды.
                    </p>
                    <p class="tour__page__priceOff">Дополнительно оплачивается: ж/д билеты Москва - Архангельск, Архангельск - Няндома, Няндома Москва; одноместное проживание (ориентировочно 11000); завтрак в 1-й день и ужины, страховка путешественника
                    </p>
                    <p class="tour__page__note">Организаторы оставляют за собой право вносить изменения в последовательность проведения экскурсий и посещения объектов, сохраняя общий объем программы.</p>
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

    <?php formTour('Север'); ?>
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