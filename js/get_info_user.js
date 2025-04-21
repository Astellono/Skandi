
window.addEventListener('DOMContentLoaded', async () => {
    const res = await fetch('../php/get_user_info.php');
    const data = await res.json();
    console.log('Данные пользователя:', data);
    if (data.success) {
        document.getElementById('fio').textContent = data.name;
        document.getElementById('email').textContent = data.email;

    }

});
