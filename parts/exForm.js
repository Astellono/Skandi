let linkForm = document.querySelectorAll('.excursions__link');
let exForm = document.getElementById('exForm')

linkForm.forEach(e => {
    e.addEventListener('click', () => {     
        exForm.setAttribute('action', 'php/excursion/' + e.dataset.name +'.php')
    })
});