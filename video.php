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
        content="Scandi-путешествия и экскурсии по Москве, Московской области, России и странам СНГ, зарубеж!">
    <link rel="icon" sizes="120x120" href="img/icon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="style/clear.css">
    <link rel="stylesheet" href="style/bootstrap.css">
    <script defer src="js/scroll.js"></script>
    <link rel="stylesheet" href="style/style.css?ver=<? echo time(); ?>">
    <link rel="stylesheet" href="style/style-adaptive.css?ver=<? echo time(); ?>">



    <style>
        .lim {
            list-style-type: disc;
            margin-left: 20px;
            color: #60326B;
            margin-top: 10px;
        }
    </style>
    <title>Медиа</title>
    <script>window.yaContextCb = window.yaContextCb || []</script>
    <script src="https://yandex.ru/ads/system/context.js" async></script>
</head>

<body>
    <header class="header" id="header">

        <?php include 'parts/headerPHP.php'; ?>

    </header>



    <h1 class="video__title">Видеогалерея</h1>


    <section class="video">
        <div class="container">

            <div class="video__main">
                <ul class="video__list" id="videoList">


                </ul>
                <div class="video__display" id="display">

                </div>
            </div>

        </div>
    </section>
    <script>window.yaContextCb.push(() => {
            Ya.Context.AdvManager.render({
                "blockId": "R-A-2540972-1",
                "type": "floorAd"
            })
        })
    </script>

    <section class="questions" id="questions">
        <script src="parts/questions.js"></script>
    </section>

    <section class="contacts" id="contacts">
        <script src="parts/contact.js"></script>
    </section>

    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script>
        $(function () {
            $('.minimized').click(function (event) {
                var i_path = $(this).attr('src');
                $('body').append('<div id="overlay"></div><div id="magnify"><img src="' + i_path + '"><div id="close-popup"><i></i></div></div>');
                $('#magnify').css({
                    left: ($(document).width() - $('#magnify').outerWidth()) / 2,
                    // top: ($(document).height() - $('#magnify').outerHeight())/2 upd: 24.10.2016
                    top: ($(window).height() - $('#magnify').outerHeight()) / 2
                });
                $('#overlay, #magnify').fadeIn('fast');
            });

            $('body').on('click', '#close-popup, #overlay', function (event) {
                event.preventDefault();
                $('#overlay, #magnify').fadeOut('fast', function () {
                    $('#close-popup, #magnify, #overlay').remove();
                });
            });
        });
    </script>

    <footer class="footer"></footer>
    <script src="parts/footer.js?ver=<? echo time(); ?>"></script>

    <script src="js/video.js" defer></script>
    <script src="modal/bootstrap.bundle.js"></script>



</body>

</html>