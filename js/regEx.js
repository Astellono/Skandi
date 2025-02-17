let submit = document.getElementById('btn')
let form = document.getElementById('exForm')
let storage = window.localStorage
let btnAuto = document.getElementById('btnAuto')


let fio = document.getElementById('fio'),
    age = document.getElementById('age'),
    tel = document.getElementById('tel'),
    email = document.getElementById('email')
   


if (localStorage.getItem('clientEx') === null) {
    btnAuto.setAttribute('disabled', true)
    btnAuto.style.background = 'gray'
    btnAuto.style.cursor = 'inherit'
} else {
    btnAuto.style.background = '#60326B'
    btnAuto.style.cursor = 'pointer'
}
btnAuto.addEventListener('click', (e) => {
    e.preventDefault()

    let clientParse = JSON.parse(storage.getItem("clientEx"))


    fio.value = clientParse.fio
    age.value = clientParse.age
    tel.value = clientParse.tel
    email.value = clientParse.email
    


    // // fio.setAttribute("disabled", true)
    // // age.setAttribute("disabled", true)
    // // tel.setAttribute("disabled", true)
    // // city.setAttribute("disabled", true)
    // // email.setAttribute("disabled", true)
    // // rost.setAttribute("disabled", true)
    // // ves.setAttribute("disabled", true)
    // // staj.setAttribute("disabled", true)
    // // fizNagr.setAttribute("disabled", true)
    // // zabolevania.setAttribute("disabled", true)
    // // davlenie.setAttribute("disabled", true)
    // // opora.setAttribute("disabled", true)
    // // perenosimost.setAttribute("disabled", true)
    // // level.setAttribute("disabled", true)
    // // prohod.setAttribute("disabled", true)

    // // perenosimostGori.setAttribute("disabled", true)
    // // ravn.setAttribute("disabled", true)

    btnAuto.style.background = 'gray'
    btnAuto.style.cursor = 'inherit'
    btnAuto.setAttribute("disabled", true)
})




submit.addEventListener('click', (e) => {

    let result = true

    if (localStorage.getItem('clientEx') === null) {
        result = confirm('Запомнить ваши данные для дальнейшего использования?');
    }

        
        if (result === true) {
            localStorage.setItem("clientEx", JSON.stringify({}));
            let client = {
                fio: fio.value,
                age: age.value,
                tel: tel.value, 
                email: email.value,
                
            }
            localStorage.setItem("clientEx", JSON.stringify(client));
        }

   
})