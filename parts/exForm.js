let linkForm = document.querySelectorAll('.excursions__link');
let exForm = document.getElementById('exForm')
let modal = document.querySelector('.mod')
let closeModalBtn = document.querySelector('.close')
linkForm.forEach(e => {


    e.addEventListener('click', () => {
    
        let nameHash = '#form' + window.location.hash.slice(1)
  
        modal.id = nameHash.slice(1)

        e.setAttribute('href', nameHash)

        console.log();
        exForm.setAttribute('action', 'php/excursion/' + window.location.hash.slice(1) + '.php')


    })
});
closeModalBtn.addEventListener('click', ()=>{
    let prevHash = localStorage.getItem('hash')
    window.location.hash = prevHash
})
exForm.setAttribute('action', 'php/excursion/' + window.location.hash.slice(5) + '.php')
modal.id = window.location.hash.slice(1)