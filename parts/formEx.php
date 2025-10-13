<?php

function formEx()
{
    ?>

<div onclick="location.href='#'" class="mod">
        <div onclick="event.stopPropagation()" class="modal-d">
            <div class="modal-c">
                <div class="modal-h">
                    <h3 class="modal-title">Запись на Сканди-мерориятие</h3>
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
                    <button title="Close" class="close">×</button>
                </div>
                <div class="modal-b">

                    <form action="" method="POST" id="exForm" class="modal__form">

                        Фамилия, имя и отчество:
                        <input required type="text" id="fio" name="fio" placeholder="Ваш ответ">
                        Дата рождения:
                        <input required type="text" id="age" name="age" placeholder="Дата рождения 31.12.2000">
                        Ваш телефон:
                        <input required type="tel" id="tel" name="tel" placeholder="Ваш ответ">
                        Ваш email:
                        <input required type="email" id="email" name="email" placeholder="Ваш ответ">
                        Коментарий, промокод (необязательное поле)
                        <input type="text" name="comment" placeholder="Ваш ответ">



                        <input type="submit" value="Отправить" id="btn" class="modal-form-btn">

                        <a href="#" class="btn btn-secondary form-btn close" title="Close">Закрыть</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php } ?>