let textAbout = document.getElementById('textAbout')
let textBot = document.getElementById('storyBot')
let cnt = 0;

function switchState(block, arrow) {

    cnt++;
    console.log(cnt);
    block.classList.toggle("about__storyFull")
    if (cnt % 2 === 0) {
        arrow.textContent = ""
        arrow.innerHTML = "<p>Подробнее<br>▼</p>"
        console.log("Второй клик");
    } else arrow.innerHTML = "<p>▲</p>"
}

textBot.addEventListener('click', () => switchState(textAbout, textBot));
textAbout.addEventListener('click', () => switchState(textAbout, textBot));








