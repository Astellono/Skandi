
let response = await fetch("https://calendar-json-app.adaptable.app/fullyear/2025");
import { tourList } from "./tourList.js";
console.log(tourList);
let data = []
if (response.ok) { // если HTTP-статус в диапазоне 200-299
    // получаем тело ответа (см. про этот метод ниже)
    data = await response.json();

} else {
    alert("Ошибка HTTP: " + response.status);
}


let mounthArr = Object.keys(data)

let firstElement = mounthArr.shift();


let mounth = [];

mounthArr.forEach(element => {
    let arrFix = [].concat(...data[element])
    let del = arrFix.shift()
    if (arrFix[0] === 2) {
        let newArr = []
        arrFix.forEach(element => {
            if (element != 0)

                newArr.push(element - 1)
        });
        newArr.unshift(0, 0, 0, 0, 0, 0)
        newArr.push(newArr[newArr.length - 1] + 1)
        mounth.push({
            name: element,
            date: newArr
        }
        )
    } else {
        mounth.push({
            name: element,
            date: arrFix
        }

        )
    }
});

console.log(mounth);






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

    mounth[i].date.forEach(e => {
        if (e > 0) {
            let dateItem = document.createElement("li")
            let dateLink = document.createElement('a')

            dateItem.classList.add("calendar__day")
            dateLink.classList.add("calendar__dayLink")

            for (let j = 0; j < tourList.length; j++) {

                let mounthT = tourList[j].date.substring(3, 5)
                let dayT = tourList[j].date.substring(0, 2)

                console.log(mounthT);

                if ((e == dayT || '0' + e == dayT) && (i + 1 == mounthT) || ('0' + i + 1 == mounthT)) {

                    dateLink.setAttribute('href', tourList[j].link)
                    dateLink.setAttribute('target', "_blank")
                    dateLink.classList.add("calendar__day__active")
                }

            }

            dateLink.append(e);


            mounthList[i].append(dateItem)
            dateItem.append(dateLink)

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
