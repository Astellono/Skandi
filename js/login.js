document.addEventListener('DOMContentLoaded', function () {

    var tabLogin = document.getElementById('tabLogin');
    var tabRegister = document.getElementById('tabRegister');
    var loginForm = document.getElementById('loginForm');
    var registerForm = document.getElementById('registerForm');
   

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
        });
        tabRegister.addEventListener('click', function () {
            tabRegister.classList.add('active');
            tabLogin.classList.remove('active');
            registerForm.style.display = '';
            loginForm.style.display = 'none';
        });
    }

   
});


