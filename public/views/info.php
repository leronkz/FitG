<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <!-- <link rel="stylesheet" type="text/css" href="../css/style.css"> -->
    <link rel="stylesheet" type="text/css" href="public/css/main.css">
    <link rel="stylesheet" type="text/css" href="public/css/info.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/7fd64f3cef.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <script src="public/js/nav-script.js" defer></script>
    <title>INFO PAGE</title>
</head>
<!-- TODO
DODAC INFO O COOKIES I TAKIE TAM -->
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
            <a href="public/views/profile.html" class="nav-link">
                <span class="nav-text">Profil</span>
                <ion-icon name="person-outline" size="large"></ion-icon>
            </a>
            <a href="public/views/diary.html" class="nav-link">
                <span class="nav-text">Dziennik aktywności</span>
                <ion-icon name="reader-outline" size="large"></ion-icon>
            </a>
            <a href="public/views/main.html" class="nav-link">
                <span class="nav-text">Kalendarz aktywności</span>
                <ion-icon name="calendar-outline" size="large"></ion-icon>
            </a>
            <a href="public/views/settings.html" class="nav-link">
                <span class="nav-text">Ustawienia</span>
                <ion-icon name="settings-outline" size="large"></ion-icon>
            </a>
            <a href="#" class="nav-link">
                <span class="nav-text">Informacje</span>
                <ion-icon name="information-circle-outline" size="large"></ion-icon>
            </a>
            <a href="public/views/login.html" class="nav-link">
                <span class="nav-text">Wyloguj się</span>
                <ion-icon name="log-out-outline" size="large"></ion-icon>
            </a>
        </div>
    </nav>
    <div class="nav-button">
        <button type="button" class="open-nav">
            <img src="public/img/lista_rozwijana.svg">
        </button>
    </div>
    <div class="main-panel">
        <header><b class="main-text">Informacje</b></header>
        <img src="public/img/logo_transparent.svg" style="height:50%;">
        <b class="text">FitG is a free workout tracker & planner that you can use
            either on your mobile, laptop or PC.</b>
        <b class="secondary-text">All of the used icons come from freeicons.io and ionicons.io</b>
    </div>
</div>
</body>