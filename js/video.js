let videoList = document.querySelectorAll('.video__item')

videoList.forEach((elem) => {
    elem.addEventListener('click',() => {
        console.log(elem.dataset.video);

    })
})

