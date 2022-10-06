var elements = document.querySelectorAll(".excursions__item");
var elLink = document.querySelectorAll('.excursions__link');
var elHidden = document.querySelectorAll('.excursions__item-desc-hidden');
for (var i = 0; i < elements.length; i++) {
    console.log(i);
    elements[i].onclick = function (event) {
        console.log(i);
        event.stopPropagation()
        this.classList.toggle('long');


    };
}
// for (var i = 0; i < elLink.length; i++) {
//     console.log(i);
//     elLink[i].onclick = function () {
        
        
//     };
// }
// function stopStyle() {
//     console.log();
//     let el = document.querySelectorAll(".excursions__item");
//     console.log(el[index].classList);
   
// }