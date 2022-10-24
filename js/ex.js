var elements = document.querySelectorAll(".excursions__item");

for (var i = 0; i < elements.length; i++) {

    elements[i].onclick = function (event) {


        this.classList.toggle('long');


    };
}

var elements = document.querySelectorAll('.excursions__item');

for (var i = 0; i < elements.length; i++) {

    elements[i].addEventListener('click', function () {

        

    });
}

// function toggleDisplay() {

//     if (this.parentNode.classList.contains('current-item')) {

//         var currentlyDisplayed = document.querySelectorAll('.current-item');

//         for (var e=0; e<currentlyDisplayed.length; e++) {

//             currentlyDisplayed[e].classList.remove('current-item');
//         }

//     } else {

//         this.closest('.item').classList.add('current-item');
//     }
// }