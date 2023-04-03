






document.querySelector(".header__burger").addEventListener("click", function () {
    document.querySelector(".header__menu").classList.add("header__burger-open");
})

document.querySelector(".header__burger-cross").addEventListener("click", function () {
    document.querySelector(".header__menu").classList.remove("header__burger-open");
})

if (document.location.href.indexOf('showModal') != -1) {
    $("#modal-kirgiziya").modal('show');
}

let div = document.getElementById('openModal')
div.addEventListener('click', () => {
    document.body.style.overflowY = 'visible'
})


let btn = document.querySelector('.tour__page__btn')

btn.addEventListener('click', () => {
    document.body.style.overflowY = 'hidden'
})

if (location.hash === '#openModal') {
    document.body.style.overflowY = 'hidden'
}
console.log(location.hash);
if (location.hash === '#') {
    console.log('hello');
    history.pushState('', document.title, window.location.pathname);
}