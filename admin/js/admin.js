// Функция удаления тура
async function deleteTour(tourId, tourName) {
    if (!confirm(`Вы уверены, что хотите удалить тур "${tourName}"?\n\nЭто действие нельзя отменить.`)) {
        return;
    }
    
    try {
        const response = await fetch('/admin/api/delete_tour.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ tour_id: tourId })
        });
        
        const result = await response.json();
        
        if (result.success) {
            let message = 'Тур успешно удален!';
            if (result.deleted_files && result.deleted_files.length > 0) {
                message += '\n\nУдалены файлы:\n' + result.deleted_files.join('\n');
            }
            if (result.errors && result.errors.length > 0) {
                message += '\n\nПредупреждения:\n' + result.errors.join('\n');
            }
            alert(message);
            // Перезагружаем страницу для обновления списка
            window.location.reload();
        } else {
            alert('Ошибка: ' + (result.message || 'Не удалось удалить тур'));
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Произошла ошибка при удалении тура');
    }
}

// Автоматическое заполнение текстового поля даты на основе выбранных дат начала и конца
document.addEventListener('DOMContentLoaded', function() {
    const dateStartInput = document.getElementById('tour_date_start');
    const dateEndInput = document.getElementById('tour_date_end');
    const dateTextInput = document.getElementById('tour_date');
    
    if (dateStartInput && dateEndInput && dateTextInput) {
        function updateDateText() {
            if (dateStartInput.value && dateEndInput.value) {
                const start = new Date(dateStartInput.value);
                const end = new Date(dateEndInput.value);
                
                const months = ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня',
                               'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'];
                
                const startDay = start.getDate();
                const startMonth = months[start.getMonth()];
                const startYear = start.getFullYear();
                
                const endDay = end.getDate();
                const endMonth = months[end.getMonth()];
                const endYear = end.getFullYear();
                
                let dateText = `${startDay} ${startMonth}`;
                if (startMonth !== endMonth || startYear !== endYear) {
                    dateText += ` - ${endDay} ${endMonth}`;
                } else if (startDay !== endDay) {
                    dateText += ` - ${endDay} ${endMonth}`;
                }
                dateText += ` ${endYear}г`;
                
                dateTextInput.value = dateText;
            }
        }
        
        dateStartInput.addEventListener('change', updateDateText);
        dateEndInput.addEventListener('change', updateDateText);
    }
});




