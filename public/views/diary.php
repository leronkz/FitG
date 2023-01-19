<!DOCTYPE html>

<head>

    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/main.css">
    <link rel="stylesheet" type="text/css" href="public/css/diary.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/7fd64f3cef.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <script src="public/js/nav-script.js" defer></script>
    <title>ACTIVITY DIARY</title>

</head>

<body>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <div class="container">
        <nav class="nav">
            <button type="button" class="nav-close">
                <ion-icon name="close-outline" size="large"></ion-icon>
            </button>
            <div class="profile-picture">
                <div class="picture" id="prof-picture" style="background-image:url('public/uploads/profile_picture.svg')"></div>
                <b class="text" id="name-text"></b>
            </div>
            <div class="nav-links-container">
                <a href="profile" class="nav-link">
                    <span class="nav-text">Profil</span>
                    <ion-icon name="person-outline" size="large"></ion-icon>
                </a>
                <a href="#" class="nav-link">
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
                <a href="admin" class="nav-link" id="admin">
                    <span class="nav-text">Panel administratora</span>
                    <ion-icon name="key-outline" size="large"></ion-icon>
                </a>
                <a href="logout" class="nav-link">
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
               <b class="main-text">Dziennik aktywności</b>
           </header>
           <div class="activity-panel">
               <form action="show" class="search-form" method="POST">
                <div class="search-date">
                    <b class="text">Wybierz datę:</b>
                    <input type="date" id="activity-date" name="activity-date">
                    <button name="search-activity" class="button" type="submit">
                        <ion-icon name="search-outline" size="large"></ion-icon>
                    </button>
                </div>
               </form>
                <div class="show-activity">
                    <div class="activity">
                        <b class="text">Wyciskanie na ławce płaskiej 5 serii</b>
                        <table>
                            <tr>
                                <th>Seria</th>
                                <th>Ciężar</th>
                                <th>Ilość pow.</th>
                            </tr>
                            <tr>
                                <td>1 seria</td>
                                <td>70 kg</td>
                                <td>15</td>
                            </tr>
                            <tr>
                                <td>2 seria</td>
                                <td>80 kg</td>
                                <td>12</td>
                            </tr>
                            <tr>
                                <td>3 seria</td>
                                <td>85 kg</td>
                                <td>12</td>
                            </tr>
                            <tr>
                                <td>4 seria</td>
                                <td>90 kg</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td>5 seria</td>
                                <td>95 kg</td>
                                <td>7</td>
                            </tr>
                        </table>
                    </div>
                    <div class="activity">
                        <b class="text">Wyciskanie na ławce płaskiej 5 serii</b>
                        <table>
                            <tr>
                                <th>Seria</th>
                                <th>Ciężar</th>
                                <th>Ilość pow.</th>
                            </tr>
                            <tr>
                                <td>1 seria</td>
                                <td>70 kg</td>
                                <td>15</td>
                            </tr>
                            <tr>
                                <td>2 seria</td>
                                <td>80 kg</td>
                                <td>12</td>
                            </tr>
                            <tr>
                                <td>3 seria</td>
                                <td>85 kg</td>
                                <td>12</td>
                            </tr>
                            <tr>
                                <td>4 seria</td>
                                <td>90 kg</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td>5 seria</td>
                                <td>95 kg</td>
                                <td>7</td>
                            </tr>
                        </table>
                    </div>
                    <div class="activity">
                        <b class="text">Wyciskanie na ławce płaskiej 5 serii</b>
                        <table>
                            <tr>
                                <th>Seria</th>
                                <th>Ciężar</th>
                                <th>Ilość pow.</th>
                            </tr>
                            <tr>
                                <td>1 seria</td>
                                <td>70 kg</td>
                                <td>15</td>
                            </tr>
                            <tr>
                                <td>2 seria</td>
                                <td>80 kg</td>
                                <td>12</td>
                            </tr>
                            <tr>
                                <td>3 seria</td>
                                <td>85 kg</td>
                                <td>12</td>
                            </tr>
                            <tr>
                                <td>4 seria</td>
                                <td>90 kg</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td>5 seria</td>
                                <td>95 kg</td>
                                <td>7</td>
                            </tr>
                        </table>
                    </div>
                    <div class="activity">
                        <b class="text">Wyciskanie na ławce płaskiej 5 serii</b>
                        <table>
                            <tr>
                                <th>Seria</th>
                                <th>Ciężar</th>
                                <th>Ilość pow.</th>
                            </tr>
                            <tr>
                                <td>1 seria</td>
                                <td>70 kg</td>
                                <td>15</td>
                            </tr>
                            <tr>
                                <td>2 seria</td>
                                <td>80 kg</td>
                                <td>12</td>
                            </tr>
                            <tr>
                                <td>3 seria</td>
                                <td>85 kg</td>
                                <td>12</td>
                            </tr>
                            <tr>
                                <td>4 seria</td>
                                <td>90 kg</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td>5 seria</td>
                                <td>95 kg</td>
                                <td>7</td>
                            </tr>
                        </table>
                    </div>
                    <div class="activity">
                        <b class="text">Wyciskanie na ławce płaskiej 5 serii</b>
                        <table>
                            <tr>
                                <th>Seria</th>
                                <th>Ciężar</th>
                                <th>Ilość pow.</th>
                            </tr>
                            <tr>
                                <td>1 seria</td>
                                <td>70 kg</td>
                                <td>15</td>
                            </tr>
                            <tr>
                                <td>2 seria</td>
                                <td>80 kg</td>
                                <td>12</td>
                            </tr>
                            <tr>
                                <td>3 seria</td>
                                <td>85 kg</td>
                                <td>12</td>
                            </tr>
                            <tr>
                                <td>4 seria</td>
                                <td>90 kg</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td>5 seria</td>
                                <td>95 kg</td>
                                <td>7</td>
                            </tr>
                        </table>
                    </div>
                    <div class="activity">
                        <b class="text">Wyciskanie na ławce płaskiej 5 serii</b>
                        <table>
                            <tr>
                                <th>Seria</th>
                                <th>Ciężar</th>
                                <th>Ilość pow.</th>
                            </tr>
                            <tr>
                                <td>1 seria</td>
                                <td>70 kg</td>
                                <td>15</td>
                            </tr>
                            <tr>
                                <td>2 seria</td>
                                <td>80 kg</td>
                                <td>12</td>
                            </tr>
                            <tr>
                                <td>3 seria</td>
                                <td>85 kg</td>
                                <td>12</td>
                            </tr>
                            <tr>
                                <td>4 seria</td>
                                <td>90 kg</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td>5 seria</td>
                                <td>95 kg</td>
                                <td>7</td>
                            </tr>
                        </table>
                    </div>
                    <div class="activity">
                        <b class="text">Wyciskanie na ławce płaskiej 5 serii</b>
                        <table>
                            <tr>
                                <th>Seria</th>
                                <th>Ciężar</th>
                                <th>Ilość pow.</th>
                            </tr>
                            <tr>
                                <td>1 seria</td>
                                <td>70 kg</td>
                                <td>15</td>
                            </tr>
                            <tr>
                                <td>2 seria</td>
                                <td>80 kg</td>
                                <td>12</td>
                            </tr>
                            <tr>
                                <td>3 seria</td>
                                <td>85 kg</td>
                                <td>12</td>
                            </tr>
                            <tr>
                                <td>4 seria</td>
                                <td>90 kg</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td>5 seria</td>
                                <td>95 kg</td>
                                <td>7</td>
                            </tr>
                        </table>
                    </div>
                    <div class="activity">
                        <b class="text">Wyciskanie na ławce płaskiej hantlami 4 serie</b>
                        <table>
                            <tr>
                                <th>Seria</th>
                                <th>Ciężar</th>
                                <th>Ilość pow.</th>
                            </tr>
                            <tr>
                                <td>1 seria</td>
                                <td>70 kg</td>
                                <td>15</td>
                            </tr>
                            <tr>
                                <td>2 seria</td>
                                <td>80 kg</td>
                                <td>12</td>
                            </tr>
                            <tr>
                                <td>3 seria</td>
                                <td>85 kg</td>
                                <td>12</td>
                            </tr>
                            <tr>
                                <td>4 seria</td>
                                <td>90 kg</td>
                                <td>10</td>
                            </tr>
                        </table>
                    </div>
                </div>
           </div>
        </div>
    </div>
</body>