let btn = document.querySelectorAll('.lesson__btn');
let btn_tour = document.querySelectorAll('.tour__page__btn');
let btn_close = document.querySelectorAll('.close');
let btn_map = document.querySelectorAll('.td-link');
console.log(btn);
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