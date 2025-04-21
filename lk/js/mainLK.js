// document.getElementById('smoking').addEventListener('change', function() {
//     document.getElementById('smoking-status').textContent = this.checked ? 'Да' : 'Нет';
// });

// document.getElementById('alcohol').addEventListener('change', function() {
//     document.getElementById('alcohol-status').textContent = this.checked ? 'Да' : 'Нет';
// });

// // Form submission
// document.getElementById('healthSurvey').addEventListener('submit', function(e) {
//     e.preventDefault();
    
//     // Here would be AJAX request to save data
//     alert('Данные о здоровье успешно сохранены!');
    
//     // Update last modified date
//     const now = new Date();
//     const formattedDate = now.toLocaleDateString('ru-RU');
//     document.querySelector('.progress-indicator').innerHTML = `
//         <span class="text-success">
//             <i class="fas fa-check-circle"></i> Последнее обновление: ${formattedDate}
//         </span>
//     `;
// });