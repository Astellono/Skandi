 // Получаем элементы DOM
 const loginBtn = document.getElementById('loginBtn');
 const modal = document.getElementById('loginModal');
 const closeBtn = document.querySelector('.close-login');
 const switchToLogin = document.getElementById('switchToLogin');
 const switchToRegister = document.getElementById('switchToRegister');
 const loginForm = document.getElementById('loginForm');
 const registerForm = document.getElementById('registerForm');
 const loginSubmit = document.getElementById('loginSubmit');
 const registerSubmit = document.getElementById('registerSubmit');
 const loginError = document.getElementById('loginError');
 const registerError = document.getElementById('registerError');
console.log(modal);
modal.style.display = 'none';
 // Открываем модальное окно при клике на кнопку
 if(loginBtn) {
    loginBtn.addEventListener('click', function() {
        modal.style.display = 'block';
    });
 }
 

 // Закрываем модальное окно при клике на крестик
 closeBtn.addEventListener('click', function() {
     modal.style.display = 'none';
 });

 // Закрываем модальное окно при клике вне его
 window.addEventListener('click', function(event) {
     if (event.target === modal) {
         modal.style.display = 'none';
     }
 });

 // Переключаемся на форму входа
 switchToLogin.addEventListener('click', function() {
     switchToLogin.classList.add('active-login');
     switchToRegister.classList.remove('active-login');
     loginForm.classList.add('active-login');
     registerForm.classList.remove('active-login');
     loginError.textContent = '';
     registerError.textContent = '';
 });

 // Переключаемся на форму регистрации
 switchToRegister.addEventListener('click', function() {
     switchToRegister.classList.add('active-login');
     switchToLogin.classList.remove('active-login');
     registerForm.classList.add('active-login');
     loginForm.classList.remove('active-login');
     loginError.textContent = '';
     registerError.textContent = '';
 });




// обработка входа
loginSubmit.addEventListener('click', async function () {
    const email = document.getElementById('loginEmail').value;
    const password = document.getElementById('loginPassword').value;

    if (!email || !password) {
        loginError.textContent = 'Пожалуйста, заполните все поля';
        return;
    }

    const response = await fetch('../phpLogin/login.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ email, password })
    });
    const result = await response.json();

    if (result.success) {
        loginError.textContent = '';
        console.log('Привет');
        modal.style.display = 'none';
       
        window.location.href = 'http://localhost/lk/lk.php';
    
    } else {
        loginError.textContent = result.message;
    }
});





 // обработка регистрации
registerSubmit.addEventListener('click', async function () {
    const name = document.getElementById('regName').value;
    const email = document.getElementById('regEmail').value;
    const password = document.getElementById('regPassword').value;
    const confirmPassword = document.getElementById('regConfirmPassword').value;

    if (!name || !email || !password || !confirmPassword) {
        registerError.textContent = 'Пожалуйста, заполните все поля';
        return;
    }
    if (password !== confirmPassword) {
        registerError.textContent = 'Пароли не совпадают';
        return;
    }
    if (password.length < 6) {
        registerError.textContent = 'Пароль должен содержать минимум 6 символов';
        return;
    }

    const response = await fetch('../phpLogin/register.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ name, email, password })
    });
    const result = await response.json();

    if (result.success) {
        registerError.textContent = '';
        alert('Регистрация прошла успешно');
        switchToLogin.click();
    } else {
        registerError.textContent = result.message;
    }
});
