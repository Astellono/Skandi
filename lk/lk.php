<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мой профиль здоровья</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="/style/clear.css">
    <link rel="stylesheet" href="/style/style.css">
    <link rel="stylesheet" href="/style/style-adaptive.css">

    <link rel="stylesheet" href="style/styleLk.css">
    <script src="/modal/Burger.js" defer></script>
    <script src="js/mainLK.js" defer></script>
    <style>

    </style>
</head>

<body>
    <header class="header" id="header">
        <script src="/parts/header.js?ver=<? echo time(); ?>"></script>

    </header>
    <div class="container">
        <div class="profile-header">
            <h1 class="profile-title">Личный кабинет</h1>

        </div>

        <div class="dashboard">
            <!-- Sidebar -->
            <aside class="profile-sidebar">
                <div class="user-card">
                    <img src="/img/otziv/zagl1.png" alt="Аватар" class="avatar">
                    <h3 class="user-name" id="fio">Иванов Иван Иванович</h3>
                    <p class="user-email" id="email">ivanov@example.com</p>
                </div>

                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <i class="fas fa-heartbeat"></i>Анкета участника
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-calendar-check"></i> Мои туры
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-calendar-check"></i> Мои экскурсии
                        </a>
                    </li>

                </ul>
            </aside>

            <!-- Main content -->
            <main class="profile-content">
                <div class="content-header">
                    <h2 class="content-title">
                        <i class="fas fa-clipboard-list"></i> Моя анкета
                    </h2>

                </div>


                <!-- <a class="btn btn-primary" href="#openModal" style="display: none;
                    style="display:block; margin:140px 0 140px 0; width:100%; text-align:center;">
                    Заполнить анкету
                </a> -->

                <form action="php/changeDataHealth.php" class="modal__form">
                    Мой рост
                    <input type="text" class="change-form-input" value="test" disabled>
                    Мой вес
                    <input type="text" class="change-form-input" value="test" disabled>
                    Мой стаж занятия Скандинавской ходьбой
                    <input type="text" class="change-form-input" value="test" disabled>
                    Физические нагрузки
                    <input type="text" class="change-form-input" value="test" disabled>
                    Наличие сердечно-сосудистных заболеваний
                    <input type="text" class="change-form-input" value="test" disabled>
                    Давление
                    <input type="text" class="change-form-input" value="test" disabled>
                    Хронические заболевания, Аллергии
                    <input type="text" class="change-form-input" value="test" disabled>
                    Заболевания опорно-двигательного аппарата?
                    <input type="text" class="change-form-input" value="test" disabled>
                    Максимальные расстояния
                    <input type="text" class="change-form-input" value="test" disabled>
                    Переносимость сложных маршрутов с перепадами высоты
                    <input type="text" class="change-form-input" value="test" disabled>
                    Готовность проходить в среднем 15 - 20 км
                    <input type="text" class="change-form-input" value="test" disabled>
                    Переносимость сложных маршрутов
                    <input type="text" class="change-form-input" value="test" disabled>
                    Только равнинные маршруты
                    <input type="text" class="change-form-input" value="test" disabled>
                </form>

            </main>
        </div>
    </div>

    <div onclick="location.href='#'" id="openModal" class="mod">
        <div onclick="event.stopPropagation()" class="modal-d">
            <div class="modal-c">
                <div class="modal-h">
                    <h3 class="modal-title">Заполните анкету путешественника</h3>

                    <a href="#close" title="Close" class="close">×</a>
                </div>
                <div class="modal-b">
                    <form action="/php/tour/sendTour.php?name=Армения" method="POST" class="modal__form">

                        <!-- Фамилия, имя и отчество:
                                    <input type="text" id="fio" name="fio" placeholder="Ваш ответ" required>
                                    Дата рождения:
                                    <input type="text" id="age" name="age" placeholder="Дата рождения 31.12.2000"
                                        required>
                                    Ваш телефон:
                                    <input type="tel" id="tel" name="tel" placeholder="Ваш ответ" required>
                                    Город в котором вы проживаете:
                                    <input type="text" id="city" name="city" placeholder="Ваш ответ" required>
                                    Ваш email:
                                    <input type="email" id="email" name="email" placeholder="Ваш ответ" required> -->
                        Ваш рост:
                        <input type="text" id="rost" name="rost" placeholder="Ваш ответ" required>
                        Ваш вес (на некоторых маршрутах лишиний вес является
                        противопоказанием):
                        <input type="text" id="ves" name="ves" placeholder="Ваш ответ" required>
                        Стаж занятия Скандинавской ходьбой:
                        <input type="text" id="staj" name="staj" placeholder="Ваш ответ" required>
                        Занимаетесь ли Вы активно физическими нагрузками? Какими?
                        <input type="text" id="fizNagr" name="fizNagr" placeholder="Ваш ответ" required>
                        Есть ли сердечно-сосудистные заболевания?
                        <input type="text" id="zabolevania" name="zabolevaniya" placeholder="Ваш ответ" required>
                        Бывает ли повышенное или пониженное давление? Какое именно?
                        <input type="text" id="davlenie" name="davlenie" placeholder="Ваш ответ" required>
                        Хронические заболевания? Аллергия?
                        <input type="text" id="chrono" name="chrono" placeholder="Ваш ответ" required>
                        Заболевания опорно-двигательного аппарата?
                        <input type="text" id="opora" name="opora" placeholder="Ваш ответ" required>
                        На какие расстояния ходите?
                        <input type="text" id="perenosimost" name="perenosimost" placeholder="Ваш ответ" required>
                        Как переносите сложные маршруты со спусками и подъемами?
                        <input type="text" id="level" name="level" placeholder="Ваш ответ" required>
                        Готовы ли проходить в среднем 15 - 20 км?
                        <input type="text" id="prohod" name="prohod" placeholder="Ваш ответ" required>
                        Как переносите нагрузки на горных маршрутах?
                        <input type="text" id="perenosimostGori" name="perenosimostGori" placeholder="Ваш ответ"
                            required>
                        Вам подходят только равнинные маршруты?
                        <input type="text" id="ravn" name="ravn" placeholder="Ваш ответ" required>

                        <!-- <ul class="modal-form-submit">
                                        <li class="modal-form-item">
                                            <p class="modal-form-sumit-text">Подтвердите что вы ознакомились с <a
                                                    class="modal-form-dogovor" href="/files/Договор.pdf"
                                                    download>договором</a>
                                            </p>
                                            <input class="modal-form-checkbox" name="dogovor" type="checkbox" required
                                                oninvalid="this.setCustomValidity('Подтвердите если ознакомились с договором!')"
                                                oninput="setCustomValidity('')">
                                        </li>
                                        <li class="modal-form-item">
                                            <p class="modal-form-sumit-text">Подтвердите что вы ознакомились с <a
                                                    class="modal-form-dogovor" href="/files/Правила.docx"
                                                    download>правилами</a>
                                            </p>
                                            <input class="modal-form-checkbox" name="dogovor" type="checkbox" required
                                                oninvalid="this.setCustomValidity('Подтвердите если ознакомились с правилами!')"
                                                oninput="setCustomValidity('')">
                                        </li>
                                        <li class="modal-form-item">
                                            <p class="modal-form-sumit-text">Подтвердите <a class="modal-form-dogovor"
                                                    href="/files/Cогласие на обработку персональных данных.docx"
                                                    download>согласие на
                                                    обработку персональных данных</a></p>
                                            <input class="modal-form-checkbox" name="dogovor" type="checkbox" required
                                                oninvalid="this.setCustomValidity('Подтвердите если дали согласие!')"
                                                oninput="setCustomValidity('')">
                                        </li>




                                        <input type="submit" id="btn" value="Отправить" class="modal-form-btn">
                                    </ul> -->
                        <!-- <a href="#close" class="btn btn-secondary form-btn close" title="Close">Закрыть</a> -->
                    </form>
                </div>
            </div>
        </div>
    </div>




    <script src="../js/get_info_user.js"></script>
</body>

</html>