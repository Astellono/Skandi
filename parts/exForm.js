let linkForm = document.querySelectorAll('.excursions__link');
let exForm = document.getElementById('exForm')
let modal = document.querySelector('.mod')

linkForm.forEach(e => {
    let nameHash = '#form' + e.dataset.name
    e.addEventListener('click', () => {

        let nameHash = '#form' + e.dataset.name
        // console.log(window.location.hash);
        modal.id = nameHash.slice(1)
        e.setAttribute('href', nameHash )
        
        
        exForm.setAttribute('action', 'php/excursion/' + e.dataset.name +'.php')


    })
});
exForm.setAttribute('action', 'php/excursion/' + window.location.hash.slice(5) +'.php')
modal.id = window.location.hash.slice(1)