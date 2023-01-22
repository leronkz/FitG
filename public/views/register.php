<!DOCTYPE html>
<head>
    <link rel="icon" type="image/png" href="public/img/favicon.png">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/register.css">
    <script type="text/javascript" src="public/js/register-script.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <title>REGISTER PAGE</title>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img class="logo1"  src="public/img/logo_transparent.svg">
            <img class="logo2"  src="public/img/logo.svg">
        </div>
        <div class="login-container">
            <form action="createUser" method="POST" style="height:80%">
                <?php if(isset($messages)){
                    foreach ($messages as $message) {
                        echo $message;
                    }
                }
                ?>
                <b class="text">E-mail</b>
                <input id="email" name="email" type="text" placeholder="email@email.com">
                <b class="text">Hasło</b>
                <input id="password" name="password" type="password" placeholder="*********">
                <b class="text">Powtórz hasło</b>
                <input id="confirm-password" name="password2" type="password" placeholder="*********">
                <button class="register-button" type="submit" id="submitBtn">Zarejestruj się</button>
                <button onclick="location.href='login';" class="login-button" type="button">Zaloguj się</button>
             </form>
        </div>
    </div>
</body>