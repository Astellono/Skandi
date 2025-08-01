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

            <h2 class="lesson__title">Групповые занятия</h2>

            <p class="lesson__group-how">Цена занятия: 700р</p>
            <hr>
            <table class="lesson__table table big__table">
                <h2 class="lesson__table-title">Расписание</h2>


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
                <tr>
                    <td class="td__img">
                        <img class="lesson__img" src="img/lesson/luzh.jpg" alt="" srcset="">
                        <p class="lesson__img-text">Лужники</p>
                    </td>
                    <td>-</td>
                    <td>07:00</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td class="td-item"><a class="td-link" href="#mapLuzh"><img width="50px" height="50px"
                                src="img/map.png"></a></td>
                    <td class="td__btn"> <a href="#modal-luzh" class="lesson__btn">Записаться</a></td>

                </tr>
                <tr>
                    <th></th>
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
                <tr>
                    <td class="td__img">
                        <img class="lesson__img" src="img/lesson/king.jpg" alt="" srcset="">
                        <p class="lesson__img-text">Царицыно</p>
                    </td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>19.30</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td class="td-item"><a class="td-link" href="#mapCar"><img width="50px" height="50px"
                                src="img/map.png"></a></td>
                    <td class="td__btn"> <a href="#modal-caricino" class="lesson__btn">Записаться</a></td>

                </tr>
                <tr>
                    <th></th>
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
                <tr>
                    <td class="td__img">
                        <img class="lesson__img" src="img/lesson/ber.jpg" alt="" srcset="">
                        <p class="lesson__img-text">Бирюлевский дендропарк</p>
                    </td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>8.00</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td class="td-item"><a class="td-link" href="#mapBer"><img width="50px" height="50px"
                                src="img/map.png"></a></td>
                    <td class="td__btn"> <a href="#modal-ber" class="lesson__btn">Записаться</a></td>

                </tr>
                <tr>
                    <th></th>
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
                <tr>
                    <td class="td__img">
                        <img class="lesson__img" src="img/lesson/shkul.jpg" alt="" srcset="">
                        <p class="lesson__img-text">Парк Шкулева</p>
                    </td>
                    <td>11:00</td>
                    <td>-</td>
                    <td>-</td>
                    <td>9.00</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td class="td-item"><a class="td-link" href="#mapShkul"><img width="50px" height="50px"
                                src="img/map.png"></a></td>
                    <td class="td__btn"> <a href="#modal-shkul" class="lesson__btn">Записаться</a></td>

                </tr>
                <tr>
                    <th></th>
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
                <tr>
                    <td class="td__img">
                        <img class="lesson__img" src="img/lesson/kuz.jpg" alt="" srcset="">
                        <p class="lesson__img-text">Парк Кузьминки</p>
                    </td>
                    <td>-</td>
                    <td>-</td>
                    <td>9.00</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td class="td-item"><a class="td-link" href="#mapkuz"><img width="50px" height="50px"
                                src="img/map.png"></a></td>
                    <td class="td__btn"> <a href="#modal-Kuz" class="lesson__btn">Записаться</a></td>

                </tr>
            </table>


            <div class="lesson__smart__table">
                <hr>

                <hr>
                <div class="lesson__table-imgBlock">
                    <img class="lesson__img-smart" src="img/lesson/luzh.jpg" alt="" srcset="">
                    <p class="lesson__img-text-smart">Лужники</p>
                </div>
                <table class="lesson__table table smart__table">
                    <tr>
                        <th>ПН</th>
                        <th>ВТ</th>
                        <th>СР</th>
                        <th>ЧТ</th>
                        <th>ПТ</th>
                        <th>СБ</th>
                        <th>ВС</th>
                        <th>Точка сбора</th>
                    </tr>
                    <tr>
                        <td>-</td>
                        <td>7:00</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td class="td-item"><a class="td-link" href="#mapLuzh"><img width="50px" height="50px"
                                    src="img/map.png"></a></td>
                    </tr>
                </table>
                <a href="#modal-luzh" class="lesson__btn">Записаться</a>
                <hr>
                <div class="lesson__table-imgBlock">
                    <img class="lesson__img-smart" src="img/lesson/king.jpg" alt="" srcset="">
                    <p class="lesson__img-text-smart">Царицыно</p>
                </div>
                <table class="lesson__table table smart__table">
                    <tr>
                        <th>ПН</th>
                        <th>ВТ</th>
                        <th>СР</th>
                        <th>ЧТ</th>
                        <th>ПТ</th>
                        <th>СБ</th>
                        <th>ВС</th>
                        <th>Точка сбора</th>
                    </tr>
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>19:30</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td class="td-item"><a class="td-link" href="#mapCar"><img width="50px" height="50px"
                                    src="img/map.png"></a></td>
                    </tr>
                </table>
                <a href="#modal-caricino" class="lesson__btn">Записаться</a>
                <hr>

                <div class="lesson__table-imgBlock">
                    <img class="lesson__img-smart" src="img/lesson/ber.jpg" alt="" srcset="">
                    <p class="lesson__img-text-smart">Бирюлевский дендропарк</p>
                </div>
                <table class="lesson__table table smart__table">
                    <tr>
                        <th>ПН</th>
                        <th>ВТ</th>
                        <th>СР</th>
                        <th>ЧТ</th>
                        <th>ПТ</th>
                        <th>СБ</th>
                        <th>ВС</th>
                        <th>Точка сбора</th>
                    </tr>
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>8:00</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td class="td-item"><a class="td-link" href="#mapBer"><img width="50px" height="50px"
                                    src="img/map.png"></a></td>
                    </tr>
                </table>
                <a href="#modal-ber" class="lesson__btn">Записаться</a>
                <hr>
                <div class="lesson__table-imgBlock">
                    <img class="lesson__img-smart" src="img/lesson/shkul.jpg" alt="" srcset="">
                    <p class="lesson__img-text-smart">Парк Шкулева</p>
                </div>
                <table class="lesson__table table smart__table">
                    <tr>
                        <th>ПН</th>
                        <th>ВТ</th>
                        <th>СР</th>
                        <th>ЧТ</th>
                        <th>ПТ</th>
                        <th>СБ</th>
                        <th>ВС</th>
                        <th>Точка сбора</th>
                    </tr>
                    <tr>
                        <td>11:00</td>
                        <td>-</td>
                        <td>-</td>
                        <td>9:00</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td class="td-item"><a class="td-link" href="#mapShkul"><img width="50px" height="50px"
                                    src="img/map.png"></a></td>
                    </tr>
                </table>
                <a href="#modal-shkul" class="lesson__btn">Записаться</a>
                <hr>
                <div class="lesson__table-imgBlock">
                    <img class="lesson__img-smart" src="img/lesson/kuz.jpg" alt="" srcset="">
                    <p class="lesson__img-text-smart">Парк Кузьминки</p>
                </div>
                <table class="lesson__table table smart__table">
                    <tr>
                        <th>ПН</th>
                        <th>ВТ</th>
                        <th>СР</th>
                        <th>ЧТ</th>
                        <th>ПТ</th>
                        <th>СБ</th>
                        <th>ВС</th>
                        <th>Точка сбора</th>
                    </tr>
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>9:00</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td class="td-item"><a class="td-link" href="#mapkuz"><img width="50px" height="50px"
                                    src="img/map.png"></a></td>
                    </tr>
                </table>
                <a href="#modal-Kuz" class="lesson__btn">Записаться</a>
                <hr>
            </div>
            <div class="lesson__abik">
                <h3 class="lesson__title">Абонементы</h3>
                <ul class="lesson__abik-list">

                    <li class="lesson__abik-item">
                        <div class="lesson__abik-img-box">
                            <img class="lesson__abik-img" src="img/lesson/abon.png" alt="" srcset="">
                        </div>
                        <h3 class="lesson__abik-title-item">4 занятия</h3>
                        <p class="lesson__abik-title-srok">2 месяца</p>
                        <p class="lesson__abik-title-price">2500р</p>

                    </li>
                    <li class="lesson__abik-item">
                        <div class="lesson__abik-img-box">
                            <img class="lesson__abik-img" src="img/lesson/abon.png" alt="" srcset="">
                        </div>
                        <h3 class="lesson__abik-title-item">10 занятий</h3>
                        <p class="lesson__abik-title-srok">6 месяцев</p>
                        <p class="lesson__abik-title-price">6000р</p>

                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section class="solo">
        <div class="container">
            <div class="lesson__solo">
                <div class="lesson__solo-left">
                    <h2 class="lesson__solo-title">
                        Индивидуальные занятия
                    </h2>
                    <div class="lesson__solo-desc">
                        В этом формате у вас есть возможность выбрать подходящее для вас место и время. Оставьте заявку
                        и с вами свяжутся и обговорят все интересующие вас вопросы.
                    </div>
                    <p class="lesson__solo-how">Цена: 3000р</p>
                    <a href="#modal-solo" style="margin-left: 0;" class="lesson__btn">Записаться</a>
                </div>
                <div class="lesson__solo-right">
                    <img class="lesson__solo-right-img" src="img/lesson/solo.png" alt="" srcset="">
                </div>

            </div>
            <hr>
            <div class="lesson__abik">
                <h3 class="lesson__title">Абонементы</h3>
                <ul class="lesson__abik-list">

                    <li class="lesson__abik-item">
                        <div class="lesson__abik-img-box">
                            <img class="lesson__abik-img" src="img/lesson/abon.png" alt="" srcset="">
                        </div>
                        <h3 class="lesson__abik-title-item">3 занятия</h3>
                        <p class="lesson__abik-title-srok">1 месяц</p>
                        <p class="lesson__abik-title-price">7500р</p>

                    </li>

                </ul>
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