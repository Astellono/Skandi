<?php
session_start();
// if (!isset($_SESSION['loggedin'])) {
//     header("Location: login.php");
//     exit();
// }
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

  <title>Темп</title>
  
  <link rel="icon" type="image/png" sizes="256x256" href="img/fav/favicon-256x256.png">
  <link rel="icon" type="image/svg+xml" href="img/fav/favicon.svg">
  <link rel="apple-touch-icon" sizes="192x192" href="img/fav/android-chrome-192x192.png">
  <link rel="manifest" href="img/fav/site.webmanifest">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="css/main.css?v=<?php echo filemtime('css/main.css'); ?>">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
  <script src="js/tableresGen.js" defer type="module"></script>
  <script src="js/rasp.js" defer></script>
  <script src="js/switchMenu.js?v=<?php echo filemtime('js/switchMenu.js'); ?>" defer></script>
  <script src="js/genPlayersList.js?v=<?php echo filemtime('js/genPlayersList.js'); ?>" defer type="module"></script>
  <script src="js/genRes.js?v=<?php echo filemtime('js/genRes.js'); ?>" defer type="module"></script>
  <!-- <script src="js/targetRes.js" defer  type="module"></script> -->
</head>

<body class="page">
  <div class="dashboard">
    <!-- Sidebar -->
    <aside class="dashboard__sidebar">
      <div class="team-logo">
        <!-- <img src="img/logo.png" alt="Тем логотип" class="team-logo__image"> -->
        <span class="team-logo__name">Темп</span>
      </div>

      <!-- <div class="player-profile">
        <img src="img/player-avatar.jpg" alt="Игрок" class="player-profile__avatar">
        <h3 class="player-profile__name">Иванов Алексей</h3>
        <p class="player-profile__position">Диагональный</p>
      </div> -->

      <ul class="nav">
        <li class="nav__item">
          <a data-tab="table" href="#" class="nav__link">
            <i class="fas fa-home nav__icon"></i>
            <span>Таблица</span>
          </a>
        </li>

        <li class="nav__item">
          <a data-tab="rasp" href="#" class="nav__link">
            <i class="fas fa-calendar-alt nav__icon"></i>
            <span>Расписание</span>
          </a>
        </li>
        <li class="nav__item">
          <a data-tab="team" href="#" class="nav__link">
            <i class="fas fa-chart-line nav__icon"></i>
            <span>Статистика</span>
          </a>
        </li>
        <!-- <li class="nav__item">
          <a data-tab="" href="#" class="nav__link">
            <i class="fas fa-video nav__icon"></i>
            <span>Видео</span>
          </a>
        </li> -->

      </ul>
    </aside>

    <!-- Main Content -->
    <main class="dashboard__main">
      <section class="table" id="table">
        <div class="table-container card">
          <table>
            <caption>Турнирная таблица</caption>
            <thead>
              <tr>
                <th>№</th>
                <th class="th-team">Команда</th>
                <th>Победы</th>
                <th>Очки</th>


              </tr>
            </thead>
            <tbody id="teamContainer">

            </tbody>
          </table>

        </div>
        <div class="table-container card">
          <table id="highlightTable">
            <thead>
              <tr>
                <th>№</th>
                <th class="team-header">Команда</th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
                <th>7</th>
                <th>8</th>
                <th>9</th>
                <th>10</th>
              </tr>
            </thead>
            <tbody id="resContainer" class="resContainer">

            </tbody>
            <tbody>

            </tbody>
          </table>
        </div>
      </section>
      <section class="team" id="team">
        <div class="card">
          <ul class="player-cards-container" id="playersList">

            <!-- Карточка игрока 1 -->
            <li class="player-card">
              <div class="card-header">
                <div class="photo-container">
                  <img src="img/test.png" alt="Иванов Алексей" class="player-photo">
                  <div class="photo-overlay"></div>
                </div>
                <div class="player-number">7</div>
              </div>

              <div class="card-content">
                <h2 class="player-name">Иванов Алексей Петрович</h2>
                <div class="player-position">Диагональный</div>

                <!-- <div class="stats-grid">
                  <div class="stat-item">
                    <div class="stat-value">54%</div>
                    <div class="stat-label">Атака</div>
                    <div class="stat-bar">
                      <div class="stat-progress" style="width: 54%"></div>
                    </div>
                  </div>

                  <div class="stat-item">
                    <div class="stat-value">12</div>
                    <div class="stat-label">Блок</div>
                    <div class="stat-bar">
                      <div class="stat-progress" style="width: 60%"></div>
                    </div>
                  </div>

                  <div class="stat-item">
                    <div class="stat-value">5</div>
                    <div class="stat-label">Эйсы</div>
                    <div class="stat-bar">
                      <div class="stat-progress" style="width: 25%"></div>
                    </div>
                  </div>

                  <div class="stat-item">
                    <div class="stat-value">78%</div>
                    <div class="stat-label">Защита</div>
                    <div class="stat-bar">
                      <div class="stat-progress" style="width: 78%"></div>
                    </div>
                  </div>
                </div> -->
              </div>

              <!-- <div class="card-footer">
                <button class="btn-details">Подробная статистика</button>
              </div> -->
            </li>



          </ul>
        </div>
      </section>
      <section class="rasp" id="rasp">

        <div class="schedule-container">
          <h1 class="mTitle">Расписание</h1>
          <table class="matches-table">
            <thead>
              <tr>
                <th>Дата и время</th>
                <th>Хозяева</th>
                <th>Гости</th>
                <th>Зал</th>
              </tr>
            </thead>
            <tbody>
              <tr style="opacity: 0.3; pointer-events: none;" data-address="Москва, просп. Вернадского, 86, стр. 9" class="rasp-btn">
                <td>ср 08-10, 21:00</td>
                <td class="team-temp"><a class="rasp-link" href="https://volleymsk.ru/ap/members.php?id=10329"
                    target="_blank"> ССК «Альянс»
                    РТУ МИРЭА 2L</a> </td>
                <td>ТЕМП-1</td>
                <td>метро Юго-Западная</td>
              </tr>
              <tr data-address="Москва, посёлок Марьино, 3" class="rasp-btn">
                <td>вс 12-10, 20:00</td>
                <td><a class="rasp-link" href="https://volleymsk.ru/ap/members.php?id=10359" target="_blank">Прометей
                    Филимонки</a></td>
                <td class="team-temp">ТЕМП-1</td>
                <td>метро Филатов луг</td>
              </tr>
              <tr data-address="Москва, Вильнюсская улица, 12" class="rasp-btn">
                <td>чт 23-10, 19:30</td>
                <td><a class="rasp-link" href="https://volleymsk.ru/ap/members.php?id=10242"
                    target="_blank">DreamTeam</a></td>
                <td class="team-temp">ТЕМП-1</td>
                <td>метро Ясенево</td>
              </tr>
              <tr data-address="Москва, улица Подольских Курсантов, 16Ак1" class="rasp-btn">
                <td>ср 01-11, 17:30</td>
                <td class="team-temp">ТЕМП-1</td>
                <td><a class="rasp-link" href="https://volleymsk.ru/ap/members.php?id=10196"
                    target="_blank">NePridumali</a></td>
                <td>метро Пражская</td>
              </tr>

              <tr data-address="Москва, улица Подольских Курсантов, 16Ак1" class="rasp-btn">
                <td>сб 15-11, 17:30</td>
                <td class="team-temp">ТЕМП-1</td>
                <td><a class="rasp-link" href="https://volleymsk.ru/ap/members.php?id=10381" target="_blank">ВК "Русская
                    Рулетка 2"</a></td>
                <td>метро Пражская</td>
              </tr>
              <tr data-address="Москва, улица Подольских Курсантов, 16Ак1" class="rasp-btn">
                <td>сб 22-11, 17:30</td>
                <td class="team-temp">ТЕМП-1</td>
                <td><a class="rasp-link" href="https://volleymsk.ru/ap/members.php?id=10402" target="_blank">Таков
                    путь</a></td>
                <td>метро Пражская</td>
              </tr>
              <tr data-address="Москва, Южнобутовская 76к1" class="rasp-btn">
                <td>ср 26-11, 19:45</td>
                <td><a class="rasp-link" href="https://volleymsk.ru/ap/members.php?id=10290" target="_blank">Mans Not
                    Hot v.2.0</a></td>
                <td class="team-temp">ТЕМП-1</td>
                <td>метро Бунинская аллея</td>
              </tr>
              <tr data-address="Москва, улица Подольских Курсантов, 16Ак1" class="rasp-btn">
                <td>сб 06-12, 17:30</td>
                <td class="team-temp">ТЕМП-1</td>
                <td><a class="rasp-link" href="https://volleymsk.ru/ap/members.php?id=10404" target="_blank">VPS</a>
                </td>
                <td>метро Пражская</td>
              </tr>
              <tr data-address="Москва, улица Подольских Курсантов, 16Ак1" class="rasp-btn">
                <td>сб 13-12, 17:30</td>
                <td class="team-temp">ТЕМП-1</td>
                <td><a class="rasp-link" href="https://volleymsk.ru/ap/members.php?id=10357" target="_blank">ВК "ЮЖНЫЙ
                    ПОРТ"</a></td>
                <td>метро Пражская</td>
              </tr>

            </tbody>
          </table>
          <div id="mapModal" class="modal">
            <div class="modal-content">
              <span class="close">&times;</span>
              <h3 id="modalTitle">Карта</h3>
              <div id="map"></div>
            </div>
          </div>
        </div>

      </section>
      <!-- <div class="card">
        <div class="card__header">
          <h2 class="card__title">Ближайшие игры</h2>

        </div>
        <div class="matches-list">
          <div class="matches__item">
            <div class="matches__info">
              <span class="matches__date">12.05.2023</span>
              <div class="matches__teams">
                <span>Темп</span>
                <span class="matches__vs">vs</span>
                <span>Соперник</span>
              </div>
            </div>
           
          </div>
          <div class="matches__item">
            <div class="matches__info">
              <span class="matches__date">05.05.2023</span>
              <div class="matches__teams">
                <span>Темп</span>
                <span class="matches__vs">vs</span>
                <span>Соперник</span>
              </div>
            </div>
    
          </div>
        </div>
      </div> -->

  </div>

  <!-- Progress Section -->
  <!-- <div class="progress-section">
        <h2 class="progress-section__title">Прогресс за сезон</h2>
        <div class="progress-grid">
          <div class="progress-card">
            <h3 class="progress-card__title">Силовая подготовка</h3>
            <div class="progress-card__bar">
              <div class="progress-card__fill" style="width: 75%"></div>
            </div>
            <div class="progress-card__labels">
              <span>Начало</span>
              <span>+15%</span>
              <span>Цель</span>
            </div>
          </div>

          <div class="progress-card">
            <h3 class="progress-card__title">Точность подачи</h3>
            <div class="progress-card__bar">
              <div class="progress-card__fill" style="width: 82%"></div>
            </div>
            <div class="progress-card__labels">
              <span>Начало</span>
              <span>+8%</span>
              <span>Цель</span>
            </div>
          </div>
        </div>
      </div> -->
  </main>

  </div>
  <script src="https://api-maps.yandex.ru/2.1/?apikey=199de9b4-eaf5-45e1-95c2-3510af592354&lang=ru_RU"
    type="text/javascript"></script>
  <script src="js/map.js?v=<?php echo filemtime('js/map.js'); ?>"></script>
</body>

</html>