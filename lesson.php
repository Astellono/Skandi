<!DOCTYPE html>
<html lang="ru">

<head>
    <!-- Yandex.Metrika counter -->
    <script defer src="https://api-maps.yandex.ru/2.1/?apikey=199de9b4-eaf5-45e1-95c2-3510af592354&lang=ru_RU"
        type="text/javascript"></script>
    <script defer src="js/map.js?ver=<? echo time(); ?>"></script>
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
        content="Сканди-путешествия и экскурсии по Москве, Московской области, России и странам СНГ, зарубеж!">
    <link rel="stylesheet" href="style/clear.css">
    <link rel="stylesheet" href="style/bootstrap.css">
    <link rel="stylesheet" href="style/style.css?ver=<? echo time(); ?>">
    <link rel="stylesheet" href="style/style-adaptive.css?ver=<? echo time(); ?>">
    <link rel="icon" sizes="120x120" href="img/icon.svg" type="image/svg+xml">

    <script defer src="js/scroll.js"></script>
    <title>Занятия</title>
</head>

<body>
    <header class="header" id="header">

        <?php include 'parts/headerPHP.php'; ?>

    </header>
    <!-- <section class="openlesson">
        <div class="container">
            <h2 class="openlesson__title">
                ОТКРЫТЫЕ ЗАНЯТИЯ по Северной (Скандинавской) ходьбе
            </h2>
            <div class="openlesson__mainblock">
                <div class="openlesson__info">
                    <strong style="font-size: 22px;">Стадион Лужники
                    <br>
                    17 декабря в 12.00</strong>
                    <br><br>
                    <strong>На занятии вы узнаете:</strong>
                    <br>
                    <ul>
                        <li class="openlesson__item">✅О пользе Nordic Walking</li>
                        <li class="openlesson__item">✅Как правильно подобрать палки для Nordic Walking</li>
                        <li class="openlesson__item">✅Основные элементы техники Nordic Walking</li>
                        <li class="openlesson__item">✅Какую одежду подобрать для занятий в разное время года.</li>
                        <li class="openlesson__item">✅Упражнения на отработку техники скандинавского шага;
                            общеукреляющие упражнения с палочками</li>
                        <li class="openlesson__item">✅Основные направления работы проекта Помируспалками</li>
                    </ul>

                    Палки предоставим при необходимости (указать при записи). <br>
                    <br>
                    Участие бесплатное.
                    <br>
                    Открытое занятие проводится для всех желающих приобщиться к "НЕ бабушкиному" виду спорта.💪😍
                    <br>
                    Занятие проводит инструктор Nordic Walking, руководитель проекта "По миру с палками" Волосюк
                    Маргарита.
                    <br>
                    Встречаемся в 11.45 у выхода из метро "Воробьевы горы" N3.
                    <br>
                    <a href="#modal-open" id="btn-open" class="openlesson__btn">Записаться</a>
                </div>
                <div class="openlesson__imgblock">
                    <img class="openlesson__img" src="img/lesson/openlesson.jpeg" alt="">
                </div>
            </div>

        </div>
    </section> -->
    <section class="lesson">
        <div class="container">

            <div class="lesson__header">
                <h2 class="lesson__title">Групповые занятия</h2>
            </div>

            <?php
            require_once $_SERVER['DOCUMENT_ROOT'] . '/phpLogin/connect.php';
            
            // Получаем расписание из БД
            $lessons = [];
            $query = "SELECT * FROM lessons_schedule ORDER BY `order` ASC, lesson_id ASC";
            $result = $connect->query($query);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $lessons[] = $row;
                }
            }
            
            // Подготавливаем данные для JavaScript
            $lessonsJson = json_encode($lessons, JSON_UNESCAPED_UNICODE | JSON_HEX_QUOT | JSON_HEX_APOS);
            
            if (!empty($lessons)):
            ?>
            <script>
                // Передаем данные о занятиях в JavaScript для создания карт
                window.lessonsData = <?php echo $lessonsJson; ?>;
            </script>
            
            <?php
            // Динамически создаем модальные окна с картами для каждого занятия
            foreach ($lessons as $lesson):
                if (!empty($lesson['map_link']) && !empty($lesson['latitude']) && !empty($lesson['longitude'])):
                    $mapLinkId = htmlspecialchars($lesson['map_link']);
                    $mapContainerId = 'map-' . $mapLinkId;
            ?>
            <div id="<?php echo $mapLinkId; ?>" onclick="location.href='#'" class="mod">
                <div onclick="event.stopPropagation()" class="modal-d">
                    <div class="modal-c">
                        <div class="modal-h">
                            <h3 class="modal-title">Точка сбора - <?php echo htmlspecialchars($lesson['park_name']); ?></h3>
                            <a href="#close" title="Close" class="close">×</a>
                        </div>
                        <div id="<?php echo $mapContainerId; ?>" style="height: 500px;"></div>
                    </div>
                </div>
            </div>
            <?php
                endif;
            endforeach;
            ?>

            <!-- Десктопная таблица (скрывается на мобильных) -->
            <div class="lesson__schedule-desktop">
                <h3 class="lesson__schedule-title">Расписание занятий</h3>
                <div class="lesson__table-wrapper">
                    <table class="lesson__table lesson__table-desktop">
                        <thead>
                            <tr>
                                <th>ПАРК</th>
                                <th>ПН</th>
                                <th>ВТ</th>
                                <th>СР</th>
                                <th>ЧТ</th>
                                <th>ПТ</th>
                                <th>СБ</th>
                                <th>ВС</th>
                                <th>Точка сбора</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($lessons as $index => $lesson): ?>
                                <tr><td></td></tr>
                                <tr>
                                    <td class="lesson__table-park">
                                        <?php 
                                        $imgSrc = !empty($lesson['park_image']) ? $lesson['park_image'] : 'img/lesson/default.jpg';
                                        $imgSrc = ($imgSrc[0] === '/') ? substr($imgSrc, 1) : $imgSrc;
                                        ?>
                                        <div class="lesson__park-image">
                                            <img src="<?php echo htmlspecialchars($imgSrc); ?>" alt="<?php echo htmlspecialchars($lesson['park_name']); ?>">
                                            <span class="lesson__park-name"><?php echo htmlspecialchars($lesson['park_name']); ?></span>
                                        </div>
                                    </td>
                                    <td class="<?php echo (!empty($lesson['monday']) && $lesson['monday'] !== '-') ? 'lesson__time-cell' : 'lesson__time-empty'; ?>"><?php echo htmlspecialchars($lesson['monday'] ?? '-'); ?></td>
                                    <td class="<?php echo (!empty($lesson['tuesday']) && $lesson['tuesday'] !== '-') ? 'lesson__time-cell' : 'lesson__time-empty'; ?>"><?php echo htmlspecialchars($lesson['tuesday'] ?? '-'); ?></td>
                                    <td class="<?php echo (!empty($lesson['wednesday']) && $lesson['wednesday'] !== '-') ? 'lesson__time-cell' : 'lesson__time-empty'; ?>"><?php echo htmlspecialchars($lesson['wednesday'] ?? '-'); ?></td>
                                    <td class="<?php echo (!empty($lesson['thursday']) && $lesson['thursday'] !== '-') ? 'lesson__time-cell' : 'lesson__time-empty'; ?>"><?php echo htmlspecialchars($lesson['thursday'] ?? '-'); ?></td>
                                    <td class="<?php echo (!empty($lesson['friday']) && $lesson['friday'] !== '-') ? 'lesson__time-cell' : 'lesson__time-empty'; ?>"><?php echo htmlspecialchars($lesson['friday'] ?? '-'); ?></td>
                                    <td class="<?php echo (!empty($lesson['saturday']) && $lesson['saturday'] !== '-') ? 'lesson__time-cell' : 'lesson__time-empty'; ?>"><?php echo htmlspecialchars($lesson['saturday'] ?? '-'); ?></td>
                                    <td class="<?php echo (!empty($lesson['sunday']) && $lesson['sunday'] !== '-') ? 'lesson__time-cell' : 'lesson__time-empty'; ?>"><?php echo htmlspecialchars($lesson['sunday'] ?? '-'); ?></td>
                                    <td class="lesson__table-map">
                                        <?php if (!empty($lesson['map_link'])): ?>
                                            <a class="lesson__map-link" href="#<?php echo htmlspecialchars($lesson['map_link']); ?>" title="Посмотреть на карте">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" fill="currentColor"/>
                                                </svg>
                                            </a>
                                        <?php else: ?>
                                            <span class="lesson__map-disabled" title="Карта недоступна">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" fill="currentColor"/>
                                                </svg>
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="lesson__table-action">
                                        <?php if (!empty($lesson['modal_id'])): ?>
                                            <a href="#<?php echo htmlspecialchars($lesson['modal_id']); ?>" class="lesson__btn lesson__btn-table">Записаться</a>
                                        <?php else: ?>
                                            <span class="lesson__btn lesson__btn-table lesson__btn-disabled">Записаться</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr><td></td></tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Мобильные карточки (показываются на мобильных) -->
            <div class="lesson__schedule-mobile">
                <h3 class="lesson__schedule-title">Расписание занятий</h3>
                <div class="lesson__cards">
                    <?php foreach ($lessons as $lesson): ?>
                        <?php 
                        $imgSrc = !empty($lesson['park_image']) ? $lesson['park_image'] : 'img/lesson/default.jpg';
                        $imgSrc = ($imgSrc[0] === '/') ? substr($imgSrc, 1) : $imgSrc;
                        ?>
                        <div class="lesson__card">
                            <div class="lesson__card-header">
                                <div class="lesson__card-image">
                                    <img src="<?php echo htmlspecialchars($imgSrc); ?>" alt="<?php echo htmlspecialchars($lesson['park_name']); ?>">
                                    <div class="lesson__card-overlay"></div>
                                    <h4 class="lesson__card-title"><?php echo htmlspecialchars($lesson['park_name']); ?></h4>
                                </div>
                            </div>
                            <div class="lesson__card-body">
                                <div class="lesson__card-schedule">
                                    <div class="lesson__schedule-grid">
                                        <div class="lesson__schedule-day">
                                            <span class="lesson__day-name">ПН</span>
                                            <span class="lesson__day-time"><?php echo htmlspecialchars($lesson['monday'] ?? '-'); ?></span>
                                        </div>
                                        <div class="lesson__schedule-day">
                                            <span class="lesson__day-name">ВТ</span>
                                            <span class="lesson__day-time"><?php echo htmlspecialchars($lesson['tuesday'] ?? '-'); ?></span>
                                        </div>
                                        <div class="lesson__schedule-day">
                                            <span class="lesson__day-name">СР</span>
                                            <span class="lesson__day-time"><?php echo htmlspecialchars($lesson['wednesday'] ?? '-'); ?></span>
                                        </div>
                                        <div class="lesson__schedule-day">
                                            <span class="lesson__day-name">ЧТ</span>
                                            <span class="lesson__day-time"><?php echo htmlspecialchars($lesson['thursday'] ?? '-'); ?></span>
                                        </div>
                                        <div class="lesson__schedule-day">
                                            <span class="lesson__day-name">ПТ</span>
                                            <span class="lesson__day-time"><?php echo htmlspecialchars($lesson['friday'] ?? '-'); ?></span>
                                        </div>
                                        <div class="lesson__schedule-day">
                                            <span class="lesson__day-name">СБ</span>
                                            <span class="lesson__day-time"><?php echo htmlspecialchars($lesson['saturday'] ?? '-'); ?></span>
                                        </div>
                                        <div class="lesson__schedule-day">
                                            <span class="lesson__day-name">ВС</span>
                                            <span class="lesson__day-time"><?php echo htmlspecialchars($lesson['sunday'] ?? '-'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="lesson__card-actions">
                                    <?php if (!empty($lesson['map_link'])): ?>
                                        <a href="#<?php echo htmlspecialchars($lesson['map_link']); ?>" class="lesson__card-map-btn" title="Посмотреть на карте">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" fill="currentColor"/>
                                            </svg>
                                            <span>Карта</span>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (!empty($lesson['modal_id'])): ?>
                                        <a href="#<?php echo htmlspecialchars($lesson['modal_id']); ?>" class="lesson__card-register-btn">Записаться</a>
                                    <?php else: ?>
                                        <span class="lesson__card-register-btn lesson__card-register-btn-disabled">Записаться</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php else: ?>
                <p style="text-align: center; padding: 40px; color: #999;">Расписание пока не добавлено</p>
            <?php endif; ?>
            
            <div class="lesson__price-after-table">
                <div class="lesson__price-badge">
                    <span class="lesson__price-label">Цена занятия:</span>
                    <span class="lesson__price-value">700₽</span>
                </div>
            </div>
            
            <div class="lesson__subscriptions">
                <h3 class="lesson__section-title">Абонементы на групповые занятия</h3>
                <div class="lesson__subscriptions-grid">
                    <div class="lesson__subscription-card">
                        <div class="lesson__subscription-icon">
                            <img src="img/lesson/abon.png" alt="Абонемент">
                        </div>
                        <div class="lesson__subscription-content">
                            <h4 class="lesson__subscription-title">4 занятия</h4>
                            <p class="lesson__subscription-period">Срок действия: 2 месяца</p>
                            <div class="lesson__subscription-price">
                                <span class="lesson__subscription-price-value">2500₽</span>
                                <span class="lesson__subscription-price-per">625₽ за занятие</span>
                            </div>
                        </div>
                    </div>
                    <div class="lesson__subscription-card lesson__subscription-card-featured">
                        <div class="lesson__subscription-badge">Выгодно</div>
                        <div class="lesson__subscription-icon">
                            <img src="img/lesson/abon.png" alt="Абонемент">
                        </div>
                        <div class="lesson__subscription-content">
                            <h4 class="lesson__subscription-title">10 занятий</h4>
                            <p class="lesson__subscription-period">Срок действия: 6 месяцев</p>
                            <div class="lesson__subscription-price">
                                <span class="lesson__subscription-price-value">6000₽</span>
                                <span class="lesson__subscription-price-per">600₽ за занятие</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="lesson__individual">
        <div class="container">
            <div class="lesson__individual-wrapper">
                <div class="lesson__individual-content">
                    <div class="lesson__individual-text">
                        <h2 class="lesson__individual-title">Индивидуальные занятия</h2>
                        <p class="lesson__individual-description">
                            В этом формате у вас есть возможность выбрать подходящее для вас место и время. Оставьте заявку
                            и с вами свяжутся и обговорят все интересующие вас вопросы.
                        </p>
                        <div class="lesson__individual-price">
                            <span class="lesson__individual-price-label">Цена:</span>
                            <span class="lesson__individual-price-value">3000₽</span>
                        </div>
                        <a href="#modal-solo" class="lesson__btn lesson__btn-primary">Записаться</a>
                    </div>
                </div>
            </div>
            
            <div class="lesson__subscriptions lesson__subscriptions-individual">
                <h3 class="lesson__section-title">Абонементы на индивидуальные занятия</h3>
                <div class="lesson__subscriptions-grid lesson__subscriptions-grid-single">
                    <div class="lesson__subscription-card">
                        <div class="lesson__subscription-icon">
                            <img src="img/lesson/abon.png" alt="Абонемент">
                        </div>
                        <div class="lesson__subscription-content">
                            <h4 class="lesson__subscription-title">3 занятия</h4>
                            <p class="lesson__subscription-period">Срок действия: 1 месяц</p>
                            <div class="lesson__subscription-price">
                                <span class="lesson__subscription-price-value">7500₽</span>
                                <span class="lesson__subscription-price-per">2500₽ за занятие</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="questions" id="questions">
        <script src="/parts/questions.js"></script>
    </section>
    <section class="contacts" id="contacts">
        <script src="/parts/contact.js"></script>
    </section>


    <!-- Модальные   ------------------------------------>
    <div onclick="location.href='#'" id="modal-kolom" class="mod">

        <div onclick="event.stopPropagation()" class="modal-d">
            <div class="modal-c">
                <div class="modal-h">
                    <h3 class="modal-title">Запись на груповое занятие</h3>
                    <a href="#" title="Close" class="close">×</a>
                </div>
                <div class="modal-b">

                    <form action="php/lesson/kolomenskaya.php" method="POST" class="modal__form">

                        Фамилия, имя и отчество:
                        <input required type="text" name="fio" placeholder="Ваш ответ">
                        Дата рождения:
                        <input required type="text" name="age" placeholder="Дата рождения 31.12.2000">
                        Ваш телефон:
                        <input required type="tel" name="tel" placeholder="Ваш ответ">
                        Ваш email:
                        <input required type="email" name="email" placeholder="Ваш ответ">
                        Коментарий, промокод (необязательное поле)
                        <input type="text" name="comment" placeholder="Ваш ответ">



                        <input type="submit" value="Отправить" class="modal-form-btn">

                        <a href="#close" class="btn btn-secondary form-btn close" title="Close">Закрыть</a>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <div onclick="location.href='#'" id="modal-luzh" class="mod">

        <div onclick="event.stopPropagation()" class="modal-d">
            <div class="modal-c">
                <div class="modal-h">
                    <h3 class="modal-title">Запись на груповое занятие</h3>
                    <a href="#close" title="Close" class="close">×</a>
                </div>
                <div class="modal-b">

                    <form action="php/lesson/luzniki.php" method="POST" class="modal__form">

                        Фамилия, имя и отчество:
                        <input required type="text" name="fio" placeholder="Ваш ответ">
                        Дата рождения:
                        <input required type="text" name="age" placeholder="Дата рождения 31.12.2000">
                        Ваш телефон:
                        <input required type="tel" name="tel" placeholder="Ваш ответ">
                        Ваш email:
                        <input required type="email" name="email" placeholder="Ваш ответ">
                        Коментарий, промокод (необязательное поле)
                        <input type="text" name="comment" placeholder="Ваш ответ">



                        <input type="submit" value="Отправить" class="modal-form-btn">

                        <a href="#close" class="btn btn-secondary form-btn close" title="Close">Закрыть</a>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div onclick="location.href='#'" id="modal-vorona" class="mod">
        <div onclick="event.stopPropagation()" class="modal-d">
            <div class="modal-c">
                <div class="modal-h">
                    <h3 class="modal-title">Запись на груповое занятие</h3>
                    <a href="#close" title="Close" class="close">×</a>
                </div>
                <div class="modal-b">

                    <form action="php/lesson/Vorona.php" method="POST" class="modal__form">

                        Фамилия, имя и отчество:
                        <input required type="text" name="fio" placeholder="Ваш ответ">
                        Дата рождения:
                        <input required type="text" name="age" placeholder="Дата рождения 31.12.2000">
                        Ваш телефон:
                        <input required type="tel" name="tel" placeholder="Ваш ответ">
                        Ваш email:
                        <input required type="email" name="email" placeholder="Ваш ответ">
                        Коментарий, промокод (необязательное поле)
                        <input type="text" name="comment" placeholder="Ваш ответ">



                        <input type="submit" value="Отправить" class="modal-form-btn">

                        <a href="#close" class="btn btn-secondary form-btn close" title="Close">Закрыть</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div onclick="location.href='#'" id="modal-caricino" class="mod">
        <div onclick="event.stopPropagation()" class="modal-d">
            <div class="modal-c">
                <div class="modal-h">
                    <h3 class="modal-title">Запись на груповое занятие</h3>
                    <a href="#close" title="Close" class="close">×</a>
                </div>
                <div class="modal-b">

                    <form action="php/lesson/caricino.php" method="POST" class="modal__form">

                        Фамилия, имя и отчество:
                        <input required type="text" name="fio" placeholder="Ваш ответ">
                        Дата рождения:
                        <input required type="text" name="age" placeholder="Дата рождения 31.12.2000">
                        Ваш телефон:
                        <input required type="tel" name="tel" placeholder="Ваш ответ">
                        Ваш email:
                        <input required type="email" name="email" placeholder="Ваш ответ">
                        Коментарий, промокод (необязательное поле)
                        <input type="text" name="comment" placeholder="Ваш ответ">



                        <input type="submit" value="Отправить" class="modal-form-btn">

                        <a href="#close" class="btn btn-secondary form-btn close" title="Close">Закрыть</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div onclick="location.href='#'" id="modal-solo" class="mod">
        <div onclick="event.stopPropagation()" class="modal-d">
            <div class="modal-c">
                <div class="modal-h">
                    <h3 class="modal-title">Запись на индивидуальное занятие</h3>
                    <a href="#close" title="Close" class="close">×</a>
                </div>
                <div class="modal-b">

                    <form action="php/lesson/solo.php" method="POST" class="modal__form">

                        Фамилия, имя и отчество:
                        <input required type="text" name="fio" placeholder="Ваш ответ">
                        Дата рождения:
                        <input required type="text" name="age" placeholder="Дата рождения 31.12.2000">
                        Ваш телефон:
                        <input required type="tel" name="tel" placeholder="Ваш ответ">
                        Ваш email:
                        <input required type="email" name="email" placeholder="Ваш ответ">
                        Коментарий, промокод (необязательное поле)
                        <input type="text" name="comment" placeholder="Ваш ответ">



                        <input type="submit" value="Отправить" class="modal-form-btn">

                        <a href="#close" class="btn btn-secondary form-btn close" title="Close">Закрыть</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div onclick="location.href='#'" id="modal-open" class="mod">
        <div onclick="event.stopPropagation()" class="modal-d">
            <div class="modal-c">
                <div class="modal-h">
                    <h3 class="modal-title">Запись на индивидуальное занятие</h3>
                    <a href="#close" title="Close" class="close">×</a>
                </div>
                <div class="modal-b">

                    <form action="php/lesson/open.php" method="POST" class="modal__form">

                        Фамилия, имя и отчество:
                        <input required type="text" name="fio" placeholder="Ваш ответ">
                        Дата рождения:
                        <input required type="text" name="age" placeholder="Дата рождения 31.12.2000">
                        Ваш телефон:
                        <input required type="tel" name="tel" placeholder="Ваш ответ">
                        Ваш email:
                        <input required type="email" name="email" placeholder="Ваш ответ">
                        Коментарий, промокод (необязательное поле)
                        <input type="text" name="comment" placeholder="Ваш ответ">



                        <input type="submit" value="Отправить" class="modal-form-btn">

                        <a href="#close" class="btn btn-secondary form-btn close" title="Close">Закрыть</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div onclick="location.href='#'" id="modal-hodin" class="mod">
        <div onclick="event.stopPropagation()" class="modal-d">
            <div class="modal-c">
                <div class="modal-h">
                    <h3 class="modal-title">Запись на индивидуальное занятие</h3>
                    <a href="#close" title="Close" class="close">×</a>
                </div>
                <div class="modal-b">

                    <form action="php/lesson/hodin.php" method="POST" class="modal__form">

                        Фамилия, имя и отчество:
                        <input required type="text" name="fio" placeholder="Ваш ответ">
                        Дата рождения:
                        <input required type="text" name="age" placeholder="Дата рождения 31.12.2000">
                        Ваш телефон:
                        <input required type="tel" name="tel" placeholder="Ваш ответ">
                        Ваш email:
                        <input required type="email" name="email" placeholder="Ваш ответ">
                        Коментарий, промокод (необязательное поле)
                        <input type="text" name="comment" placeholder="Ваш ответ">



                        <input type="submit" value="Отправить" class="modal-form-btn">

                        <a href="#close" class="btn btn-secondary form-btn close" title="Close">Закрыть</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div onclick="location.href='#'" id="modal-ber" class="mod">
        <div onclick="event.stopPropagation()" class="modal-d">
            <div class="modal-c">
                <div class="modal-h">
                    <h3 class="modal-title">Запись на индивидуальное занятие</h3>
                    <a href="#close" title="Close" class="close">×</a>
                </div>
                <div class="modal-b">

                    <form action="php/lesson/ber.php" method="POST" class="modal__form">

                        Фамилия, имя и отчество:
                        <input required type="text" name="fio" placeholder="Ваш ответ">
                        Дата рождения:
                        <input required type="text" name="age" placeholder="Дата рождения 31.12.2000">
                        Ваш телефон:
                        <input required type="tel" name="tel" placeholder="Ваш ответ">
                        Ваш email:
                        <input required type="email" name="email" placeholder="Ваш ответ">
                        Коментарий, промокод (необязательное поле)
                        <input type="text" name="comment" placeholder="Ваш ответ">



                        <input type="submit" value="Отправить" class="modal-form-btn">

                        <a href="#close" class="btn btn-secondary form-btn close" title="Close">Закрыть</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div onclick="location.href='#'" id="modal-Pio" class="mod">
        <div onclick="event.stopPropagation()" class="modal-d">
            <div class="modal-c">
                <div class="modal-h">
                    <h3 class="modal-title">Запись на индивидуальное занятие</h3>
                    <a href="#close" title="Close" class="close">×</a>
                </div>
                <div class="modal-b">

                    <form action="php/lesson/pio.php" method="POST" class="modal__form">

                        Фамилия, имя и отчество:
                        <input required type="text" name="fio" placeholder="Ваш ответ">
                        Дата рождения:
                        <input required type="text" name="age" placeholder="Дата рождения 31.12.2000">
                        Ваш телефон:
                        <input required type="tel" name="tel" placeholder="Ваш ответ">
                        Ваш email:
                        <input required type="email" name="email" placeholder="Ваш ответ">
                        Коментарий, промокод (необязательное поле)
                        <input type="text" name="comment" placeholder="Ваш ответ">



                        <input type="submit" value="Отправить" class="modal-form-btn">

                        <a href="#close" class="btn btn-secondary form-btn close" title="Close">Закрыть</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div onclick="location.href='#'" id="modal-shkul" class="mod">
        <div onclick="event.stopPropagation()" class="modal-d">
            <div class="modal-c">
                <div class="modal-h">
                    <h3 class="modal-title">Запись на индивидуальное занятие</h3>
                    <a href="#close" title="Close" class="close">×</a>
                </div>
                <div class="modal-b">

                    <form action="php/lesson/shkul.php" method="POST" class="modal__form">

                        Фамилия, имя и отчество:
                        <input required type="text" name="fio" placeholder="Ваш ответ">
                        Дата рождения:
                        <input required type="text" name="age" placeholder="Дата рождения 31.12.2000">
                        Ваш телефон:
                        <input required type="tel" name="tel" placeholder="Ваш ответ">
                        Ваш email:
                        <input required type="email" name="email" placeholder="Ваш ответ">
                        Коментарий, промокод (необязательное поле)
                        <input type="text" name="comment" placeholder="Ваш ответ">



                        <input type="submit" value="Отправить" class="modal-form-btn">

                        <a href="#close" class="btn btn-secondary form-btn close" title="Close">Закрыть</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div onclick="location.href='#'" id="modal-Kuz" class="mod">
        <div onclick="event.stopPropagation()" class="modal-d">
            <div class="modal-c">
                <div class="modal-h">
                    <h3 class="modal-title">Запись на индивидуальное занятие</h3>
                    <a href="#close" title="Close" class="close">×</a>
                </div>
                <div class="modal-b">

                    <form action="php/lesson/kuz.php" method="POST" class="modal__form">

                        Фамилия, имя и отчество:
                        <input required type="text" name="fio" placeholder="Ваш ответ">
                        Дата рождения:
                        <input required type="text" name="age" placeholder="Дата рождения 31.12.2000">
                        Ваш телефон:
                        <input required type="tel" name="tel" placeholder="Ваш ответ">
                        Ваш email:
                        <input required type="email" name="email" placeholder="Ваш ответ">
                        Коментарий, промокод (необязательное поле)
                        <input type="text" name="comment" placeholder="Ваш ответ">



                        <input type="submit" value="Отправить" class="modal-form-btn">

                        <a href="#close" class="btn btn-secondary form-btn close" title="Close">Закрыть</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="mapCol" onclick="location.href='#'" class="mod">
        <div onclick="event.stopPropagation()" class="modal-d">
            <div class="modal-c">
                <div class="modal-h">
                    <h3 class="modal-title">Точка сбора</h3>
                    <a href="#close" title="Close" class="close">×</a>
                </div>


                <div id="map-2" style="height: 500px;"></div>

                <!-- style="margin: 0 auto; width: 100%; -->

            </div>
        </div>
    </div>


    <div id="mapLuzh" onclick="location.href='#'" class="mod">
        <div onclick="event.stopPropagation()" class="modal-d">
            <div class="modal-c">
                <div class="modal-h">
                    <h3 class="modal-title">Точка сбора</h3>
                    <a href="#close" title="Close" class="close">×</a>
                </div>
                <div id="map-3" style="height: 500px;"></div>


            </div>
        </div>
    </div>
    <div id="mapVorona" onclick="location.href='#'" class="mod">
        <div onclick="event.stopPropagation()" class="modal-d">
            <div class="modal-c">
                <div class="modal-h">
                    <h3 class="modal-title">Точка сбора</h3>
                    <a href="#close" title="Close" class="close">×</a>
                </div>
                <div id="map-4" style="height: 500px;"></div>


            </div>
        </div>
    </div>
    <div id="mapCar" onclick="location.href='#'" class="mod">
        <div onclick="event.stopPropagation()" class="modal-d">
            <div class="modal-c">
                <div class="modal-h">
                    <h3 class="modal-title">Точка сбора</h3>
                    <a href="#close" title="Close" class="close">×</a>
                </div>

                <div id="map-1" style="height: 500px;"></div>

            </div>
        </div>
    </div>
    <div id="mapHodin" onclick="location.href='#'" class="mod">
        <div onclick="event.stopPropagation()" class="modal-d">
            <div class="modal-c">
                <div class="modal-h">
                    <h3 class="modal-title">Точка сбора</h3>
                    <a href="#close" title="Close" class="close">×</a>
                </div>

                <div id="map-5" style="height: 500px;"></div>

            </div>
        </div>
    </div>
    <div id="mapPio" onclick="location.href='#'" class="mod">
        <div onclick="event.stopPropagation()" class="modal-d">
            <div class="modal-c">
                <div class="modal-h">
                    <h3 class="modal-title">Точка сбора</h3>
                    <a href="#close" title="Close" class="close">×</a>
                </div>

                <div id="map-6" style="height: 500px;"></div>

            </div>
        </div>
    </div>
    <div id="mapBer" onclick="location.href='#'" class="mod">
        <div onclick="event.stopPropagation()" class="modal-d">
            <div class="modal-c">
                <div class="modal-h">
                    <h3 class="modal-title">Точка сбора</h3>
                    <a href="#close" title="Close" class="close">×</a>
                </div>

                <div id="map-7" style="height: 500px;"></div>

            </div>
        </div>
    </div>
    <div id="mapShkul" onclick="location.href='#'" class="mod">
        <div onclick="event.stopPropagation()" class="modal-d">
            <div class="modal-c">
                <div class="modal-h">
                    <h3 class="modal-title">Точка сбора</h3>
                    <a href="#close" title="Close" class="close">×</a>
                </div>

                <div id="map-8" style="height: 500px;"></div>

            </div>
        </div>
    </div>
    <div id="mapkuz" onclick="location.href='#'" class="mod">
        <div onclick="event.stopPropagation()" class="modal-d">
            <div class="modal-c">
                <div class="modal-h">
                    <h3 class="modal-title">Точка сбора</h3>
                    <a href="#close" title="Close" class="close">×</a>
                </div>

                <div id="map-9" style="height: 500px;"></div>

            </div>
        </div>
    </div>
    <footer class="footer"></footer>

    <script src="modal/bootstrap.bundle.js"></script>
    <script src="modal/Burger.js"></script>
    <script src="modal/modal.js"></script>
    <script src="node_modules/jquery/dist/jquery.js"></script>



</body>

</html>