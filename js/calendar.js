let linkDaylist = document.querySelectorAll(".calendar__dayLink")

linkDaylist.forEach(e => {

    href = e.getAttribute('href')

    if (href !== "") {

        e.parentNode.classList.add('calendar__day__active')

        e.addEventListener('mouseover', ()=>{
            
        })
    }
    
});

