let response = await fetch("https://calendar-json-app.adaptable.app/fullyear/2024");
let data = []
if (response.ok) { // если HTTP-статус в диапазоне 200-299
    // получаем тело ответа (см. про этот метод ниже)
    data = await response.json();

} else {
    alert("Ошибка HTTP: " + response.status);
}
console.log(data);


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
        newArr.unshift(0,0,0,0,0,0)
        newArr.push(newArr[newArr.length-1] + 1)
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

    console.log(arrFix);



});





let mounthList = document.querySelectorAll(".caledar__dayList")

console.log(mounth);

for (let i = 0; i < mounthList.length; i++) {

    mounth[i].date.forEach(e => {
        if (e > 0) {
            let dateItem = document.createElement("li")
            let dateLink = document.createElement('a')

            dateItem.classList.add("calendar__day")
            dateLink.classList.add("calendar__dayLink")
            dateLink.append(e);
            mounthList[i].append(dateItem)
            dateItem.append(dateLink)
        } else {
            let dateItem = document.createElement("li")
            let dateLink = document.createElement('a')

            dateItem.classList.add("calendar__day")
            dateLink.classList.add("calendar__dayLink")

            mounthList[i].append(dateItem)
            dateItem.append(dateLink)
        }
    });
}





// console.log(mounthList);
// json["tour"].forEach(element => {
//     console.log(element.date);
// });
