document.getElementById('avatarInput').addEventListener('change', function(e) {
    let file = e.target.files[0];
    console.log("Выбран файл:", file);

    let formData = new FormData();
    formData.append('avatar', file);

    fetch('/lk/php/upload_avatar.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        console.log("Ответ получен, статус:", response.status);
        return response.json();
    })
    .then(data => {
        console.log("Данные ответа:", data);
        if (data.success) {
            document.getElementById('avatarImage').src = data.avatarPath + '?t=' + Date.now();
        } else {
            alert('Ошибка: ' + (data.error || 'Неизвестная ошибка'));
        }
    })
    .catch(error => {
        console.error('Ошибка:', error);
        alert('Произошла сетевая ошибка');
    });
});