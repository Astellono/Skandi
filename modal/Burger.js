document.querySelector(".header__burger").addEventListener("click", function() {
    document.querySelector(".header__menu").classList.add("header__burger-open");
})

document.querySelector(".header__burger-cross").addEventListener("click", function() {
    document.querySelector(".header__menu").classList.remove("header__burger-open");
})