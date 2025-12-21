// Загрузка списка туров из базы данных
let tourList = [];

// Функция для преобразования даты в формат d.m.Y
// Поддерживает форматы: YYYY-MM-DD, d.m.Y, текстовые форматы с датой
function formatDateForCalendar(dateStr) {
    if (!dateStr || typeof dateStr !== 'string') return '';
    
    const trimmed = dateStr.trim();
    if (!trimmed) return '';
    
    // Если дата уже в формате d.m.Y, возвращаем как есть
    if (trimmed.match(/^\d{1,2}\.\d{1,2}\.\d{4}$/)) {
        return trimmed;
    }
    
    // Пытаемся распарсить как YYYY-MM-DD
    if (trimmed.match(/^\d{4}-\d{2}-\d{2}$/)) {
        const date = new Date(trimmed + 'T00:00:00');
        if (!isNaN(date.getTime())) {
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const year = date.getFullYear();
            return `${day}.${month}.${year}`;
        }
    }
    
    // Пытаемся найти дату в текстовом формате (например: "15 января 2024г" или "15 января 2024")
    // Ищем паттерны типа "DD месяц YYYY" или "DD месяц YYYYг"
    const textDatePatterns = [
        /(\d{1,2})\s+(января|февраля|марта|апреля|мая|июня|июля|августа|сентября|октября|ноября|декабря)\s+(\d{4})/i,
        /(\d{1,2})\s+(январь|февраль|март|апрель|май|июнь|июль|август|сентябрь|октябрь|ноябрь|декабрь)\s+(\d{4})/i
    ];
    
    for (const pattern of textDatePatterns) {
        const match = trimmed.match(pattern);
        if (match) {
            const day = String(parseInt(match[1], 10)).padStart(2, '0');
            const monthNames = {
                'января': 1, 'январь': 1,
                'февраля': 2, 'февраль': 2,
                'марта': 3, 'март': 3,
                'апреля': 4, 'апрель': 4,
                'мая': 5, 'май': 5,
                'июня': 6, 'июнь': 6,
                'июля': 7, 'июль': 7,
                'августа': 8, 'август': 8,
                'сентября': 9, 'сентябрь': 9,
                'октября': 10, 'октябрь': 10,
                'ноября': 11, 'ноябрь': 11,
                'декабря': 12, 'декабрь': 12
            };
            const monthName = match[2].toLowerCase();
            const month = monthNames[monthName];
            if (month) {
                const monthStr = String(month).padStart(2, '0');
                const year = match[3];
                return `${day}.${monthStr}.${year}`;
            }
        }
    }
    
    // Пытаемся распарсить как обычную дату JavaScript
    const date = new Date(trimmed);
    if (!isNaN(date.getTime()) && date.getFullYear() > 1900 && date.getFullYear() < 2100) {
        const day = String(date.getDate()).padStart(2, '0');
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const year = date.getFullYear();
        return `${day}.${month}.${year}`;
    }
    
    console.warn('Could not parse date:', dateStr);
    return '';
}

// Функция для загрузки туров из БД
async function loadTourList() {
    try {
        // Загружаем туры
        const toursResponse = await fetch('/getDATA/getTours.php');
        if (!toursResponse.ok) {
            throw new Error(`HTTP error! status: ${toursResponse.status}`);
        }
        const toursData = await toursResponse.json();
        
        // Загружаем экскурсии
        let excursionsData = [];
        try {
            const excursionsResponse = await fetch('/getDATA/getExcursions.php');
            if (excursionsResponse.ok) {
                const rawExcursions = await excursionsResponse.json();
                // Преобразуем экскурсии в формат календаря
                excursionsData = rawExcursions.map(excursion => {
                    // Преобразуем дату в формат d.m.Y
                    // Экскурсии имеют только одну дату (не диапазон)
                    const dateStr = formatDateForCalendar(excursion.date);
                    const dateArray = dateStr ? [dateStr] : [];
                    
                    // Отладочная информация
                    if (!dateStr) {
                        console.warn('Excursion without valid date:', {
                            name: excursion.name,
                            rawDate: excursion.date,
                            dateType: typeof excursion.date
                        });
                    } else {
                        console.log('Excursion date parsed:', {
                            name: excursion.name,
                            rawDate: excursion.date,
                            parsedDate: dateStr
                        });
                    }
                    
                    // Формируем ссылку на экскурсию
                    let link = '';
                    if (excursion.link_id) {
                        link = `/excursions.php#${excursion.link_id}`;
                    } else {
                        // Если нет link_id, используем ID экскурсии
                        link = `/excursions.php#excursion-${excursion.id}`;
                    }
                    
                    return {
                        nameT: excursion.name,
                        date: dateArray,
                        link: link,
                        color: '#ff6b6b', // Специальный цвет для экскурсий (красноватый)
                        srcImg: excursion.imgSrc || '',
                        price: excursion.price || null,
                        type: 'excursion' // Флаг для идентификации экскурсий
                    };
                }).filter(exc => exc.date.length > 0); // Фильтруем экскурсии без даты
                
                console.log('Loaded excursions:', excursionsData.length, excursionsData);
            }
        } catch (excError) {
            console.warn('Ошибка загрузки экскурсий из базы данных:', excError);
            // Продолжаем работу без экскурсий
        }
        
        // Объединяем туры и экскурсии
        tourList = [...(toursData || []), ...excursionsData];
        console.log('Total items in tourList:', tourList.length, 'Tours:', toursData?.length || 0, 'Excursions:', excursionsData.length);
        return tourList;
    } catch (error) {
        console.error('Ошибка загрузки туров из базы данных:', error);
        // Возвращаем пустой массив в случае ошибки
        tourList = [];
        return tourList;
    }
}

// Начинаем загрузку данных сразу при импорте модуля
const tourListPromise = loadTourList();

// Экспортируем промис для асинхронного использования
export { tourListPromise };

// Экспортируем функцию для получения туров
export async function getTourList() {
    await tourListPromise;
    return tourList;
}

// Экспортируем tourList (будет заполнен после загрузки)
// ВАЖНО: для использования tourList нужно сначала дождаться загрузки через tourListPromise
export { tourList };

// Обновляем tourList после загрузки
tourListPromise.then(loadedTours => {
    // Данные уже в tourList после loadTourList()
    console.log('TourList loaded:', tourList.length, 'items');
    console.log('Excursions count:', tourList.filter(t => t.type === 'excursion').length);
});
