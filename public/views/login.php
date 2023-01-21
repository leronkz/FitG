<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <title>LOGIN PAGE</title>

</head>
<body>
    <div class="container">
        <div class="logo">
            <img class="logo1"  src="public/img/logo_transparent.svg">
            <img class="logo2"  src="public/img/logo.svg">
        </div>
        <div class="login-container">
            <form action="login" method="POST">
                <div class="messages">
                    <?php if(isset($messages)){
                        foreach ($messages as $message) {
                            echo $message;
                        }
                    }
                   ?>
                </div>
                <b class="text">E-mail</b>
                <input name="email" type="text" placeholder="email@email.com">
                <b class="text">Password</b>
                <input name="password" type="password" placeholder="*********">
                <button class="login-button" type="submit">Login</button>
                <a href="register"><button class="register-button" type="button">Sign up</button></a>
             </form>
        </div>
    </div>
</body>