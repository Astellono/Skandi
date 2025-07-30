let btnChange = document.getElementById('btnChange')
let inputChage = document.querySelectorAll('.change-form-input')
let sendDataBtn = document.getElementById('sendChangeBtn')

btnChange.addEventListener('click', ()=>{

    inputChage.forEach((e, index) => {
        e.disabled = false;
        if (index == 0) {
            e.focus();
        }
    });
   
    
})