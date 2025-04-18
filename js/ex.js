


function expandCard(card) {
  let expandText = document.querySelectorAll('.excursions__podr')
  
  expandText.forEach(expandText => {
   
   expandText.style.display = 'none'
  });

  window.location.hash = card.id
  localStorage.setItem('hash', card.id)
  card.querySelector('.excursions__info__title').style.textAlign = 'center'
  card.querySelector('.excursions__info__title').style.fontSize = '26px'


  const allCards = document.querySelectorAll('.excursions__item');
  allCards.forEach((c) => {
    if (c !== card) {
      
      c.style.display = 'none';
      // Скрываем остальные карточки
    }

  });





  card.classList.toggle('expanded'); // Раскрываем выбранную карточку

  const list = document.querySelector('.excursions__list')
  // Добавляем кнопку для возврата к списку
  if (card.classList.contains('expanded')) {
    const backButton = document.createElement('button');
    backButton.innerText = '←';
    backButton.style.position = 'fixed';
    backButton.style.top = '20px';
    backButton.style.left = '10px';
    backButton.style.padding = '5px 15px';
    backButton.style.backgroundColor = '#333';
    backButton.style.color = '#fff';
    backButton.style.border = 'none';
    backButton.style.borderRadius = '5px';
    backButton.style.cursor = 'pointer';
    backButton.style.zIndex = '1001';
    backButton.onclick = () => {
      let expandText = document.querySelectorAll('.excursions__podr')
  
      expandText.forEach(expandText => {
       
       expandText.style.display = 'block'
      });
      card.querySelector('.excursions__info__title').style.fontSize = '20px'
      card.querySelector('.excursions__info__title').style.textAlign = 'center'

      window.location.hash = ''
      allCards.forEach((c) => (c.style.display = 'block')); // Показываем все карточки
      card.classList.remove('expanded'); // Скрываем подробную информацию
      backButton.remove(); // Удаляем кнопку
    };
    list.append(backButton);
  }
} 



let listEx = document.querySelectorAll('.excursions__item')
listEx.forEach(ex => {

  
  let divExpandText = document.createElement('div')
  divExpandText.classList.add('excursions__podr')
  divExpandText.textContent = 'Подробнее...'

  ex.append(divExpandText)

  if (ex.id === window.location.hash.slice(1)) {
    expandCard(ex)
  }
});

