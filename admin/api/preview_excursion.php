<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

error_reporting(E_ALL);
ini_set('display_errors', 0);

require_once $_SERVER['DOCUMENT_ROOT'] . '/phpLogin/connect.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/functions/tour_helpers.php';

if (!isset($_SESSION['user_id']) || !in_array((int)$_SESSION['user_id'], [7, 10], true)) {
    http_response_code(401);
    echo 'Доступ запрещен';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo 'Метод не разрешен';
    exit;
}

$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!$data) {
    http_response_code(400);
    echo 'Неверный формат данных';
    exit;
}

// Извлекаем данные
$excursion_name = htmlspecialchars($data['excursion_name'] ?? 'Новая экскурсия', ENT_QUOTES, 'UTF-8');
$excursion_date = htmlspecialchars($data['excursion_date'] ?? '', ENT_QUOTES, 'UTF-8');
$excursion_time = htmlspecialchars($data['excursion_time'] ?? '', ENT_QUOTES, 'UTF-8');
$excursion_imgSrc = htmlspecialchars($data['excursion_imgSrc'] ?? '', ENT_QUOTES, 'UTF-8');
$excursion_color = htmlspecialchars($data['excursion_color'] ?? '#4a90e2', ENT_QUOTES, 'UTF-8');
$excursion_formTour_param = htmlspecialchars($data['excursion_formTour_param'] ?? '', ENT_QUOTES, 'UTF-8');

// Поля с HTML форматированием (из Quill редактора) - не экранируем
$excursion_price = $data['excursion_price'] ?? '';
$excursion_description = $data['excursion_description'] ?? '';
$excursion_details = $data['excursion_details'] ?? '';
$excursion_price_included = $data['excursion_price_included'] ?? '';
$excursion_price_additional = $data['excursion_price_additional'] ?? '';

// Формируем дату с временем для отображения
$dateDisplay = $excursion_date;
if (!empty($excursion_time)) {
    $dateDisplay .= '<br><strong>НАЧАЛО: ' . htmlspecialchars($excursion_time, ENT_QUOTES, 'UTF-8') . '</strong>';
}

// Обработка пути к изображению
$excursion_imgSrc = preg_replace('/\.php\.(jpg|png|webp|jpeg)$/i', '.$1', $excursion_imgSrc);
if (empty($excursion_imgSrc)) {
    $excursion_imgSrc = '/img/excursion/default.jpeg';
}
if (strpos($excursion_imgSrc, '/') !== 0) {
    $excursion_imgSrc = '/' . $excursion_imgSrc;
}

// Генерация HTML для подробной программы (HTML из Quill редактора)
$excursion_details_html = '';
if (!empty($excursion_details)) {
    $excursion_details_html = '<div class="excursions__details__desc">' . $excursion_details . '</div>';
}

// Генерация HTML для стоимости (HTML из Quill редактора)
$excursion_price_html = '';
if (!empty($excursion_price)) {
    // Если это HTML из Quill, используем как есть, иначе обрабатываем как текст
    if (strip_tags($excursion_price) !== $excursion_price) {
        // Это HTML
        $excursion_price_html = '<div class="excursions__price-amount">' . $excursion_price . '</div>';
    } else {
        // Это обычный текст, обрабатываем построчно
        $priceLines = explode("\n", $excursion_price);
        foreach ($priceLines as $priceLine) {
            $priceLine = trim($priceLine);
            if (!empty($priceLine)) {
                $excursion_price_html .= '<div class="excursions__price-amount"><strong>' . htmlspecialchars($priceLine, ENT_QUOTES, 'UTF-8') . '</strong></div>';
            }
        }
    }
}

// Генерация HTML для "Что входит" и "Что дополнительно оплачивается" (HTML из Quill редактора)
$excursion_price_included_html = !empty($excursion_price_included) ? "<div class=\"excursions__price-included\">" . $excursion_price_included . "</div>" : '';
$excursion_price_additional_html = !empty($excursion_price_additional) ? "<div class=\"excursions__price-additional\">" . $excursion_price_additional . "</div>" : '';

// Генерация HTML для описания (HTML из Quill редактора)
$excursion_description_html = '';
if (!empty($excursion_description)) {
    $excursion_description_html = '<div class="excursions__info__description">' . $excursion_description . '</div>';
}

// Генерация HTML для секции стоимости
$price_section_html = '';
if (!empty($excursion_price) || !empty($excursion_price_included) || !empty($excursion_price_additional)) {
    $price_section_html = '<hr><div class="excursions__price">';
    if (!empty($excursion_price)) {
        $price_section_html .= '<div class="excursions__price-title">Стоимость</div>';
        if (!empty($excursion_price_html)) {
            $price_section_html .= '<div class="excursions__price-amounts">' . $excursion_price_html . '</div>';
        }
    }
    $price_section_html .= $excursion_price_included_html;
    $price_section_html .= $excursion_price_additional_html;
    $price_section_html .= '</div><hr>';
}

// HTML-шаблон для предпросмотра экскурсии
$html = <<<HTML
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Предпросмотр: {$excursion_name}</title>
    <link rel="stylesheet" href="/style/clear.css">
    <link rel="stylesheet" href="/style/bootstrap.css">
    <link rel="stylesheet" href="/style/style.css">
    <link rel="stylesheet" href="/style/style-adaptive.css">
    <style>
        section {
            opacity: 1 !important;
            transform: none !important;
            padding-top: 20px;
        }
        .header, .footer, .questions, .contacts {
            display: none !important;
        }
        .excursions__item.expanded {
            margin-top: 0 !important;
        }
        .excursions__list {
            display: block !important;
        }
        .excursions__item {
            display: block !important;
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        .excursions__img {
            max-height: 300px;
            object-fit: cover;
        }
        .excursions__details {
            max-height: none !important;
            overflow: visible !important;
        }
        .excursions__podr {
            display: none !important;
        }
        .excursions__link {
            pointer-events: none !important;
            opacity: 0.7;
        }
        .accordion-button:not(.collapsed) {
            color: #fff;
            background-color: {$excursion_color};
        }
        .accordion-button:focus {
            box-shadow: 0 0 0 0.25rem rgba(74, 144, 226, .25);
        }
        /* Выравнивание по ширине для текстовых блоков */
        .excursions__info__description,
        .excursions__info__description p,
        .excursions__info__description div,
        .excursions__details__desc,
        .excursions__details__desc p,
        .excursions__details__desc div,
        .excursions__price-included,
        .excursions__price-included p,
        .excursions__price-included div,
        .excursions__price-additional,
        .excursions__price-additional p,
        .excursions__price-additional div,
        .excursions__price-amount,
        .excursions__price-amount p,
        .excursions__price-amount div {
            text-align: justify !important;
        }
        /* Размеры шрифтов как на реальной странице */
        .excursions__info__description {
            font-size: 16px !important;
        }
        .excursions__details__desc {
            font-size: inherit !important;
        }
        .excursions__price-included,
        .excursions__price-additional {
            font-size: inherit !important;
        }
        .excursions__price-amount {
            font-size: inherit !important;
        }
        /* Стили для форматирования текста */
        .excursions__info__description strong,
        .excursions__info__description b,
        .excursions__details__desc strong,
        .excursions__details__desc b,
        .excursions__price-included strong,
        .excursions__price-included b,
        .excursions__price-additional strong,
        .excursions__price-additional b,
        .excursions__price-amount strong,
        .excursions__price-amount b {
            font-weight: bold !important;
        }
        .excursions__info__description em,
        .excursions__info__description i,
        .excursions__details__desc em,
        .excursions__details__desc i,
        .excursions__price-included em,
        .excursions__price-included i,
        .excursions__price-additional em,
        .excursions__price-additional i,
        .excursions__price-amount em,
        .excursions__price-amount i {
            font-style: italic !important;
        }
        .excursions__info__description u,
        .excursions__details__desc u,
        .excursions__price-included u,
        .excursions__price-additional u,
        .excursions__price-amount u {
            text-decoration: underline !important;
        }
        .excursions__info__description s,
        .excursions__info__description strike,
        .excursions__details__desc s,
        .excursions__details__desc strike,
        .excursions__price-included s,
        .excursions__price-included strike,
        .excursions__price-additional s,
        .excursions__price-additional strike,
        .excursions__price-amount s,
        .excursions__price-amount strike {
            text-decoration: line-through !important;
        }
    </style>
</head>
<body>
    <section class="excursions">
        <div class="container">
            <h1 class="excursions__title" style="text-align: center; margin-bottom: 30px;">{$excursion_name}</h1>
            <ul class="excursions__list" style="display: block;">
                <li class="excursions__item expanded" style="display: block; margin-top: 0;">
                    <img class="excursions__img" src="{$excursion_imgSrc}" alt="{$excursion_name}">
                    <div class="excursions__info">
                        <h2 class="excursions__info__title" style="text-align: center; font-size: 26px;">{$excursion_name}</h2>
                        <hr>
                        <p class="excursions__info__date">{$dateDisplay}</p>
                        <hr>
                        {excursion_description_html}
                        <div class="excursions__details">
                            {$excursion_details_html}
                            {price_section_html}
                            <br>
                            <a class="excursions__link" data-name="{$excursion_formTour_param}" data-id="preview-excursion">Записаться</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
</body>
</html>
HTML;

// Заменяем плейсхолдеры в основном HTML
$html = str_replace('{$dateDisplay}', $dateDisplay, $html);
$html = str_replace('{excursion_description_html}', $excursion_description_html, $html);
$html = str_replace('{$excursion_details_html}', $excursion_details_html, $html);
$html = str_replace('{price_section_html}', $price_section_html, $html);

echo $html;
?>

