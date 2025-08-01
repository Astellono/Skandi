<?php
session_start();
require_once 'phpLogin/connect.php';

$tourMass = $connect->query("SELECT * FROM tours");

if ($tourMass->num_rows > 0) {
    // Получение данных
    $tour = $tourMass->fetch_all(MYSQLI_ASSOC);

} else {
    echo "0 results";
}

?>
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


    <!-- <script src="js/tourGen.js?ver=<? echo time(); ?>" type="module" defer></script> -->
    <title>Туры</title>
</head>

<body>
    <header class="header" id="header">
        <?php
        $root = $_SERVER['DOCUMENT_ROOT'];
        $path = $root . '/parts/headerPHP.php';
        include $path;
        ?>
    </header>
    <!-- <section class="tourweek" style="background-color:rgba(236, 229, 238, 0.6) ">
        <div class="container">
            <h2 class="tour__title tour__title-week ">Оздоровительные туры</h2>
            <ul class="tour__list tour__list-week ">
                <li class="tour__item">
                    <div class="tour__img-box">
                        <img class="tour__img" src="img/act-tour/med.jpg" alt="" srcset="">
                    </div>
                    <h3 class="tour__item-title">
                        SCANDI-ТУР в "Гости в царство бурого медведя"
                    </h3>

                    <p class="tour__date">
                        26 июля - 27 июля 2025г
                    </p>
                    <a class="tour__link" href="page_tour/med.html">
                        Подробнее
                        <svg width="30" height="24" viewbox="0 0 28 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M24.3536 6.35355C24.5488 6.15829 24.5488 5.84171 24.3536 5.64645L21.1716 2.46447C20.9763 2.2692 20.6597 2.2692 20.4645 2.46447C20.2692 2.65973 20.2692 2.97631 20.4645 3.17157L23.2929 6L20.4645 8.82843C20.2692 9.02369 20.2692 9.34027 20.4645 9.53553C20.6597 9.7308 20.9763 9.7308 21.1716 9.53553L24.3536 6.35355ZM4 6.5H24V5.5H4V6.5Z"
                                fill="#121723" />
                        </svg>
                    </a>

                </li>

            </ul>
        </div>
    </section> -->
    <section class="tourweek">
        <div class="container">
            <h2 class="tour__title tour__title-week " style="text-align: center; margin:20px auto">Туры выходного дня
            </h2>
            <ul class="tour__list tour__list-week ">
                <li class="tour__item">
                    <div class="tour__img-box">
                        <img class="tour__img" src="img/act-tour/air.jpg" alt="" srcset="">
                    </div>
                    <h3 class="tour__item-title">
                        ТУР ВЫХОДНОГО ДНЯ «ПОСВЯЩЕНИЕ В ВОЗДУХОПЛАВАТЕЛИ» (в Переславле-Залесском)
                    </h3>

                    <p class="tour__date">
                        19 июля - 20 июля 2025г
                    </p>
                    <a class="tour__link" href="page_tour/air.php">
                        Подробнее
                        <svg width="30" height="24" viewbox="0 0 28 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M24.3536 6.35355C24.5488 6.15829 24.5488 5.84171 24.3536 5.64645L21.1716 2.46447C20.9763 2.2692 20.6597 2.2692 20.4645 2.46447C20.2692 2.65973 20.2692 2.97631 20.4645 3.17157L23.2929 6L20.4645 8.82843C20.2692 9.02369 20.2692 9.34027 20.4645 9.53553C20.6597 9.7308 20.9763 9.7308 21.1716 9.53553L24.3536 6.35355ZM4 6.5H24V5.5H4V6.5Z"
                                fill="#121723" />
                        </svg>
                    </a>

                </li>
                <li class="tour__item">
                    <div class="tour__img-box">
                        <img class="tour__img" src="img/act-tour/med.jpg" alt="" srcset="">
                    </div>
                    <h3 class="tour__item-title">
                        SCANDI-ТУР в "Гости в царство бурого медведя"
                    </h3>

                    <p class="tour__date">
                        26 июля - 27 июля 2025г
                    </p>
                    <a class="tour__link" href="page_tour/med.php">
                        Подробнее
                        <svg width="30" height="24" viewbox="0 0 28 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M24.3536 6.35355C24.5488 6.15829 24.5488 5.84171 24.3536 5.64645L21.1716 2.46447C20.9763 2.2692 20.6597 2.2692 20.4645 2.46447C20.2692 2.65973 20.2692 2.97631 20.4645 3.17157L23.2929 6L20.4645 8.82843C20.2692 9.02369 20.2692 9.34027 20.4645 9.53553C20.6597 9.7308 20.9763 9.7308 21.1716 9.53553L24.3536 6.35355ZM4 6.5H24V5.5H4V6.5Z"
                                fill="#121723" />
                        </svg>
                    </a>

                </li>

            </ul>
        </div>
    </section>
    <section class="tour">
        <div class="container">
            <h2 class="tour__title">Путешествия</h2>
            <ul class="tour__list" id="tours">
                <?php
                foreach ($tour as $tourEl) {
                  
                    ?>
                    <li class="tour__item">
                        <div class="tour__img-box">
                            <img class="tour__img" src="<?= $tourEl['tour_imgSrc'] ?>" alt="" srcset="">
                        </div>
                        <h3 class="tour__item-title">
                        <?= $tourEl['tour_name'] ?>
                        </h3>

                        <p class="tour__date">
                            <?= $tourEl['tour_date'] ?>
                        </p>
                        <a class="tour__link" href="<?= $tourEl['tour_linkPage'] . '?idTour=' . $tourEl['tour_id'] ?>">
                            Подробнее
                            <svg width="30" height="24" viewbox="0 0 28 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M24.3536 6.35355C24.5488 6.15829 24.5488 5.84171 24.3536 5.64645L21.1716 2.46447C20.9763 2.2692 20.6597 2.2692 20.4645 2.46447C20.2692 2.65973 20.2692 2.97631 20.4645 3.17157L23.2929 6L20.4645 8.82843C20.2692 9.02369 20.2692 9.34027 20.4645 9.53553C20.6597 9.7308 20.9763 9.7308 21.1716 9.53553L24.3536 6.35355ZM4 6.5H24V5.5H4V6.5Z"
                                    fill="#121723" />
                            </svg>
                        </a>

                    </li>
                    <?php
                }
                ?>

            </ul>
        </div>
    </section>
    <!-- <section class="tour">
        <div class="container">
            <h2 class="tour__title">Ожидаются</h2>
            <ul class="tour__list">



                <li class="tour__item wait">
                    <div class="tour__img-box">
                        <img class="tour__img" src="img/act-tour/wait/nil.jpg" alt="" srcset="">
                    </div>
                    <h3 class="tour__item-title">
                        Круиз по Нилу
                    </h3>

                    <p class="tour__date">
                        Март 2024г
                    </p>

                </li>
                <li class="tour__item wait">
                    <div class="tour__img-box">
                        <img class="tour__img" src="img/act-tour/wait/uzb.jpg" alt="" srcset="">
                    </div>
                    <h3 class="tour__item-title">
                        Узбекистан
                    </h3>

                    <p class="tour__date">
                        Апрель 2024г
                    </p>

                </li>
                <li class="tour__item wait">
                    <div class="tour__img-box">
                        <img class="tour__img" src="img/act-tour/wait/armenia.jpg" alt="" srcset="">
                    </div>
                    <h3 class="tour__item-title">
                        Армения
                    </h3>

                    <p class="tour__date">
                        2 января - 8 января 2024г
                    </p>

                </li>
            </ul>
        </div>
    </section> -->
    <section class="questions" id="questions">
        <script src="parts/questions.js?ver=<? echo time(); ?>"></script>
    </section>
    <section class="contacts" id="contacts">
        <script src="parts/contact.js?ver=<? echo time(); ?>"></script>
    </section>







    <footer class="footer"></footer>
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="modal/bootstrap.bundle.js"></script>
    <script src="modal/Burger.js"></script>
    <script src="modal/modal.js"></script>
    <script src="js/main.js"></script>
    <script>
        $(document).ready(function () {

            if (window.location.href.indexOf('#modal-osetia') != -1) {
                $('#modal-osetia').modal('show');
                console.log('Done')
            }
            if (window.location.href.indexOf('#modal-altay') != -1) {
                $('#modal-altay').modal('show');
                console.log('Done')
            }
            if (window.location.href.indexOf('#modal-golubino') != -1) {
                $('#modal-golubino').modal('show');
                console.log('Done')
            }
            if (window.location.href.indexOf('#modal-arhiz') != -1) {
                $('#modal-arhiz').modal('show');
                console.log('Done')
            }
            if (window.location.href.indexOf('#modal-adigeya') != -1) {
                $('#modal-adigeya').modal('show');
                console.log('Done')
            }
            if (window.location.href.indexOf('#modal-kirgiziya') != -1) {
                $('#modal-kirgiziya').modal('show');
                console.log('Done')
            }
            if (window.location.href.indexOf('#modal-armenia') != -1) {
                $('#modal-armenia').modal('show');
                console.log('Done')
            }

        });
    </script>
</body>

</html>