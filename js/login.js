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
 
 
 // Открываем модальное окно при клике на кнопку
 loginBtn.addEventListener('click', function() {
     modal.style.display = 'block';
 });

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

//  // Обработка отправки формы входа
//  loginSubmit.addEventListener('click', function() {
//      const email = document.getElementById('loginEmail').value;
//      const password = document.getElementById('loginPassword').value;
     
//      // Простая валидация
//      if (!email || !password) {
//          loginError.textContent = 'Пожалуйста, заполните все поля';
//          return;
//      }
     
//      // Здесь должна быть логика аутентификации
//      console.log('Вход с:', email, password);
     
//      // В реальном приложении здесь был бы AJAX-запрос к серверу
//      // После успешного входа можно закрыть модальное окно
//      // modal.style.display = 'none';
     
//      // Для примера просто показываем сообщение
//      loginError.textContent = '';
//      alert('Вход выполнен! (это демо)');
//  });


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
       
        modal.style.display = 'none';
       
        window.location.href = 'http://localhost/lk/lk.php';
    
    } else {
        loginError.textContent = result.message;
    }
});


//  // Обработка отправки формы регистрации
//  registerSubmit.addEventListener('click', function() {
//      const name = document.getElementById('regName').value;
//      const email = document.getElementById('regEmail').value;
//      const password = document.getElementById('regPassword').value;
//      const confirmPassword = document.getElementById('regConfirmPassword').value;
     
//      // Простая валидация
//      if (!name || !email || !password || !confirmPassword) {
//          registerError.textContent = 'Пожалуйста, заполните все поля';
//          return;
//      }
     
//      if (password !== confirmPassword) {
//          registerError.textContent = 'Пароли не совпадают';
//          return;
//      }
     
//      if (password.length < 6) {
//          registerError.textContent = 'Пароль должен содержать минимум 6 символов';
//          return;
//      }
     
//      // Здесь должна быть логика регистрации
//      console.log('Регистрация:', name, email, password);
     
//      // В реальном приложении здесь был бы AJAX-запрос к серверу
//      // После успешной регистрации можно переключиться на форму входа
//      // switchToLogin.click();
     
//      // Для примера просто показываем сообщение
//      registerError.textContent = '';
//      alert('Регистрация успешна! (это демо)');
//  });


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
