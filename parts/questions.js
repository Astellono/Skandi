document.getElementById("questions").innerHTML = '\
<div class="container">\
<h2 class="questions__title">Задать вопрос</h2>\
<form action="/php/send.php" method="POST" class="questions__form">\
    <input type="text" name="name" placeholder="Ваше имя" required>\
    <input type="text" name="email" placeholder="email" required>\
    <input required type="text" class="questions__input-text" name="message" placeholder="Ваш вопрос?">\
    <input type="submit" value="Отправить" class="questions__btn">\
</form>\
</div>'