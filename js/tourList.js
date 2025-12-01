
const getDatesArray = (start, end) => {
    const arr = [];
    while (start <= end) {
        arr.push(new Date(start));
        start.setDate(start.getDate() + 1);
    }
    let arrNew = []
    arr.forEach(e => {
        let getDate = e.getDate()
        let getMounth = e.getMonth() + 1
        let getYears = e.getFullYear()
        arrNew.push(getDate + '.' + getMounth + '.' + getYears)
    });
    return arrNew;
};

export let tourList = [

    {
        nameT: "Торжок: Императорский шаг",
        date: getDatesArray(new Date('2025-12-12'), new Date('2025-12-14')),
        link: "page_tour/torzhok.php",
        color: "#7a5e3a",
        srcImg: 'img/act-tour/torzhok.jpg',
    },
    {
        nameT: "Алтайская зимняя сказка",
        date: getDatesArray(new Date('2026-01-02'), new Date('2026-01-09')),
        link: "page_tour/altay.php",
        color: "#bd1e73",
        srcImg: 'img/act-tour/altay.jpg',
    },
    {
        nameT: "Тур «Сибирская Масленица: Тобольск в ритме скандинавской ходьбы»",
        date: getDatesArray(new Date('2026-02-19'), new Date('2026-02-23')),
        link: "page_tour/masl.php",
        color: "#1e48bdff",
        srcImg: 'img/act-tour/masl.jpeg',
    },
    {
        nameT: "Карелия. Паанаярви.",
        date: getDatesArray(new Date('2026-03-07'), new Date('2026-03-11')),
        link: "page_tour/pan.php",
        color: 'rgba(53, 109, 56, 1)',
        srcImg: 'img/act-tour/pan.jpg',
    },
    {
        nameT: "Корея",
        date: getDatesArray(new Date('2026-03-29'), new Date('2026-04-06')),
        link: "page_tour/koreya.php",
        color: 'rgba(56, 126, 126, 1)',
        srcImg: 'img/act-tour/koreya.jpg',
    },

    {
        nameT: "Узбекистан",
        date: getDatesArray(new Date('2026-05-03'), new Date('2026-05-10')),
        link: "page_tour/uz.php",
        color: 'rgba(126, 120, 68, 1)',
        srcImg: 'img/act-tour/uz.jpg',
    },
    {
        nameT: "Карелия. В КРАЮ КАЛЕВАЛЬСКИХ ПЕСЕН",
        date: getDatesArray(new Date('2026-06-06'), new Date('2026-06-11')),
        link: "page_tour/kalev.php",
        color: 'rgba(126, 120, 68, 1)',
        srcImg: 'img/act-tour/kalev.jpg',
    },
    {
        nameT: "Тур «СЕВЕРНЫЙ ШАГ: Архангельск, Поморье и Каргополье»",
        date: getDatesArray(new Date('2026-07-12'), new Date('2026-07-18')),
        link: "page_tour/sever.php",
        color: 'rgb(139, 167, 221)',
        srcImg: 'img/act-tour/sever.png',
    },
    {
        nameT: "Юг Киргизии",
        date: getDatesArray(new Date('2026-08-06'), new Date('2026-08-15')),
        link: "page_tour/kirg.php",
        color: 'rgba(33, 13, 56, 1)',
        srcImg: 'img/act-tour/kirg.jpg',
    },
    {
        nameT: "Тур: «Грузия в бархатный сезон: вино, стиль и сезон ртвели»",
        date: getDatesArray(new Date('2026-09-07'), new Date('2026-09-13')),
        link: "page_tour/gruz.php",
        color: 'rgba(119, 104, 138, 1)',
        srcImg: 'img/act-tour/gruz.jpeg',
    },
    {
        nameT: "Тур: «Дыхание Казахстана: Алматинские горы и легенды Великой Степи»",
        date: getDatesArray(new Date('2026-10-04'), new Date('2026-10-11')),
        link: "page_tour/kazah.php",
        color: 'rgba(110, 182, 116, 1)',
        srcImg: 'img/act-tour/kazah.jpeg',
    },




]