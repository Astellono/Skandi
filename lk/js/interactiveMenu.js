document.addEventListener('DOMContentLoaded', function() {
    // Функция для переключения между блоками
    function switchSection(targetId) {
        // Убираем активный класс у всех пунктов меню
        document.querySelectorAll('.mobile-nav-link, .nav-link').forEach(item => {
            item.classList.remove('activeBlock');
        });
        
        // Добавляем активный класс текущему пункту
        const activeLinks = document.querySelectorAll(`[data-target="${targetId}"], [href="#${targetId}"]`);
        activeLinks.forEach(link => {
            link.classList.add('activeBlock');
            link.style.transition = 'all 0.3s ease 0.1s';
        });
        
        // Скрываем все блоки контента
        document.querySelectorAll('.content-section').forEach(section => {
            section.classList.remove('activeBlock');
            section.style.animation = 'none';
            void section.offsetWidth; // Trigger reflow
        });
        
        // Показываем нужный блок с анимацией
        const activeSection = document.getElementById(targetId);
        if (activeSection) {
            activeSection.classList.add('activeBlock');
            activeSection.style.animation = 'fadeIn 0.4s ease forwards';
            
            // Плавный скролл к началу контента
            setTimeout(() => {
                const contentStart = document.querySelector('.profile-content');
                if (contentStart) {
                    contentStart.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }, 100); // Небольшая задержка для синхронизации с анимацией
        }
        
        // Обновляем URL без перезагрузки
        history.pushState(null, null, `#${targetId}`);
    }

    // Инициализация - показываем первый блок (Анкета)
    const initialSection = window.location.hash ? window.location.hash.substring(1) : 'anceta';
    switchSection(initialSection);

    // Обработка кликов по мобильному меню
    document.querySelectorAll('.mobile-nav-link[data-target]').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('data-target');
            switchSection(targetId);
        });
    });

    // Обработка кликов по основному меню
    document.querySelectorAll('.nav-link[href^="#"]').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            switchSection(targetId);
        });
    });

    // Обработка изменения хэша в URL
    window.addEventListener('hashchange', function() {
        const targetId = window.location.hash.substring(1);
        if(targetId) {
            switchSection(targetId);
        }
    });
});