// Загрузка списка туров из базы данных
let tourList = [];

// Функция для загрузки туров из БД
async function loadTourList() {
    try {
        const response = await fetch('/getDATA/getTours.php');
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        const data = await response.json();
        tourList = data || [];
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
});
