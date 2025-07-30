
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

    
 
   
    // {
    //     nameT: "Азербайджан",
    //     date: getDatesArray(new Date('2025-05-18'), new Date('2025-05-24')),
    //     link: "page_tour/azer.php",
    //     color: "#59bd9f",
    //     srcImg:'img/act-tour/azer.jpg' ,
    // },
    
    {
        nameT: "Башкирия",
        date: getDatesArray(new Date('2025-08-06'), new Date('2025-08-10')),
        link: "page_tour/bash.php",
        color: "#42d",
        srcImg:'img/act-tour/bash.jpg' ,
    },
   
    {
        nameT: "Узбекистан",
        date: getDatesArray(new Date('2025-09-06'), new Date('2025-09-16')),
        link: "page_tour/uz.php",
        color: "#bd1e73",
        srcImg:'img/act-tour/uz.jpeg' ,
    },
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
        nameT: "Корея",
        date: getDatesArray(new Date('2026-03-29'), new Date('2026-04-06')),
        link: "page_tour/koreya.php",
        color: '#add',
        srcImg:'img/act-tour/koreya.jpg' ,
    }
   
  
]