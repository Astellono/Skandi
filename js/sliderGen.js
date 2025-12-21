(async () => {
try {
    // Ждем загрузки DOM
    if (document.readyState === 'loading') {
        await new Promise(resolve => document.addEventListener('DOMContentLoaded', resolve));
    }
    
    const mod = await import(`./tourList.js?ver=${Date.now()}`);
    // Ждем загрузки данных из БД
    await mod.tourListPromise;
    // Получаем актуальный список туров
    const tourList = await mod.getTourList() || [];
    
    // Фильтруем только туры (не экскурсии) и сортируем по дате
    const tours = tourList
        .filter(t => !t.type || t.type !== 'excursion')
        .filter(t => t.date && t.date.length > 0)
        .sort((a, b) => {
            // Сортируем по первой дате
            const dateA = a.date[0] ? a.date[0].split('.').reverse().join('-') : '';
            const dateB = b.date[0] ? b.date[0].split('.').reverse().join('-') : '';
            return dateA.localeCompare(dateB);
        })
        .slice(0, 3); // Берем только первые 3 тура

    function mounthNumberToString(name) {
        // Преобразуем в число, чтобы обработать и "01", и "1"
        const monthNum = parseInt(name, 10);
        if (isNaN(monthNum) || monthNum < 1 || monthNum > 12) {
            return '';
        }
        
        const months = [
            '', 'января', 'февраля', 'марта', 'апреля', 'мая', 'июня',
            'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'
        ];
        
        return months[monthNum] || '';
    }

    let toursBox = document.getElementById('tours');
    
    if (!toursBox) {
        console.error('Element with id "tours" not found');
        return;
    }
    
    if (tours.length === 0) {
        console.warn('No tours found to display in slider');
        return;
    }

    console.log('Generating slider with', tours.length, 'tours');

    tours.forEach((e, index) => {
        let tourItem = document.createElement('div')
        let cotantBox = document.createElement('div')
        let tourImg = document.createElement('img')
        let tourTitle = document.createElement('h5')
        let tourDate = document.createElement('p')
        let tourLink = document.createElement('a')
        
        // Добавить элемент
        tourItem.classList.add('carousel-item')
        if (index === 0) {
            tourItem.classList.add('active')
        }
        toursBox.append(tourItem)
    
        // Картинка
        tourImg.classList.add('d-block', 'w-100')
        tourImg.setAttribute('src', e.srcImg || '')
        tourImg.setAttribute('alt', e.nameT || '')
        tourItem.append(tourImg)
    
        //Контейнер 
        cotantBox.classList.add('carousel-caption', 'd-none', 'd-md-block')
        tourItem.append(cotantBox)
        
        // Заголовок
        tourTitle.textContent = e.nameT || ''
        cotantBox.append(tourTitle)
    
        // Дата
        if (e.date && e.date.length > 0) {
            // Начало тура
            let dateParts = e.date[0].split('.')
            let day = dateParts[0] || ''
            let mounth = dateParts[1] || ''
            let mounthName = mounthNumberToString(mounth)
            
            if (!mounthName) {
                console.warn('Could not parse month for date:', e.date[0], 'month value:', mounth);
            }
            
            let startTour = day + (mounthName ? ' ' + mounthName : '')
        
            //Конец тура
            let dateEndParts = e.date[e.date.length - 1].split('.')
            let dayEnd = dateEndParts[0] || ''
            let mounthEnd = dateEndParts[1] || ''
            let mounthNameEnd = mounthNumberToString(mounthEnd)
            let endTour = dayEnd + (mounthNameEnd ? ' ' + mounthNameEnd : '')
        
            // Получаем год из первой даты
            let year = dateParts[2] || new Date().getFullYear();
            let dateTour = startTour + ' - ' + endTour + ' ' + year + 'г'
        
            tourDate.textContent = dateTour
            cotantBox.append(tourDate)
        }
    
        // Ссылка
        if (e.link) {
            tourLink.setAttribute('href', e.link)
            tourLink.classList.add('actual-tour__link')
            tourLink.textContent = 'Подробнее'
            cotantBox.append(tourLink)
        }
    });
    
    // Обновляем индикаторы карусели
    const indicators = toursBox.parentElement.querySelector('.carousel-indicators');
    if (indicators) {
        indicators.innerHTML = '';
        for (let i = 0; i < tours.length; i++) {
            const button = document.createElement('button');
            button.type = 'button';
            button.setAttribute('data-bs-target', '#carouselExampleDark');
            button.setAttribute('data-bs-slide-to', i.toString());
            button.setAttribute('aria-label', `Slide ${i + 1}`);
            if (i === 0) {
                button.classList.add('active');
                button.setAttribute('aria-current', 'true');
            }
            indicators.appendChild(button);
        }
    }

} catch (e) {
    console.error('Failed to load tourList or generate slider', e);
}
})();