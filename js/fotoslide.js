const fotolist = document.querySelectorAll(".tour__foto__img")
const FOTO = document.getElementById('foto')

fotolist.forEach(e => {
    e.addEventListener('click', () => {
        console.log(e.getAttribute('src'));
        let src = e.getAttribute('src')
        
        FOTO.classList.add('hiddden-foto')
        
        setTimeout(() => {
            FOTO.setAttribute('src', src)
            FOTO.classList.remove('hiddden-foto')
            FOTO.classList.add('go-open')
        }, 100);
    })
});