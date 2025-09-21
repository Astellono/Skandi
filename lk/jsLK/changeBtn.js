let changeBtn = document.getElementById('changeBtn')
let changeSend = document.getElementById('changeSend')
let inputFio = document.querySelectorAll('.form-control-input')


changeBtn.addEventListener('click', () => {
    inputFio.forEach(input => {
        input.disabled = false
        input.style.border = '1px solid #ced4da'
        
    })
    changeBtn.style.display = 'none'
    changeSend.style.display = 'block'
    
})