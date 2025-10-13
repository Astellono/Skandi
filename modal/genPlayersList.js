import { players } from "../js/playerList.js?v=12"; 





function generatePlayerCards() {
    const playersListBox = document.getElementById('playersList');
    

    playersListBox.innerHTML = '';
    
    players.forEach(player => {
      const playerCard = document.createElement('li');
      playerCard.className = 'player-card';
      
      playerCard.innerHTML = `
        <div class="card-header">
          <div class="photo-container">
            <img src="${player.ava}" alt="${player.name}" class="player-photo">
            <div class="photo-overlay"></div>
          </div>
          <div class="player-number">${player.number}</div>
        </div>
  
        <div class="card-content">
          <h2 class="player-name">${player.name}</h2>
          <div class="player-position">${player.role}</div>
        </div>
      `;
      
      playersListBox.appendChild(playerCard);
    });
  }
  

  document.addEventListener('DOMContentLoaded', generatePlayerCards);