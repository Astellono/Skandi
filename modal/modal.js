// let btn = document.querySelectorAll('.lesson__btn');
let btn_tour = document.querySelectorAll('.tour__page__btn');
let btn_close = document.querySelectorAll('.close');
let btn_map = document.querySelectorAll('.td-link');

for (var i = 0; i < btn.length; i++) {    
    btn[i].onclick = function () {
        document.body.style.overflow = 'hidden';
    };
}

for (var i = 0; i < btn_close.length; i++) {  
    btn_close[i].onclick = function () {
        document.body.style.overflow = 'visible';
    };
}



for (var i = 0; i < btn_tour.length; i++) {  
    btn_tour[i].onclick = function () {
        document.body.style.overflow = 'hidden';
    };
}
for (var i = 0; i < btn_map.length; i++) {  
    btn_map[i].onclick = function () {
        document.body.style.overflow = 'hidden';
    };
}

let heightBox = document.querySelector('.tour__page__infoBlock').clientHeight
let heightIMG = document.querySelector('.tour__page__imgBox')
let str = String(heightBox)
console.log(String(heightBox));
heightIMG.style.height = String(heightBox) +'px' 
console.log(heightIMG.clientHeight);