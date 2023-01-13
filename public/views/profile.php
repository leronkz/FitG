<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="public/css/profile_style.css">
    <script src="https://kit.fontawesome.com/7fd64f3cef.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <script src="public/js/nav-script.js" defer></script>
    <script src="public/js/preview-photo.js" defer></script>
    <script src="public/js/profile-script.js" defer></script>
    <title>PROFILE PAGE</title>
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
        <div class="profile-picture">
            <div class="picture" style="background-image:url('public/uploads/<?= $userData->getImage()?>')"></div>
            <b class="text">Witaj <?= $userData->getName()?></b>
        </div>
        <div class="nav-links-container">
            <a href="#" class="nav-link">
                <span class="nav-text">Profil</span>
                <ion-icon name="person-outline" size="large"></ion-icon>
            </a>
            <a href="diary" class="nav-link">
                <span class="nav-text">Dziennik aktywności</span>
                <ion-icon name="reader-outline" size="large"></ion-icon>
            </a>
            <a href="main" class="nav-link">
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
            <b class="main-text">Twoje konto</b>
        </header>
        <form class="form" action="setUserData" method="POST" ENCTYPE="multipart/form-data">
            <div class="profile-picture">
                <div class="picture" style="background-image:url('public/uploads/<?= $userData->getImage()?>')"></div>
                <input class="input-file" id="change-picture-input" type="file" value="" name="file">
                <label for="change-picture-input" id="upload-button"><b class="text">Wybierz zdjęcie</b></label>
            </div>
            <div class="user-data">
                <label for="imie">
                    <b class="text">Imię: </b>
                    <input id="name" name="name" type="text" placeholder="<?= $userData->getName()?>">
                </label>
                <label for="nazwisko">
                    <b class="text">Nazwisko: </b>
                    <input id="surname" name="surname" type="text" placeholder="<?= $userData->getSurname()?>">
                </label>
                <label for="plec">
                    <b class="text">Płeć: </b>
                    <div class="man-radio-inline">
                        <input type="radio" id="sex_MALE" name="sex" value="MALE">
                        <b class="text">Mężczyzna</b>
                        <input type="radio" id="sex_FEMALE" name="sex" value="FEMALE">
                        <b class="text">Kobieta</b>
                    </div>
                </label>
                <label for="birthday"><b class="text">Data urodzenia:</b>
                    <input type="date" id="birthday" name="birthday">
                </label>
                <label for="wzrost">
                    <b class="text">Wzrost [cm]: </b>
                    <input id="height" name="height" type="number" placeholder=<?= $userData->getHeight()?>>
                </label>
                <label for="masa">
                    <b class="text">Masa ciała [kg]: </b>
                    <input id="weight" name="weight" type="number" placeholder=<?= $userData->getWeight()?>>
                </label>
                <label for="zatwierdz-zmiany">
                    <button id="save-button" class="main-button" type="submit">Zapisz zmiany</button>
                </label>
            </div>
        </form>
    </div>
</body>