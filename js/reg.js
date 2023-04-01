let submit = document.getElementById('btn')
let form = document.getElementById('form')
let storage = window.localStorage
let btnAuto = document.getElementById('btnAuto')


let fio = document.getElementById('fio'),
    age = document.getElementById('age'),
    tel = document.getElementById('tel'),
    city = document.getElementById('city'),
    email = document.getElementById('email'),
    rost = document.getElementById('rost'),
    ves = document.getElementById('ves'),
    staj = document.getElementById('staj'),
    fizNagr = document.getElementById('fizNagr'),
    zabolevania = document.getElementById('zabolevania'),
    davlenie = document.getElementById('davlenie'),
    opora = document.getElementById('opora'),
    chrono = document.getElementById('chrono')
    perenosimost = document.getElementById('perenosimost'),
    level = document.getElementById('level'),
    prohod = document.getElementById('prohod'),
    perenosimostGori = document.getElementById('perenosimostGori'),
    ravn = document.getElementById('ravn')



if (localStorage.getItem('client') === null) {
    btnAuto.setAttribute('disabled', true)
    btnAuto.style.background = 'gray'
    btnAuto.style.cursor = 'inherit'
} else {
    btnAuto.style.background = '#60326B'
    btnAuto.style.cursor = 'pointer'
}
btnAuto.addEventListener('click', (e) => {
    e.preventDefault()

    let clientParse = JSON.parse(storage.getItem("client"))


    fio.value = clientParse.fio
    age.value = clientParse.age
    tel.value = clientParse.tel
    city.value = clientParse.city
    email.value = clientParse.email
    rost.value = clientParse.rost
    ves.value = clientParse.ves
    staj.value = clientParse.staj
    fizNagr.value = clientParse.fizNagr
    zabolevania.value = clientParse.zabolevania
    davlenie.value = clientParse.davlenie
    opora.value = clientParse.opora
    chrono.value = clientParse.chrono
    perenosimost.value = clientParse.perenosimost
    level.value = clientParse.level
    prohod.value = clientParse.prohod
    perenosimostGori.value = clientParse.perenosimostGori
    ravn.value = clientParse.ravn


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

    if (localStorage.getItem('client') === null) {
        result = confirm('Запомнить ваши данные для дальнейшего использования?');
    }

        
        if (result === true) {
            localStorage.setItem("client", JSON.stringify({}));
            let client = {
                fio: fio.value,
                age: age.value,
                tel: tel.value,
                city: city.value,
                email: email.value,
                rost: rost.value,
                ves: ves.value,
                staj: staj.value,
                fizNagr: fizNagr.value,
                zabolevania: zabolevania.value,
                davlenie: davlenie.value,
                opora: opora.value,
                chrono: opora.value,
                perenosimost: perenosimost.value,
                level: level.value,
                prohod: prohod.value,
                perenosimostGori: perenosimostGori.value,
                ravn: ravn.value
            }
            localStorage.setItem("client", JSON.stringify(client));
        }

   
})