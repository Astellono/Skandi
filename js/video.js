
let videos = [
    {
        id: 0,
        title: 'Lorem',
        desc: 'asfsfsfafsasffasfsafafas',
        date: '02.03.2002',
        imgUrl: 'img/video/test.jpeg',
        url: '<iframe src="https://www.youtube.com/embed/OvUmsc44nWE" title="Stand Up: Иван Абрамов - кумиры" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>'
    },
    {
        id: 1,
        title: 'Lorem1',
        desc: 'asfsfsfafsasffasfsafafas',
        date: '02.03.2003',
        imgUrl: 'img/video/test.jpeg',
        url: '<iframe src="https://www.youtube.com/embed/OvUmsc44nWE" title="Stand Up: Иван Абрамов - кумиры" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>'
    },
    {
        id: 2,
        title: 'Lorem',
        desc: 'asfsfsfafsasffasfsafafas',
        date: '02.03.2002',
        imgUrl: 'img/video/test.jpeg',
        url: 'url'
    },
]

let list = document.getElementById('videoList');
genericMain(videos[0].title, videos[0].url, videos[0].desc, videos[0].date)
videos.forEach(element => {

    addVideoItem(element)



});




let videoList = document.querySelectorAll('.video__item')





function addVideoItem(i) {
    let block = document.createElement('li')
    let divBlock = document.createElement('div')
    let divDesc = document.createElement('div')
    let img = document.createElement('img')
    let title = document.createElement('h2')
    let date = document.createElement('p')

    block.classList.add('video__item')
    divBlock.classList.add('video__item__imgBlock')
    divDesc.classList.add('video__item__desc')
    img.classList.add('video__item__img')
    title.classList.add('video__item__title')
    date.classList.add('video__item__date')

    title.textContent = i.title
    date.textContent = i.date

    img.setAttribute('src', i.imgUrl)


    list.append(block)
    block.append(divBlock)
    block.append(divDesc)

    divBlock.append(img)
    divDesc.append(title)
    divDesc.append(date)

    block.addEventListener('click', () => {
        genericMain(i.title, i.url, i.desc, i.date)
    })
}

function genericMain(title, url, desc, date) {
    let display = document.getElementById('display')
    display.innerHTML = ''
    let titleMain = document.createElement('h2')
    let descMain = document.createElement('p')
    let dateMain = document.createElement('p')
    let video = document.createElement('div')

    video.classList.add('video__frame')
    titleMain.classList.add('video__mainTitle')
    descMain.classList.add('video__mainDesc')
    dateMain.classList.add('video__dateMain')
    video.innerHTML = url
    titleMain.textContent = title
    descMain.textContent = desc
    dateMain.textContent = date

    display.append(titleMain)
    display.append(video)
    display.append(descMain)
    display.append(dateMain)
}