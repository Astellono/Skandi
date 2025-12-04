(async () => {
try {
    const mod = await import(`tourList.js?ver=${Date.now()}`);
    // Ждем загрузки данных из БД
    await mod.tourListPromise;
    const tourList = mod.tourList || [];

function mounthNumberToString(name) {
    let mounthName = '';
    switch (name) {
        case '1':
            mounthName = 'января'
            break;
        case '2':
            mounthName = 'февраля'
            break;
        case '3':
            mounthName = 'марта'
            break;
        case '4':
            mounthName = 'апреля'
            break;
        case '5':
            mounthName = 'мая'
            break;
        case '6':
            mounthName = 'июня'
            break;
        case '7':
            mounthName = 'июля'
            break;
        case '8':
            mounthName = 'августа'
            break;
        case '9':
            mounthName = 'сентября'
            break;
        case '10':
            mounthName = 'октября'
            break;
        case '11':
            mounthName = 'ноября'
            break;
        case '12':
            mounthName = 'декабря'
            break;
        default:
            break;
    }
    return mounthName
}

let toursBox = document.getElementById('tours')



tourList.forEach((e, index) => {
    
    if (index<3) {

        console.log(index);
        let tourItem = document.createElement('div')
        let cotantBox = document.createElement('div')
        let tourImg = document.createElement('img')
        let tourTitle = document.createElement('h3')
        let tourDate = document.createElement('p')
        let tourLink = document.createElement('a')
        // Добавить элемент
        tourItem.classList.add('carousel-item')
        if (index===0) {
            tourItem.classList.add('active')
        }
        toursBox.append(tourItem)
    
        // Картинка
       
        tourImg.classList.add('d-block' , 'w-100' )
        
        tourImg.setAttribute('src', e.srcImg)
        tourItem.append(tourImg)
    
        //Контейнер 
        cotantBox.classList.add('carousel-caption', 'd-none' , 'd-md-block')
        tourItem.append(cotantBox)
        // Заголовок
        // tourTitle.classList.add('tour__item-title')
        tourTitle.textContent = e.nameT
        cotantBox.append(tourTitle)
    
        // Дата
    
        // Начало тура
        let date = e.date[0].split('.', 2)
        let [day, mounth] = date
        let mounthName = mounthNumberToString(mounth)
        let startTour = day + ' ' + mounthName
    
    
        //Конец тура
        let dateEnd = e.date[e.date.length - 1].split('.', 2)
        let [dayEnd, mounthEnd] = dateEnd
        let mounthNameEnd = mounthNumberToString(mounthEnd)
        let endTour = dayEnd + ' ' + mounthNameEnd
    
    
        let dateTour = startTour + ' - ' + endTour + " 2025г"
    
    
        // tourDate.classList.add('tour__date')
        tourDate.textContent = dateTour
        cotantBox.append(tourDate)
    
        // Ссылка
        tourLink.setAttribute('href', e.link)
        tourLink.classList.add('actual-tour__link')
        tourLink.textContent = 'Подробнее'
        cotantBox.append(tourLink)
    }
   
});

} catch (e) {
    console.error('Failed to load tourList', e);
}
})();