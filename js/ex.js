var elements = document.querySelectorAll(".excursions__item");
var elLink = document.querySelectorAll('.excursions__link');
var elHidden = document.querySelectorAll('.excursions__item-desc-hidden');
for (var i = 0; i < elements.length; i++) {
    
    elements[i].onclick = function (event) {


        this.classList.toggle('long');


    };
}

