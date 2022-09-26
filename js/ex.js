var elements = document.querySelectorAll(".excursions__item");
var elArrow = document.querySelectorAll('.excursions__arrrow');
var elHidden = document.querySelectorAll('.excursions__item-desc-hidden');
for (var i = 0; i < elements.length; i++) {
    console.log(i);
    elements[i].onclick = function () {
        console.log(i);
        this.classList.toggle('long');


    };
}
