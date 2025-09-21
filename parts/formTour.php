<?php

function formTour($name)
{
    ?>

    <div onclick="location.href='#'" id="openModal" class="mod">
        <div onclick="event.stopPropagation()" class="modal-d">
            <div class="modal-c">
                <div class="modal-h">
                    <h3 class="modal-title">Заполните анкету путешественника</h3>
                    <?php if (isset($_SESSION["user_id"])) {
                        ?>
                        <button class="modal-form-btn btn-auto" id="btnAuto">Автозаполнение</button>
                        <?php
                    } else {
                        ?>
                        <!-- <a class="modal-form-btn btn-auto" id="btnAuto" style="text-align: center; cursor: pointer;">Авторизируйтесь</a> -->
                        <button class="modal-form-btn btn-auto" id="loginBtn" data-bs-toggle="modal" data-bs-target="#authModal">Войти
                            в
                            аккаунт</button>
                        <?php
                    }
                    ?>

                    <a href="#" class="close">×</a>
                </div>
                <div class="modal-b">
                    <form action="/php/tour/sendTour.php?name=<?= $name ?>" method="POST" class="modal__form">

                        Фамилия, имя и отчество:
                        <input type="text" id="fio" name="fio" value="" required>

                        Дата рождения:
                        <input type="text" id="age" name="age" placeholder="Дата рождения 31.12.2000" required>
                        Ваш телефон:
                        <input type="tel" id="tel" name="tel" placeholder="Ваш ответ" required>
                        Город в котором вы проживаете:
                        <input type="text" id="city" name="city" placeholder="Ваш ответ" required>
                        Ваш email:
                        <input type="email" name="email" placeholder="Email" id="email">
                        Ваш рост:
                        <input type="text" id="rost" name="rost" placeholder="Ваш ответ" required>
                        Ваш вес:
                        <input type="text" id="ves" name="ves" placeholder="Ваш ответ" required>
                        Стаж занятия Скандинавской ходьбой:
                        <input type="text" id="staj" name="staj" placeholder="Ваш ответ" required>
                        Занимаетесь ли Вы активно физическими нагрузками? Какими?
                        <input type="text" id="fizNagr" name="fizNagr" placeholder="Ваш ответ" required>
                        Есть ли сердечно-сосудистые заболевания?
                        <input type="text" id="zabolevaniya" name="zabolevaniya" placeholder="Ваш ответ" required>
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
                        <input type="text" id="perenosimostGori" name="perenosimostGori" placeholder="Ваш ответ" required>
                        Вам подходят только равнинные маршруты?
                        <input type="text" id="ravn" name="ravn" placeholder="Ваш ответ" required>
                        Коментарий, промокод (необязательное поле)
                        <input type="text" id="comment" name="comment" placeholder="Ваш ответ">
                        <ul class="modal-form-submit">
                            <li class="modal-form-item">
                                <p class="modal-form-sumit-text">Подтвердите что вы ознакомились с <a
                                        class="modal-form-dogovor" href="/files/Договор.pdf" download>договором</a>
                                </p>
                                <input class="modal-form-checkbox" name="dogovor" type="checkbox" required
                                    oninvalid="this.setCustomValidity('Подтвердите если ознакомились с договором!')"
                                    oninput="setCustomValidity('')">
                            </li>
                            <li class="modal-form-item">
                                <p class="modal-form-sumit-text">Подтвердите что вы ознакомились с <a
                                        class="modal-form-dogovor" href="/files/Правила.docx" download>правилами</a>
                                </p>
                                <input class="modal-form-checkbox" name="dogovor" type="checkbox" required
                                    oninvalid="this.setCustomValidity('Подтвердите если ознакомились с правилами!')"
                                    oninput="setCustomValidity('')">
                            </li>
                            <li class="modal-form-item">
                                <p class="modal-form-sumit-text">Подтвердите <a class="modal-form-dogovor"
                                        href="/files/Cогласие на обработку персональных данных.docx" download>согласие
                                        на обработку персональных данных</a></p>
                                <input class="modal-form-checkbox" name="dogovor" type="checkbox" required
                                    oninvalid="this.setCustomValidity('Подтвердите если дали согласие!')"
                                    oninput="setCustomValidity('')">
                            </li>

                            <input type="submit" id="btn" value="Отправить" class="modal-form-btn">
                        </ul>
                        <a href="#close" class="btn btn-secondary form-btn close" title="Close">Закрыть</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php } ?>