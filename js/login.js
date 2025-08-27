document.addEventListener('DOMContentLoaded', function () {
    var loginBtn = document.getElementById('loginBtn');
    var tabLogin = document.getElementById('tabLogin');
    var tabRegister = document.getElementById('tabRegister');
    var loginForm = document.getElementById('loginForm');
    var registerForm = document.getElementById('registerForm');
    var loginError = document.getElementById('loginError');
    var registerError = document.getElementById('registerError');

    if (loginBtn) {
        loginBtn.addEventListener('click', function () {
            var modalEl = document.getElementById('authModal');
            if (!modalEl) return;
            var modal = new bootstrap.Modal(modalEl);
            modal.show();
        });
    }

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

    if (loginForm) {
        loginForm.addEventListener('submit', async function (e) {
            e.preventDefault();
            loginError.style.display = 'none';
            var formData = new FormData(loginForm);
            try {
                var resp = await fetch('/php/login.php', { method: 'POST', body: formData });
                var data = await resp.json();
                if (data.success) {
                    window.location.reload();
                } else {
                    loginError.textContent = data.message || 'Ошибка входа';
                    loginError.style.display = '';
                }
            } catch (err) {
                loginError.textContent = 'Сервер недоступен';
                loginError.style.display = '';
            }
        });
    }

    if (registerForm) {
        registerForm.addEventListener('submit', async function (e) {
            e.preventDefault();
            registerError.style.display = 'none';
            var formData = new FormData(registerForm);
            try {
                var resp = await fetch('/php/register.php', { method: 'POST', body: formData });
                var data = await resp.json();
                if (data.success) {
                    window.location.reload();
                } else {
                    registerError.textContent = data.message || 'Ошибка регистрации';
                    registerError.style.display = '';
                }
            } catch (err) {
                registerError.textContent = 'Сервер недоступен';
                registerError.style.display = '';
            }
        });
    }
});


