document.addEventListener('DOMContentLoaded', function () {

    var tabLogin = document.getElementById('tabLogin');
    var tabRegister = document.getElementById('tabRegister');
    var loginForm = document.getElementById('loginForm');
    var registerForm = document.getElementById('registerForm');
    var forgotPasswordForm = document.getElementById('forgotPasswordForm');
    var forgotPasswordLink = document.getElementById('forgotPasswordLink');
    var backToLoginBtn = document.getElementById('backToLoginBtn');
   

    // if (loginBtn) {
    //     loginBtn.addEventListener('click', function () {
    //         var modalEl = document.getElementById('authModal');
    //         if (!modalEl) return;
    //         // var modal = new bootstrap.Modal(modalEl);
    //         // modal.show();
    //     });
    // }

    if (tabLogin && tabRegister) {
        tabLogin.addEventListener('click', function () {
            tabLogin.classList.add('active');
            tabRegister.classList.remove('active');
            loginForm.style.display = '';
            registerForm.style.display = 'none';
            if (forgotPasswordForm) forgotPasswordForm.style.display = 'none';
        });
        tabRegister.addEventListener('click', function () {
            tabRegister.classList.add('active');
            tabLogin.classList.remove('active');
            registerForm.style.display = '';
            loginForm.style.display = 'none';
            if (forgotPasswordForm) forgotPasswordForm.style.display = 'none';
        });
    }

    // Обработка ссылки "Забыли пароль?"
    if (forgotPasswordLink && forgotPasswordForm) {
        forgotPasswordLink.addEventListener('click', function(e) {
            e.preventDefault();
            loginForm.style.display = 'none';
            registerForm.style.display = 'none';
            forgotPasswordForm.style.display = '';
            if (tabLogin) tabLogin.classList.remove('active');
            if (tabRegister) tabRegister.classList.remove('active');
        });
    }

    // Обработка кнопки "Назад" в форме восстановления пароля
    if (backToLoginBtn && loginForm) {
        backToLoginBtn.addEventListener('click', function() {
            forgotPasswordForm.style.display = 'none';
            loginForm.style.display = '';
            if (tabLogin) tabLogin.classList.add('active');
            if (tabRegister) tabRegister.classList.remove('active');
        });
    }


   
});


