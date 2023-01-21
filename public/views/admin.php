<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="public/css/main.css">
    <link rel="stylesheet" type="text/css" href="public/css/admin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/7fd64f3cef.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <script src="public/js/nav-script.js" defer></script>
    <script src="public/js/admin-script.js" defer></script>
    <title>ADMIN PANEL</title>
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
                <b class="main-text">Panel administratora</b>
            </header>
            <div class="admin-panel">
                <div class="app-stats">
<!--                    tutaj liczba zarejestrowanych z backendu-->
                    <b class="text">Statystyki aplikacji</b>
                    <div class="register-stats">
                        <span class="inside-text">Zarejestrowanych użytkowników:</span>
                        <span class="inside-text" id="registered-users"></span>
                    </div>
                </div>
                <div class="manage-users">
                    <b class="text">Użytkownicy</b>
                    <div class="messages">
                        <?php if(isset($messages)){
                            foreach ($messages as $message) {
                                echo $message;
                            }
                        }
                        ?>
                    </div>
                    <?php foreach($users as $user): ?>
                    <div class="user">
                        <b id="email"><?= $user->getEmail(); ?></b>
                        <button id="delete-button" type="button" title="Usuń użytkownika">
                            <ion-icon name="trash-outline" size="large" title="Usuń użytkownika"></ion-icon>
                        </button>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>


</body>