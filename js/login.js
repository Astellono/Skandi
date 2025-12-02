document.addEventListener('DOMContentLoaded', function () {

    var tabLogin = document.getElementById('tabLogin');
    var tabRegister = document.getElementById('tabRegister');
    var loginForm = document.getElementById('loginForm');
    var registerForm = document.getElementById('registerForm');
    var forgotPasswordForm = document.getElementById('forgotPasswordForm');
    var forgotPasswordLink = document.getElementById('forgotPasswordLink');
    var backToLoginBtn = document.getElementById('backToLoginBtn');
    
    // Функция для плавного переключения форм
    function switchForm(showForm, hideForms) {
        // Скрываем все формы с анимацией
        hideForms.forEach(function(form) {
            if (form && form.style.display !== 'none') {
                form.style.opacity = '0';
                form.style.transform = 'translateY(-10px)';
                setTimeout(function() {
                    form.style.display = 'none';
                }, 200);
            }
        });
        
        // Показываем нужную форму с анимацией
        if (showForm) {
            showForm.style.display = '';
            setTimeout(function() {
                showForm.style.opacity = '0';
                showForm.style.transform = 'translateY(10px)';
                requestAnimationFrame(function() {
                    showForm.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
                    showForm.style.opacity = '1';
                    showForm.style.transform = 'translateY(0)';
                });
            }, 50);
        }
    }

    // Инициализация стилей для анимаций
    if (loginForm) {
        loginForm.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
    }
    if (registerForm) {
        registerForm.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
    }
    if (forgotPasswordForm) {
        forgotPasswordForm.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
    }

    // Переключение между вкладками
    if (tabLogin && tabRegister) {
        tabLogin.addEventListener('click', function () {
            if (!tabLogin.classList.contains('active')) {
                tabLogin.classList.add('active');
                tabRegister.classList.remove('active');
                switchForm(loginForm, [registerForm, forgotPasswordForm]);
            }
        });
        
        tabRegister.addEventListener('click', function () {
            if (!tabRegister.classList.contains('active')) {
                tabRegister.classList.add('active');
                tabLogin.classList.remove('active');
                switchForm(registerForm, [loginForm, forgotPasswordForm]);
            }
        });
    }

    // Обработка ссылки "Забыли пароль?"
    if (forgotPasswordLink && forgotPasswordForm) {
        forgotPasswordLink.addEventListener('click', function(e) {
            e.preventDefault();
            switchForm(forgotPasswordForm, [loginForm, registerForm]);
            if (tabLogin) tabLogin.classList.remove('active');
            if (tabRegister) tabRegister.classList.remove('active');
        });
    }

    // Обработка кнопки "Назад" в форме восстановления пароля
    if (backToLoginBtn && loginForm) {
        backToLoginBtn.addEventListener('click', function() {
            switchForm(loginForm, [forgotPasswordForm, registerForm]);
            if (tabLogin) tabLogin.classList.add('active');
            if (tabRegister) tabRegister.classList.remove('active');
        });
    }

    // Валидация форм
    var forms = [loginForm, registerForm, forgotPasswordForm];
    forms.forEach(function(form) {
        if (form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                    
                    // Показываем ошибки для невалидных полей
                    var inputs = form.querySelectorAll('.auth-form-input:invalid');
                    inputs.forEach(function(input) {
                        input.style.borderColor = '#dc3545';
                    });
                } else {
                    // Убираем ошибки при валидной форме
                    var allInputs = form.querySelectorAll('.auth-form-input');
                    allInputs.forEach(function(input) {
                        input.style.borderColor = '';
                    });
                }
                form.classList.add('was-validated');
            });

            // Сброс стилей при вводе
            var inputs = form.querySelectorAll('.auth-form-input');
            inputs.forEach(function(input) {
                input.addEventListener('input', function() {
                    if (this.checkValidity()) {
                        this.style.borderColor = '';
                    }
                });
            });
        }
    });

    // Обработка ошибок от сервера
    var loginError = document.getElementById('loginError');
    var registerError = document.getElementById('registerError');
    
    function showError(errorElement, message) {
        if (errorElement) {
            errorElement.textContent = message;
            errorElement.style.display = 'block';
            setTimeout(function() {
                errorElement.style.opacity = '1';
            }, 10);
        }
    }
    
    function hideError(errorElement) {
        if (errorElement) {
            errorElement.style.opacity = '0';
            setTimeout(function() {
                errorElement.style.display = 'none';
            }, 300);
        }
    }

    // Скрытие ошибок при изменении полей
    if (loginForm) {
        loginForm.querySelectorAll('.auth-form-input').forEach(function(input) {
            input.addEventListener('input', function() {
                hideError(loginError);
            });
        });
    }
    
    if (registerForm) {
        registerForm.querySelectorAll('.auth-form-input').forEach(function(input) {
            input.addEventListener('input', function() {
                hideError(registerError);
            });
        });
    }

    // Фокус на первом поле при открытии модального окна
    var authModal = document.getElementById('authModal');
    if (authModal) {
        authModal.addEventListener('shown.bs.modal', function () {
            var firstInput = loginForm.querySelector('.auth-form-input');
            if (firstInput) {
                setTimeout(function() {
                    firstInput.focus();
                }, 150);
            }
        });
        
        authModal.addEventListener('hidden.bs.modal', function () {
            // Сбрасываем формы при закрытии
            if (loginForm) {
                loginForm.reset();
                loginForm.classList.remove('was-validated');
                hideError(loginError);
            }
            if (registerForm) {
                registerForm.reset();
                registerForm.classList.remove('was-validated');
                hideError(registerError);
            }
            if (forgotPasswordForm) {
                forgotPasswordForm.reset();
                forgotPasswordForm.classList.remove('was-validated');
            }
            
            // Возвращаемся к форме входа
            if (tabLogin && loginForm) {
                tabLogin.classList.add('active');
                tabRegister.classList.remove('active');
                loginForm.style.display = '';
                registerForm.style.display = 'none';
                if (forgotPasswordForm) forgotPasswordForm.style.display = 'none';
            }
        });
    }
});


