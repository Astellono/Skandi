
const getDatesArray = (start, end) => {
    const arr = [];
    while (start <= end) {
        arr.push(new Date(start));
        start.setDate(start.getDate() + 1);
    }
    let arrNew = []
    arr.forEach(e => {
        let getDate = e.getDate()
        let getMounth = e.getMonth()+1
        arrNew.push(getDate + '.' +  getMounth)
    });
    return arrNew;
};

export let tourList = [
    
    {
        nameT: "Карелия",
        date: getDatesArray(new Date('2025-01-02'), new Date('2025-01-07')),
        link: "page_tour/karelia.html",
        color: 'green',
        srcImg:'img/act-tour/karelia.jpg' ,
    },
    {
        nameT: "Осетия",
        date: getDatesArray(new Date('2025-02-21'), new Date('2025-02-24')),
        link: "page_tour/osetia.html",
        color: '#add',
        srcImg:'img/act-tour/osetia.jpg' ,
    },
    {
        nameT: "Мурманск",
        date: getDatesArray(new Date('2025-03-06'), new Date('2025-03-10')),
        link: "page_tour/murm.html",
        color: '#AD66D5',
        srcImg:'img/act-tour/murm.jpg' ,
    },
    {
        nameT: "Армения",
        date: getDatesArray(new Date('2025-04-16'), new Date('2025-04-20')),
        link: "page_tour/arm.html",
        color: '#59bd21',
        srcImg:'img/act-tour/arm.jpg' ,
    },
    {
        nameT: "Кахетия",
        date: getDatesArray(new Date('2025-05-01'), new Date('2025-05-07')),
        link: "page_tour/kahetia.html",
        color: "red",
        srcImg:'img/act-tour/kahetia.jpg' ,
    },
    {
        nameT: "Азербайджан",
        date: getDatesArray(new Date('2025-05-18'), new Date('2025-05-24')),
        link: "page_tour/azer.html",
        color: "#59bd9f",
        srcImg:'img/act-tour/azer.jpg' ,
    },
    {
        nameT: "Киргизия",
        date: getDatesArray(new Date('2025-06-12'), new Date('2025-06-22')),
        link: "page_tour/kirg.html",
        color: "#3f708c",
        srcImg:'img/act-tour/kirg.JPG' ,
    },
    {
        nameT: "Башкирия",
        date: getDatesArray(new Date('2025-08-06'), new Date('2025-08-10')),
        link: "page_tour/bash.html",
        color: "#42d",
        srcImg:'img/act-tour/bash.jpg' ,
    },
    {
        nameT: "Монголия",
        date: getDatesArray(new Date('2025-08-14'), new Date('2025-08-24')),
        link: "page_tour/mongol.html",
        color: "#c9ab5f",
        srcImg:'img/act-tour/mongol.jpg' ,
    },
    {
        nameT: "Узбекистан",
        date: getDatesArray(new Date('2025-09-06'), new Date('2025-09-16')),
        link: "page_tour/uz.html",
        color: "#bd1e73",
        srcImg:'img/act-tour/uz.jpeg' ,
    },
]