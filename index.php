<?php
session_start();
// require_once 'phpLogin/connect.php';
// if (isset($_SESSION['user_id'])) {
//     $user_id = $_SESSION['user_id'];
//     $user_query = $connect->query("SELECT * FROM users WHERE id = '$user_id'");
//     $user_data = $user_query->fetch_assoc();
    
// } else {
//     $user_id = 1;
// }
// $_SESSION['user_id'] = 1
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <noscript>
        <div><img src="https://mc.yandex.ru/watch/89691443" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description"
        content="Сканди-путешествия и экскурсии по Москве, Московской области, России и странам СНГ, зарубеж!">
    <meta name="yandex-verification" content="783babf1459e4598" />

    <link rel="stylesheet" href="style/clear.css">
    <link rel="stylesheet" href="style/style.css?ver=<? echo time(); ?>">
    <link rel="stylesheet" href="style/style-adaptive.css?ver=<? echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="icon" sizes="120x120" href="img/icon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    
    <script type="module" defer src="js/calendarNew.js"></script>
    <script type="module" src="js/sliderGen.js?ver=<? echo time(); ?>" defer></script>
    <title>По миру с палками</title>
</head>

<body>
    <!-- <button class="login-btn" id="loginBtn">Войти в аккаунт</button> -->
    <header class="header" id="header">

        <?php include 'parts/headerPHP.php'; ?>

    </header>
    <section class="section hero">


        <div class="hero__contant">
            <h1 class="hero__title">Добро пожаловать</h1>
            <p class="hero__desc">Мы рады приветствовать вас на сайте нашего проекта!</p>
            <a href="#bot" class="hero__link">
                <svg width="60px" height="60px" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M19.1134 21.6907C20.4536 21.5876 21.5876 20.5567 21.6907 19.1134C21.8969 17.0515 22 14.1649 22 12C22 9.83505 21.8969 6.94845 21.6907 4.8866C21.6907 4.16495 21.3814 3.54639 20.866 3.13402C20.3505 2.72165 19.8351 2.41237 19.1134 2.30928C17.0515 2.10309 14.1649 2 12 2C9.83505 2 6.94845 2.20618 4.8866 2.30928C3.54639 2.41237 2.41237 3.4433 2.30928 4.8866C2.10309 6.94845 2 9.83505 2 12C2 14.1649 2.20619 17.0515 2.30928 19.1134C2.41237 20.4536 3.4433 21.5876 4.8866 21.6907C6.94845 21.8969 9.83505 22 12 22C14.1649 22 17.0515 21.8969 19.1134 21.6907ZM12.0347 16.9485L7.36083 13.2371C7.15464 13.134 7.05155 12.9278 7.05155 12.6186C7.05155 12.4124 7.15464 12.3093 7.25773 12.1031C7.56701 11.7938 7.97938 11.6907 8.28866 12L11.1753 14.4742L11.1753 7.87629C11.1753 7.46392 11.4845 7.05155 12 7.05155C12.5155 7.05155 12.8247 7.36082 12.8247 7.87629L12.8247 14.3711L15.7113 11.8969C16.0206 11.5876 16.5361 11.6907 16.7423 12C17.0515 12.3093 16.9485 12.8247 16.6392 13.0309L12.0347 16.9485Z"
                        fill="#fff" />
                </svg>
            </a>

        </div>


    </section>
    <section class="section about">
        <div class="container">
            <a name="bot"></a>
            <h2 class="about__title">О нас</h2>
            <div onclick="location.href='#bot'" class="about__story" id="textAbout">

                <p> Мы - энтузиасты туристического спорта, любящие путешествовать, двигаться и общаться. Наш клуб создан
                    для
                    тех, кто хочет испытать новые впечатления и приключения.
                </p>
                <p>Собираемся вместе, придумываем маршруты и путешествовали, отдыхая и наполняясь новыми
                    впечатлениями.
                    Наш опыт включает в себя как простые однодневные тренировочные маршруты, так и многодневные, сложные
                    маршруты в труднодоступных местах.

                </p>
                <p>
                    Мы не туристическое агентство. Каждый наш маршрут уникален и редко повторяется. Мы не работаем из
                    офиса,
                    и наши группы небольшие. Мы предлагаем смесь спорта, путешествий, дружеского общения и интересных
                    приключений.
                </p>

                <p>
                    Отправиться с нами в путешествие легко: заполните анкету путешественника, выберите интересующий
                    маршрут
                    и присоединяйтесь!
                </p>
            </div>
            <div onclick="location.href='#bot'" class="about__storyBot" id="storyBot">
                <p>Подробнее<br>▼</p>
            </div>
        </div>
    </section>
    <section class="section adv" style="display: none;">
        <div class="container">
            <h2 class="adv__title">
                Преимущества
            </h2>
            <ul class="adv__list">
                <li class="adv__item">
                    <div class="adv__img__box">
                        <img src="img/about/1.svg" class="adv__img" alt="" srcset="">
                    </div>
                    <div class="adv__contant__box">
                        <h3 class="adv__item-title">
                            Цены
                        </h3>
                        <p class="adv__item__contant">
                            Мы стараемся, чтобы наши походы не стоили дорого. Но наша «бутиковость» и высокое качество
                            не позволяют нам сэкономить на стоимости входящих услуг. Аренда трансфера и индивидуальная
                            работа гида и инструктора, размещение фактически под индивидуальные запросы, формат
                            минигрупп не позволяют нам выставить низкую стоимость программ. Однако, по мере наших
                            возможностей мы всегда стараемся оптимизировать цены на наши программы где это возможно не в
                            ущерб качеству.
                        </p>
                    </div>
                </li>
                <li class="adv__item">
                    <div class="adv__img__box">
                        <img src="img/about/2.svg" class="adv__img" alt="" srcset="">
                    </div>
                    <div class="adv__contant__box">
                        <h3 class="adv__item-title">
                            Разноплановость
                        </h3>
                        <p class="adv__item__contant">
                            Мы предлагаем путешествия и походы разной сложности и содержания для любителей скандинавской
                            ходьбы и пешеходного туризма. Вам остается только выбрать сложность , продолжительность,
                            географическое положение, комфортабельность и градус экстремальности . Это могут быть и
                            двухчасовые прогулки по заповедникам Подмосковья, и многодневные походы по Алтайскому краю с
                            проживанием в палаточном лагере. Мы также проводим корпоративные тренировки и тимбилдинг на
                            заказ.
                        </p>
                    </div>


                </li>
                <li class="adv__item">
                    <div class="adv__img__box">
                        <img src="img/about/3.svg" class="adv__img" alt="" srcset="">
                    </div>
                    <div class="adv__contant__box">
                        <h3 class="adv__item-title">
                            Авторские программы
                        </h3>
                        <p class="adv__item__contant">
                            Каждый наш тур – результат воплощения мечты наших инструкторов. Каждое путешествие придумано
                            и кропотливо собрано по нюансам инструктором (автором тура) в партнерстве с
                            профессиональными гидами. От задумки до ее воплощения порой проходит много время, но
                            продумана каждая, казалось бы, мелочь. каждый нюанс. Каждый маршрут проработан с любовью,
                            заботой и вниманием. У нас вы не найдете массовых унифицированных программ от турагентств
                            или туристических компаний. Это всегда воплощение нашей мечты, полет нашей фантазии. Наши
                            программы есть только на нашем сайте и именных соцсетях. Если вы найдете наш тур где-то еще,
                            то лучше зайдите на наш сайт и проверьте во избежание недоразумений.
                        </p>

                    </div>


                </li>
                <li class="adv__item">
                    <div class="adv__img__box">
                        <img src="img/about/4.svg" class="adv__img" alt="" srcset="">
                    </div>
                    <div class="adv__contant__box">
                        <h3 class="adv__item-title">
                            «Бутиковость»
                        </h3>
                        <p class="adv__item__contant">
                            Каждый наш тур – это наше творение. Мы любовно собираем его по маленьким частицам от
                            личности сопровождающего гида до мест размещения, трансфера, важных и интересных нам
                            достопримечательностей, непосредственно маршрута тура. Важное место в туре у нас занимает
                            питание. Да, еда для нас - это возможность еще ближе познакомится с местом. Важны все
                            запахи, вкусы, ощущения. С таким запросом просто невозможно подготовить, проработать более
                            2-3 туров за сезон. Также мы не повторяем туры подряд один за одним. Зато мы можем уделить
                            каждому нашему маршруту особое внимание. Наши инструкторы с горящими глазами вдохновенно
                            представляют свой маршрут, рассказывают, показывают, дарят впечатления. Группа становится
                            коллективом попутчиков. Мы с удовольствием проводим время вместе и после непосредственно
                            маршрута. На привале в общих играх и разговорах за чашечкой ароматного чая, мы взахлеб
                            делимся впечатлениями и фотографиями за день.
                        </p>
                    </div>


                </li>
                <li class="adv__item">
                    <div class="adv__img__box">
                        <img src="img/about/5.svg" class="adv__img" alt="" srcset="">
                    </div>
                    <div class="adv__contant__box">
                        <h3 class="adv__item-title">
                            Индивидуальный подход
                        </h3>
                        <p class="adv__item__contant">
                            Мы оказываем всестороннюю поддержку нашим участникам до и после тура. Это скидки в
                            спортивных магазинах, профессиональные и подробные консультации на любые темы по северной
                            ходьбе и около северной ходьбы. Например, как подобрать снаряжение для похода или
                            тренировки, как подобрать подходящий уровень сложности маршрута тура, как правильно и
                            эффективно физически подготовиться (подготовка физической формы) к конкретному туру и многое
                            другое.
                        </p>
                    </div>
                </li>
                <li class="adv__item">
                    <div class="adv__img__box">
                        <img src="img/about/6.svg" class="adv__img" alt="" srcset="">
                    </div>
                    <div class="adv__contant__box">
                        <h3 class="adv__item-title">
                            Прозрачность
                        </h3>
                        <p class="adv__item__contant">
                            В путешествии с нами вас не будут ждать «неожиданности» в виде дополнительных, не указанных
                            в описании тура, расходов за трансфер, гостиницу, гида, отмены части программы. Оформление
                            договора происходит автоматически при оплате тура. Чек также автоматически отправляется в
                            электронном виде на указанный вами электронный почтовый ящик. Изменить план могут только
                            объективные обстоятельства (погода, опасное состояние маршрута, болезнь или травма участника
                            и т.д.)
                        </p>
                    </div>
                </li>
                <li class="adv__item">
                    <div class="adv__img__box">
                        <img src="img/about/7.svg" class="adv__img" alt="" srcset="">
                    </div>
                    <div class="adv__contant__box">
                        <h3 class="adv__item-title">
                            Анкета путешественника
                        </h3>
                        <p class="adv__item__contant">
                            Каждый участник каждого тура при оформлении заполняет индивидуальную анкету путешественника.
                            Ее просматривают инструктор тура и врач проекта с целью оценить физическое состояние и
                            возможности участника. Новички часто выбирают маршруты, которые им пока не по силам. В этом
                            случае врач проекта настоятельно рекомендует воздержаться от выбранного маршрута и
                            предпочесть другой, более простой, во избежание переутомления, травм и разочарования от
                            маршрута в целом. На стадии подготовки мы предоставляем участникам максимум правдивой
                            информации о туре.
                        </p>
                    </div>
                </li>
                <li class="adv__item">
                    <div class="adv__img__box">
                        <img src="img/about/8.svg" class="adv__img" alt="" srcset="">
                    </div>
                    <div class="adv__contant__box">
                        <h3 class="adv__item-title">
                            «Все включено»
                        </h3>
                        <p class="adv__item__contant">
                            В стоимости наших туров всегда входит все, что необходимо для комфортного путешествия. Мы не
                            гонимся за привлекательной (низкой) ценой и адекватно оцениваем потребности участников. Мы
                            всегда стараемся не разделять группу и заказываем трансфер к началу и к концу маршрута Нам
                            важно пойти всем вместе после маршрута посидеть и пообщаться , отметив удачное завершение
                            маршрута чашечкой кофе , а не ждать пока часть группы пойдет пешком или доедет на попутке.
                            То же самое касается и размещения на ночлег, и организации питания и т.д. и т.п. Мы считаем,
                            что незначительное увеличение стоимости стоит того, чтобы данные вопросы вообще не
                            поднимались, не отвлекая участников от приятных впечатлений и отдыха в целом.
                        </p>
                    </div>
                </li>
                <li class="adv__item">
                    <div class="adv__img__box">
                        <img src="img/about/9.svg" class="adv__img" alt="" srcset="">
                    </div>
                    <div class="adv__contant__box">
                        <h3 class="adv__item-title">
                            Наши инструкторы – тренеры
                        </h3>
                        <p class="adv__item__contant">
                            Наши инструкторы работают не только на больших маршрутах, но и сопровождают наши туры
                            выходного дня и проводят регулярные тренировки по северной ходьбе в парках . Пойти в тур
                            выходного дня - это отличный способ весело и спортивно, с пользой для здоровья провести
                            выходные. А также поближе познакомиться с инструктором и другими участниками, уже понимая с
                            кем поедешь в «большой» тур.
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <section class="section actual-tour">
        <div class="container">
            <h2 class="actual-tour__title">
                Ближайшие путешестивия
            </h2>

            <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel" data-bs-touch="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner" id="tours">

                    <!-- <div class="carousel-item active" data-bs-interval="2000">
                        <img src="img/act-tour/vlad.jpg" style="width: 100%; height: 100%;" class="d-block w-100"
                            alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Владимир</h5>
                            <p>23 ноября - 24 ноября 2024г</p>
                            <a class="actual-tour__link" href="page_tour/vlad.html">Подробнее</a>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <img src="img/act-tour/erino.jpg" style="width: 100%; height: 100%;" class="d-block w-100"
                            alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Ерино</h5>
                            <p>6 декабря - 8 декабря 2024г</p>
                            <a class="actual-tour__link" href="page_tour/erino.html">Подробнее</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/act-tour/karelia.jpg" style="width: 100%; height: 100%;" class="d-block w-100"
                            alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Карелия</h5>
                            <p>2 января - 7 января 2025г</p>
                            <a class="actual-tour__link" href="page_tour/karelia.html">Подробнее</a>
                        </div>
                    </div> -->
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Предыдущий</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Следующий</span>
                </button>
            </div>



        </div>
    </section>
    <section class="section card">
        <div class="container">
            <div class="club-header">
                <h2>🎉 КЛУБНАЯ КАРТА!</h2>
                <div class="percentages">
                    <div class="percent-bubble">3%</div>
                    <div class="percent-bubble">5%</div>
                    <div class="percent-bubble">7%</div>
                </div>
            </div>
            <p class="club-text">Каждый участник автоматически становится членом клуба "По Миру с Палками"
                и получает виртуальную клубную карту с накопительной системой скидок!</p>

            <div class="discount-section">
                <div class="discount-badge">
                    <h3>+ ДОПОЛНИТЕЛЬНАЯ СКИДКА!</h3>
                </div>
                <div class="discount-content">
                    <p>Разместите отзыв на двух площадках:</p>
                    <div class="platforms">
                        <a href="https://www.pomiru-spalkami.ru/" class="platform">
                            <img src="img/icon.svg" alt="VK">
                            <span>Наш сайт</span>
                        </a>
                        <a href="https://vk.com/pomiru_spalkami" class="platform">
                            <img src="https://cdn-icons-png.flaticon.com/512/145/145813.png" alt="VK">
                            <span>ВКонтакте</span>
                        </a>
                        <a href="https://yandex.ru/maps/org/po_miru_s_palkami/27242906463/reviews/?ll=37.380031%2C55.815892&z=8"
                            class="platform">
                            <img src="https://avatars.mds.yandex.net/get-lpc/1520633/ef2a27b6-800c-4a83-a864-192193c41b38/orig"
                                alt="Яндекс">
                            <span>Яндекс</span>
                        </a>
                    </div>
                    <div class="discount-prices">
                        <div class="price-card">
                            <h3>Экскурсия</h3>
                            <div class="discount-amount">300₽</div>
                        </div>
                        <div class="price-card">
                            <h3>Тур</h3>
                            <div class="discount-amount">1000₽</div>
                        </div>
                    </div>
                    <p class="note">*Скидка суммируется с клубной</p>
                </div>
            </div>
        </div>
    </section>
    <section class="section calendar">
        <div class="container">
            <h2 class="actual-tour__title">
                Путешествия в 2025 году
            </h2>
            <div class="calendar__buttonList">
                <button class="calendar__button" id="slideLeft"> ← </button>
                <button class="calendar__button" id="slideRight"> → </button>

            </div>
            <ul class="calendar__list" id="listM">

            </ul>

        </div>


    </section>
    <section class="section teamlead">
        <div class="container">
            <h2 class="teamlead__title">Руководитель</h2>
            <img class="teamlead__img" src="img/team/Lider.png" alt="">
            <p class="teamlead__desc"><strong>Волосюк Маргарита</strong><br> Инструктор Nordic Walking (скандинавская
                ходьба) организатор
                туров и экскурсий ‌в формате Scandi-trip</p>
            <button type="button" class="teamlead__btn" data-bs-toggle="modal" data-bs-target="#modal1">Подробнее

            </button>

        </div>
    </section>
    <section class="section team">
        <div class="container">
            <h2 class="team__title">Наша команда</h2>
            <ul class="team__list">


                <li class="team__item">
                    <img class="team__img" src="img/team/2.png" alt="">
                    <h3 class="team__title-member">Шепелева Ольга</h3>
                    <p class="team__desc">Инструктор</p>
                    <button type="button" class="team__btn" data-bs-toggle="modal" data-bs-target="#modal2">Подробнее
                        <svg width="30" height="24" viewbox="0 0 28 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M24.3536 6.35355C24.5488 6.15829 24.5488 5.84171 24.3536 5.64645L21.1716 2.46447C20.9763 2.2692 20.6597 2.2692 20.4645 2.46447C20.2692 2.65973 20.2692 2.97631 20.4645 3.17157L23.2929 6L20.4645 8.82843C20.2692 9.02369 20.2692 9.34027 20.4645 9.53553C20.6597 9.7308 20.9763 9.7308 21.1716 9.53553L24.3536 6.35355ZM4 6.5H24V5.5H4V6.5Z"
                                fill="#121723" />
                        </svg>
                    </button>

                </li>


                <li class="team__item">
                    <img class="team__img" src="img/team/zuychenko.jpeg" alt="">
                    <h3 class="team__title-member">Зуйченко Алексей</h3>
                    <p class="team__desc">Инструктор</p>
                    <button type="button" class="team__btn" data-bs-toggle="modal" data-bs-target="#modal3">Подробнее
                        <svg width="30" height="24" viewbox="0 0 28 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M24.3536 6.35355C24.5488 6.15829 24.5488 5.84171 24.3536 5.64645L21.1716 2.46447C20.9763 2.2692 20.6597 2.2692 20.4645 2.46447C20.2692 2.65973 20.2692 2.97631 20.4645 3.17157L23.2929 6L20.4645 8.82843C20.2692 9.02369 20.2692 9.34027 20.4645 9.53553C20.6597 9.7308 20.9763 9.7308 21.1716 9.53553L24.3536 6.35355ZM4 6.5H24V5.5H4V6.5Z"
                                fill="#121723" />
                        </svg>
                    </button>

                </li>
                <li class="team__item">
                    <img class="team__img" src="img/team/4.png" alt="">
                    <h3 class="team__title-member">Анна Ефимова</h3>
                    <p class="team__desc">Инструктор</p>
                    <button type="button" class="team__btn" data-bs-toggle="modal" data-bs-target="#modal4">Подробнее
                        <svg width="30" height="24" viewbox="0 0 28 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M24.3536 6.35355C24.5488 6.15829 24.5488 5.84171 24.3536 5.64645L21.1716 2.46447C20.9763 2.2692 20.6597 2.2692 20.4645 2.46447C20.2692 2.65973 20.2692 2.97631 20.4645 3.17157L23.2929 6L20.4645 8.82843C20.2692 9.02369 20.2692 9.34027 20.4645 9.53553C20.6597 9.7308 20.9763 9.7308 21.1716 9.53553L24.3536 6.35355ZM4 6.5H24V5.5H4V6.5Z"
                                fill="#121723" />
                        </svg>
                    </button>

                </li>
                <li class="team__item">
                    <img class="team__img" src="img/team/yas.png" alt="">
                    <h3 class="team__title-member">Ясинская Яна</h3>
                    <p class="team__desc">Специалист по ЛФК</p>
                    <button type="button" class="team__btn" data-bs-toggle="modal" data-bs-target="#modal5">Подробнее
                        <svg width="30" height="24" viewbox="0 0 28 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M24.3536 6.35355C24.5488 6.15829 24.5488 5.84171 24.3536 5.64645L21.1716 2.46447C20.9763 2.2692 20.6597 2.2692 20.4645 2.46447C20.2692 2.65973 20.2692 2.97631 20.4645 3.17157L23.2929 6L20.4645 8.82843C20.2692 9.02369 20.2692 9.34027 20.4645 9.53553C20.6597 9.7308 20.9763 9.7308 21.1716 9.53553L24.3536 6.35355ZM4 6.5H24V5.5H4V6.5Z"
                                fill="#121723" />
                        </svg>
                    </button>

                </li>
            </ul>
        </div>
    </section>
    <section class="section otziv">
        <div class="container">
            <h2 class="otziv__title">Что говорят наши клиенты</h2>
            <div class="review-card">
                <div class="review-card__user">
                    <img src="img/otziv/olga.jpg" alt="" class="review-card__avatar">
                    <div class="review-card__user-info">
                        <h3 class="review-card__name">Ольга</h3>
                        <p class="review-card__trip">Мельдино-Дубна</p>
                    </div>
                </div>
                <hr>
                <div class="review-card__content">
                    <p class="review-card__text">12 июля 2025 года была в сканди-походе на 20 км Мельдино-Дубна с
                        Маргаритой Волосюк. Уникальный маршрут вдоль канала имени Москвы, 2 паромные переправы, половина
                        пути по велотрассе "Вело-1". Погода была жаркая, по пути несколько раз вдоволь накупались, вода
                        снимала усталость и напитывала энергией. Маргарита включила колонку с плейлистом отлично
                        подобранной музыки, шли практически пританцовывая. Для меня, как офисного работника, лишённого
                        необходимого количества движения было несколько стадий: от "зачем напрягаться, сидела бы дома"
                        ..."к
                        ак же хорошо окунуться в воды канала, блаженство"...."оказывается открылось второе
                        дыхание"..."гордость и радость от преодоления себя и пройденного маршрута". Результат на
                        следующий день поразил, прибавилось сил, спокойствия, мелочи не раздражают). А еще была очень
                        душевная группа, классные фотки, прекрасные виды, вкусная еда в ресторане "Высоцкий". Всем, кто
                        сомневается в себе и думает, что не осилит маршрут, рекомендую отбросить сомнения ! Результат
                        того стоит !</p>

                </div>
            </div>
            <div class="review-card">
                <div class="review-card__user">
                    <img src="img/otziv/angel.jpg" alt="" class="review-card__avatar">
                    <div class="review-card__user-info">
                        <h3 class="review-card__name">Ангелина</h3>
                        <p class="review-card__trip">Солотча, Рязанская область</p>
                    </div>
                </div>
                <hr>
                <div class="review-card__content">
                    <p class="review-card__text">4-6 апреля 2025 посетила супер место, Солотчу, Рязанской области.
                        Маргарита Волосюк сделала этот тур незабываемым!!! Экскурсии, зарядка, прекрасное питание,
                        ходьба, релакс, потрясающая природа, вековые сосны, реки, тишина и душевное общение с
                        нашей девичьей группой! Центральное место тура было покорение Тропы Паустовского, это было 15
                        км.
                        в сосновом лесу, с ароматом смолы, пением птиц, красотой озёр ледникового периода, погода была
                        великолепна,нам здорово повезло! Маргарита наш маяк,пример для подражания, замечательный
                        организатор, професионал своего дела! Большая благодарность ей за все, что она
                        делает! Присоединяйтесь к "По миру с
                        палками!!!"</p>

                </div>
            </div>

            <!-- Отзыв 2 -->
            <div class="review-card">
                <div class="review-card__user">
                    <img src="img/otziv/zagl.png" alt="" class="review-card__avatar">
                    <div class="review-card__user-info">
                        <h3 class="review-card__name">Раиса</h3>
                        <p class="review-card__trip">Коломенское</p>
                    </div>
                </div>
                <hr>
                <div class="review-card__content">
                    <p class="review-card__text">9 октября, состоялась вторая сканди-экскурсия из цикла Коломенское и
                        мой первый опыт тренировки-экскурсии в команде "По миру с палками". Незабываемый день! Даже если
                        бы нам не повезло с погодой, то наш прекрасный экскурсовод Анна и тренер Маргарита сделали бы
                        этот день таким же захватывающим, интересным, ярким и познавательным. Мы прошли по всем
                        закоулкам царского подворья, узнали, как был организован быт людей, как выглядели постройки
                        разных времен и назначений, увидели таинственные древности. Из липовой аллеи, посаженной
                        200 лет назад, перешли во фруктовый сад, заложенный Екатериной Великой. А еще успели сделать
                        разминку и заминку, потренировать технику спуска и подъема, прошли 17 тыс.шагов. Закончили
                        прогулку в трапезной дворца Алексея Михайловича, где можно найти угощение в духе его времени.
                        Спасибо за добрый, спокойный, душевный день всем, дорогие друзья!</p>

                </div>
            </div>

            <!-- Отзыв 3 -->



            <!-- <ul class="otziv__list">
                <li class="otziv__item">
                    <div class="otziv__img-box">
                        <img class="otziv__img" src="img/otziv/marta.png" alt="" srcset="">
                    </div>
                    <div class="otziv__img-info">
                        <h3 class="otziv__name">Марта</h3>
                        <p class="otiziv__desc">Была в скандитрипе в Репино в середине июля. Я получила абсолютно все ,
                            на
                            что рассчитывала: умеренную нагрузку, чистый воздух Финского залива, зарядку для мозга ввиде
                            историко-экскурсионной части, ненавязчивую компанию, крепкий сон и обычную еду. Как будто к
                            бабушке в деревню съездила, но приехала подтянутой и похудевшей. Отличный вариант отдыха,
                            без
                            суеты! Рекомендую!!!</p>
                    </div>
                </li>
                <li class="otziv__item">
                    <div class="otziv__img-box">
                        <img class="otziv__img" src="img/otziv/oksana.png" alt="" srcset="">
                    </div>
                    <div class="otziv__img-info">
                        <h3 class="otziv__name">Оксана</h3>
                        <p class="otiziv__desc">Меня зовут Оксана, я была неск раз у вас в Воронцовском парке, надеюсь и
                            ещё побывать. Очень хотела вам сказать лично но неизвестно
                            когла увижу, так что рискнула написать. Я вам очень очень благодарна, вы меня прям морально
                            спасли. Если коротко, то когда то занималась фитнесом потом поправилась, интерес к фитнесу
                            как то ослаб, худеть не особо получалось, другие не очень приятные события в семье, с
                            финансами стало не очень, в общем хоть ложись смотри в потолок и все жизнь прошла и ничего
                            интересного не будет. Потом случайно по рекламе попала к вам на тренировку в Воронцовский
                            парк и оказалось с палками то интересно и ещё поняла что и старше меня люди занимаются и
                            бодро бегают, вы со мной разговаривали, конечно вы меня не помните а вот я вас хорошо
                            запомнила. Подписалась на ваши сайт, Телеграмм что там ещё начала читать, ходить по утрам.
                            Потом по вашей рекомендации пошла на учёбу в Нордик Хелп закончила 2 модуль, и жизнь то
                            оказалось только начинается. С палками хожу, учебник по сканд ходьбе читаю, разную друг инф
                            ю тоже и жизнь то налаживается 😊даже и в бассейн захотелось пойти, лет 20 не была. И есть
                            стала меньше и похудела на 1кг. И появились планы. Хотелось поменьше написать но как
                            получилось. Спасибо вам огромное, процветание вашему проекту. Надеюсь что в след году смогу
                            хоть изредка посещать ваши скандиэкскурсии. Пока присматриваюсь, настраиваюсь на Лужники,
                            немного страшно (для меня общение с незнак людьми стресс). Спасибо вам огромное! </p>
                    </div>
                </li>
                <li class="otziv__item">
                    <div class="otziv__img-box">
                        <img class="otziv__img" src="img/otziv/zagl.png" alt="" srcset="">
                    </div>
                    <div class="otziv__img-info">
                        <h3 class="otziv__name">Наталия</h3>

                        <p class="otiziv__desc">Походы выходного дня - это не
                            только тренировки. Это
                            возможность увидеть новые,
                            неизведанные места,
                            услышать много интересного
                            из истории, архитектуры и
                            искусства. А также дружноЙ
                            компанией посидеть в
                            придорожной таверне, те в
                            уютном кафе. С нетерпением
                            ждём новых объявлений И
                            приглашений.
                            Спасибо замечательному
                            гиду-инструктору Елене
                            Красновой!
                            Спасибо дружной команде
                            проекта"Помирус палками"</p>
                    </div>
                </li>
                <li class="otziv__item">
                    <div class="otziv__img-box">
                        <img class="otziv__img" src="img/otziv/new.png" alt="" srcset="">
                    </div>
                    <div class="otziv__img-info">
                        <h3 class="otziv__name">Ирина</h3>
                        <p class="otiziv__desc">Маргарита, доброе утро. Хочу тебя поблагодарить за Армению❤️
                            Она так была давно 😉, а на самом деле рядом, потому что каждый день со мной.<br>
                            На заставке экрана при разблокировке телефона каждые раз разные картинки моих путешествий, в
                            том числе и Армении. И знаешь, как греют душу эти фотографии. Я специально так настроила,
                            уже давно. И каждый раз вспоминаю о тебе и девчонках🤗 <br>
                            Дай вам бог радости и счастья!</p>
                    </div>
                </li>
            </ul>
 -->
        </div>
        <hr>
    </section>
    <section class="section feedback">
        <div class="container">
            <h2 class="feedback__title">Были на занятиях или в туре?<br>Оставьте отзыв!</h2>
            <form enctype="multipart/form-data" method="post" class="feedback__form" action="fb.php">
                <div class="feedback__input-contact">
                    <p class="input__name">Ваше имя:</p>
                    <p class="input__name">Ваш email:</p>
                    <input type="text" name="nameFF" id="nameFF" placeholder="Введите имя" required>
                    <input type="text" name="contactFF" id="contactFF" placeholder="Введите email" required>
                </div>
                <textarea required type="text" class="feedback__input-text" name="messageFF"
                    placeholder="Ваш отзыв"></textarea>
                <p class="input__name-foto">Загрузите вашу фотографию:</p>
                <div class="field__wrapper">
                    <input type="file" id="image" name="image" accept="image/*" class="field field__file">

                    <label class="field__file-wrapper" for="image">
                        <div class="field__file-fake">Файл не выбран</div>
                        <div class="field__file-button">Выбрать</div>
                    </label>

                </div>
                <input type="checkbox" name="fax_only" id="fax_only" value="1" style="display:none;"
                    autocomplete="off" />
                <input value="Отправить" type="submit" id="submitFF"
                    style="height: 40px; border: none; border-radius: 10px;" class="modal-form-btn">

            </form>
        </div>
    </section>


    <section class="section questions" id="questions">
        <script src="parts/questions.js?ver=<? echo time(); ?>"></script>
    </section>

    <section class="section partner">
        <div class="container">
            <h2 class="partner__title">Наши партнеры</h2>
            <ul class="partner__list">
                <li class="partner__item">
                    <a href="https://nordicpro.ru/" class="partner__link" target="_blank">
                        <img class="partner__img" src="img/partner/nordic.png" alt="">
                    </a>
                </li>
                <li class="partner__item">
                    <a href="https://vk.com/prival_feo" class="partner__link" target="_blank">
                        <img class="partner__img" src="img/partner/prival.png" alt="">
                    </a>
                </li>
                <li class="partner__item">
                    <a href="https://nordi-palki.ru/" class="partner__link" target="_blank">
                        <img class="partner__img" src="img/partner/Nordi Palki.svg" alt="">
                    </a>
                </li>
                <li class="partner__item">
                    <a href="https://sport-marafon.ru/" class="partner__link" target="_blank">
                        <img class="partner__img" src="img/partner/sportmar.png" alt="">
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <section class="section contacts" id="contacts">
        <script src="parts/contact.js?ver=<? echo time(); ?>"></script>
    </section>
    <!-- МОДАЛЬНЫЕ ОКНА ------------------------------------------------------------------------------------->
    <div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <img class="team__img team__modal-img" src="img/team/Lider.png" alt="">
                <div class="modal-body">
                    Маргарита Волосюк
                </div>
                <div class="modal-footer">
                    <div class="modal-desc">
                        <p>
                            Я, Волосюк Маргарита, руководитель проекта "По миру с палками". Дважды сертифицированый
                            инструктор Nordic Walking. Организатор туров и экскурсий в направлении scandi-trip.
                        </p>
                        <p>
                            Мне 54 года. И считаю этот возраст самым прекрасным для воплощения именно своих планов в
                            жизнь. Тот самый возраст, когда торопиться опасно, нервничать вредно, доверять глупо, а
                            бояться поздно. Остается только жить. Жить в свое удовольствие.</p>
                        <p>
                            Вот я и не побоялась в 50+ изменить очень круто свою жизнь. И остановить этот процесс
                            невозможно. Можно только поддержать. Готова поддержать всех, кто что-то хочет поменять в
                            своей жизни, но боится слелать первый шаг. Готова пообщаться на эту тему. Говорят
                            я сильная, но чтобы к чему-то сремиться и постараться достичь того чего хочешь именно ты,
                            надо быть сильным.</p>
                        <p>
                            Спорт моя любовь с детства, но в детстве скорее всего не хватило достаточной мотивации,
                            чтобы достичь каких-то сверхествественных результатов. И поэтому всего лишь 1й взрослый
                            разряд по баскетболу. За то сейчас мотивации хоть отбавляй. Веду занятия, лезу
                            в горы, учусь плавать (плавала всегда, но задалась целью освоить спортивное плавание). Стоит
                            задача взять репитирора по английскому.</p>
                    </div>
                    <div class="modal-diplome">
                        <hr>
                        <h3 class="modal-diplome-title">Дипломы</h3>
                        <hr>
                        <ul class="modal-list-diplome">
                            <li class="modal-item-diplome">
                                <a target="_blank" href="img/team/Diplome/dipVolosuk1.jpg">
                                    <img class="modal-diplome-img" src="img/team/Diplome/dipVolosuk1.jpg" alt=""
                                        srcset="">
                                </a>
                            </li>
                            <li class="modal-item-diplome">
                                <a target="_blank" href="img/team/Diplome/dipVolosuk2.jpg">
                                    <img class="modal-diplome-img" src="img/team/Diplome/dipVolosuk2.jpg" alt=""
                                        srcset="">
                                </a>
                            </li>
                            <li class="modal-item-diplome">
                                <a target="_blank" href="img/team/Diplome/dipVolosuk3.jpg">
                                    <img class="modal-diplome-img" src="img/team/Diplome/dipVolosuk3.jpg" alt=""
                                        srcset="">
                                </a>
                            </li>

                        </ul>

                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <img class="team__img team__modal-img" src="img/team/2.png" alt="">
                <div class="modal-body">
                    Шепелева Ольга
                </div>
                <div class="modal-footer">
                    <p class="modal-desc">
                        Я Шепелева Ольга, сертифицированный инструктор проекта "По миру с палками" У меня высшее
                        физкультурное образование. В 1990 году я закончила главный спортивный ВУЗ страны - ГЦОЛИФК по
                        специальности "преподаватель физической культуры". Спорт и всё, что
                        касается его, обожаю с детства, мне всегда казалось, что спортсмены какие-то особенные люди, не
                        знающие трудностей, болезней, и вообще они всё - чемпионы! А институт, который я в итоге
                        закончила, был для меня спортивным храмом!
                        Я занималась спортивной гимнастикой, фигурным катанием, а в юности увлеклась народными танцами.
                        Двигаться красиво, нагружать мышцы тела различными упражнениями, быть в хорошей физической форме
                        было всегда моей потребностью. Дальше
                        была, и есть сейчас, йога. Скандинавская ходьба стала потребность сразу после нескольких
                        тренировок - даже не требовалось время для принятия решения о прохождении курса подготовки
                        инструкторов по этому виду физической активности.
                        А ведь я так же, как и многие, не считала "палочки" Полезными для себя. Всё сложилось на небесах
                        без моих усилий, и вот теперь я могу сказать "ДА!!! " - это то, что нужно для здоровья,
                        поддержания спортивной формы и просто для
                        жизни. Во время проведения тренировок я уделяю особое внимание технике выполнения упражнений,
                        люблю когда красиво и правильно выполняются движения. Это позволяет прочувствовать своё тело,
                        сосредоточить и освободить ум. Моя семья
                        меня поддерживает, всё тоже спортсмены - мастера спорта международного класса по синхронному
                        плаванию и плаванию. А ещё я бабушка трёх замечательных внуков - они не отстают в своей
                        активности - хоккеист и две певицы в концертной
                        группе детского хора "Великан"! Вот что значит родиться в спортивной семье! В проекте " По миру
                        с палками" Собрались люди, с которыми всегда хочется встречаться, чувствовать себя частью очень
                        нужного дела, обмениваться самыми добрыми
                        и позитивными энергиями. Совместные тренировки, экскурсии и поездки в компании наших "ходоков" И
                        инструкторов - невероятно креативный бонус ко всему преимуществам скандинавской ходьбы. </p>
                    <div class="modal-diplome">
                        <hr>
                        <h3 class="modal-diplome-title">Дипломы</h3>
                        <hr>
                        <ul class="modal-list-diplome">
                            <li class="modal-item-diplome">
                                <a target="_blank" href="img/team/Diplome/dipShepeleva1.jpg">
                                    <img class="modal-diplome-img" src="img/team/Diplome/dipShepeleva1.jpg" alt=""
                                        srcset="">
                                </a>
                            </li>


                        </ul>

                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <img class="team__img team__modal-img" src="img/team/zuychenko.jpeg" alt="">
                <div class="modal-body">
                    Зуйченко Алексей
                </div>
                <div class="modal-footer">
                    <p class="modal-desc">
                        Привет! Меня зовут Алексей, и я обожаю скандинавскую ходьбу!** 🚶‍♂️✨<br><br>

                        Когда-то я был инженером-математиком, потом работал в медиа — редактировал тексты, снимал фото,
                        писал статьи. Но вот уже больше 8 лет моя главная страсть — скандинавская ходьба!
                        <br><br>
                        Теперь я сертифицированный инструктор (РФСХ) и даже судья соревнований. Это значит, что могу
                        научить вас ходить не только с удовольствием, но и с максимальной пользой для здоровья.
                        <br><br>
                        Почему ко мне?<br>
                        ✔ Объясню просто и без заумных терминов — даже если вы никогда не занимались.<br>
                        ✔ Помогу избежать ошибок, чтобы ходьба была в радость, а не во вред.<br>
                        ✔ Если захотите — подготовлю к соревнованиям (да, есть и такие!).<br>
                        ✔ Научу, как превратить обычную прогулку в крутую тренировку.<br><br>

                        Буду рад провести для вас:<br>
                        🔹 Индивидуальные занятия<br>
                        🔹 Тренировки для небольших групп<br>
                        🔹 Мастер-классы и выездные занятия
                    </p>
                    <!-- <div class="modal-diplome">
                        <hr>
                        <h3 class="modal-diplome-title">Дипломы</h3>
                        <hr>
                        <ul class="modal-list-diplome">
                            <li class="modal-item-diplome">
                                <a target="_blank" href="img/team/Diplome/dipKrasnova1.jpg">
                                    <img class="modal-diplome-img" src="img/team/Diplome/dipKrasnova1.jpg" alt=""
                                        srcset="">
                                </a>
                            </li>
                            <li class="modal-item-diplome">
                                <a target="_blank" href="img/team/Diplome/dipKrasnova2.png">
                                    <img class="modal-diplome-img" src="img/team/Diplome/dipKrasnova2.png" alt=""
                                        srcset="">
                                </a>
                            </li>
                            <li class="modal-item-diplome">
                                <a target="_blank" href="img/team/Diplome/dipKrasnova3.jpg">
                                    <img class="modal-diplome-img" src="img/team/Diplome/dipKrasnova3.jpg" alt=""
                                        srcset="">
                                </a>
                            </li>

                        </ul>

                    </div> -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <img class="team__img team__modal-img" src="img/team/yas.png" alt="">
                <div class="modal-body">
                    Ясинская Яна
                </div>
                <div class="modal-footer">
                    <p class="modal-desc">
                        Окончила кафедру реабилитации (бакалавриат, магистратура) в РУС «ГЦОЛИФК». И среднее медицинское
                        образование. Две зарубежные медицинские стажировки (Германия, Сербия).
                        Вся моя жизнь с самого детства тесно связана со спортом. Сначала занималась спортивной
                        гимнастикой, потом легкой атлетикой (КМС по тройному прыжку). Позже, на себе ощутив всю
                        травматичность профессионального спорта, решила, что хочу помогать людям заниматься физической
                        культурой и спортом без вреда для здоровья и в удовольствие!
                        В рамках проекта буду помогать участникам разбирать их индивидуальные проблемы, связанные со
                        здоровьем, и проводить оздоровительные занятия на основе ЛФК.
                    </p>
                    <div class="modal-diplome">
                        <hr>
                        <h3 class="modal-diplome-title">Дипломы</h3>
                        <hr>
                        <ul class="modal-list-diplome">
                            <li class="modal-item-diplome">
                                <a target="_blank" href="img/team/Diplome/dipYas1.jpg">
                                    <img class="modal-diplome-img" src="img/team/Diplome/dipYas1.jpg" alt="" srcset="">
                                </a>
                            </li>
                            <li class="modal-item-diplome">
                                <a target="_blank" href="img/team/Diplome/dipYas2.jpg">
                                    <img class="modal-diplome-img" src="img/team/Diplome/dipYas2.jpg" alt="" srcset="">
                                </a>
                            </li>


                        </ul>

                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <img class="team__img team__modal-img" src="img/team/4.png" alt="">
                <div class="modal-body">
                    Анна Ефимова
                </div>
                <div class="modal-footer">
                    <p class="modal-desc">
                        Сертифицированный инструктор по скандинавской ходьбе, Сертифицированный тренер групповых и
                        индивидуальных программ для лиц среднего и старшего возраста Высшее образование по специальности
                        «учитель физической культуры» ГЦОЛИФК (бывш.РГУФК) Я тренер, учу
                        управлять своим телом.
                        <br> В рамках проекта я провожу тренировки по обучению технике скандинавской ходьбы, тренировки
                        по ЛФК и пилатесу на основе скандинавской ходьбы.
                    </p>
                    <div class="modal-diplome">
                        <hr>
                        <h3 class="modal-diplome-title">Дипломы</h3>
                        <hr>
                        <ul class="modal-list-diplome">
                            <li class="modal-item-diplome">
                                <a target="_blank" href="img/team/Diplome/dipEfimova1.jpg">
                                    <img class="modal-diplome-img" src="img/team/Diplome/dipEfimova1.jpg" alt=""
                                        srcset="">
                                </a>
                            </li>
                            <li class="modal-item-diplome">
                                <a target="_blank" href="img/team/Diplome/dipEfimova2.jpg">
                                    <img class="modal-diplome-img" src="img/team/Diplome/dipEfimova2.jpg" alt=""
                                        srcset="">
                                </a>
                            </li>

                        </ul>

                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>




    <!-- ------------------------------------------------------------------------------------------------------>
    <footer class="footer"></footer>

    <!-- <script>
        var myCarousel = document.querySelector('#carousel')
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 0,

        })
    </script> -->

    <!-- Модальное окно -->
    
    <script>
        let fields = document.querySelectorAll('.field__file');
        Array.prototype.forEach.call(fields, function (input) {
            let label = input.nextElementSibling,
                labelVal = label.querySelector('.field__file-fake').innerText;

            input.addEventListener('change', function (e) {
                let countFiles = '';
                if (this.files && this.files.length >= 1)
                    countFiles = this.files.length;

                if (countFiles)
                    label.querySelector('.field__file-fake').innerText = 'Выбрано файлов: ' + countFiles;
                else
                    label.querySelector('.field__file-fake').innerText = labelVal;
            });
        });
    </script>





    <script src="js/main.js?ver=5"></script>
    <script defer src="js/scroll.js"></script>
    <script src="modal/Burger.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <script>
        var myCarousel = document.querySelector('.carousel')
        var carousel = new bootstrap.Carousel(myCarousel)

    </script>
    
</body>

</html>