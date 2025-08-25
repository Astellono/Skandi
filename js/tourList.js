
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
        let getYears = e.getFullYear()
        arrNew.push(getDate + '.' +  getMounth + '.' + getYears)
    });
    return arrNew;
};

export let tourList = [


    {
        nameT: "Байкал",
        date: getDatesArray(new Date('2025-09-20'), new Date('2025-09-29')),
        link: "page_tour/baikal.php",
        color: "#bd1e73",
        srcImg:'img/act-tour/baikal.jpg' ,
    },
   
   
    {
        nameT: "Абхазия",
        date: getDatesArray(new Date('2025-11-01'), new Date('2025-11-05')),
        link: "page_tour/abh.php",
        color: "#d24220",
        srcImg:'img/act-tour/abh.jpg' ,
    },
    {
        nameT: "Осетия",
        date: getDatesArray(new Date('2025-11-20'), new Date('2025-11-23')),
        link: "page_tour/osetia.php",
        color: '#add',
        srcImg:'img/act-tour/osetia.jpg' ,
    },
    {
        nameT: "Алтайская зимняя сказка",
        date: getDatesArray(new Date('2026-01-02'), new Date('2026-01-09')),
        link: "page_tour/altay.php",
        color: "#bd1e73",
        srcImg:'img/act-tour/altay.jpg' ,
    },
    {
        nameT: "Корея",
        date: getDatesArray(new Date('2026-03-29'), new Date('2026-04-06')),
        link: "page_tour/koreya.php",
        color: '#add',
        srcImg:'img/act-tour/koreya.jpg' ,
    },
   
   
  
    {
        nameT: "Псковское ожерелье",
        date: getDatesArray(new Date('2025-10-10'), new Date('2025-10-12')),
        link: "page_tour/pskov.php",
        color: "#6b7fb3",
        srcImg:'img/act-tour/pskov.jpg' ,
    },
    {
        nameT: "Торжок: Императорский шаг",
        date: getDatesArray(new Date('2025-10-03'), new Date('2025-10-05')),
        link: "page_tour/torzhok.php",
        color: "#7a5e3a",
        srcImg:'img/act-tour/torzhok.jpg' ,
    },
]