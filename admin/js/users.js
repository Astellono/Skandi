async function deleteUser(userId, userName) {
    if (!confirm(`Удалить пользователя "${userName}"?`)) {
        return;
    }

    try {
        const response = await fetch('/admin/api/delete_user.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ user_id: userId })
        });

        const result = await response.json();

        if (result.success) {
            alert('Пользователь удален');
            window.location.reload();
        } else {
            alert('Ошибка: ' + (result.message || 'Не удалось удалить пользователя'));
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Произошла ошибка при удалении пользователя');
    }
}

