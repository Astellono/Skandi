<?php
// Включаем вывод ошибок для отладки (только для разработки)
error_reporting(E_ALL);
ini_set('display_errors', 0); // Не выводим ошибки в браузер, только логируем
ini_set('log_errors', 1);

session_start();
header('Content-Type: application/json; charset=utf-8');
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpLogin/connect.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/functions/tour_helpers.php';

if (!isset($_SESSION['user_id']) || !in_array((int)$_SESSION['user_id'], [7, 10], true)) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Не авторизован']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Некорректный запрос']);
    exit;
}

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!$data) {
    http_response_code(400);
    $error = json_last_error_msg();
    echo json_encode(['success' => false, 'message' => 'Ошибка декодирования JSON: ' . $error, 'input_preview' => substr($input, 0, 200)]);
    exit;
}

try {
    // Подготавливаем данные для генерации предпросмотра
    $tour_name = trim($data['tour_name'] ?? '');
    $tour_date = isset($data['tour_date']) ? trim($data['tour_date']) : '';
    $tour_price = isset($data['tour_price']) ? trim($data['tour_price']) : '';
    $tour_description = isset($data['tour_description']) ? trim($data['tour_description']) : '';
    $tour_difficulty = isset($data['tour_difficulty']) ? trim($data['tour_difficulty']) : '1';
    $tour_group_size = isset($data['tour_group_size']) ? trim($data['tour_group_size']) : '';
    $tour_price_includes = isset($data['tour_price_includes']) ? trim($data['tour_price_includes']) : '';
    $tour_price_excludes = isset($data['tour_price_excludes']) ? trim($data['tour_price_excludes']) : '';
    $tour_imgSrc = isset($data['tour_imgSrc']) ? trim($data['tour_imgSrc']) : '';
    $tour_guides = isset($data['tour_guides']) ? $data['tour_guides'] : '[]';
    $tour_program = isset($data['tour_program']) ? $data['tour_program'] : '[]';
    $tour_date_start = isset($data['tour_date_start']) ? trim($data['tour_date_start']) : '';
    $tour_date_end = isset($data['tour_date_end']) ? trim($data['tour_date_end']) : '';
    
    // Автоматическая генерация пути, если не указан
    if (empty($tour_imgSrc)) {
        if (function_exists('generateTourFileName') && !empty($tour_name)) {
            $baseName = generateTourFileName($tour_name);
            $tour_imgSrc = 'img/act-tour/' . $baseName . '.jpg';
        } else {
            $tour_imgSrc = 'img/act-tour/default.jpg';
        }
    }
    
    // Убираем расширение .php, если оно случайно попало в путь к изображению
    $tour_imgSrc = preg_replace('/\.php\.(jpg|png|webp|jpeg)$/i', '.$1', $tour_imgSrc);
    
    // Генерируем HTML предпросмотра
    ob_start();
    
    // Формируем путь к изображению
    $imgPath = $tour_imgSrc;
    if (!empty($imgPath)) {
        // Убираем .php из пути, если он там есть
        $imgPath = preg_replace('/\.php\.(jpg|png|webp|jpeg)$/i', '.$1', $imgPath);
        // Если путь не начинается с /, добавляем его
        if (strpos($imgPath, '/') !== 0) {
            $imgPath = '/' . $imgPath;
        }
    } else {
        $imgPath = '/img/act-tour/default.jpg';
    }
    
    // Форматируем дату
    $dateText = $tour_date ? 'Даты: ' . htmlspecialchars($tour_date, ENT_QUOTES, 'UTF-8') : '';
    if ($tour_date_start && $tour_date_end) {
        try {
            $start = new DateTime($tour_date_start);
            $end = new DateTime($tour_date_end);
            $startFormatted = $start->format('d.m.Y');
            $endFormatted = $end->format('d.m.Y');
            $dateText = "Даты: $startFormatted - $endFormatted";
        } catch (Exception $e) {
            // Ошибка обработки даты
        }
    }
    
    // Декодируем JSON данные
    $guidesData = json_decode($tour_guides, true);
    if (!is_array($guidesData)) $guidesData = [];
    
    $programData = json_decode($tour_program, true);
    if (!is_array($programData)) $programData = [];
    
    // Генерируем даты для дней из диапазона тура
    $tourDates = [];
    if ($tour_date_start && $tour_date_end) {
        try {
            $startDate = new DateTime($tour_date_start);
            $endDate = new DateTime($tour_date_end);
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
            // Ошибка обработки даты
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/style/clear.css">
        <link rel="stylesheet" href="/style/bootstrap.css">
        <link rel="stylesheet" href="/style/style.css">
        <link rel="stylesheet" href="/style/style-adaptive.css">
        <style>
            body {
                padding: 0;
                margin: 0;
            }
            /* Убираем стили для section в предпросмотре - отменяем opacity и transform */
            section {
                opacity: 1 !important;
                transform: none !important;
                transition: none !important;
            }
            /* Выравнивание по ширине для текстовых блоков */
            .tour__page__desc,
            .tour__page__desc *,
            .tour__page__desc p,
            .tour__page__desc div,
            .tour__page__desc span,
            .tour__page__desc h1,
            .tour__page__desc h2,
            .tour__page__desc h3,
            .tour__page__desc h4,
            .tour__page__desc h5,
            .tour__page__desc h6,
            .tour__page__desc ul,
            .tour__page__desc ol,
            .tour__page__desc li,
            .tour__page__priceIn,
            .tour__page__priceIn *,
            .tour__page__priceIn p,
            .tour__page__priceIn div,
            .tour__page__priceIn span,
            .tour__page__priceOff,
            .tour__page__priceOff *,
            .tour__page__priceOff p,
            .tour__page__priceOff div,
            .tour__page__priceOff span,
            .modal-active-content,
            .modal-active-content *,
            .modal-active-content p,
            .modal-active-content div,
            .modal-active-content span,
            .modal-active-content ul,
            .modal-active-content ol,
            .modal-active-content li {
                text-align: justify !important;
            }
            /* Размеры шрифтов как на реальной странице */
            .tour__page__desc {
                font-size: 18px !important;
                color: #60326B !important;
            }
            .tour__page__desc > p {
                margin-bottom: 0 !important;
            }
            .tour__page__desc > ul {
                padding-left: 50px !important;
            }
            .tour__page__desc > ul > li {
                color: #60326B !important;
            }
            .tour__page__desc::first-letter {
                font-size: 42px !important;
                color: #60326B !important;
                font-family: Monotype Corsiva !important;
                line-height: 0 !important;
            }
            .tour__page__priceIn {
                font-size: 14px !important;
                font-weight: 700 !important;
            }
            .tour__page__priceOff {
                font-size: 14px !important;
                font-weight: 700 !important;
            }
            .modal-active-content {
                font-size: 16px !important;
            }
            .modal-active-content p {
                font-size: 16px !important;
            }
           
            /* Стили для форматирования текста */
            .tour__page__desc strong,
            .tour__page__desc b,
            .tour__page__priceIn strong,
            .tour__page__priceIn b,
            .tour__page__priceOff strong,
            .tour__page__priceOff b,
            .modal-active-content strong,
            .modal-active-content b {
                font-weight: bold !important;
            }
            .tour__page__desc em,
            .tour__page__desc i,
            .tour__page__priceIn em,
            .tour__page__priceIn i,
            .tour__page__priceOff em,
            .tour__page__priceOff i,
            .modal-active-content em,
            .modal-active-content i {
                font-style: italic !important;
            }
            .tour__page__desc u,
            .tour__page__priceIn u,
            .tour__page__priceOff u,
            .modal-active-content u {
                text-decoration: underline !important;
            }
            .tour__page__desc s,
            .tour__page__desc strike,
            .tour__page__priceIn s,
            .tour__page__priceIn strike,
            .tour__page__priceOff s,
            .tour__page__priceOff strike,
            .modal-active-content s,
            .modal-active-content strike {
                text-decoration: line-through !important;
            }
        </style>
        <title><?php echo htmlspecialchars($tour_name, ENT_QUOTES, 'UTF-8'); ?> - Предпросмотр</title>
    </head>
    <body>
        <section class="tour">
            <div class="container">
                <div class="tour__page__header">
                    <div class="tour__page__imgBox">
                        <?php if (!empty($imgPath)): ?>
                        <img class="tour__page__img" src="<?php echo htmlspecialchars($imgPath, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($tour_name, ENT_QUOTES, 'UTF-8'); ?>">
                        <?php else: ?>
                        <img class="tour__page__img" src="/img/act-tour/default.jpg" alt="<?php echo htmlspecialchars($tour_name, ENT_QUOTES, 'UTF-8'); ?>">
                        <?php endif; ?>
                        <div class="tour__page__titleBox">
                            <h1 class="tour__page__title">
                                <?php echo htmlspecialchars($tour_name, ENT_QUOTES, 'UTF-8'); ?>
                            </h1>
                            <?php if ($dateText): ?>
                            <h2 class="tour__page__date"><?php echo $dateText; ?></h2>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="tour__page__infoBlock">
                    <?php if (!empty($tour_description)): ?>
                    <div class="tour__page__desc">
                        <?php echo $tour_description; ?>
                    </div>
                    <?php endif; ?>
                    <hr>
                    <div class="tour__page__bottom">
                        <?php if (!empty($guidesData)): ?>
                        <div class="tour__page__gid">
                            <h2 class="tour__page__gid__title">Сопровождающие:</h2>
                            <ul class="tour__page__gid__list">
                                <?php foreach ($guidesData as $guide): ?>
                                <li class="tour__page__gid__item">
                                    <?php 
                                        $photoPath = !empty($guide['photo']) ? $guide['photo'] : '/img/otziv/zagl1.png';
                                        if (strpos($photoPath, '/') !== 0) $photoPath = '/' . $photoPath;
                                    ?>
                                    <img class="tour__page__gid__img" src="<?php echo htmlspecialchars($photoPath, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($guide['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                    <h3 class="tour__page__gid__title-member"><?php echo htmlspecialchars($guide['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?></h3>
                                    <p class="tour__page__gid__desc"><?php echo htmlspecialchars($guide['role'] ?? 'Гид', ENT_QUOTES, 'UTF-8'); ?></p>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($tour_difficulty)): ?>
                        <div class="tour__page__rate">
                            <h2 class="tour__page__rateTitle">Сложность маршрута</h2>
                            <img src="/img/rate/<?php echo htmlspecialchars($tour_difficulty, ENT_QUOTES, 'UTF-8'); ?>.svg" alt="Сложность <?php echo htmlspecialchars($tour_difficulty, ENT_QUOTES, 'UTF-8'); ?> из 5">
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <?php if (!empty($programData)): ?>
        <section class="diary">
            <h2 class="diary-title">Расписание</h2>
            <div class="container">
                <ul class="modal-tour-list accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <?php foreach ($programData as $index => $day): 
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
                            
                            $collapseId = 'flush-collapse-preview-' . ($index + 1);
                            $headingId = 'flush-heading-preview-' . ($index + 1);
                        ?>
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
                        <p class="tour__page__price">Стоимость: <?php echo htmlspecialchars($tour_price, ENT_QUOTES, 'UTF-8'); ?>
                        <?php if (!empty($tour_group_size)): ?>
                        <br> Группа <?php echo htmlspecialchars($tour_group_size, ENT_QUOTES, 'UTF-8'); ?>
                        <?php endif; ?></p>
                        <?php if (!empty($tour_price_includes)): ?>
                        <div class="tour__page__priceIn"><strong>В стоимость входит:</strong> <span class="tour__page__priceIn__content"><?php echo $tour_price_includes; ?></span></div>
                        <?php endif; ?>
                        <?php if (!empty($tour_price_excludes)): ?>
                        <div class="tour__page__priceOff"><strong>Не входит в стоимость:</strong> <span class="tour__page__priceOff__content"><?php echo $tour_price_excludes; ?></span></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
    <?php
    $html = ob_get_clean();
    
    // Проверяем, что HTML был сгенерирован
    if (empty($html)) {
        throw new Exception('Пустой HTML был сгенерирован');
    }
    
    echo json_encode([
        'success' => true,
        'html' => $html
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    
} catch (Exception $e) {
    // Очищаем буфер вывода, если он был начат
    if (ob_get_level() > 0) {
        ob_end_clean();
    }
    
    http_response_code(500);
    $errorMessage = 'Ошибка генерации предпросмотра: ' . $e->getMessage();
    if (function_exists('error_get_last')) {
        $lastError = error_get_last();
        if ($lastError && strpos($lastError['message'], 'PHP') === false) {
            $errorMessage .= ' | Последняя ошибка PHP: ' . $lastError['message'];
        }
    }
    
    echo json_encode([
        'success' => false,
        'message' => $errorMessage,
        'trace' => $e->getTraceAsString()
    ], JSON_UNESCAPED_UNICODE);
}
?>

