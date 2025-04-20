
window.addEventListener('DOMContentLoaded', async () => {
    const res = await fetch('/php/get_user_info.php');
    const data = await res.json();
    console.log('Данные пользователя:', data);
    if (data.success) {
        document.querySelector('input[name="fio"]').value = data.name;
        document.getElementById('email').value = data.email;

    }

});
