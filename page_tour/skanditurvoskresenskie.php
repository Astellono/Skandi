<?php
session_start();
require_once '../phpLogin/connect.php'; // Подключение к базе данных
require_once '../getDATA/getAncetaData.php';
require_once '../getDATA/getUserData.php';
require_once '../parts/formTour.php';
require_once '../getDATA/tourPageData.php';

$currentPagePath = 'page_tour/' . basename(__FILE__);
$tourData = getTourPageData($connect, $currentPagePath, [
    'name' => 'Сканди-тур «Воскресенские гуляния с Купцом Баранкиным»',
    'date' => '',
    'price' => '17250р'
]);

                // Загружаем полные данные тура из БД для отображения
                $stmt = $connect->prepare('SELECT tour_description, tour_difficulty, tour_guides, tour_program, tour_group_size, tour_price_includes, tour_price_excludes, tour_imgSrc, tour_date_start, tour_date_end, tour_formTour_param FROM tours WHERE tour_linkPage = ? LIMIT 1');
                $fullTourData = ['description' => '', 'difficulty' => '', 'guides' => [], 'program' => [], 'group_size' => '', 'price_includes' => '', 'price_excludes' => '', 'imgSrc' => '', 'date_start' => '', 'date_end' => '', 'formTour_param' => ''];
                if ($stmt) {
                    $stmt->bind_param('s', $currentPagePath);
                    if ($stmt->execute()) {
                        $result = $stmt->get_result();
                        if ($row = $result->fetch_assoc()) {
                            $fullTourData['description'] = $row['tour_description'] ?? '';
                            $fullTourData['difficulty'] = $row['tour_difficulty'] ?? '';
                            $fullTourData['guides'] = !empty($row['tour_guides']) ? json_decode($row['tour_guides'], true) : [];
                            $fullTourData['program'] = !empty($row['tour_program']) ? json_decode($row['tour_program'], true) : [];
                            $fullTourData['group_size'] = $row['tour_group_size'] ?? '';
                            $fullTourData['price_includes'] = $row['tour_price_includes'] ?? '';
                            $fullTourData['price_excludes'] = $row['tour_price_excludes'] ?? '';
                            $fullTourData['imgSrc'] = $row['tour_imgSrc'] ?? '';
                            // Важно: проверяем, что даты не NULL и не пустые
                            $fullTourData['date_start'] = !empty($row['tour_date_start']) ? trim($row['tour_date_start']) : '';
                            $fullTourData['date_end'] = !empty($row['tour_date_end']) ? trim($row['tour_date_end']) : '';
                            $fullTourData['formTour_param'] = $row['tour_formTour_param'] ?? '';
                        }
                    }
                    $stmt->close();
                }

                // Формируем текст даты из tour_date_start и tour_date_end
                $dateText = ''; // Инициализируем пустой строкой
                
                // Сначала проверяем новые поля tour_date_start и tour_date_end
                if (!empty($fullTourData['date_start']) && !empty($fullTourData['date_end'])) {
                    try {
                        $startDate = new DateTime($fullTourData['date_start']);
                        $endDate = new DateTime($fullTourData['date_end']);
                        $months = ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня',
                                   'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'];
                        
                        $startDay = (int)$startDate->format('d');
                        $startMonth = $months[(int)$startDate->format('m') - 1];
                        $startYear = $startDate->format('Y');
                        
                        $endDay = (int)$endDate->format('d');
                        $endMonth = $months[(int)$endDate->format('m') - 1];
                        $endYear = $endDate->format('Y');
                        
                        if ($startYear === $endYear) {
                            if ($startMonth === $endMonth) {
                                // Один месяц: "15–20 января 2024 г"
                                $dateText = 'Даты: ' . $startDay . '–' . $endDay . ' ' . $startMonth . ' ' . $startYear . ' г';
                            } else {
                                // Разные месяцы, один год: "15 января – 20 февраля 2024 г"
                                $dateText = 'Даты: ' . $startDay . ' ' . $startMonth . ' – ' . $endDay . ' ' . $endMonth . ' ' . $startYear . ' г';
                            }
                        } else {
                            // Разные годы: "15 января 2024 – 20 февраля 2025 г"
                            $dateText = 'Даты: ' . $startDay . ' ' . $startMonth . ' ' . $startYear . ' – ' . $endDay . ' ' . $endMonth . ' ' . $endYear . ' г';
                        }
                    } catch (Exception $e) {
                        // Если ошибка обработки даты, пробуем использовать старое поле
                        if (!empty($tourData['date'])) {
                            $dateText = 'Даты: ' . htmlspecialchars($tourData['date'], ENT_QUOTES, 'UTF-8');
                        } else {
                            $dateText = 'Даты: ';
                        }
                    }
                } elseif (!empty($tourData['date'])) {
                    // Если есть старое поле tour_date, используем его
                    $dateText = 'Даты: ' . htmlspecialchars($tourData['date'], ENT_QUOTES, 'UTF-8');
                } else {
                    // Если ничего не найдено, используем значение по умолчанию
                    $dateText = 'Даты: ';
                }

                // Формируем путь к изображению тура
                $tourImgPath = '';
                if (!empty($fullTourData['imgSrc'])) {
                    $imgSrc = $fullTourData['imgSrc'];
                    // Если путь начинается с /, используем как абсолютный, иначе добавляем ../ для относительного
                    if (strpos($imgSrc, '/') === 0) {
                        $tourImgPath = $imgSrc;
                    } else {
                        $tourImgPath = '../' . $imgSrc;
                    }
                }
                
                // Генерируем даты для дней из диапазона тура
                $tourDates = [];
                if (!empty($fullTourData['date_start']) && !empty($fullTourData['date_end'])) {
                    try {
                        $startDate = new DateTime($fullTourData['date_start']);
                        $endDate = new DateTime($fullTourData['date_end']);
                        $currentDate = clone $startDate;
                        $dayIndex = 1;
                        $months = ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня',
                                   'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'];
                        while ($currentDate <= $endDate) {
                            $dayNum = (int)$currentDate->format('d');
                            $monthName = $months[(int)$currentDate->format('m') - 1];
                            $tourDates[$dayIndex] = $dayNum . ' ' . $monthName;
                            $currentDate->modify('+1 day');
                            $dayIndex++;
                        }
                    } catch (Exception $e) {
                        // Ошибка обработки даты, игнорируем
                    }
                }
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
    <meta name="description" content="Это путешествие в неизведанный для многих, но удивительный город Воскресенск и его живописные окрестности. Вас ждут прогулки вдоль старинного торговог...">
    <link rel="icon" sizes="120x120" href="/img/icon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="../style/clear.css">
    <link rel="stylesheet" href="../style/bootstrap.css">
    <link rel="stylesheet" href="../style/style.css?ver=<? echo time(); ?>">
    <link rel="stylesheet" href="../style/style-adaptive.css?ver=<? echo time(); ?>">
    <script defer src="../js/scroll.js"></script>
    <script src="../js/fotoslide.js" defer></script>
    <style>
        .lim {
            list-style-type: disc;
            margin-left: 20px;
            color: #60326B;
            margin-top: 10px;
        }
    </style>
    <title><?php echo htmlspecialchars($tourData['name'] ?? 'Сканди-тур «Воскресенские гуляния с Купцом Баранкиным»', ENT_QUOTES, 'UTF-8'); ?></title>
</head>

<body>
    <header class="header" id="header">
        <?php
        include '../parts/headerPHP.php';
        ?>
    </header>

    <section class="tour">
        <div class="container">

            <div class="tour__page__header">

                <div class="tour__page__imgBox">
                    <?php if (!empty($tourImgPath)): ?>
                    <img class="tour__page__img" src="<?php echo htmlspecialchars($tourImgPath, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($tourData['name'] ?? 'Сканди-тур «Воскресенские гуляния с Купцом Баранкиным»', ENT_QUOTES, 'UTF-8'); ?>">
                    <?php else: ?>
                    <img class="tour__page__img" src="../img/act-tour/default.jpg" alt="<?php echo htmlspecialchars($tourData['name'] ?? 'Сканди-тур «Воскресенские гуляния с Купцом Баранкиным»', ENT_QUOTES, 'UTF-8'); ?>">
                    <?php endif; ?>
                    <div class="tour__page__titleBox">
                        <h1 class="tour__page__title">
                            <?php echo htmlspecialchars($tourData['name'] ?? 'Сканди-тур «Воскресенские гуляния с Купцом Баранкиным»', ENT_QUOTES, 'UTF-8'); ?>
                        </h1>
                        <h2 class="tour__page__date"><?php echo $dateText; ?></h2>
                    </div>

                </div>

            </div>
            <div class="tour__page__infoBlock">

                <?php if (!empty($fullTourData['description'])): 
                ?>
                <div class="tour__page__desc">
                    <?php echo $fullTourData['description']; ?>
                </div>
                <?php endif; ?>
                <hr>
                <div class="tour__page__bottom">

                    <?php if (!empty($fullTourData['guides'])): ?>
                    <div class="tour__page__gid">
                        <h2 class="tour__page__gid__title">Сопровождающие:</h2>
                        <ul class="tour__page__gid__list">
                            <?php foreach ($fullTourData['guides'] as $guide): ?>
                            <li class="tour__page__gid__item">
                                    <?php 
                                        $photoPath = !empty($guide['photo']) ? $guide['photo'] : '../img/otziv/zagl1.png';
                                        // Если путь не начинается с /, добавляем ../ для относительного пути от page_tour/
                                        if (strpos($photoPath, '/') !== 0 && strpos($photoPath, '../') !== 0) {
                                            $photoPath = '../' . $photoPath;
                                        } elseif (strpos($photoPath, '/') === 0) {
                                            // Абсолютный путь превращаем в относительный
                                            $photoPath = '..' . $photoPath;
                                        }
                                    ?>
                                    <img class="tour__page__gid__img" src="<?php echo htmlspecialchars($photoPath, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($guide['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                <h3 class="tour__page__gid__title-member"><?php echo htmlspecialchars($guide['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h3>
                                <p class="tour__page__gid__desc"><?php echo htmlspecialchars($guide['role'] ?? 'Гид', ENT_QUOTES, 'UTF-8'); ?></p>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($fullTourData['difficulty'])): ?>
                    <div class="tour__page__rate">
                        <h2 class="tour__page__rateTitle">Сложность маршрута</h2>
                        <img src="/img/rate/<?php echo htmlspecialchars($fullTourData['difficulty'], ENT_QUOTES, 'UTF-8'); ?>.svg" alt="Сложность <?php echo htmlspecialchars($fullTourData['difficulty'], ENT_QUOTES, 'UTF-8'); ?> из 5" srcset="">
                    </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>

    </section>

    <?php if (!empty($fullTourData['program'])): ?>
    <section class="diary">
        <h2 class="diary-title">
            Расписание
        </h2>
        <div class="container">

            <ul class="modal-tour-list accordion accordion-flush" id="accordionFlushExample">

                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <?php foreach ($fullTourData['program'] as $index => $day): 
                        $dayNum = $day['day_num'] ?? ($index + 1);
                        
                        // Получаем дату дня: из данных дня или из сгенерированного массива
                        $dayDate = $day['date'] ?? '';
                        if (empty($dayDate) && isset($tourDates[$dayNum])) {
                            $dayDate = $tourDates[$dayNum];
                        }
                        
                        $dayTitle = $day['title'] ?? '';
                        $dayActivities = $day['activities'] ?? '';
                        
                        // Формируем заголовок дня: День X (дата) — Заголовок
                        $dayTitleFull = "День " . $dayNum;
                        if (!empty($dayDate)) {
                            $dayTitleFull .= " (" . htmlspecialchars($dayDate, ENT_QUOTES, 'UTF-8') . ")";
                        }
                        if (!empty($dayTitle)) {
                            $dayTitleFull .= " — " . htmlspecialchars($dayTitle, ENT_QUOTES, 'UTF-8');
                        }
                        
                        $collapseId = 'flush-collapse' . ($index + 1);
                        $headingId = 'flush-heading' . ($index + 1);
                    ?>
                    <!-- День <?php echo $dayNum; ?> -->
                    <li class="modal-tour-item accordion-item">
                        <h2 class="accordion-header" id="<?php echo $headingId; ?>">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#<?php echo $collapseId; ?>" aria-expanded="false" aria-controls="<?php echo $collapseId; ?>">
                                <h3><?php echo htmlspecialchars($dayTitleFull, ENT_QUOTES, 'UTF-8'); ?></h3>
                            </button>
                        </h2>
                        <div id="<?php echo $collapseId; ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo $headingId; ?>"
                            data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <?php if (!empty($dayActivities)): ?>
                                    <div class="modal-active-content">
                                        <?php echo $dayActivities; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </div>
            </ul>
        </div>
    </section>
    <?php endif; ?>
    
    <section class="order">
        <div class="container order__container">
            <div class="order__contant">
                <div class="tour__page__pricePart">
                    <p class="tour__page__price">Стоимость: <?php echo htmlspecialchars($tourData['price'] ?? '17250р', ENT_QUOTES, 'UTF-8'); ?><?php 
                    if (!empty($fullTourData['group_size'])): 
                    ?><br> Группа <?php echo htmlspecialchars($fullTourData['group_size'], ENT_QUOTES, 'UTF-8'); ?> <?php endif; ?></p>
                    <?php if (!empty($fullTourData['price_includes'])): ?>
                    <div class="tour__page__priceIn"><strong>В стоимость входит:</strong> <span class="tour__page__priceIn__content"><?php echo $fullTourData['price_includes']; ?></span></div>
                    <?php endif; ?>
                    <?php if (!empty($fullTourData['price_excludes'])): ?>
                    <div class="tour__page__priceOff"><strong>Не входит в стоимость:</strong> <span class="tour__page__priceOff__content"><?php echo $fullTourData['price_excludes']; ?></span></div>
                    <?php endif; ?>
                    
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
    <script src="../parts/footer.js?ver=<? echo time(); ?>"></script>

    <script src="../node_modules/jquery/dist/jquery.js"></script>

    <?php 
        // Используем tour_formTour_param из БД, если указан, иначе название тура
        $formTourParam = '';
        if (!empty($fullTourData['formTour_param'])) {
            $formTourParam = htmlspecialchars($fullTourData['formTour_param'], ENT_QUOTES, 'UTF-8');
        } else {
            $formTourParam = htmlspecialchars($tourData['name'] ?? 'Сканди-тур «Воскресенские гуляния с Купцом Баранкиным»', ENT_QUOTES, 'UTF-8');
        }
        formTour($formTourParam); 
    ?>
    <script>
        <?php if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != '') { ?>
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