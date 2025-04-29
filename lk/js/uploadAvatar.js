document.getElementById('imageInput').addEventListener('change', async function (e) {

    const file = e.target.files[0];
    if (!file) return;


    const formData = new FormData();
    formData.append('image', file); // Ключ 'image' должен совпадать с $_FILES['image'] в PHP

    try {
        const response = await fetch('/lk/php/upload_avatar.php', {
            method: 'POST',
            body: formData,
        });

        const result = await response.json();

        if (result.success) {
            statusElement.textContent = 'Успешно! Файл сохранён как: ' + result.path;
           
        } else {
            throw new Error(result.error || 'Неизвестная ошибка сервера');
        }

    } catch (error) {


    }
    location.reload()
});