<?php
session_start();
require_once 'phpLogin/connect.php';


require_once 'getDATA/getAncetaData.php';
require_once 'getDATA/getUserData.php';

require_once 'parts/formFoto.php';

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Фотоклуб "Фото-прогулки" | Алексей Зуйченко</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Playfair+Display:wght@400;600&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/clear.css">

    <link rel="stylesheet" href="style/style.css?ver=<? echo time(); ?>">
    <link rel="stylesheet" href="style/style-adaptive.css?ver=<? echo time(); ?>">
    <style>
        :root {
            --primary: #2c3e50;
            --accent: #9a3ce7ff;
            --light: #ecf0f1;
            --dark: #7c43c5ff;
            --text: #333333ff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;

        }

        body {
            font-family: 'Montserrat', sans-serif;
            color: var(--text);
            line-height: 1.6;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://png.pngtree.com/background/20230611/original/pngtree-bunch-of-old-pictures-are-laying-on-a-table-picture-image_3170736.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            text-align: center;
        }

        .hero-content {
            max-width: 1000px;
            margin: 0 auto;
        }

        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .tagline {
            font-size: 1.5rem;
            margin-bottom: 30px;
        }

        .btnC {
            display: inline-block;
            background-color: var(--accent);
            color: white;
            padding: 15px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            opacity: 1;

        }

        .btnC:hover {
            opacity: 0.8 !important;
            transform: translateY(-3px);
        }

        /* About section */
        .about {
            padding: 80px 0;
            background-color: white;
        }

        h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 50px;
            color: var(--dark);
        }

        .about-content {
            max-width: 800px;
            margin: 0 auto;
            font-size: 1.1rem;
            text-align: center;
        }

        /* Benefits section */
        .benefits {
            padding: 80px 0;
            background-color: #f8f9fa;
        }

        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .benefit-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .benefit-card:hover {
            transform: translateY(-10px);
        }

        .benefit-img {
            height: 200px;
            background-size: cover;
            background-position: center;
        }

        .benefit-content {
            padding: 25px;
        }

        h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: var(--dark);
        }

        /* Leader section */
        .leader {
            padding: 80px 0;
            background-color: white;
        }

        .leader-container {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 40px;
        }

        .leader-img {
            flex: 1;
            min-width: 300px;
            height: 400px;
            background: url('img/team/zuychenko.jpeg');
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
            border-radius: 10px;

        }

        .leader-info {
            flex: 1;
            min-width: 300px;
        }

        .leader-name {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            margin-bottom: 20px;
            color: var(--dark);
        }

        /* Pricing section */
        .pricing {
            padding: 80px 0;
            background-color: white;
        }

        .pricing-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            display: table;
        }

        .pricing-table th,
        .pricing-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .pricing-table th {
            background-color: var(--dark);
            color: white;
            font-weight: 600;
        }

        .pricing-table tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .pricing-table tr:hover {
            background-color: #e9ecef;
        }

        .price-tag {
            text-align: center !important;
            width: 400px;
            font-weight: 700;
            color: var(--accent);
        }

        .pricing-accordion {
            display: none;
        }

        .accordion-item {
            margin-bottom: 15px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .accordion-header {
            background-color: var(--dark);
            color: white;
            padding: 15px;
            cursor: pointer;
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .accordion-content {
            padding: 15px;
            background-color: white;
            border-top: 1px solid #eee;
        }

        .accordion-price {
            
            font-weight: 700;
            color: var(--accent);
            margin: 10px 0;
        }

        /* CTA section */
        .cta {
            padding: 100px 0;
            background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('https://images.unsplash.com/photo-1551632811-561732d1e306?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
        }

        .cta h2 {
            color: white;
            margin-bottom: 30px;
        }

        /* Footer */
        footer {
            background-color: var(--dark);
            color: white;
            padding: 40px 0;
            text-align: center;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            h1 {
                font-size: 2.5rem;
            }

            .tagline {
                font-size: 1.2rem;
            }

            .leader-container {
                flex-direction: column;
            }

            .pricing-table {
                display: none;
            }

            .pricing-accordion {
                display: block;
            }
        }
    </style>
</head>

<body>
    <!-- Hero Section -->
    <header class="header" id="header">
        <?php include 'parts/headerPHP.php'; ?>
    </header>
    <section class="hero">
        <div class="container hero-content">
            <h1>Фотоклуб "По Миру с Палками"</h1>
            <p class="tagline">Открывайте мир с новой стороны вместе с нами</p>
            <a href="#join" class="btnC">Присоединиться</a>
        </div>
    </section>

    <!-- About Section -->
    <section class="about">
        <div class="container">
            <h2>О нашем фотоклубе</h2>
            <div class="about-content">
                <p>Любите прогулки на свежем воздухе и хотите научиться сохранять самые яркие моменты в по-настоящему
                    красивых кадрах? Наш новый фотоклуб создан специально для вас!</p>
                <p>Мы идем дальше обычных экскурсий. В формате наших фото-прогулок мы делаем упор на обучение, развитие
                    навыков и творческий подход к фотографии.</p>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="benefits">
        <div class="container">
            <h2>Что вы получите</h2>
            <div class="benefits-grid">
                <div class="benefit-card">
                    <div class="benefit-img"
                        style="background-image: url('https://images.unsplash.com/photo-1495856458515-0637185db551?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');">
                    </div>
                    <div class="benefit-content">
                        <h3>Практические мастер-классы</h3>
                        <p>Съемка пейзажа, портрета, макросъемка прямо во время прогулок с опытными фотографами.</p>
                    </div>
                </div>

                <div class="benefit-card">
                    <div class="benefit-img"
                        style="background-image: url('https://images.unsplash.com/photo-1452780212940-6f5c0d14d848?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');">
                    </div>
                    <div class="benefit-content">
                        <h3>Помощь от профессионалов</h3>
                        <p>Советы по настройке камеры и построению кадра от опытного фотографа.</p>
                    </div>
                </div>

                <div class="benefit-card">
                    <div class="benefit-img"
                        style="background-image: url('https://images.unsplash.com/photo-1554048612-b6a482bc67e5?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');">
                    </div>
                    <div class="benefit-content">
                        <h3>Основы обработки фотографий</h3>
                        <p>Научим, как превратить хороший снимок в настоящий шедевр с помощью постобработки.</p>
                    </div>
                </div>

                <div class="benefit-card">
                    <div class="benefit-img"
                        style="background-image: url('https://images.unsplash.com/photo-1516035069371-29a1b244cc32?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');">
                    </div>
                    <div class="benefit-content">
                        <h3>Уникальные фото-услуги</h3>
                        <p>Поможем создать вашу личную фотогалерею из путешествий, о которой вы всегда мечтали.</p>
                    </div>
                </div>

                <div class="benefit-card">
                    <div class="benefit-img"
                        style="background-image: url('https://images.unsplash.com/photo-1536935338788-846bb9981813?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');">
                    </div>
                    <div class="benefit-content">
                        <h3>Общение с единомышленниками</h3>
                        <p>Вдохновение, совместное творчество и обмен опытом с такими же увлеченными фотографией людьми.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="pricing">
        <div class="container">
            <h2>Наши тарифы</h2>

            <!-- Desktop Table -->
            <table class="pricing-table">
                <thead>
                    <tr>
                        <th>Тариф</th>
                        <th>Описание</th>
                        <th class="price-tag">Стоимость</th>
                        <th>Примечания</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Простое членство</td>
                        <td>Разбор и рецензирование работ участников (до 4 фото/мес), онлайн консультации по любым
                            разделам фотографии, удаленная помощь в настройке аппаратуры, съемке и обработке фотографий.
                            Приоритетное вне квоты участие в оффлайн-мероприятиях.</td>
                        <td class="price-tag">700 р/мес</td>
                        <td>Участники пользуются постоянной обратной связью с клубом, предлагают свои варианты маршрутов
                            и время проведения прогулок. Доступен вариант «Расширенное членство»: 1500 р/мес (разбор до
                            10 фото + приоритет записи на прогулки).</td>
                    </tr>
                    <tr>
                        <td>Расширенное членство</td>
                        <td>Простое+6(=10) фото в месяц + приоритетная вне квоты запись на любые прогулки</td>
                        <td class="price-tag">1500 р/мес</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Групповая фотопрогулка</td>
                        <td>Прогулка по выбранному заранее маршруту или локации. Общение на «фототемы» (и не только),
                            «живые» консультации по приобретению и настройке фотоаппаратуры, съемке и обработке
                            фотографии. Совместное фотографирование, обсуждение отснятого материала (онлайн вне часы
                            прогулки). По истечении 2-5 дней участники получают до 10 обработанных портретов или
                            фотографий иных жанров)</td>
                        <td class="price-tag">3000 р</td>
                        <td>Длительность 2-3 часа по желанию участников. Желающие могут принимать участие в обсуждении
                            и(или) предлагать свои варианты маршрутов и локаций. Время прогулки может быть назначено
                            клубом, или определено исходя из возможностей желания участников. Стоимость указана за
                            одного участника.</td>
                    </tr>
                    <tr>
                        <td>Индивидуальная фотопрогулка</td>
                        <td>Участник индивидуально договаривается с фотографом о месте и времени проведения
                            фотопрогулки. Все время фотопрогулки уделено одному участнику. В течение двух суток после
                            прогулки участник получает до 15 своих обработанных портретов или иных фотографий. Фотограф
                            рецензирует и помогает в обработке отснятого участником материала (до 10 фотографий). В
                            остальном действуют все опции групповой фотопрогулки</td>
                        <td class="price-tag">3000 р/час</td>
                        <td>Минимум 1 час, далее почасовая оплата.</td>
                    </tr>
                    <tr>
                        <td>Фотосессия</td>
                        <td>В зависимости от задачи, поставленной участником, определяется время и места съемки.
                            Результатом являются не менее 15 фотоснимков, изготовленных и обработанных под заказ
                            участника. Все время фотосессии посвящено съемкам участника в различных позах и локациях.
                        </td>
                        <td class="price-tag">от 5000 р/час</td>
                        <td>2-3 часа (В случае студийной съемки аренда студии, реквизита, услуг стилиста и визажиста
                            оплачиваются отдельно).</td>
                    </tr>
                    <tr>
                        <td>Портрет</td>
                        <td>Фотограф «проживает» с героем часть дня, делая фото в различных локациях и обстоятельствах
                            (дом, офис, парк, кафе, авто… с коллегами, семьей, детьми и т.п.)</td>
                        <td class="price-tag">35 000 р</td>
                        <td>8 часов (+7000 р за каждые доп. 2 часа)</td>
                    </tr>
                    <tr>
                        <td>Фотопрогулка выходного дня</td>
                        <td>Выезд на заранее определенную загородную локацию или фотопоход по выбранному маршруту с
                            фотоостановками. Опции аналогичны групповой фотопрогулке.</td>
                        <td class="price-tag">
                            1. Базовое участие (без фото) — 5000 р<br>
                            2. +15 фото и разбор работ — 8000 р<br>
                            3. +30 фото и разбор работ — 12 000 р
                        </td>
                        <td>8-12 часов. Возможно использование скандинавских палок, но главная задача этой прогулки –
                            фотографирование и «фотообщение»</td>
                    </tr>
                </tbody>
            </table>

            <!-- Mobile Accordion -->
            <div class="pricing-accordion">
                <div class="accordion-item">
                    <div class="accordion-header" onclick="toggleAccordion(this)">
                        Простое членство <i class="fa fa-chevron-down"></i>
                    </div>
                    <div class="accordion-content">
                        <p><strong>Описание:</strong> Разбор и рецензирование работ участников (до 4 фото/мес), онлайн
                            консультации по любым разделам фотографии, удаленная помощь в настройке аппаратуры, съемке и
                            обработке фотографий. Приоритетное вне квоты участие в оффлайн-мероприятиях.</p>
                        <p class="accordion-price"><strong>Стоимость:</strong> 700 р/мес</p>
                        <p><strong>Примечания:</strong> Участники пользуются постоянной обратной связью с клубом,
                            предлагают свои варианты маршрутов и время проведения прогулок. Доступен вариант
                            «Расширенное членство»: 1500 р/мес (разбор до 10 фото + приоритет записи на прогулки).</p>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header" onclick="toggleAccordion(this)">
                        Расширенное членство <i class="fa fa-chevron-down"></i>
                    </div>
                    <div class="accordion-content">
                        <p><strong>Описание:</strong> Простое+6(=10) фото в месяц + приоритетная вне квоты запись на
                            любые прогулки</p>
                        <p class="accordion-price"><strong>Стоимость:</strong> 1500 р/мес</p>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header" onclick="toggleAccordion(this)">
                        Групповая фотопрогулка <i class="fa fa-chevron-down"></i>
                    </div>
                    <div class="accordion-content">
                        <p><strong>Описание:</strong> Прогулка по выбранному заранее маршруту или локации. Общение на
                            «фототемы» (и не только), «живые» консультации по приобретению и настройке фотоаппаратуры,
                            съемке и обработке фотографии. Совместное фотографирование, обсуждение отснятого материала
                            (онлайн вне часы прогулки). По истечении 2-5 дней участники получают до 10 обработанных
                            портретов или фотографий иных жанров)</p>
                        <p class="accordion-price"><strong>Стоимость:</strong> 3000 р (цена указана за одного участника)
                        </p>
                        <p><strong>Примечания:</strong> Длительность 2-3 часа по желанию участников. Желающие могут
                            принимать участие в обсуждении и(или) предлагать свои варианты маршрутов и локаций. Время
                            прогулки может быть назначено клубом, или определено исходя из возможностей желания
                            участников.</p>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header" onclick="toggleAccordion(this)">
                        Индивидуальная фотопрогулка <i class="fa fa-chevron-down"></i>
                    </div>
                    <div class="accordion-content">
                        <p><strong>Описание:</strong> Участник индивидуально договаривается с фотографом о месте и
                            времени проведения фотопрогулки. Все время фотопрогулки уделено одному участнику. В течение
                            двух суток после прогулки участник получает до 15 своих обработанных портретов или иных
                            фотографий. Фотограф рецензирует и помогает в обработке отснятого участником материала (до
                            10 фотографий). В остальном действуют все опции групповой фотопрогулки</p>
                        <p class="accordion-price"><strong>Стоимость:</strong> 3000 р/час</p>
                        <p><strong>Примечания:</strong> Минимум 1 час, далее почасовая оплата.</p>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header" onclick="toggleAccordion(this)">
                        Фотосессия <i class="fa fa-chevron-down"></i>
                    </div>
                    <div class="accordion-content">
                        <p><strong>Описание:</strong> В зависимости от задачи, поставленной участником, определяется
                            время и места съемки. Результатом являются не менее 15 фотоснимков, изготовленных и
                            обработанных под заказ участника. Все время фотосессии посвящено съемкам участника в
                            различных позах и локациях.</p>
                        <p class="accordion-price"><strong>Стоимость:</strong> от 5000 р/час</p>
                        <p><strong>Примечания:</strong> 2-3 часа (В случае студийной съемки аренда студии, реквизита,
                            услуг стилиста и визажиста оплачиваются отдельно).</p>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header" onclick="toggleAccordion(this)">
                        Портрет <i class="fa fa-chevron-down"></i>
                    </div>
                    <div class="accordion-content">
                        <p><strong>Описание:</strong> Фотограф «проживает» с героем часть дня, делая фото в различных
                            локациях и обстоятельствах (дом, офис, парк, кафе, авто… с коллегами, семьей, детьми и т.п.)
                        </p>
                        <p class="accordion-price"><strong>Стоимость:</strong> 35 000 р</p>
                        <p><strong>Примечания:</strong> 8 часов (+7000 р за каждые доп. 2 часа)</p>
                    </div>
                </div>

                <div class="accordion-item">
                    <div class="accordion-header" onclick="toggleAccordion(this)">
                        Фотопрогулка выходного дня <i class="fa fa-chevron-down"></i>
                    </div>
                    <div class="accordion-content">
                        <p><strong>Описание:</strong> Выезд на заранее определенную загородную локацию или фотопоход по
                            выбранному маршруту с фотоостановками. Опции аналогичны групповой фотопрогулке.</p>
                        <p class="accordion-price"><strong>Стоимость:</strong><br>
                            1. Базовое участие (без фото) — 5000 р<br>
                            2. +15 фото и разбор работ — 8000 р<br>
                            3. +30 фото и разбор работ — 12 000 р
                        </p>
                        <p><strong>Примечания:</strong> 8-12 часов. Возможно использование скандинавских палок, но
                            главная задача этой прогулки – фотографирование и «фотообщение»</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Leader Section -->
    <section class="leader">
        <div class="container">
            <h2>Руководитель клуба</h2>
            <div class="leader-container">
                <div class="leader-img"></div>
                <div class="leader-info">
                    <h3 class="leader-name">Алексей Зуйченко</h3>
                    <p>Инструктор по северной ходьбе, журналист, медиаменеджер и фотограф с многолетним опытом работы в
                    печатных и электронных СМИ. Достаточно сказать, что свою успешную журналистскую карьеру Алексей
                    начинал именно в качестве фоторепортера. В его фотоактиве кураторство фотослужб крупнейших
                    ежедневных федеральных изданий в качестве ответственного секретаря и заместителя главного редактора.
                    Любимые жанры - фоторепортаж, портретная фотография, городской и природный пейзаж.</p>
                    <p>Алексей создал этот фотоклуб, чтобы делиться своими знаниями и помогать другим открывать красоту
                    окружающего мира через объектив камеры.</p>
                    <p>"Моя цель — не просто научить вас технике фотографии, а помочь развить творческое видение, которое
                    позволит создавать по-настоящему уникальные кадры"».</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta" id="join">
        <div class="container">
            <h2>Присоединяйтесь к нашему фотоклубу</h2>
            <p>Неважно, новичок вы или уже увлеченный фотолюбитель — здесь вы найдете то, что ищете.</p>
            <a href="#openModal" class="btnC">Записаться на пробную прогулку</a>
        </div>
    </section>
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script defer src="js/scroll.js"></script>

    <script>
        // Аккордеон для мобильной версии
        function toggleAccordion(element) {
            const content = element.nextElementSibling;
            const icon = element.querySelector('i');

            if (content.style.display === 'block') {
                content.style.display = 'none';
                icon.className = 'fa fa-chevron-down';
            } else {
                content.style.display = 'block';
                icon.className = 'fa fa-chevron-up';
            }
        }

        // Закрыть все элементы аккордеона при загрузке
        document.querySelectorAll('.accordion-content').forEach(item => {
            item.style.display = 'none';
        });
    </script>
    <?php formFoto(); ?>
    <script>
        <?php if ($_SESSION["user_id"] != '') { ?>
            let anceta = <?= json_encode($ancetaData); ?>[0];
            let fio = '<?= $user['user_name'] ?>';
            let email = '<?= $user['user_email'] ?>';
        <?php } ?>
    </script>
    <script src="js/anceta.js"></script>
    <footer class="footer"></footer>
    <script src="parts/footer.js?ver=<? echo time(); ?>"></script>
    <script src="modal/bootstrap.bundle.js"></script>
</body>

</html>