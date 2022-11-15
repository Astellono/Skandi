let elements = document.querySelectorAll(".excursions__item");
let podr = document.querySelectorAll(".exursions__podr");
elements.forEach(element => {
    element.onclick = function (event) {
        element.classList.toggle('long');
        // window.location.hash='example';
    };
    
});
    

    








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