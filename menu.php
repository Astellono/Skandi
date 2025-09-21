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
    <script defer src="js/scroll.js"></script>
    <title>Меню</title>
</head>

<body>
    <header class="header" id="header">

        <?php include 'parts/headerPHP.php'; ?>

    </header>


    <section class="menu">
        <div class="container">
            <h1 class="menu__title">Сканди-активности</h1>
            <hr>
            <ul class="menu__list">
                <li class="menu__item menu__tour">
                    <a href="tour.php" class="menu__link">ТУРЫ</a>
                </li>
                <li class="menu__item menu__ex">
                    <a href="excursions.php" class="menu__link">СКАНДИ-МЕРОПРИЯТИЯ</a>
                </li>
                <li class="menu__item menu__lesson">
                    <a href="lesson.php" class="menu__link">ТРЕНИРОВКИ</a>
                </li>
                <li class="menu__item menu__foto">
                    <a href="fotoclub.php" class="menu__link">ФОТОКЛУБ</a>
                </li>
            </ul>
            <div class="hell"></div>
        </div>


    </section>
    <section class="questions" id="questions">
        <script src="parts/questions.js?ver=<?echo time();?>"></script>
    </section>
    <section class="contacts" id="contacts">
        <script src="parts/contact.js?ver=<?echo time();?>"></script>
    </section>







    <footer class="footer"></footer>

    <!-- Bootstrap JavaScript для работы модального окна -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>