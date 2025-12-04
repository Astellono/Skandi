(async () => {
try {
    const mod = await import(`./tourList.js?ver=${Date.now()}`);
    // Ждем загрузки данных из БД
    await mod.tourListPromise;
    const tourList = mod.tourList || [];

function mounthNumberToString(name) {
    let mounthName = '';
    switch (name) {
        case '01':
            mounthName = 'января'
            break;
        case '02':
            mounthName = 'февраля'
            break;
        case '03':
            mounthName = 'марта'
            break;
        case '04':
            mounthName = 'апреля'
            break;
        case '05':
            mounthName = 'мая'
            break;
        case '06':
            mounthName = 'июня'
            break;
        case '07':
            mounthName = 'июля'
            break;
        case '08':
            mounthName = 'августа'
            break;
        case '09':
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


tourList.forEach(e => {
    let tourItem = document.createElement('li')
    let tourImgBox = document.createElement('div')
    let tourImg = document.createElement('img')
    let tourTitle = document.createElement('h3')
    let tourDate = document.createElement('p')
    let tourLink = document.createElement('a')
    // Добавить элемент
    tourItem.classList.add('tour__item')
    toursBox.append(tourItem)

    // Картинка
    tourImgBox.classList.add('tour__img-box')
    tourItem.append(tourImgBox)
    tourImg.classList.add('tour__img')
    tourImg.setAttribute('src', e.srcImg)
    tourImgBox.append(tourImg)

    // Заголовок
    tourTitle.classList.add('tour__item-title')
    tourTitle.textContent = e.nameT
    tourItem.append(tourTitle)
    
    // Дата

    // Начало тура
    
    let date = e.date[0].split('.', 3)
    
    let [day, mounth, year] = date
    let mounthName = mounthNumberToString(mounth)
    let startTour = day + ' ' + mounthName
    let yearTour = year

    //Конец тура
    let dateEnd = e.date[e.date.length - 1].split('.', 2)
    let [dayEnd, mounthEnd] = dateEnd
    let mounthNameEnd = mounthNumberToString(mounthEnd)
    let endTour = dayEnd + ' ' + mounthNameEnd

    
    let dateTour = startTour + ' - ' + endTour + ' ' + yearTour + 'г'


    tourDate.classList.add('tour__date')
    tourDate.textContent = dateTour
    tourItem.append(tourDate)

    // Ссылка
    tourLink.setAttribute('href', e.link)
    tourLink.classList.add('tour__link')
    tourLink.innerHTML = '\
    Подробнее\
        <svg width = "30" height = "24" viewbox = "0 0 28 12" fill = "none" xmlns = "http://www.w3.org/2000/svg" >\
            <path d="M24.3536 6.35355C24.5488 6.15829 24.5488 5.84171 24.3536 5.64645L21.1716 2.46447C20.9763 2.2692 20.6597 2.2692 20.4645 2.46447C20.2692 2.65973 20.2692 2.97631 20.4645 3.17157L23.2929 6L20.4645 8.82843C20.2692 9.02369 20.2692 9.34027 20.4645 9.53553C20.6597 9.7308 20.9763 9.7308 21.1716 9.53553L24.3536 6.35355ZM4 6.5H24V5.5H4V6.5Z" fill="#121723" />\
                        </svg >\
'
    tourItem.append(tourLink)
});

} catch (e) {
    console.error('Failed to load tourList', e);
}
})();