(function() {
    function initFooter() {
        var footer = document.querySelector('.footer');
        if (footer) {
            footer.innerHTML = '\
            <div class="container">\
                <div class="footer__content">\
                    <div class="footer__links">\
                        <a href="/privacy.php" class="footer__link" style="color: #fff !important;">Политика конфиденциальности</a>\
                    </div>\
                    <div class="footer__copyright">\
                        <p style="color: #fff !important; margin: 0;">&copy; ' + new Date().getFullYear() + ' Сканди-путешествия. Все права защищены.</p>\
                    </div>\
                </div>\
            </div>';
        }
    }
    
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initFooter);
    } else {
        initFooter();
    }
})();

