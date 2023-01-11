<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <script src="public/js/calendar-script.js" defer></script>
    <title>MAIN PAGE</title>
</head>

<!-- TODO:
MAKE RESPONSIVE -->
<body>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <div class="container">
        <nav class="nav">
            <button type="button" class="nav-close">
                <ion-icon name="close-outline" size="large"></ion-icon>
            </button>
            <label for="profile-picture">
                <img src="public/img/profile_picture.svg">
                <b class="text">Cześć Mateusz</b>
            </label>
            <div class="nav-links-container">
                <a href="profile" class="nav-link">
                    <span class="nav-text">Profil</span>
                    <ion-icon name="person-outline" size="large"></ion-icon>
                </a>
                <a href="diary" class="nav-link">
                    <span class="nav-text">Dziennik aktywności</span>
                    <ion-icon name="reader-outline" size="large"></ion-icon>
                </a>
                <a href="#" class="nav-link">
                    <span class="nav-text">Kalendarz aktywności</span>
                    <ion-icon name="calendar-outline" size="large"></ion-icon>
                </a>
                <a href="settings" class="nav-link">
                    <span class="nav-text">Ustawienia</span>
                    <ion-icon name="settings-outline" size="large"></ion-icon>
                </a>
                <a href="info" class="nav-link">
                    <span class="nav-text">Informacje</span>
                    <ion-icon name="information-circle-outline" size="large"></ion-icon>
                </a>
                <a href=" " class="nav-link">
                    <span class="nav-text">Wyloguj się</span>
                    <ion-icon name="log-out-outline" size="large"></ion-icon>
                </a>
            </div>
        </nav>
        <button type="button" class="open-nav">
            <img src="public/img/lista_rozwijana.svg">
        </button>
        <div class="main-panel">
            <header>
                <b class="main-text">Kalendarz aktywności</b>
            </header>
            <div class="wrapper">
                <header>
                    <p class="current-date"></p>
                    <div class="icons">
                        <span id="prev" class="material-symbols-rounded">chevron_left</span>
                        <span id="next" class="material-symbols-rounded">chevron_right</span>
                    </div>
                </header>
                <div class="calendar">
                    <ul class="weeks">
                        <li>Nd.</li>
                        <li>Pon.</li>
                        <li>Wt.</li>
                        <li>Śr.</li>
                        <li>Cz.</li>
                        <li>Pt.</li>
                        <li>Sb.</li>
                    </ul>
                    <ul class="days"></ul>
                </div>
            </div>
            <button class="add-activity">
                <b class="text">Dodaj trening</b>
            </button>
        </div>
    </div>


</body>