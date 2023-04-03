let cssId = 'myCss';  // you could encode the css path itself to generate id..
let cssId2 = 'myCssAdd';
let ver = '505'
if (!document.getElementById(cssId)) {
    var head = document.getElementsByTagName('head')[0];
    var link = document.createElement('link');
    link.id = cssId;
    link.rel = 'stylesheet';
    link.type = 'text/css';
    link.href = '/style/style.css?ver=' + ver;
    link.media = 'all';
    head.appendChild(link);
}
if (!document.getElementById(cssId2)) {
    var head = document.getElementsByTagName('head')[0];
    var link = document.createElement('link');
    link.id = cssId;
    link.rel = 'stylesheet';
    link.type = 'text/css';
    link.href = '/style/style-adaptive.css?ver=' + ver;
    link.media = 'all';
    head.appendChild(link);
}






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