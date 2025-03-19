
// Анимация при скролле
const sections = [...document.getElementsByTagName('section')];

function checkScroll() {

    sections.forEach(card => {
        console.log(card);
        const cardTop = card.getBoundingClientRect().top;
        if (cardTop < window.innerHeight - 100) {
            card.classList.add('visible');
        }
    });
}
window.addEventListener('scroll', checkScroll);
checkScroll(); // Инициализация при загрузке
