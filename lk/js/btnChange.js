let btnChange = document.getElementById('btnChange')
let inputChage = document.querySelectorAll('.change-form-input')
let sendChangeBtn = document.getElementById('sendChangeBtn')

btnChange.addEventListener('click', ()=>{
    sendChangeBtn.setAttribute('type', 'submit')
    btnChange.style.display = 'none';
    inputChage.forEach((e, index) => {
        e.disabled = false;
        if (index == 0) {
            e.focus();
        }
    });

})