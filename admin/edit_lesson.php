<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/phpLogin/connect.php';

// Проверка авторизации
if (!isset($_SESSION['user_id']) || !in_array((int)$_SESSION['user_id'], [7, 10], true)) {
    header('Location: /');
    exit;
}

$lesson = null;
$isEdit = false;

// Если передан ID, загружаем занятие для редактирования
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $lesson_id = (int)$_GET['id'];
    $stmt = $connect->prepare("SELECT * FROM lessons_schedule WHERE lesson_id = ?");
    $stmt->bind_param('i', $lesson_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $lesson = $result->fetch_assoc();
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
    <title><?php echo $isEdit ? 'Редактирование занятия' : 'Добавление занятия'; ?> - Админ-панель</title>
    <link rel="stylesheet" href="/admin/style/admin.css">
</head>
<body>
    <div class="admin-container">
        <header class="admin-header">
            <h1><?php echo $isEdit ? 'Редактирование занятия' : 'Добавление занятия'; ?></h1>
            <div class="admin-header-actions">
                <?php
                $current_page = basename($_SERVER['PHP_SELF']);
                $is_tours = ($current_page === 'admin.php' || $current_page === 'edit_tour.php');
                $is_excursions = ($current_page === 'excursions.php' || $current_page === 'edit_excursion.php');
                $is_users = ($current_page === 'users.php');
                $is_lessons = ($current_page === 'lessons.php' || $current_page === 'edit_lesson.php');
                ?>
                <a href="/admin/admin.php" class="btn btn-secondary <?php echo $is_tours ? 'active' : ''; ?>">Туры</a>
                <a href="/admin/excursions.php" class="btn btn-secondary <?php echo $is_excursions ? 'active' : ''; ?>">Экскурсии</a>
                <a href="/admin/lessons.php" class="btn btn-secondary <?php echo $is_lessons ? 'active' : ''; ?>">Расписание</a>
                <a href="/admin/users.php" class="btn btn-secondary <?php echo $is_users ? 'active' : ''; ?>">Пользователи</a>
                <a href="/index.php" class="btn btn-secondary" target="_blank">На сайт</a>
                <a href="/phpLogin/logout.php" class="btn btn-danger">Выход</a>
            </div>
        </header>

        <main class="admin-main">
            <div class="admin-section">
                <form id="lessonForm" class="tour-form">
                    <input type="hidden" name="lesson_id" value="<?php echo $lesson ? $lesson['lesson_id'] : ''; ?>">
                    
                    <div class="form-group">
                        <label for="park_name">Название парка *</label>
                        <input type="text" id="park_name" name="park_name" required 
                               value="<?php echo $lesson ? htmlspecialchars($lesson['park_name']) : ''; ?>"
                               placeholder="Например: Лужники">
                    </div>

                    <div class="form-group">
                        <label for="park_image_upload">Изображение парка</label>
                        <div class="file-upload-wrapper">
                            <input type="file" id="park_image_upload" name="park_image_upload" accept="image/jpeg,image/png,image/webp,image/gif" style="display: none;">
                            <input type="hidden" id="park_image" name="park_image" value="<?php echo $lesson ? htmlspecialchars($lesson['park_image'] ?? '') : ''; ?>">
                            <div class="file-upload-display">
                                <button type="button" class="btn btn-secondary btn-upload" onclick="document.getElementById('park_image_upload').click()">Выбрать файл</button>
                            </div>
                            <div class="image-preview" id="park_image_preview_container" <?php echo ($lesson && !empty($lesson['park_image'])) ? '' : 'style="display: none;"'; ?>>
                                <img src="<?php 
                                    if ($lesson && !empty($lesson['park_image'])) {
                                        $imgPath = $lesson['park_image'];
                                        echo htmlspecialchars(($imgPath[0] === '/' ? '' : '/') . $imgPath);
                                    }
                                ?>" alt="Предпросмотр" id="park_image_preview">
                            </div>
                        </div>
                        <small>Загрузите изображение парка</small>
                    </div>

                    <hr class="form-divider">
                    <h3 class="form-section-title">Расписание по дням недели</h3>
                    <p style="color: #666; margin-bottom: 20px;">Укажите время занятия для каждого дня недели. Оставьте пустым или введите "-" для дней без занятий.</p>

                    <div class="form-group">
                        <label for="monday">Понедельник</label>
                        <input type="text" id="monday" name="monday" 
                               value="<?php echo $lesson ? htmlspecialchars($lesson['monday'] ?? '-') : '-'; ?>"
                               placeholder="Например: 07:00 или -">
                    </div>

                    <div class="form-group">
                        <label for="tuesday">Вторник</label>
                        <input type="text" id="tuesday" name="tuesday" 
                               value="<?php echo $lesson ? htmlspecialchars($lesson['tuesday'] ?? '-') : '-'; ?>"
                               placeholder="Например: 07:00 или -">
                    </div>

                    <div class="form-group">
                        <label for="wednesday">Среда</label>
                        <input type="text" id="wednesday" name="wednesday" 
                               value="<?php echo $lesson ? htmlspecialchars($lesson['wednesday'] ?? '-') : '-'; ?>"
                               placeholder="Например: 09:00 или -">
                    </div>

                    <div class="form-group">
                        <label for="thursday">Четверг</label>
                        <input type="text" id="thursday" name="thursday" 
                               value="<?php echo $lesson ? htmlspecialchars($lesson['thursday'] ?? '-') : '-'; ?>"
                               placeholder="Например: 19:30 или -">
                    </div>

                    <div class="form-group">
                        <label for="friday">Пятница</label>
                        <input type="text" id="friday" name="friday" 
                               value="<?php echo $lesson ? htmlspecialchars($lesson['friday'] ?? '-') : '-'; ?>"
                               placeholder="Например: 07:00 или -">
                    </div>

                    <div class="form-group">
                        <label for="saturday">Суббота</label>
                        <input type="text" id="saturday" name="saturday" 
                               value="<?php echo $lesson ? htmlspecialchars($lesson['saturday'] ?? '-') : '-'; ?>"
                               placeholder="Например: 10:00 или -">
                    </div>

                    <div class="form-group">
                        <label for="sunday">Воскресенье</label>
                        <input type="text" id="sunday" name="sunday" 
                               value="<?php echo $lesson ? htmlspecialchars($lesson['sunday'] ?? '-') : '-'; ?>"
                               placeholder="Например: 10:00 или -">
                    </div>

                    <hr class="form-divider">
                    <h3 class="form-section-title">Адрес и карта</h3>

                    <div class="form-group">
                        <label for="address">Адрес точки сбора *</label>
                        <input type="text" id="address" name="address" required
                               value="<?php echo $lesson ? htmlspecialchars($lesson['address'] ?? '') : ''; ?>"
                               placeholder="Например: Москва, Лужники, метро Воробьевы горы, выход 3">
                        <small>Введите адрес, карта будет создана автоматически. Координаты определятся автоматически.</small>
                        <button type="button" id="geocodeBtn" class="btn btn-secondary" style="margin-top: 10px;">Определить координаты</button>
                        <div id="geocodeStatus" style="margin-top: 10px; display: none;"></div>
                    </div>

                    <div class="form-group" style="display: none;">
                        <label for="latitude">Широта</label>
                        <input type="text" id="latitude" name="latitude" readonly
                               value="<?php echo $lesson ? htmlspecialchars($lesson['latitude'] ?? '') : ''; ?>">
                    </div>

                    <div class="form-group" style="display: none;">
                        <label for="longitude">Долгота</label>
                        <input type="text" id="longitude" name="longitude" readonly
                               value="<?php echo $lesson ? htmlspecialchars($lesson['longitude'] ?? '') : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label for="map_link">ID ссылки на карту</label>
                        <input type="text" id="map_link" name="map_link" 
                               value="<?php echo $lesson ? htmlspecialchars($lesson['map_link'] ?? '') : ''; ?>"
                               placeholder="Например: mapLuzh">
                        <small>ID элемента карты (без #). Будет автоматически создан на основе названия парка, если не указан.</small>
                    </div>

                    <div class="form-group">
                        <label for="modal_id">ID модального окна для записи</label>
                        <input type="text" id="modal_id" name="modal_id" 
                               value="<?php echo $lesson ? htmlspecialchars($lesson['modal_id'] ?? '') : ''; ?>"
                               placeholder="Например: modal-luzh">
                        <small>ID модального окна (без #). Используется для кнопки "Записаться".</small>
                    </div>

                    <div class="form-group">
                        <label for="order">Порядок отображения</label>
                        <input type="number" id="order" name="order" 
                               value="<?php echo $lesson ? htmlspecialchars($lesson['order'] ?? 0) : 0; ?>"
                               min="0" step="1">
                        <small>Число для сортировки. Меньшие значения отображаются первыми.</small>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary"><?php echo $isEdit ? 'Сохранить изменения' : 'Добавить занятие'; ?></button>
                        <a href="/admin/lessons.php" class="btn btn-secondary">Отмена</a>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script src="/admin/js/admin.js"></script>
    <script>
        // Автоматическое создание map_link и modal_id на основе названия парка
        document.getElementById('park_name')?.addEventListener('blur', function() {
            const parkName = this.value.trim();
            if (parkName) {
                // Создаем map_link и modal_id на основе названия парка
                const mapLink = document.getElementById('map_link');
                const modalId = document.getElementById('modal_id');
                
                if (!mapLink.value) {
                    // Преобразуем название в ID (транслитерация и очистка)
                    const id = parkName.toLowerCase()
                        .replace(/[а-яё]/g, function(match) {
                            const translit = {
                                'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e', 'ё': 'e',
                                'ж': 'zh', 'з': 'z', 'и': 'i', 'й': 'y', 'к': 'k', 'л': 'l', 'м': 'm',
                                'н': 'n', 'о': 'o', 'п': 'p', 'р': 'r', 'с': 's', 'т': 't', 'у': 'u',
                                'ф': 'f', 'х': 'h', 'ц': 'ts', 'ч': 'ch', 'ш': 'sh', 'щ': 'sch',
                                'ъ': '', 'ы': 'y', 'ь': '', 'э': 'e', 'ю': 'yu', 'я': 'ya'
                            };
                            return translit[match] || '';
                        })
                        .replace(/[^a-z0-9]/g, '')
                        .substring(0, 20);
                    
                    mapLink.value = 'map' + id.charAt(0).toUpperCase() + id.slice(1);
                }
                
                if (!modalId.value) {
                    const modalIdValue = parkName.toLowerCase()
                        .replace(/[а-яё]/g, function(match) {
                            const translit = {
                                'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e', 'ё': 'e',
                                'ж': 'zh', 'з': 'z', 'и': 'i', 'й': 'y', 'к': 'k', 'л': 'l', 'м': 'm',
                                'н': 'n', 'о': 'o', 'п': 'p', 'р': 'r', 'с': 's', 'т': 't', 'у': 'u',
                                'ф': 'f', 'х': 'h', 'ц': 'ts', 'ч': 'ch', 'ш': 'sh', 'щ': 'sch',
                                'ъ': '', 'ы': 'y', 'ь': '', 'э': 'e', 'ю': 'yu', 'я': 'ya'
                            };
                            return translit[match] || '';
                        })
                        .replace(/[^a-z0-9]/g, '-')
                        .replace(/-+/g, '-')
                        .replace(/^-|-$/g, '');
                    
                    modalId.value = 'modal-' + modalIdValue;
                }
            }
        });
        
        // Геокодирование адреса
        document.getElementById('geocodeBtn')?.addEventListener('click', async function() {
            const address = document.getElementById('address')?.value.trim();
            if (!address) {
                alert('Введите адрес');
                return;
            }
            
            const statusDiv = document.getElementById('geocodeStatus');
            const btn = this;
            const originalText = btn.textContent;
            
            btn.disabled = true;
            btn.textContent = 'Определение...';
            statusDiv.style.display = 'block';
            statusDiv.innerHTML = '<span style="color: blue;">Определение координат...</span>';
            
            try {
                const response = await fetch('/admin/api/geocode_address.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ address: address })
                });
                
                const result = await response.json();
                
                if (result.success) {
                    document.getElementById('latitude').value = result.latitude;
                    document.getElementById('longitude').value = result.longitude;
                    statusDiv.innerHTML = '<span style="color: green;">✓ Координаты определены: ' + result.latitude + ', ' + result.longitude + '</span>';
                } else {
                    statusDiv.innerHTML = '<span style="color: red;">✗ Ошибка: ' + (result.message || 'Не удалось определить координаты') + '</span>';
                }
            } catch (error) {
                console.error('Error:', error);
                statusDiv.innerHTML = '<span style="color: red;">✗ Произошла ошибка при определении координат</span>';
            } finally {
                btn.disabled = false;
                btn.textContent = originalText;
            }
        });
        
        // Автоматическое геокодирование при потере фокуса адреса
        document.getElementById('address')?.addEventListener('blur', function() {
            const address = this.value.trim();
            const lat = document.getElementById('latitude')?.value;
            const lng = document.getElementById('longitude')?.value;
            
            // Если адрес есть, но координат нет - автоматически определяем
            if (address && (!lat || !lng)) {
                setTimeout(() => {
                    document.getElementById('geocodeBtn')?.click();
                }, 500);
            }
        });
        
        // Обработка загрузки изображения
        document.getElementById('park_image_upload')?.addEventListener('change', async function(e) {
            const file = e.target.files[0];
            if (!file) return;
            
            const formData = new FormData();
            formData.append('image', file);
            formData.append('type', 'lesson');
            const parkName = document.getElementById('park_name')?.value.trim();
            if (parkName) {
                formData.append('park_name', parkName);
            }
            
            try {
                const response = await fetch('/admin/api/upload_image.php', {
                    method: 'POST',
                    body: formData
                });
                
                const result = await response.json();
                
                if (result.success) {
                    const hiddenInput = document.getElementById('park_image');
                    if (hiddenInput) {
                        hiddenInput.value = result.path;
                    }
                    const preview = document.getElementById('park_image_preview');
                    const previewContainer = document.getElementById('park_image_preview_container');
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
        
        // Обработка отправки формы
        document.getElementById('lessonForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const data = {};
            
            // Собираем все поля формы
            for (let [key, value] of formData.entries()) {
                data[key] = value;
            }
            
            try {
                const response = await fetch('/admin/api/save_lesson.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(data)
                });
                
                const result = await response.json();
                
                if (result.success) {
                    alert(result.message || 'Занятие успешно сохранено');
                    window.location.href = '/admin/lessons.php';
                } else {
                    alert('Ошибка: ' + (result.message || 'Не удалось сохранить занятие'));
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Произошла ошибка при сохранении занятия');
            }
        });
    </script>
</body>
</html>

