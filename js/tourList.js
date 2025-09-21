
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
        date: getDatesArray(new Date('2025-10-03'), new Date('2025-10-05')),
        link: "page_tour/torzhok.php",
        color: "#7a5e3a",
        srcImg: 'img/act-tour/torzhok.jpg',
    },
    {
        nameT: "Псковское ожерелье",
        date: getDatesArray(new Date('2025-10-10'), new Date('2025-10-12')),
        link: "page_tour/pskov.php",
        color: "#6b7fb3",
        srcImg: 'img/act-tour/pskov.jpg',
    },
    {
        nameT: "Касимов. Осенняя мещера.",
        date: getDatesArray(new Date('2025-10-18'), new Date('2025-10-19')),
        link: "page_tour/kas.php",
        color: '#add',
        srcImg: 'img/act-tour/kas.jpg',
    },


    {
        nameT: "Абхазия",
        date: getDatesArray(new Date('2025-11-01'), new Date('2025-11-05')),
        link: "page_tour/abh.php",
        color: "#d24220",
        srcImg: 'img/act-tour/abh.jpg',
    },
    {
        nameT: "Осетия",
        date: getDatesArray(new Date('2025-11-20'), new Date('2025-11-23')),
        link: "page_tour/osetia.php",
        color: 'rgba(18, 110, 90, 1)',
        srcImg: 'img/act-tour/osetia.jpg',
    },
    {
        nameT: "Алтайская зимняя сказка",
        date: getDatesArray(new Date('2026-01-02'), new Date('2026-01-09')),
        link: "page_tour/altay.php",
        color: "#bd1e73",
        srcImg: 'img/act-tour/altay.jpg',
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
        nameT: "Юг Киргизии",
        date: getDatesArray(new Date('2026-08-06'), new Date('2026-08-15')),
        link: "page_tour/kirg.php",
        color: 'rgba(33, 13, 56, 1)',
        srcImg: 'img/act-tour/kirg.jpg',
    },





]