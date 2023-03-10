<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="public/css/main.css">
    <link rel="stylesheet" type="text/css" href="public/css/activity.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/7fd64f3cef.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <script src="public/js/nav-script.js" defer></script>
    <script src="public/js/date-script.js" defer></script>
    <script src="public/js/add-activity.js" defer></script>
    <title>NEW ACTIVITY PAGE</title>
</head>

<body>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <div class="container">
        <?php
        include('nav.php');
        ?>
        <button type="button" class="open-nav">
            <img src="public/img/lista_rozwijana.svg">
        </button>
    <div class="main-panel">
         <header>
            <b class="main-text">Dodawanie nowej aktywności</b>
            <p class="current-date"></p>
        </header>
        <div id="popup" class="popup">
            <button type="button" class="popup-close" id="popup-close">
                <ion-icon name="close-outline" size="large"></ion-icon>
            </button>
            <b class="text">Dodawanie ćwiczenia</b>
            <form action="" autocomplete="off" class="add-form">
                <input id="autocomplete-input" type="text" placeholder="Nazwa ćwiczenia">
                <b class="text">Ilość serii</b>
                <select name="series" id="series">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
                <button id="next-button" type="button" class="next-button">Dalej</button>
            </form>
            <div id="entry" class="entry">
                <div id="entry-header" class="entry-header">
                    <b class="text">Seria</b>
                    <b class="text">Ciężar</b>
                    <b class="text">Ilość powtórzeń</b>
                </div>
            </div>
            <button id="save-exercise" class="save-exercise-button" type="submit">Zapisz ćwiczenie</button>
        </div>
        <div class="activity-panel">
            <div class="add-activity-panel">
                <button id="add-activity-button" name="add-activity-button" class="button">Nowe ćwiczenie
                    <ion-icon name="add-circle-outline" size="large"></ion-icon>
               </button> 
            </div>
            <div class="show-activity">
            </div>
        </div>
            <button type="button" class="save-button">Zapisz trening</button>
    </div>
</body>