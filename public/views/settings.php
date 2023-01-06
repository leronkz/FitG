<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="public/css/main.css">
    <link rel="stylesheet" type="text/css" href="public/css/settings.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/7fd64f3cef.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <script src="public/js/nav-script.js" defer></script>
    <title>SETTINGS</title>
</head>

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
                <a href="#" class="nav-link">
                    <span class="nav-text">Ustawienia</span>
                    <ion-icon name="settings-outline" size="large"></ion-icon>
                </a>
                <a href="public/views/info.html" class="nav-link">
                    <span class="nav-text">Informacje</span>
                    <ion-icon name="information-circle-outline" size="large"></ion-icon>
                </a>
                <a href="public/views/login.html" class="nav-link">
                    <span class="nav-text">Wyloguj się</span>
                    <ion-icon name="log-out-outline" size="large"></ion-icon>
                </a>
            </div>
        </nav>
        <button type="button" class="open-nav">
            <img src="public/img/lista_rozwijana.svg">
        </button>
        <div class="main-panel">
            <div class="header">
                <header>
                    <b class="main-text">Ustawienia</b>
                </header>
            </div>
            <div class="account">
                <!-- <label for="header">
                    <img src ="../img/settings/account.svg">
                    <b class="settings-text">Konto</b>
                </label> -->
                <form class="change-password">
                    <b class="text" style="font-size:30px;">Zmień hasło</b>
                    <b class="text">Obecne hasło</b>
                    <input name="current-password" type="password" placeholder="********">
                    <b class="text">Nowe hasło</b>
                    <input name="new-password" type="password" placeholder="********">
                    <button name="update-button" class="button">Aktualizuj hasło</button>
                </form>
            </div>
            <!-- <div class="units">
                <label for="header">
                    <img src="../img/settings/units.svg">
                    <b class="settings-text">Jednostki</b>
                </label>
                <div class="units-panel">
                    <form class="change-units">
                        <label for="weight">
                            <b class="text">Waga:</b>
                            <div class="man-radio-inline">
                                <input type="radio" id="weight_KG" name="weight" value="KG">
                                <b class="text">KG</b>
                                <input type="radio" id="weight_LBS" name="weight" value="LBS">
                                <b class="text">LBS</b>
                            </div>
                        </label>
                        <label for="height">
                            <b class="text">Wzrost:</b>
                            <div class="man-radio-inline">
                                <input type="radio" id="height_CM" name="height" value="CM">
                                <b class="text">CM</b>
                                <input type="radio" id="height_INCH" name="height" value="INCH">
                                <b class="text">INCH</b>
                            </div>
                        </label>
                        <button name="save-units-button" class="button">Zapisz jednostki</button>
                    </form>
                </div>
            </div> -->
        </div>
    </div>
</body>