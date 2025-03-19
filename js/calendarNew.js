import { mounthData } from './calendar2025.js'
import { tourList } from "./tourList.js";

let data = mounthData
console.log(data);



let tmpColor = 'green';



let listM = document.getElementById("listM")
let arrMounth = ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"]
let arrdayName = ["ПН", "ВТ", "СР", "ЧТ", "ПТ", "СБ", "ВС",]

for (let i = 0; i < 12; i++) {


    let itemM = document.createElement("li")
    itemM.classList.add("calendar__item")
    if (i > 2) {
        itemM.classList.add("calendar__mounthHide")
    }

    listM.append(itemM)




    let itemTitle = document.createElement("h3")
    itemTitle.classList.add("calendar__mouthTitle")
    itemTitle.textContent = arrMounth[i]
    itemM.append(itemTitle)


    let listDayName = document.createElement("ul")
    listDayName.classList.add("caledar__dayNameList")
    itemM.append(listDayName)
    for (let j = 0; j < 7; j++) {
        let itemDayName = document.createElement("li")
        itemDayName.classList.add("calendar__dayNameitem")
        itemDayName.textContent = arrdayName[j]
        listDayName.append(itemDayName)
    }


    let bottomPart = document.createElement("ul")
    bottomPart.classList.add("caledar__dayList")

    itemM.append(bottomPart)
}


let mounthList = document.querySelectorAll(".caledar__dayList")




for (let i = 0; i < mounthList.length; i++) {

    data[i].days.forEach(e => {
        if (e > 0) {

            let dateItem = document.createElement("li")
            let dateLink = document.createElement('a')
            let toolTip = document.createElement('span')
            dateItem.classList.add("calendar__day")
            dateLink.classList.add("calendar__dayLink")
            let curDate = e + '.' + Number(i + 1)


            tourList.forEach(tour => {


                for (let k = 0; k < tour.date.length; k++) {

                    if (tour.date[k] == curDate) {
                        if (k==0) {
                            dateItem.style.borderRadius = "20px 0 0 20px"
                        }
                        if (k == tour.date.length - 1) {
                            dateItem.style.borderRadius = "0 20px 20px 0"
                        }
                        dateItem.classList.add("calendar__day__active")

                        toolTip.textContent = tour.nameT
                        toolTip.classList.add('tooltiptext')
                        dateItem.style.backgroundColor = tour.color
                        tmpColor = tour.color

                     

                        dateLink.setAttribute('href', tour.link)
                    }
                }
            });


            dateLink.append(e);
            mounthList[i].append(dateItem)

            dateItem.append(dateLink)
            dateItem.append(toolTip)

        }
        else {
            let dateItem = document.createElement("li")
            let dateLink = document.createElement('a')

            dateItem.classList.add("calendar__day")
            dateLink.classList.add("calendar__dayLink")

            dateLink.append(e);
            mounthList[i].append(dateItem)

        }
    });
}






let slideRight = document.getElementById("slideRight")
let slideLeft = document.getElementById("slideLeft")
let itemList = document.querySelectorAll(".calendar__item")
let cnt = 0
slideRight.addEventListener("click", (el, j) => {

    cnt = 0
    if (!itemList[11].classList.contains("calendar__mounthHide")) {

        itemList[9].classList.add("calendar__mounthHide")
        itemList[10].classList.add("calendar__mounthHide")
        itemList[11].classList.add("calendar__mounthHide")
        itemList[0].classList.remove("calendar__mounthHide")
        itemList[1].classList.remove("calendar__mounthHide")
        itemList[2].classList.remove("calendar__mounthHide")
    } else {
        itemList.forEach((e, index) => {

            if (!e.classList.contains("calendar__mounthHide")) {
                cnt++;

                if (cnt <= 3) {
                    itemList[index].classList.add("calendar__mounthHide")
                    itemList[index + 3].classList.remove("calendar__mounthHide")
                }


            }


        });
    }
})
slideLeft.addEventListener("click", (el, j) => {

    cnt = 0
    if (!itemList[0].classList.contains("calendar__mounthHide")) {

        itemList[0].classList.add("calendar__mounthHide")
        itemList[1].classList.add("calendar__mounthHide")
        itemList[2].classList.add("calendar__mounthHide")
        itemList[9].classList.remove("calendar__mounthHide")
        itemList[10].classList.remove("calendar__mounthHide")
        itemList[11].classList.remove("calendar__mounthHide")
    } else {
        itemList.forEach((e, index) => {

            if (!e.classList.contains("calendar__mounthHide")) {
                cnt++;

                if (cnt <= 3) {
                    itemList[index].classList.add("calendar__mounthHide")
                    itemList[index - 3].classList.remove("calendar__mounthHide")
                }


            }


        });
    }
})



// json["tour"].forEach(element => {
//     console.log(element.date);
// });
