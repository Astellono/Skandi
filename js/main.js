let textAbout = document.getElementById('textAbout')
let textBot = document.getElementById('storyBot')
let cnt = 0;


textAbout.addEventListener('click',()=> {
    cnt++;
    textAbout.classList.toggle("about__storyFull")
    if (cnt % 2 === 0) {
        textBot.textContent=""
        textBot.innerHTML = "<p>Подробнее<br>▼</p>"
        console.log("Второй клик");
    } else textBot.innerHTML = "<p>▲</p>"
})


textBot.addEventListener('click',()=> {
    cnt++;
    textAbout.classList.toggle("about__storyFull")
    if (cnt % 2 === 0) {
        textBot.textContent=""
        textBot.innerHTML = "<p>Подробнее<br>▼</p>"
        console.log("Второй клик");
    } else textBot.innerHTML = "<p>▲</p>"
})