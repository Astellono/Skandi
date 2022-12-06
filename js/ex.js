let elements = document.querySelectorAll(".excursions__item");
let podr = document.querySelectorAll(".exursions__podr");
let h1 = document.querySelector('.excursions__title')
function render() {


    elements.forEach(element => {

        if (window.location.hash === '#' + element.id) {
            element.style.marginTop = '80px'
            element.classList.add('long');
            createBtnBack(element)
        } else {
            element.style.display = 'none'
            h1.style.display = 'none'
        }

        if (window.location.hash === '') {
            element.classList.remove('long');
            element.style.display = 'flex'
            h1.style.display = 'block'
            element.style.marginTop = '0px'
            let btnMass = document.querySelectorAll('.btn-back')
            btnMass.forEach((e) => {
                e.remove()
            })
        }

        element.onclick = function () {
            let flag = 0;

            element.classList.add('long');
            window.location.hash = element.id

            if (window.location.hash != '#' + element.id) {
                window.location.hash = element.id;

            }

            elements.forEach(element => {
                if ('#' + element.id != window.location.hash) {
                    element.style.display = 'none'
                    h1.style.display = 'none'

                } else {
                    element.style.display = 'flex'
                    element.style.marginTop = '80px'
                }
            })
            console.log(flag);

            createBtnBack(element)
            flag = 1



        };



    })
}
render()
// elements.forEach(element => {
//     console.log(element.id)
window.onhashchange = function () {
    render()
}

// });
function createBtnBack(el) {
    let btnBack = document.createElement('img')
    btnBack.setAttribute('src', 'img/arrow.svg')
    btnBack.classList.add('btn-back')
    btnBack.addEventListener('click', (e) => {
        e.stopPropagation()
        window.location.hash = ''
        btnBack.remove()
        render()
    })
    el.append(btnBack)

}





let btnExLink = document.querySelectorAll('.excursions__link')
btnExLink.forEach(element => {
    checkDate(element)
});


function checkDate(btn) {
    let dateStart = btn.dataset.date
    let dateStartDay = Number(dateStart.slice(0, 2))
    let dateStartMounth = Number(dateStart.slice(3, 5))
    let dateStartYear = Number(20 + dateStart.slice(6, 10))
    let currentDate = new Date()
    let dd = currentDate.getDate()
    let mm = currentDate.getMonth() + 1
    let yyyy = currentDate.getFullYear()
    if (((dd + 1) === dateStartDay) && dateStartMounth === mm && dateStartYear === yyyy) {
        btn.classList.add('dis')
        btn.innerHTML = "Истек срок подачи заявки. <P>Вопросы на номер: +79162027390 (Watsapp)"
    }
}

