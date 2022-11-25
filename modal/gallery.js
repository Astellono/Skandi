let imgBox = document.querySelectorAll('.accordion-body')

let abhazia = loadIMG('abhazia')
let kirgizia = loadIMG('kirgizia')
imgBox[0].append(abhazia)
imgBox[1].append(kirgizia)


function loadIMG(dir) {
    let src = 'img/gallery/' + dir
    let massIMG = []
    let imgContainer = document.createElement('div')
    imgContainer.classList.add('modal-imgBlock')
    imgContainer.classList.add('grid')
    imgContainer.setAttribute('data-masonry',''+{ "columnWidth": 200, "itemSelector": ".modal-img-gal" }+'')
    for (i = 1; i <= 8; i++) {

        let img = document.createElement('img')
        img.classList.add('modal-img-gal')
        img.classList.add('minimized')
        img.setAttribute('src', src + '/' + i + '.png')
        massIMG.push(img)
        imgContainer.append(img)
    }


    return imgContainer
}


