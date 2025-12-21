<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpLogin/connect.php';

// Проверка авторизации
if (!isset($_SESSION['user_id']) || !in_array((int)$_SESSION['user_id'], [7, 10], true)) {
    header('Location: /');
    exit;
}

$excursion = null;
$isEdit = false;

// Если передан ID, загружаем экскурсию для редактирования
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $excursion_id = (int)$_GET['id'];
    $stmt = $connect->prepare("SELECT * FROM excursions WHERE excursion_id = ?");
    $stmt->bind_param('i', $excursion_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $excursion = $result->fetch_assoc();
        $isEdit = true;
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $isEdit ? 'Редактирование экскурсии' : 'Добавление экскурсии'; ?> - Админ-панель</title>
    <link rel="stylesheet" href="/admin/style/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- TinyMCE Editor -->
    <script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js"></script>
</head>
<body>
    <div class="admin-container">
        <header class="admin-header">
            <h1><?php echo $isEdit ? 'Редактирование экскурсии' : 'Добавление экскурсии'; ?></h1>
            <div class="admin-header-actions">
                <?php
                $current_page = basename($_SERVER['PHP_SELF']);
                $is_tours = ($current_page === 'admin.php' || $current_page === 'edit_tour.php');
                $is_excursions = ($current_page === 'excursions.php' || $current_page === 'edit_excursion.php');
                $is_users = ($current_page === 'users.php');
                ?>
                <a href="/admin/admin.php" class="btn btn-secondary <?php echo $is_tours ? 'active' : ''; ?>">Туры</a>
                <a href="/admin/excursions.php" class="btn btn-secondary <?php echo $is_excursions ? 'active' : ''; ?>">Экскурсии</a>
                <a href="/admin/users.php" class="btn btn-secondary <?php echo $is_users ? 'active' : ''; ?>">Пользователи</a>
                <a href="/index.php" class="btn btn-secondary" target="_blank">На сайт</a>
                <a href="/phpLogin/logout.php" class="btn btn-danger">Выход</a>
            </div>
        </header>

        <main class="admin-main">
            <div class="admin-section">
                <form id="excursionForm" class="tour-form">
                    <input type="hidden" name="excursion_id" value="<?php echo $excursion ? $excursion['excursion_id'] : ''; ?>">
                    
                    <div class="form-group">
                        <label for="excursion_name">Название экскурсии *</label>
                        <input type="text" id="excursion_name" name="excursion_name" required 
                               value="<?php echo $excursion ? htmlspecialchars($excursion['excursion_name']) : ''; ?>"
                               placeholder="Например: Северный маршрут: от лесных троп до легенд автопрома">
                    </div>

                    <div class="form-group">
                        <label for="excursion_date">Дата экскурсии *</label>
                        <input type="date" id="excursion_date" name="excursion_date_picker" required
                               value="<?php 
                                   if ($excursion && !empty($excursion['excursion_date'])) {
                                       // Пытаемся распарсить текстовую дату в формат YYYY-MM-DD
                                       $dateText = $excursion['excursion_date'];
                                       // Удаляем "г" в конце
                                       $dateText = preg_replace('/\s*г\s*$/', '', $dateText);
                                       // Пытаемся найти дату в разных форматах
                                       if (preg_match('/(\d{1,2})\s+(\w+)\s+(\d{4})/', $dateText, $matches)) {
                                           $day = $matches[1];
                                           $monthRu = $matches[2];
                                           $year = $matches[3];
                                           $months = ['января' => '01', 'февраля' => '02', 'марта' => '03', 'апреля' => '04',
                                                     'мая' => '05', 'июня' => '06', 'июля' => '07', 'августа' => '08',
                                                     'сентября' => '09', 'октября' => '10', 'ноября' => '11', 'декабря' => '12'];
                                           if (isset($months[$monthRu])) {
                                               $day = str_pad($day, 2, '0', STR_PAD_LEFT);
                                               echo htmlspecialchars($year . '-' . $months[$monthRu] . '-' . $day);
                                           }
                                       }
                                   }
                               ?>">
                        <input type="hidden" id="excursion_date_text" name="excursion_date">
                        <small>Выберите дату в календаре. Дата автоматически будет сохранена в текстовом формате для отображения на сайте.</small>
                    </div>

                    <div class="form-group">
                        <label for="excursion_time">Время начала</label>
                        <input type="text" id="excursion_time" name="excursion_time"
                               value="<?php echo $excursion ? htmlspecialchars($excursion['excursion_time'] ?? '') : ''; ?>"
                               placeholder="Например: 11:30">
                        <small>Время начала экскурсии (будет отображаться как <strong>НАЧАЛО: 11:30</strong>)</small>
                    </div>

                    

                    <div class="form-group">
                        <label for="excursion_formTour_param">Параметр для почты (Название экскурсии кратко)</label>
                        <input type="text" id="excursion_formTour_param" name="excursion_formTour_param"
                               value="<?php echo $excursion ? htmlspecialchars($excursion['excursion_formTour_param'] ?? '') : ''; ?>"
                               placeholder="Оставьте пустым для автогенерации из названия">
                        <small>Параметр, передаваемый в функцию formTour(). Если не указан, будет использовано название экскурсии</small>
                    </div>

                    <div class="form-group">
                        <label for="excursion_image_upload">Изображение экскурсии</label>
                        <div class="file-upload-wrapper">
                            <input type="file" id="excursion_image_upload" name="excursion_image_upload" accept="image/jpeg,image/png,image/webp,image/gif" style="display: none;">
                            <input type="hidden" id="excursion_imgSrc" name="excursion_imgSrc" value="<?php echo $excursion ? htmlspecialchars($excursion['excursion_imgSrc'] ?? '') : ''; ?>">
                            <div class="file-upload-display">
                                <button type="button" class="btn btn-secondary btn-upload" onclick="document.getElementById('excursion_image_upload').click()">Выбрать файл</button>
                            </div>
                            <div class="image-preview" id="excursion_image_preview_container" <?php echo ($excursion && !empty($excursion['excursion_imgSrc'])) ? '' : 'style="display: none;"'; ?>>
                                <img src="<?php 
                                    if ($excursion && !empty($excursion['excursion_imgSrc'])) {
                                        $imgPath = $excursion['excursion_imgSrc'];
                                        echo htmlspecialchars(($imgPath[0] === '/' ? '' : '/') . $imgPath);
                                    }
                                ?>" alt="Предпросмотр" id="excursion_image_preview">
                            </div>
                        </div>
                        <small>Загрузите изображение или оставьте пустым для автоматической генерации пути</small>
                    </div>

                    <hr class="form-divider">

                    <h3 class="form-section-title">Основная информация</h3>

                    <div class="form-group">
                        <label for="excursion_description">Краткое описание экскурсии</label>
                        <textarea id="excursion_description" name="excursion_description" rows="4"
                                  placeholder="Приглашаем на зимнюю прогулку, где скандинавская ходьба, история и магия русских сказок создадут perfect day! Вдохните морозный воздух старинного парка..."><?php
                            echo $excursion && isset($excursion['excursion_description']) ? $excursion['excursion_description'] : '';
                        ?></textarea>
                        <small>Краткое описание, которое отображается на карточке до раскрытия. Используйте &lt;br&gt; для переноса строки</small>
                    </div>
                    <h3 class="form-section-title">Программа экскурсии</h3>

                    <div class="form-group">
                        <label for="excursion_details">Подробная программа экскурсии</label>
                        <textarea id="excursion_details" name="excursion_details" rows="20"
                                placeholder="Программа путешествия в сказку:&#10;&#10;<strong>11:30 – 12:45 — Лефортово: зимняя сказка в центре Москвы</strong>&#10;🔹 В 11.30 стартуем у выхода 1 из метро «Лефортово».&#10;🔹 Начинаем нашу зимнюю сканди-прогулку по аллеям Лефортовского парка...&#10;&#10;<strong>12:45 – 13:00 — Переход в мир искусства</strong>&#10;🔹 Неспеша направляемся к арт-кластеру «Винзавод»..."><?php
                            echo $excursion && isset($excursion['excursion_details']) ? $excursion['excursion_details'] : '';
                        ?></textarea>
                        <small>Полное описание программы экскурсии. Можно использовать HTML теги (&lt;strong&gt;, &lt;br&gt; и т.д.) для форматирования. Каждый пункт программы на новой строке.</small>
                    </div>
                    <hr class="form-divider">

                    <h3 class="form-section-title">Стоимость</h3>
                    <div class="form-group">
                        <label for="excursion_price"></label>
                        <textarea id="excursion_price" name="excursion_price" rows="3" required
                                  placeholder="Например:&#10;2200р – при регистрации до 18 января (взрослые)&#10;2600р – при регистрации с 19 января (взрослые)&#10;1600р – при регистрации для детей"><?php
                            echo $excursion ? ($excursion['excursion_price'] ?? '') : '';
                        ?></textarea>
                        <small>Стоимость экскурсии. Каждая строка - отдельный вариант цены. Можно указать несколько вариантов по датам регистрации</small>
                    </div>
                    <div class="form-group">
                        <label for="excursion_price_included">Что входит в стоимость</label>
                        <textarea id="excursion_price_included" name="excursion_price_included" rows="3"
                                  placeholder="В стоимость входит: сопровождение профессиональным гидом-инструктором, экскурсия по выставке"><?php
                            echo $excursion && isset($excursion['excursion_price_included']) ? $excursion['excursion_price_included'] : '';
                        ?></textarea>
                        <small>Что включено в стоимость экскурсии</small>
                    </div>

                    <div class="form-group">
                        <label for="excursion_price_additional">Что дополнительно оплачивается</label>
                        <textarea id="excursion_price_additional" name="excursion_price_additional" rows="3"
                                  placeholder="Дополнительно оплачивается: входной билет на выставку «Жили-были. Царство русской сказки» (стоимость 1400 рублей без льгот)"><?php
                            echo $excursion && isset($excursion['excursion_price_additional']) ? $excursion['excursion_price_additional'] : '';
                        ?></textarea>
                        <small>Что нужно оплатить дополнительно к стоимости экскурсии</small>
                    </div>

                    <hr class="form-divider">

                   

                    <div class="form-actions">
                        <button type="button" class="btn btn-info" onclick="previewExcursion()" id="previewBtn">Предпросмотр</button>
                        <button type="submit" class="btn btn-primary"><?php echo $isEdit ? 'Сохранить изменения' : 'Добавить экскурсию'; ?></button>
                        <a href="/admin/excursions.php" class="btn btn-secondary">Отмена</a>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <!-- Модальное окно для предпросмотра -->
    <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 95%; width: 95%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="previewModalLabel">Предпросмотр экскурсии</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="padding: 0;">
                    <iframe id="previewIframe" style="width: 100%; height: 85vh; border: none;"></iframe>
                </div>
            </div>
        </div>
    </div>

    <script src="/admin/js/admin.js"></script>
    <script>
        // Обработка загрузки изображения экскурсии
        document.getElementById('excursion_image_upload')?.addEventListener('change', async function(e) {
            const file = e.target.files[0];
            if (!file) return;
            
            const formData = new FormData();
            formData.append('image', file);
            formData.append('type', 'excursion');
            const excursionName = document.getElementById('excursion_name')?.value.trim();
            if (excursionName) {
                formData.append('excursion_name', excursionName);
            }
            
            try {
                const response = await fetch('/admin/api/upload_image.php', {
                    method: 'POST',
                    body: formData
                });
                
                const result = await response.json();
                
                if (result.success) {
                    const hiddenInput = document.getElementById('excursion_imgSrc');
                    if (hiddenInput) {
                        hiddenInput.value = result.path;
                    }
                    const preview = document.getElementById('excursion_image_preview');
                    const previewContainer = document.getElementById('excursion_image_preview_container');
                    if (preview) {
                        preview.src = result.path;
                        if (previewContainer) previewContainer.style.display = 'block';
                    }
                } else {
                    alert('Ошибка загрузки изображения: ' + result.message);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Произошла ошибка при загрузке изображения');
            }
        });
        
        // Автоматическое форматирование даты из календаря для скрытого поля
        const datePicker = document.getElementById('excursion_date');
        const dateTextInput = document.getElementById('excursion_date_text');
        if (datePicker && dateTextInput) {
            // Функция форматирования даты в русский формат
            function formatDateToRussian(dateString) {
                if (!dateString) return '';
                
                const date = new Date(dateString + 'T00:00:00');
                const months = ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня',
                               'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'];
                
                const day = date.getDate();
                const month = months[date.getMonth()];
                const year = date.getFullYear();
                
                return day + ' ' + month + ' ' + year + 'г';
            }
            
            // Обновление скрытого поля при выборе даты в календаре
            datePicker.addEventListener('change', function() {
                if (this.value) {
                    dateTextInput.value = formatDateToRussian(this.value);
                } else {
                    dateTextInput.value = '';
                }
            });
            
            // Инициализация: если дата выбрана в календаре, форматируем её
            if (datePicker.value) {
                dateTextInput.value = formatDateToRussian(datePicker.value);
            }
        }
        
        // Функция предпросмотра экскурсии
        async function previewExcursion() {
            // Синхронизируем данные из TinyMCE редакторов в textarea перед сбором данных
            const excursionFields = ['excursion_description', 'excursion_details', 'excursion_price', 
                                     'excursion_price_included', 'excursion_price_additional'];
            excursionFields.forEach(fieldId => {
                const editor = tinymce.get(fieldId);
                const textarea = document.getElementById(fieldId);
                if (editor && textarea) {
                    textarea.value = editor.getContent();
                }
            });
            
            const form = document.getElementById('excursionForm');
            const formData = new FormData(form);
            const data = {};
            
            // Собираем все поля формы
            for (let [key, value] of formData.entries()) {
                // Заменяем excursion_date_picker на excursion_date со значением из скрытого поля
                if (key === 'excursion_date_picker') {
                    const dateText = document.getElementById('excursion_date_text')?.value || '';
                    data['excursion_date'] = dateText;
                } else if (key !== 'excursion_date') { // Пропускаем скрытое поле, оно уже обработано
                    data[key] = value;
                }
            }
            
            try {
                const response = await fetch('/admin/api/preview_excursion.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(data)
                });
                
                const html = await response.text();
                const iframe = document.getElementById('previewIframe');
                if (iframe) {
                    iframe.srcdoc = html;
                    const modal = new bootstrap.Modal(document.getElementById('previewModal'));
                    modal.show();
                }
            } catch (error) {
                console.error('Ошибка предпросмотра:', error);
                alert('Произошла ошибка при загрузке предпросмотра: ' + error.message);
            }
        }
        
        // Отключаем автоматическое восстановление позиции скролла
        if ('scrollRestoration' in history) {
            history.scrollRestoration = 'manual';
        }
        
        // Инициализация текстовых редакторов TinyMCE
        document.addEventListener('DOMContentLoaded', function() {
            // Прокручиваем страницу вверх при загрузке
            window.scrollTo(0, 0);
            
            // Проверяем, что TinyMCE загружен
            if (typeof tinymce === 'undefined') {
                console.error('TinyMCE не загружен!');
                return;
            }
            
            // Конфигурация TinyMCE
            const tinymceConfig = {
                selector: '',
                height: 300,
                menubar: false,
                plugins: 'lists link code',
                toolbar: 'undo redo | formatselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor | link | code',
                content_style: 'body { font-family: Arial, sans-serif; font-size: 14px; text-align: justify; }',
                setup: function(editor) {
                    // Автосохранение в localStorage
                    const fieldId = editor.id;
                    const storageKey = 'excursion_editor_' + fieldId;
                    const textarea = document.getElementById(fieldId);
                    
                    // Загружаем данные из localStorage или textarea
                    const savedContent = localStorage.getItem(storageKey);
                    if (savedContent) {
                        editor.setContent(savedContent);
                    } else if (textarea && textarea.value) {
                        editor.setContent(textarea.value);
                    }
                    
                    // Автосохранение при изменении
                    editor.on('input change', function() {
                        const content = editor.getContent();
                        localStorage.setItem(storageKey, content);
                        if (textarea) {
                            textarea.value = content;
                        }
                        
                        // Обновляем HTML view, если он открыт
                        const htmlViewContainer = document.getElementById(fieldId + '_html_view');
                        if (htmlViewContainer && htmlViewContainer.style.display !== 'none') {
                            const escapedHtml = content
                                .replace(/&/g, '&amp;')
                                .replace(/</g, '&lt;')
                                .replace(/>/g, '&gt;')
                                .replace(/"/g, '&quot;')
                                .replace(/'/g, '&#039;');
                            htmlViewContainer.innerHTML = '<pre style="margin: 0; white-space: pre-wrap; word-wrap: break-word;">' + escapedHtml + '</pre>';
                        }
                    });
                    
                    // Синхронизация при отправке формы
                    const form = textarea ? textarea.closest('form') : null;
                    if (form) {
                        form.addEventListener('submit', function() {
                            if (textarea) {
                                textarea.value = editor.getContent();
                                localStorage.removeItem(storageKey);
                            }
                        });
                    }
                }
            };

            // Инициализация для всех textarea полей экскурсии
            const excursionFields = ['excursion_description', 'excursion_details', 'excursion_price', 
                                     'excursion_price_included', 'excursion_price_additional'];
            excursionFields.forEach(fieldId => {
                const textarea = document.getElementById(fieldId);
                if (textarea) {
                    // Скрываем textarea, TinyMCE заменит его
                    textarea.style.display = 'none';
                    
                    // Создаем кнопку для просмотра HTML
                    const htmlViewBtn = document.createElement('button');
                    htmlViewBtn.type = 'button';
                    htmlViewBtn.className = 'btn btn-sm btn-secondary';
                    htmlViewBtn.style.marginTop = '5px';
                    htmlViewBtn.textContent = 'Показать HTML';
                    htmlViewBtn.onclick = function() {
                        showHtmlView(fieldId);
                    };
                    textarea.parentNode.insertBefore(htmlViewBtn, textarea.nextSibling);
                    
                    // Создаем контейнер для отображения HTML
                    const htmlViewContainer = document.createElement('div');
                    htmlViewContainer.id = fieldId + '_html_view';
                    htmlViewContainer.style.display = 'none';
                    htmlViewContainer.style.marginTop = '10px';
                    htmlViewContainer.style.padding = '10px';
                    htmlViewContainer.style.backgroundColor = '#f8f9fa';
                    htmlViewContainer.style.border = '1px solid #dee2e6';
                    htmlViewContainer.style.borderRadius = '4px';
                    htmlViewContainer.style.maxHeight = '300px';
                    htmlViewContainer.style.overflow = 'auto';
                    htmlViewContainer.style.fontFamily = 'monospace';
                    htmlViewContainer.style.fontSize = '12px';
                    htmlViewBtn.parentNode.insertBefore(htmlViewContainer, htmlViewBtn.nextSibling);
                    
                    // Инициализируем TinyMCE для этого поля
                    const config = Object.assign({}, tinymceConfig, {
                        selector: '#' + fieldId
                    });
                    
                    tinymce.init(config);
                }
            });
            
            // Функция для отображения HTML кода
            window.showHtmlView = function(fieldId) {
                const htmlViewContainer = document.getElementById(fieldId + '_html_view');
                const htmlViewBtn = htmlViewContainer.previousElementSibling;
                
                if (htmlViewContainer.style.display === 'none') {
                    const editor = tinymce.get(fieldId);
                    if (editor) {
                        const html = editor.getContent();
                        // Экранируем HTML для отображения
                        const escapedHtml = html
                            .replace(/&/g, '&amp;')
                            .replace(/</g, '&lt;')
                            .replace(/>/g, '&gt;')
                            .replace(/"/g, '&quot;')
                            .replace(/'/g, '&#039;');
                        htmlViewContainer.innerHTML = '<pre style="margin: 0; white-space: pre-wrap; word-wrap: break-word;">' + escapedHtml + '</pre>';
                        htmlViewContainer.style.display = 'block';
                        htmlViewBtn.textContent = 'Скрыть HTML';
                    }
                } else {
                    htmlViewContainer.style.display = 'none';
                    htmlViewBtn.textContent = 'Показать HTML';
                }
            };
        });

        // Обработка отправки формы
        document.getElementById('excursionForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            // Синхронизируем данные из TinyMCE редакторов в textarea перед отправкой
            const excursionFields = ['excursion_description', 'excursion_details', 'excursion_price', 
                                     'excursion_price_included', 'excursion_price_additional'];
            excursionFields.forEach(fieldId => {
                const editor = tinymce.get(fieldId);
                const textarea = document.getElementById(fieldId);
                if (editor && textarea) {
                    textarea.value = editor.getContent();
                }
            });
            
            const formData = new FormData(this);
            const data = {};
            
            // Собираем все поля формы
            for (let [key, value] of formData.entries()) {
                // Заменяем excursion_date_picker на excursion_date со значением из скрытого поля
                if (key === 'excursion_date_picker') {
                    const dateText = document.getElementById('excursion_date_text')?.value || '';
                    data['excursion_date'] = dateText;
                } else if (key !== 'excursion_date') {
                    // Пропускаем скрытое поле excursion_date, оно уже обработано выше
                    data[key] = value;
                }
            }
            
            try {
                const response = await fetch('/admin/api/save_excursion.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(data)
                });
                
                const contentType = response.headers.get('content-type');
                let result;
                
                if (contentType && contentType.includes('application/json')) {
                    result = await response.json();
                } else {
                    const text = await response.text();
                    console.error('Server returned non-JSON response:', text);
                    alert('Ошибка сервера. Проверьте консоль для деталей.\n\nОтвет сервера: ' + text.substring(0, 200));
                    return;
                }
                
                if (result.success) {
                    // Очищаем все сохраненные данные из localStorage
                    const excursionFields = ['excursion_description', 'excursion_details', 'excursion_price', 
                                             'excursion_price_included', 'excursion_price_additional'];
                    excursionFields.forEach(fieldId => {
                        localStorage.removeItem('excursion_editor_' + fieldId);
                    });
                    
                    alert(result.message || 'Экскурсия успешно сохранена');
                    window.location.href = '/admin/excursions.php';
                } else {
                    alert('Ошибка: ' + (result.message || 'Не удалось сохранить экскурсию'));
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Произошла ошибка при сохранении экскурсии');
            }
        });
    </script>
</body>
</html>

