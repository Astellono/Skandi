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
        d=1
        console.log(d*24*60*60);
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







