<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Yandex.Metrika counter -->
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
    <link rel="icon" sizes="120x120" href="img/icon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="style/clear.css">
    <link rel="stylesheet" href="style/bootstrap.css">
     <link rel="stylesheet" href="style/style.css?ver=<? echo time(); ?>">
    <link rel="stylesheet" href="style/style-adaptive.css?ver=<? echo time(); ?>">
    <link rel="stylesheet" href="style/shop.css">
    <script defer src="js/scroll.js"></script>
    <title>Меню</title>
</head>

<body>
    <header class="header" id="header">
        <?php
        $root =  $_SERVER['DOCUMENT_ROOT']; 
        $path = $root . '/parts/headerPHP.php';
        include $path;
        ?>
    </header>

    
    <section class="shop">
        <div class="container page-wrapper">
            <h1 class="shop__title">Товары</h1>
            <div class="page-inner">
                <div class="item">
                    <div class="el-wrapper" id="brelok">
                        <div class="box-up">
                            <img class="img" src="img/shop/brelok.png" alt="">
                            <div class="img-info">
                                
                                <div class="info-inner">
                                    <span class="p-name">Брелок-шеврон</span>

                                </div>
                                <div class="a-size">Оригинальный брендированный сувенир, который сделает ваш рюкзак,
                                    сумку или деталь одежды отличной от всех.</div>
                            </div>
                        </div>

                        <div class="box-down">
                            <div class="h-bg">
                                <div class="h-bg-inner"></div>
                            </div>

                            <a class="cart" href="#" data-name="brelok" >
                                <span class="price">400р</span>
                                <span class="add-to-cart">
                                    <span class="txt" onclick="event.stopPropagation()"  >Заказать</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="el-wrapper" id="polotenca">
                        <div class="box-up">
                            <img class="img" src="img/shop/polotenca.jpg" alt="">
                            <div class="img-info">
                                <div class="info-inner">
                                    <span class="p-name">Полотенце</span>

                                </div>
                                <div class="a-size">Полотенце из микрофибры для спорта 70 х 140 см для бассейна,
                                    плавания, фитнеса и кардио тренировок, спортзала, пляжа, бега, йоги, туризма,
                                    походов. Лёгкое и быстросохнущее.</div>
                            </div>
                        </div>

                        <div class="box-down">
                            <div class="h-bg">
                                <div class="h-bg-inner"></div>
                            </div>

                            <a class="cart" href="#" data-name="polotenca">
                                <span class="price">1400р</span>
                                <span class="add-to-cart">
                                    <span class="txt">Заказать</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="el-wrapper" id="sertificat">
                        <div class="box-up">
                            <img class="img" src="img/shop/sertificat.png" alt="">
                            <div class="img-info">
                                <div class="info-inner">
                                    <span class="p-name">Сертификат</span>

                                </div>
                                <div class="a-size">Подарочный сертификат идеальный подарок на все случаи жизни. Вы
                                    можете подарить своим друзьям и близким здоровье и яркие эмоции.
                                    </div>
                            </div>
                        </div>

                        <div class="box-down">
                            <div class="h-bg">
                                <div class="h-bg-inner"></div>
                            </div>

                            <a class="cart" href="#" data-name="sertificat">
                                <span class="price">3000р</span>
                                <span class="add-to-cart">
                                    <span class="txt">Заказать</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="questions" style="margin-top: 30px;" id="questions">
        <script src="parts/questions.js"></script>
    </section>
    <section class="contacts" id="contacts">
        <script src="parts/contact.js"></script>
    </section>







    <footer class="footer"></footer>


    <div onclick="location.href='#'" class="mod">
        <div onclick="event.stopPropagation()" class="modal-d">
            <div class="modal-c">
                <div class="modal-h">
                    <h3 class="modal-title">Заказать</h3>
                    <!-- <button class="modal-form-btn btn-auto" id="btnAuto">Автозаполнение</button> -->
                    <a href="#" title="Close" class="close">×</a>
                </div>
                <div class="modal-b">

                    <form action="" method="POST" id="exForm" class="modal__form">

                        Фамилия, имя и отчество:
                        <input required type="text" id="fio" name="fio" placeholder="Ваш ответ">
                        Ваш телефон:
                        <input required type="tel" id="tel" name="tel" placeholder="Ваш ответ">
                        Ваш email:
                        <input required type="email" id="email" name="email" placeholder="Ваш ответ">
                        



                        <input type="submit" value="Отправить" id="btn" class="modal-form-btn">

                        <a href="#" class="btn btn-secondary form-btn close" title="Close">Закрыть</a>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="js/regEx.js"></script>
    <script defer src="parts/exShop.js"></script>
    <script src="js/ex.js"></script>
    <script src="modal/bootstrap.bundle.js"></script>
    <script src="modal/Burger.js"></script>
    <!-- <script src="modal/modal.js"></script> -->
    <script src="node_modules/jquery/dist/jquery.js"></script>

</body>

</html>