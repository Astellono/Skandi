let linkForm = document.querySelectorAll('.excursions__link');
let exForm = document.getElementById('exForm')
let modalEx = document.querySelector('.mod')
let closeModalExBtn = document.querySelector('.close')

linkForm.forEach(e => {


    e.addEventListener('click', () => {

        let nameHash = '#form' + window.location.hash.slice(1)
        let name = e.dataset.name
        modalEx.id = nameHash.slice(1)
        console.log(name);
        e.setAttribute('href', nameHash)

        console.log();
        exForm.setAttribute('action', 'php/excursion/sendEx.php' + '?name=' + name)


    })
});
closeModalExBtn.addEventListener('click', () => {
    let prevHash = localStorage.getItem('hash')
    window.location.hash = prevHash
})


exForm.setAttribute('action', 'php/excursion/' + window.location.hash.slice(5) + '.php')
modalEx.id = window.location.hash.slice(1)