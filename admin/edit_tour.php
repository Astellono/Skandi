<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpLogin/connect.php';

// Проверка авторизации
if (!isset($_SESSION['user_id']) || !in_array((int)$_SESSION['user_id'], [7, 10], true)) {
    header('Location: /');
    exit;
}

$tour = null;
$isEdit = false;

// Если передан ID, загружаем тур для редактирования
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $tour_id = (int)$_GET['id'];
    $stmt = $connect->prepare("SELECT * FROM tours WHERE tour_id = ?");
    $stmt->bind_param('i', $tour_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $tour = $result->fetch_assoc();
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
    <title><?php echo $isEdit ? 'Редактирование тура' : 'Добавление тура'; ?> - Админ-панель</title>
    <link rel="stylesheet" href="/admin/style/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- TinyMCE Editor -->
    <script src="https://cdn.jsdelivr.net/npm/tinymce@6/tinymce.min.js"></script>
</head>
<body>
    <div class="admin-container">
        <header class="admin-header">
            <h1><?php echo $isEdit ? 'Редактирование тура' : 'Добавление тура'; ?></h1>
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
                <form id="tourForm" class="tour-form">
                    <input type="hidden" name="tour_id" value="<?php echo $tour ? $tour['tour_id'] : ''; ?>">
                    
                    <div class="form-group">
                        <label for="tour_name">Название тура *</label>
                        <input type="text" id="tour_name" name="tour_name" required 
                               value="<?php echo $tour ? htmlspecialchars($tour['tour_name']) : ''; ?>"
                               placeholder="Например: Торжок: Императорский шаг">
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="tour_date_start">Дата начала *</label>
                            <input type="date" id="tour_date_start" name="tour_date_start" required
                                   value="<?php echo $tour && $tour['tour_date_start'] ? date('Y-m-d', strtotime($tour['tour_date_start'])) : ''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="tour_date_end">Дата окончания *</label>
                            <input type="date" id="tour_date_end" name="tour_date_end" required
                                   value="<?php echo $tour && $tour['tour_date_end'] ? date('Y-m-d', strtotime($tour['tour_date_end'])) : ''; ?>">
                        </div>
                    </div>

                   

                    <div class="form-group">
                        <label for="tour_formTour_param">Параметр для почты(Название тура кратко)</label>
                        <input type="text" id="tour_formTour_param" name="tour_formTour_param"
                               value="<?php echo $tour ? htmlspecialchars($tour['tour_formTour_param'] ?? '') : ''; ?>"
                               placeholder="Оставьте пустым для автогенерации из названия тура">
                        <small>Параметр, передаваемый в функцию formTour(). Если не указан, будет использовано название тура</small>
                    </div>

                    

                    <div class="form-group">
                        <label for="tour_image_upload">Изображение тура</label>
                        <div class="file-upload-wrapper">
                            <input type="file" id="tour_image_upload" name="tour_image_upload" accept="image/jpeg,image/png,image/webp,image/gif" style="display: none;">
                            <input type="hidden" id="tour_imgSrc" name="tour_imgSrc" value="<?php echo $tour ? htmlspecialchars($tour['tour_imgSrc']) : ''; ?>">
                            <div class="file-upload-display">
                                <button type="button" class="btn btn-secondary btn-upload" onclick="document.getElementById('tour_image_upload').click()">Выбрать файл</button>
                            </div>
                            <div class="image-preview" id="tour_image_preview_container" <?php echo ($tour && !empty($tour['tour_imgSrc'])) ? '' : 'style="display: none;"'; ?>>
                                <img src="<?php 
                                    if ($tour && !empty($tour['tour_imgSrc'])) {
                                        $imgPath = $tour['tour_imgSrc'];
                                        echo htmlspecialchars(($imgPath[0] === '/' ? '' : '/') . $imgPath);
                                    }
                                ?>" alt="Предпросмотр" id="tour_image_preview">
                            </div>
                    </div>
                        <small>Загрузите изображение или оставьте пустым для автоматической генерации пути</small>
                    </div>

                    <div class="form-group">
                        <label for="tour_color">Цвет (для календаря) *</label>
                        <div class="color-input-group">
                            <input type="color" id="tour_color_picker" 
                                   value="<?php echo $tour && $tour['tour_color'] ? (preg_match('/^#/', $tour['tour_color']) ? $tour['tour_color'] : '#4a90e2') : '#4a90e2'; ?>">
                            <input type="text" id="tour_color" name="tour_color" required
                                   value="<?php echo $tour ? htmlspecialchars($tour['tour_color']) : '#4a90e2'; ?>"
                                   placeholder="#4a90e2 или rgba(74, 144, 226, 1)">
                        </div>
                        <small>Можно использовать hex (#4a90e2) или rgba/rgb формат</small>
                    </div>

                    <hr class="form-divider">

                    <h3 class="form-section-title">Основная информация</h3>

                    <div class="form-group">
                        <label for="tour_description">Описание тура</label>
                        <textarea id="tour_description" name="tour_description" rows="6" 
                                  placeholder="Подробное описание тура, его особенности и преимущества..."><?php 
                            echo $tour && isset($tour['tour_description']) ? $tour['tour_description'] : ''; 
                        ?></textarea>
                        
                    </div>

                    <div class="form-group">
                        <label for="tour_difficulty">Сложность маршрута</label>
                        <select id="tour_difficulty" name="tour_difficulty">
                            <option value="1" <?php echo ($tour && isset($tour['tour_difficulty']) && $tour['tour_difficulty'] == '1') ? 'selected' : ''; ?>>1 - Очень легкий</option>
                            <option value="2" <?php echo ($tour && isset($tour['tour_difficulty']) && $tour['tour_difficulty'] == '2') ? 'selected' : ''; ?>>2 - Легкий</option>
                            <option value="3" <?php echo ($tour && isset($tour['tour_difficulty']) && $tour['tour_difficulty'] == '3') ? 'selected' : ''; ?>>3 - Средний</option>
                            <option value="4" <?php echo ($tour && isset($tour['tour_difficulty']) && $tour['tour_difficulty'] == '4') ? 'selected' : ''; ?>>4 - Сложный</option>
                            <option value="5" <?php echo ($tour && isset($tour['tour_difficulty']) && $tour['tour_difficulty'] == '5') ? 'selected' : ''; ?>>5 - Очень сложный</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tour_group_size">Размер группы</label>
                        <input type="text" id="tour_group_size" name="tour_group_size"
                               value="<?php echo $tour && isset($tour['tour_group_size']) ? htmlspecialchars($tour['tour_group_size']) : '6 – 10 человек'; ?>"
                               placeholder="Например: 6 – 10 человек">
                    </div>

                    <hr class="form-divider">

                    <h3 class="form-section-title">Стоимость</h3>
                    <div class="form-group">
                        <label for="tour_price"></label>
                        <input type="text" id="tour_price" name="tour_price" required
                               value="<?php echo $tour ? htmlspecialchars($tour['tour_price']) : ''; ?>"
                               placeholder="Например: 109 700 рублей">
                        <small>Отображается на странице тура (можно указать валюту и пояснения)</small>
                    </div>
                    <div class="form-group">
                        <label for="tour_price_includes">Что входит в стоимость</label>
                        <textarea id="tour_price_includes" name="tour_price_includes" rows="4"
                                  placeholder="Проживание в отелях, питание, трансфер, экскурсии..."><?php 
                            echo $tour && isset($tour['tour_price_includes']) ? $tour['tour_price_includes'] : ''; 
                        ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="tour_price_excludes">Что не входит в стоимость</label>
                        <textarea id="tour_price_excludes" name="tour_price_excludes" rows="4"
                                  placeholder="Международные авиабилеты, страховка, личные расходы..."><?php 
                            echo $tour && isset($tour['tour_price_excludes']) ? $tour['tour_price_excludes'] : ''; 
                        ?></textarea>
                    </div>

                    <hr class="form-divider">

                    <h3 class="form-section-title">Сопровождающие</h3>
                    <div id="guides-container">
                        <?php
                        $guides = [];
                        if ($tour && isset($tour['tour_guides']) && !empty($tour['tour_guides'])) {
                            $guides = json_decode($tour['tour_guides'], true);
                            if (!is_array($guides)) $guides = [];
                        }
                        if (empty($guides)) {
                            $guides = [['name' => '', 'role' => 'Гид', 'photo' => '']];
                        }
                        foreach ($guides as $index => $guide):
                        ?>
                        <div class="guide-item" data-index="<?php echo $index; ?>">
                            <div class="guide-item-header">
                                <strong>Сопровождающий #<?php echo $index + 1; ?></strong>
                                <button type="button" class="btn-remove-guide" onclick="removeGuide(this)">Удалить</button>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label>Имя</label>
                                    <input type="text" name="guides[<?php echo $index; ?>][name]" 
                                           value="<?php echo htmlspecialchars($guide['name'] ?? ''); ?>"
                                           placeholder="Имя и фамилия">
                                </div>
                                <div class="form-group">
                                    <label>Роль</label>
                                    <select name="guides[<?php echo $index; ?>][role]">
                                        <option value="Гид" <?php echo ($guide['role'] ?? '') == 'Гид' ? 'selected' : ''; ?>>Гид</option>
                                        <option value="Инструктор" <?php echo ($guide['role'] ?? '') == 'Инструктор' ? 'selected' : ''; ?>>Инструктор</option>
                                        <option value="Гид и инструктор" <?php echo ($guide['role'] ?? '') == 'Гид и инструктор' ? 'selected' : ''; ?>>Гид и инструктор</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Фото</label>
                                    <div class="file-upload-wrapper">
                                        <input type="file" class="guide_image_upload" data-index="<?php echo $index; ?>" 
                                               accept="image/jpeg,image/png,image/webp,image/gif" style="display: none;">
                                        <input type="hidden" class="guide_photo_input" name="guides[<?php echo $index; ?>][photo]" 
                                               value="<?php echo htmlspecialchars($guide['photo'] ?? ''); ?>">
                                        <div class="file-upload-display">
                                            <button type="button" class="btn btn-secondary btn-upload btn-sm" 
                                            onclick="this.closest('.file-upload-wrapper').querySelector('.guide_image_upload').click()">Выбрать</button>
                                        </div>
                                        <div class="image-preview-small guide_image_preview_container" <?php echo empty($guide['photo']) ? 'style="display: none;"' : ''; ?>>
                                            <img src="<?php echo !empty($guide['photo']) ? htmlspecialchars(($guide['photo'][0] === '/' ? '' : '/') . $guide['photo']) : ''; ?>" alt="Предпросмотр" class="guide_image_preview">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <button type="button" class="btn btn-secondary" onclick="addGuide()">+ Добавить сопровождающего</button>

                    <hr class="form-divider">

                    <h3 class="form-section-title">Программа по дням</h3>
                    <div id="days-container">
                        <?php
                        $days = [];
                        if ($tour && isset($tour['tour_program']) && !empty($tour['tour_program'])) {
                            $days = json_decode($tour['tour_program'], true);
                            if (!is_array($days)) $days = [];
                        }
                        // Генерируем даты из диапазона тура для дней
                        $tourDates = [];
                        if ($tour && !empty($tour['tour_date_start']) && !empty($tour['tour_date_end'])) {
                            $startDate = new DateTime($tour['tour_date_start']);
                            $endDate = new DateTime($tour['tour_date_end']);
                            $currentDate = clone $startDate;
                            $dayIndex = 1;
                            while ($currentDate <= $endDate) {
                                $months = ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня',
                                           'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'];
                                $dayNum = (int)$currentDate->format('d');
                                $monthName = $months[(int)$currentDate->format('m') - 1];
                                $tourDates[$dayIndex] = $dayNum . ' ' . $monthName;
                                $currentDate->modify('+1 day');
                                $dayIndex++;
                            }
                        }
                        
                        if (empty($days)) {
                            $days = [['day_num' => 1, 'title' => '', 'activities' => '']];
                        }
                        foreach ($days as $index => $day):
                            $dayNum = $index + 1;
                            $dayDate = '';
                            if (isset($tourDates[$dayNum])) {
                                $dayDate = $tourDates[$dayNum];
                            } elseif (isset($day['date']) && !empty($day['date'])) {
                                $dayDate = $day['date'];
                            }
                        ?>
                        <div class="day-item" data-index="<?php echo $index; ?>" data-day-num="<?php echo $dayNum; ?>">
                            <div class="day-item-header">
                                <strong>День <?php echo $dayNum; ?></strong>
                                <button type="button" class="btn-remove-day" onclick="removeDay(this)">Удалить день</button>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label>Дата дня (автозаполняется из диапазона тура)</label>
                                    <input type="text" class="day-date-input" name="days[<?php echo $index; ?>][date]" 
                                           value="<?php echo htmlspecialchars($dayDate); ?>"
                                           data-day-num="<?php echo $dayNum; ?>"
                                           placeholder="Автоматически из диапазона тура">
                                    <small>Берется из диапазона дат тура, можно изменить вручную</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Заголовок дня (необязательно)</label>
                                <input type="text" name="days[<?php echo $index; ?>][title]"
                                       value="<?php echo htmlspecialchars($day['title'] ?? ''); ?>"
                                       placeholder="Например: Воскресенск: от усадьбы до колокольни">
                                <small>Если не указан, будет отображаться только "День X (дата)"</small>
                            </div>
                            <div class="form-group">
                                <label>Активности дня (по одной на строку) *</label>
                                <textarea id="activities_<?php echo $index; ?>" name="days[<?php echo $index; ?>][activities]" rows="8" required
                                          placeholder="8:30 – 9:33 — Переезд из Москвы на комфортабельном фирменном экспрессе...&#10;9:33 — Встреча с гидом на платформе...&#10;10:00 – 11:00 — Пешая экскурсия через центр города..."><?php echo htmlspecialchars($day['activities'] ?? ''); ?></textarea>
                                <small>Можно указывать время в начале строки (необязательно). Каждая активность на новой строке.</small>
                            </div>
                            <input type="hidden" name="days[<?php echo $index; ?>][day_num]" value="<?php echo $dayNum; ?>">
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <button type="button" class="btn btn-secondary" onclick="addDay()">+ Добавить день</button>

                    <div class="form-actions">
                        <button type="button" class="btn btn-info" onclick="previewTour()" id="previewBtn">Предпросмотр</button>
                        <button type="submit" class="btn btn-primary">
                            <?php echo $isEdit ? 'Сохранить изменения' : 'Добавить тур'; ?>
                        </button>
                        <a href="/admin/admin.php" class="btn btn-secondary">Отмена</a>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script src="/admin/js/admin.js"></script>
    <script>
        // Функция для обновления дат дней из диапазона тура (определяем глобально)
        function updateDaysDates() {
            const dateStart = document.getElementById('tour_date_start');
            const dateEnd = document.getElementById('tour_date_end');
            
            if (!dateStart || !dateEnd || !dateStart.value || !dateEnd.value) return;
            
            const start = new Date(dateStart.value + 'T00:00:00');
            const end = new Date(dateEnd.value + 'T00:00:00');
            const months = ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня',
                           'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'];
            
            const dayItems = document.querySelectorAll('#days-container .day-item');
            let currentDate = new Date(start);
            let dayIndex = 1;
            
            while (currentDate <= end && dayIndex <= dayItems.length) {
                const dayItem = dayItems[dayIndex - 1];
                if (dayItem) {
                    const dateInput = dayItem.querySelector('.day-date-input');
                    if (dateInput) {
                        // Обновляем дату только если поле пустое
                        if (!dateInput.value.trim()) {
                            const dayNum = currentDate.getDate();
                            const monthName = months[currentDate.getMonth()];
                            dateInput.value = dayNum + ' ' + monthName;
                        }
                    }
                }
                currentDate.setDate(currentDate.getDate() + 1);
                dayIndex++;
            }
        }
        
        // Отключаем автоматическое восстановление позиции скролла
        if ('scrollRestoration' in history) {
            history.scrollRestoration = 'manual';
        }
        
        // Очищаем hash в URL, если он есть (может вызывать прокрутку)
        if (window.location.hash) {
            window.history.replaceState(null, null, window.location.pathname + window.location.search);
        }
        
        // Прокручиваем вверх сразу при загрузке скрипта
        window.scrollTo(0, 0);
        
        // Привязываем обработчики событий к полям дат после загрузки DOM
        document.addEventListener('DOMContentLoaded', function() {
            const dateStart = document.getElementById('tour_date_start');
            const dateEnd = document.getElementById('tour_date_end');
            
            if (dateStart) {
                dateStart.addEventListener('change', updateDaysDates);
            }
            if (dateEnd) {
                dateEnd.addEventListener('change', updateDaysDates);
            }
            
            // Инициализация текстовых редакторов TinyMCE
            // Ждем загрузки TinyMCE
            function initTinyMCEEditors() {
                if (typeof tinymce === 'undefined') {
                    console.error('TinyMCE не загружен!');
                    setTimeout(initTinyMCEEditors, 100);
                    return;
                }
            
            // Функция инициализации TinyMCE для поля
            function initTinyMCEField(fieldId) {
                const textarea = document.getElementById(fieldId);
                if (!textarea) return;
                
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
                
                // Ключ для localStorage
                const storageKey = 'tour_editor_' + fieldId;
                
                // Загружаем данные из localStorage или textarea
                const savedContent = localStorage.getItem(storageKey);
                if (savedContent) {
                    textarea.value = savedContent;
                }
                
                // Инициализируем TinyMCE для этого поля
                tinymce.init({
                    selector: '#' + fieldId,
                    height: 300,
                    menubar: false,
                    plugins: 'lists link code',
                    toolbar: 'undo redo | formatselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor | link | code',
                    content_style: 'body { font-family: Arial, sans-serif; font-size: 14px; text-align: justify; }',
                    setup: function(editor) {
                        // Автосохранение при изменении
                        editor.on('input change', function() {
                            const content = editor.getContent();
                            localStorage.setItem(storageKey, content);
                            textarea.value = content;
                            
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
                        const form = textarea.closest('form');
                        if (form) {
                            form.addEventListener('submit', function() {
                                textarea.value = editor.getContent();
                                localStorage.removeItem(storageKey);
                            });
                        }
                    }
                });
            }

                // Инициализация для статических полей
                const staticFields = ['tour_description', 'tour_price_includes', 'tour_price_excludes'];
                staticFields.forEach(fieldId => {
                    initTinyMCEField(fieldId);
                });
                
                // Инициализация для существующих полей activities
                document.querySelectorAll('textarea[name*="[activities]"]').forEach(textarea => {
                    if (!textarea.id) {
                        textarea.id = 'activities_' + Date.now() + '_' + Math.random().toString(36).substr(2, 9);
                    }
                    window.initActivitiesEditor(textarea);
                });
            }
            
            // Функция для инициализации редактора для динамически добавляемых полей activities
            window.initActivitiesEditor = function(textarea) {
                if (!textarea || textarea.dataset.tinymceInitialized) return;
                
                if (!textarea.id) {
                    textarea.id = 'activities_' + Date.now() + '_' + Math.random().toString(36).substr(2, 9);
                }
                
                // Ключ для localStorage
                const textareaName = textarea.name || textarea.id;
                const storageKey = 'tour_editor_' + textareaName.replace(/[\[\]]/g, '_');
                
                // Загружаем данные из localStorage или textarea
                const savedContent = localStorage.getItem(storageKey);
                if (savedContent) {
                    textarea.value = savedContent;
                }
                
                // Инициализируем TinyMCE для этого поля
                tinymce.init({
                    selector: '#' + textarea.id,
                    height: 300,
                    menubar: false,
                    plugins: 'lists link code',
                    toolbar: 'undo redo | formatselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor | link | code',
                    content_style: 'body { font-family: Arial, sans-serif; font-size: 14px; text-align: justify; }',
                    setup: function(editor) {
                        // Автосохранение в localStorage
                        editor.on('input change', function() {
                            const content = editor.getContent();
                            localStorage.setItem(storageKey, content);
                            textarea.value = content;
                        });
                        
                        // Синхронизация при отправке формы
                        const form = textarea.closest('form');
                        if (form) {
                            form.addEventListener('submit', function() {
                                textarea.value = editor.getContent();
                                localStorage.removeItem(storageKey);
                            });
                        }
                    }
                });
                
                textarea.dataset.tinymceInitialized = 'true';
                textarea.dataset.storageKey = storageKey;
            };
            
            // Запускаем инициализацию
            initTinyMCEEditors();
            
            // Прокручиваем страницу вверх после полной загрузки и инициализации всех элементов
            // Используем несколько попыток, чтобы гарантировать прокрутку вверх
            // Также предотвращаем автоматический фокус на элементах
            const preventAutoScroll = function() {
                window.scrollTo({ top: 0, left: 0, behavior: 'instant' });
                // Убираем фокус с любого элемента, который мог его получить
                if (document.activeElement && document.activeElement !== document.body) {
                    document.activeElement.blur();
                }
            };
            
            preventAutoScroll();
            setTimeout(preventAutoScroll, 0);
            setTimeout(preventAutoScroll, 50);
            setTimeout(preventAutoScroll, 100);
            setTimeout(preventAutoScroll, 200);
            setTimeout(preventAutoScroll, 300);
            
            // Дополнительная проверка после полной загрузки всех ресурсов
            window.addEventListener('load', function() {
                preventAutoScroll();
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
        
        // Обработка загрузки изображения тура
        const tourImageUpload = document.getElementById('tour_image_upload');
        if (tourImageUpload) {
            tourImageUpload.addEventListener('change', async function(e) {
                const file = e.target.files[0];
                if (!file) return;
                
                const formData = new FormData();
                formData.append('image', file);
                formData.append('type', 'tour');
                // Передаем название тура для генерации имени файла
                const tourName = document.getElementById('tour_name')?.value.trim();
                if (tourName) {
                    formData.append('tour_name', tourName);
                }
                
                try {
                    const response = await fetch('/admin/api/upload_image.php', {
                        method: 'POST',
                        body: formData
                    });
                    
                    const result = await response.json();
                    
                    if (result.success) {
                        const hiddenInput = document.getElementById('tour_imgSrc');
                        if (hiddenInput) {
                            hiddenInput.value = result.path;
                        }
                        const preview = document.getElementById('tour_image_preview');
                        const previewContainer = document.getElementById('tour_image_preview_container');
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
        }
        
        // Обработка загрузки изображений гидов
        function handleGuideImageUpload(e) {
            const file = e.target.files[0];
            if (!file) return;
            
            const index = e.target.dataset.index || e.target.getAttribute('data-index');
            const guideItem = e.target.closest('.guide-item');
            const formData = new FormData();
            formData.append('image', file);
            formData.append('upload_type', 'guide_photo');
            formData.append('index', index);
            
            fetch('/admin/api/upload_image.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    // Находим поле для пути к фото (input с name="guides[index][photo]")
                    const photoInput = guideItem.querySelector('input[name*="[photo]"]:not([type="file"])');
                    const preview = guideItem.querySelector('.guide_image_preview');
                    const previewContainer = guideItem.querySelector('.guide_image_preview_container');
                    
                    if (photoInput) {
                        photoInput.value = result.path;
                    }
                    if (preview) {
                        preview.src = '/' + result.path.replace(/^\//, '');
                        if (previewContainer) previewContainer.style.display = 'block';
                    }
                } else {
                    alert('Ошибка загрузки изображения: ' + (result.message || 'Неизвестная ошибка'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Произошла ошибка при загрузке изображения');
            });
        }
        
        // Добавляем обработчики для существующих полей загрузки гидов (если они не имеют onchange)
        document.querySelectorAll('.guide_image_upload').forEach(input => {
            // Если у элемента уже есть обработчик onchange, не добавляем еще один
            if (!input.hasAttribute('onchange')) {
                input.addEventListener('change', handleGuideImageUpload);
            }
        });
        
        // Синхронизация color picker с текстовым полем
        const colorPicker = document.getElementById('tour_color_picker');
        const colorInput = document.getElementById('tour_color');
        
        if (colorPicker && colorInput) {
            colorPicker.addEventListener('input', function(e) {
            const hex = e.target.value;
                // Если текущее значение в rgb формате, конвертируем в rgb, иначе оставляем hex
                const currentValue = colorInput.value.trim();
                if (currentValue && !currentValue.startsWith('#')) {
            const r = parseInt(hex.slice(1, 3), 16);
            const g = parseInt(hex.slice(3, 5), 16);
            const b = parseInt(hex.slice(5, 7), 16);
                    colorInput.value = `rgb(${r}, ${g}, ${b})`;
                } else {
                    colorInput.value = hex;
                }
            });
            
            // Синхронизация текстового поля с color picker (если значение hex)
            colorInput.addEventListener('input', function(e) {
                const value = e.target.value.trim();
                if (value.startsWith('#')) {
                    colorPicker.value = value;
                }
            });
        }

        // Функции для работы с сопровождающими
        function addGuide() {
            const container = document.getElementById('guides-container');
            const index = container.children.length;
            const guideHtml = `
                <div class="guide-item" data-index="${index}">
                    <div class="guide-item-header">
                        <strong>Сопровождающий #${index + 1}</strong>
                        <button type="button" class="btn-remove-guide" onclick="removeGuide(this)">Удалить</button>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Имя</label>
                            <input type="text" name="guides[${index}][name]" placeholder="Имя и фамилия">
                        </div>
                        <div class="form-group">
                            <label>Роль</label>
                            <select name="guides[${index}][role]">
                                <option value="Гид">Гид</option>
                                <option value="Инструктор">Инструктор</option>
                                <option value="Гид и инструктор">Гид и инструктор</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Фото</label>
                            <div class="file-upload-wrapper">
                                <input type="file" class="guide_image_upload" data-index="${index}" 
                                       accept="image/jpeg,image/png,image/webp,image/gif" style="display: none;">
                                <input type="hidden" class="guide_photo_input" name="guides[${index}][photo]">
                                <div class="file-upload-display">
                                    <button type="button" class="btn btn-secondary btn-upload btn-sm" 
                                            onclick="document.querySelector('.guide-item[data-index=\\'${index}\\'] .guide_image_upload').click()">Выбрать</button>
                                </div>
                                <div class="image-preview-small guide_image_preview_container" style="display: none;">
                                    <img src="" alt="Предпросмотр" class="guide_image_preview">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', guideHtml);
            updateGuideNumbers();
            // Добавляем обработчик загрузки для нового элемента
            const newItem = container.lastElementChild;
            const fileInput = newItem.querySelector('.guide_image_upload');
            if (fileInput) {
                fileInput.addEventListener('change', handleGuideImageUpload);
            }
        }

        function removeGuide(button) {
            const guideItem = button.closest('.guide-item');
            guideItem.remove();
            updateGuideNumbers();
        }

        function updateGuideNumbers() {
            const guides = document.querySelectorAll('#guides-container .guide-item');
            guides.forEach((guide, index) => {
                guide.querySelector('.guide-item-header strong').textContent = `Сопровождающий #${index + 1}`;
                const inputs = guide.querySelectorAll('input, select');
                inputs.forEach(input => {
                    if (input.name) {
                        const name = input.name.replace(/guides\[\d+\]/, `guides[${index}]`);
                        input.name = name;
                    }
                });
                guide.dataset.index = index;
                // Обновляем data-index для file input
                const fileInput = guide.querySelector('.guide_image_upload');
                if (fileInput) {
                    fileInput.dataset.index = index;
                }
            });
        }

        // Функции для работы с днями программы
        function addDay() {
            const container = document.getElementById('days-container');
            const index = container.children.length;
            const dayNum = index + 1;
            
            // Генерируем дату для нового дня из диапазона тура
            const dateStart = document.getElementById('tour_date_start');
            const dateEnd = document.getElementById('tour_date_end');
            let dayDate = '';
            
            if (dateStart && dateEnd && dateStart.value && dateEnd.value) {
                const start = new Date(dateStart.value + 'T00:00:00');
                const months = ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня',
                               'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'];
                const currentDate = new Date(start);
                currentDate.setDate(currentDate.getDate() + (dayNum - 1));
                const end = new Date(dateEnd.value + 'T00:00:00');
                
                if (currentDate <= end) {
                    const dayNum_val = currentDate.getDate();
                    const monthName = months[currentDate.getMonth()];
                    dayDate = dayNum_val + ' ' + monthName;
                }
            }
            
            const dayHtml = `
                <div class="day-item" data-index="${index}" data-day-num="${dayNum}">
                    <div class="day-item-header">
                        <strong>День ${dayNum}</strong>
                        <button type="button" class="btn-remove-day" onclick="removeDay(this)">Удалить день</button>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Дата дня (автозаполняется из диапазона тура)</label>
                            <input type="text" class="day-date-input" name="days[${index}][date]" 
                                   value="${dayDate}"
                                   data-day-num="${dayNum}"
                                   placeholder="Автоматически из диапазона тура">
                            <small>Берется из диапазона дат тура, можно изменить вручную</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Заголовок дня (необязательно)</label>
                        <input type="text" name="days[${index}][title]"
                               placeholder="Например: Воскресенск: от усадьбы до колокольни">
                        <small>Если не указан, будет отображаться только "День X (дата)"</small>
                    </div>
                    <div class="form-group">
                        <label>Активности дня (по одной на строку) *</label>
                        <textarea id="activities_${index}" name="days[${index}][activities]" rows="8" required
                                  placeholder="8:30 – 9:33 — Переезд из Москвы...&#10;9:33 — Встреча с гидом...&#10;10:00 – 11:00 — Пешая экскурсия..."></textarea>
                        <small>Можно указывать время в начале строки (необязательно). Каждая активность на новой строке.</small>
                    </div>
                    <input type="hidden" name="days[${index}][day_num]" value="${dayNum}">
                </div>
            `;
            container.insertAdjacentHTML('beforeend', dayHtml);
            updateDayNumbers();
            
            // Инициализируем редактор для нового поля activities
            const newActivitiesTextarea = container.querySelector('.day-item:last-child textarea[name*="[activities]"]');
            if (newActivitiesTextarea && window.initActivitiesEditor) {
                window.initActivitiesEditor(newActivitiesTextarea);
            }
        }

        function removeDay(button) {
            const dayItem = button.closest('.day-item');
            dayItem.remove();
            updateDayNumbers();
        }

        function updateDayNumbers() {
            const days = document.querySelectorAll('#days-container .day-item');
            days.forEach((day, index) => {
                const dayNum = index + 1;
                day.querySelector('.day-item-header strong').textContent = `День ${dayNum}`;
                day.dataset.index = index;
                day.dataset.dayNum = dayNum;
                
                const inputs = day.querySelectorAll('input, textarea, select');
                inputs.forEach(input => {
                    if (input.name) {
                        const name = input.name.replace(/days\[\d+\]/, `days[${index}]`);
                        input.name = name;
                    }
                });
                
                // Обновляем day_num в hidden поле
                const dayNumInput = day.querySelector('input[name*="[day_num]"]');
                if (dayNumInput) {
                    dayNumInput.value = dayNum;
                }
                
                // Обновляем data-day-num в date input
                const dateInput = day.querySelector('.day-date-input');
                if (dateInput) {
                    dateInput.dataset.dayNum = dayNum;
                }
            });
        }
        
        // Функция для обновления дат дней из диапазона тура
        function updateDaysDates() {
            const dateStart = document.getElementById('tour_date_start');
            const dateEnd = document.getElementById('tour_date_end');
            
            if (!dateStart || !dateEnd || !dateStart.value || !dateEnd.value) return;
            
            const start = new Date(dateStart.value + 'T00:00:00');
            const end = new Date(dateEnd.value + 'T00:00:00');
            const months = ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня',
                           'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'];
            
            const dayItems = document.querySelectorAll('#days-container .day-item');
            let currentDate = new Date(start);
            let dayIndex = 1;
            
            while (currentDate <= end && dayIndex <= dayItems.length) {
                const dayItem = dayItems[dayIndex - 1];
                if (dayItem) {
                    const dateInput = dayItem.querySelector('.day-date-input');
                    if (dateInput) {
                        // Обновляем дату только если поле пустое
                        if (!dateInput.value.trim()) {
                            const dayNum = currentDate.getDate();
                            const monthName = months[currentDate.getMonth()];
                            dateInput.value = dayNum + ' ' + monthName;
                        }
                    }
                }
                currentDate.setDate(currentDate.getDate() + 1);
                dayIndex++;
            }
        }

        // Функция предпросмотра тура
        async function previewTour() {
            const previewBtn = document.getElementById('previewBtn');
            const previewContent = document.getElementById('previewContent');
            const previewModal = new bootstrap.Modal(document.getElementById('previewModal'));
            
            // Синхронизируем данные из TinyMCE редакторов в textarea перед сбором данных
            const staticFields = ['tour_description', 'tour_price_includes', 'tour_price_excludes'];
            staticFields.forEach(fieldId => {
                const editor = tinymce.get(fieldId);
                const textarea = document.getElementById(fieldId);
                if (editor && textarea) {
                    textarea.value = editor.getContent();
                }
            });
            
            // Собираем данные формы
            const formData = new FormData(document.getElementById('tourForm'));
            const data = {};
            
            // Собираем обычные поля (кроме файлов)
            for (let [key, value] of formData.entries()) {
                if (key.startsWith('guides[') || key.startsWith('days[') || key.includes('_upload')) {
                    continue;
                }
                data[key] = value;
            }
            
            // Собираем сопровождающих
            const guides = [];
            const guideItems = document.querySelectorAll('#guides-container .guide-item');
            guideItems.forEach((item, index) => {
                const name = item.querySelector(`input[name*="[name]"]`)?.value.trim();
                const role = item.querySelector(`select[name*="[role]"]`)?.value;
                const photo = item.querySelector(`input[name*="[photo]"]`)?.value.trim();
                if (name || role || photo) {
                    guides.push({ name, role, photo });
                }
            });
            data.tour_guides = JSON.stringify(guides);
            
            // Собираем дни программы
            const days = [];
            const dayItems = document.querySelectorAll('#days-container .day-item');
            dayItems.forEach((item, index) => {
                const dayNumInput = item.querySelector(`input[name*="[day_num]"]`);
                const dateInput = item.querySelector(`input[name*="[date]"]`);
                const titleInput = item.querySelector(`input[name*="[title]"]`);
                const activitiesTextarea = item.querySelector(`textarea[name*="[activities]"]`);
                
                const dayData = {
                    day_num: dayNumInput ? parseInt(dayNumInput.value) || (index + 1) : (index + 1),
                    date: dateInput ? dateInput.value.trim() : '',
                    title: titleInput ? titleInput.value.trim() : '',
                    activities: (() => {
                        if (!activitiesTextarea) return '';
                        const editor = tinymce.get(activitiesTextarea.id);
                        if (editor) {
                            return editor.getContent();
                        }
                        return activitiesTextarea.value.trim();
                    })()
                };
                days.push(dayData);
            });
            data.tour_program = JSON.stringify(days);
            
            // Отладочная информация
            console.log('Preview data:', data);
            
            // Показываем модальное окно
            previewContent.innerHTML = `
                <div style="text-align: center; padding: 40px;">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Загрузка...</span>
                    </div>
                    <p style="margin-top: 20px;">Загрузка предпросмотра...</p>
                </div>
            `;
            previewModal.show();
            
            try {
                console.log('Sending request to /admin/api/preview_tour.php');
                const response = await fetch('/admin/api/preview_tour.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(data)
                });
                
                console.log('Response status:', response.status);
                console.log('Response ok:', response.ok);
                
                // Читаем ответ как текст сначала (можно прочитать только один раз)
                const text = await response.text();
                console.log('Response text length:', text.length);
                console.log('Response text preview (first 1000 chars):', text.substring(0, 1000));
                
                // Проверяем Content-Type ответа
                const contentType = response.headers.get('Content-Type');
                console.log('Content-Type:', contentType);
                
                let result;
                
                // Пытаемся распарсить как JSON
                try {
                    result = JSON.parse(text);
                    console.log('Parsed result:', result);
                } catch (jsonError) {
                    console.error('JSON parse error:', jsonError);
                    console.error('Full response text:', text);
                    previewContent.innerHTML = `
                        <div style="padding: 40px; text-align: center;">
                            <div class="alert alert-danger">
                                <h4>Ошибка парсинга ответа сервера</h4>
                                <p>Сервер вернул не JSON ответ</p>
                                <pre style="text-align: left; margin-top: 20px; padding: 10px; background: #f5f5f5; border: 1px solid #ddd; border-radius: 4px; overflow: auto; max-height: 400px; white-space: pre-wrap;">${text.substring(0, 2000)}</pre>
                            </div>
                        </div>
                    `;
                    return;
                }
                
                if (!response.ok) {
                    throw new Error(result.message || 'Ошибка загрузки предпросмотра (код: ' + response.status + ')');
                }
                
                if (result.success) {
                    console.log('Success! HTML length:', result.html ? result.html.length : 0);
                    if (result.html && result.html.trim().length > 0) {
                        console.log('Setting innerHTML, content length:', result.html.length);
                        // Очищаем и добавляем HTML
                        previewContent.innerHTML = result.html;
                        
                        // Принудительно показываем содержимое
                        previewContent.style.display = 'block';
                        previewContent.style.visibility = 'visible';
                        previewContent.style.opacity = '1';
                        previewContent.style.background = 'white';
                        
                        // Убеждаемся, что модальное окно видимо
                        const modal = document.getElementById('previewModal');
                        if (modal) {
                            modal.classList.add('show');
                            modal.setAttribute('aria-hidden', 'false');
                            modal.style.display = 'block';
                        }
                        
                        // Проверяем, что контент действительно был добавлен
                        setTimeout(() => {
                            console.log('PreviewContent children count:', previewContent.children.length);
                            console.log('PreviewContent innerHTML length:', previewContent.innerHTML.length);
                            if (previewContent.innerHTML.length < 100) {
                                console.error('HTML seems to be empty or very short after insertion!');
                                console.log('Current innerHTML:', previewContent.innerHTML);
                            } else {
                                console.log('HTML successfully inserted, first 200 chars:', previewContent.innerHTML.substring(0, 200));
                                console.log('PreviewContent is visible:', previewContent.offsetParent !== null);
                            }
                        }, 100);
                    } else {
                        console.error('HTML is empty!');
                        previewContent.innerHTML = `
                            <div style="padding: 40px; text-align: center;">
                                <div class="alert alert-warning">Предпросмотр сгенерирован, но HTML пуст</div>
                                <pre>Result: ${JSON.stringify(result, null, 2)}</pre>
                            </div>
                        `;
                    }
                } else {
                    console.error('Preview failed:', result);
                    previewContent.innerHTML = `
                        <div style="padding: 40px; text-align: center;">
                            <div class="alert alert-danger">Ошибка: ${result.message || 'Неизвестная ошибка'}</div>
                            <pre style="text-align: left; margin-top: 20px; padding: 10px; background: #f5f5f5; border: 1px solid #ddd; border-radius: 4px; overflow: auto; max-height: 400px;">${JSON.stringify(result, null, 2)}</pre>
                        </div>
                    `;
                }
            } catch (error) {
                console.error('Error:', error);
                previewContent.innerHTML = `
                    <div style="padding: 40px; text-align: center;">
                        <div class="alert alert-danger">
                            <h4>Ошибка при загрузке предпросмотра</h4>
                            <p>${error.message || 'Неизвестная ошибка'}</p>
                            <p style="margin-top: 10px; font-size: 0.9em; color: #666;">Проверьте консоль браузера (F12) для подробностей</p>
                        </div>
                    </div>
                `;
            }
        }

        // Обработка отправки формы
        document.getElementById('tourForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            // Синхронизируем данные из TinyMCE редакторов в textarea перед отправкой
            const staticFields = ['tour_description', 'tour_price_includes', 'tour_price_excludes'];
            staticFields.forEach(fieldId => {
                const editor = tinymce.get(fieldId);
                const textarea = document.getElementById(fieldId);
                if (editor && textarea) {
                    textarea.value = editor.getContent();
                }
            });
            
            // Синхронизируем данные из TinyMCE редакторов для activities
            document.querySelectorAll('textarea[name*="[activities]"]').forEach(textarea => {
                const editor = tinymce.get(textarea.id);
                if (editor) {
                    textarea.value = editor.getContent();
                }
            });
            
            const formData = new FormData(this);
            const data = {};
            
            // Собираем обычные поля
            for (let [key, value] of formData.entries()) {
                if (key.startsWith('guides[') || key.startsWith('days[')) {
                    continue; // Пропускаем массивы, обработаем отдельно
                }
                data[key] = value;
            }
            
            // Убеждаемся, что даты передаются (на случай, если они не попали в FormData)
            const dateStartInput = document.getElementById('tour_date_start');
            const dateEndInput = document.getElementById('tour_date_end');
            if (dateStartInput && dateStartInput.value) {
                data.tour_date_start = dateStartInput.value;
            }
            if (dateEndInput && dateEndInput.value) {
                data.tour_date_end = dateEndInput.value;
            }
            
            // Собираем сопровождающих
            const guides = [];
            const guideItems = document.querySelectorAll('#guides-container .guide-item');
            guideItems.forEach((item, index) => {
                const name = item.querySelector(`input[name*="[name]"]`).value.trim();
                const role = item.querySelector(`select[name*="[role]"]`).value;
                const photo = item.querySelector(`input[name*="[photo]"]`).value.trim();
                if (name || role || photo) {
                    guides.push({ name, role, photo });
                }
            });
            data.tour_guides = JSON.stringify(guides);
            
            // Собираем дни программы
            const days = [];
            const dayItems = document.querySelectorAll('#days-container .day-item');
            dayItems.forEach((item, index) => {
                const dayNumInput = item.querySelector(`input[name*="[day_num]"]`);
                const dateInput = item.querySelector(`input[name*="[date]"]`);
                const titleInput = item.querySelector(`input[name*="[title]"]`);
                const activitiesTextarea = item.querySelector(`textarea[name*="[activities]"]`);
                
                const dayData = {
                    day_num: dayNumInput ? parseInt(dayNumInput.value) || (index + 1) : (index + 1),
                    date: dateInput ? dateInput.value.trim() : '',
                    title: titleInput ? titleInput.value.trim() : '',
                    activities: (() => {
                        if (!activitiesTextarea) return '';
                        const editor = tinymce.get(activitiesTextarea.id);
                        if (editor) {
                            return editor.getContent();
                        }
                        return activitiesTextarea.value.trim();
                    })()
                };
                days.push(dayData);
            });
            data.tour_program = JSON.stringify(days);
            
            try {
                const response = await fetch('/admin/api/save_tour.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(data)
                });
                
                // Проверяем Content-Type ответа
                const contentType = response.headers.get('content-type');
                let result;
                
                if (contentType && contentType.includes('application/json')) {
                    result = await response.json();
                } else {
                    // Если ответ не JSON, получаем текст и показываем ошибку
                    const text = await response.text();
                    console.error('Server returned non-JSON response:', text);
                    alert('Ошибка сервера. Проверьте консоль для деталей.\n\nОтвет сервера: ' + text.substring(0, 200));
                    return;
                }
                
                if (result.success) {
                    // Очищаем все сохраненные данные из localStorage
                    const staticFields = ['tour_description', 'tour_price_includes', 'tour_price_excludes'];
                    staticFields.forEach(fieldId => {
                        localStorage.removeItem('tour_editor_' + fieldId);
                    });
                    // Очищаем данные для activities
                    document.querySelectorAll('textarea[name*="[activities]"]').forEach(textarea => {
                        const storageKey = textarea.dataset.storageKey;
                        if (storageKey) {
                            localStorage.removeItem(storageKey);
                        }
                    });
                    
                    alert(result.message || 'Тур успешно сохранен!');
                    window.location.href = '/admin/admin.php';
                } else {
                    alert('Ошибка: ' + (result.message || 'Не удалось сохранить тур'));
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Произошла ошибка при сохранении тура: ' + error.message);
            }
        });
    </script>

    <!-- Модальное окно для предпросмотра -->
    <div class="modal fade" id="previewModal" tabindex="-1" aria-labelledby="previewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 95%; width: 95%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="previewModalLabel">Предпросмотр страницы тура</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body" id="previewContent" style="padding: 0; overflow-y: auto; overflow-x: hidden; min-height: 400px; max-height: calc(100vh - 120px); background: white;">
                    <div style="text-align: center; padding: 40px;">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Загрузка...</span>
                        </div>
                        <p style="margin-top: 20px;">Загрузка предпросмотра...</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

