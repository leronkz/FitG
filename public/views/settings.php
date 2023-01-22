<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="public/img/favicon.png">
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
        <?php
        include('nav.php');
        ?>
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
                <form action="updatePassword" class="change-password" method="POST">
                    <div class="messages">
                        <?php if(isset($messages)){
                            foreach ($messages as $message) {
                                echo $message;
                            }
                        }
                        ?>
                    </div>
                    <b class="ttext">Zmień hasło</b>
                    <b class="text">Obecne hasło</b>
                    <input name="current-password" type="password" placeholder="********">
                    <b class="text">Nowe hasło</b>
                    <input name="new-password" type="password" placeholder="********">
                    <button name="update-button" class="button" type="submit">Aktualizuj hasło</button>
                </form>
            </div>
        </div>
    </div>
</body>