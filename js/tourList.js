
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
        nameT: "Мурманск",
        date: getDatesArray(new Date('2025-03-06'), new Date('2025-03-10')),
        link: "page_tour/murm.html",
        color: '#AD66D5',
        srcImg:'img/act-tour/murm.jpg' ,
    },
    {
        nameT: "Суздаль",
        date: getDatesArray(new Date('2025-03-29'), new Date('2025-03-30')),
        link: "page_tour/suz.html",
        color: '#AD6612',
        srcImg:'img/act-tour/suz.jpg' ,
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
        nameT: "Соловецкие острова",
        date: getDatesArray(new Date('2025-06-28'), new Date('2025-07-05')),
        link: "page_tour/solov.html",
        color: "#3f708c",
        srcImg:'img/act-tour/solov.jpg' ,
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
    {
        nameT: "Байкал",
        date: getDatesArray(new Date('2025-09-20'), new Date('2025-09-29')),
        link: "page_tour/baikal.html",
        color: "#bd1e73",
        srcImg:'img/act-tour/baikal.jpg' ,
    },
    {
        nameT: "Грузия (Аджария)",
        date: getDatesArray(new Date('2025-10-04'), new Date('2025-10-11')),
        link: "page_tour/adj.html",
        color: "#bd5e73",
        srcImg:'img/act-tour/adj.jpg' ,
    },
    {
        nameT: "Осетия",
        date: getDatesArray(new Date('2025-11-20'), new Date('2025-11-23')),
        link: "page_tour/osetia.html",
        color: '#add',
        srcImg:'img/act-tour/osetia.jpg' ,
    }
]