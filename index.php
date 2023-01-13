<?php

require 'Routing.php';


$path = trim($_SERVER['REQUEST_URI'],'/');

$path = parse_url($path,PHP_URL_PATH);

Routing::get('','DefaultController');
Routing::get('register','DefaultController');
Routing::get('profile','ProfileController');
Routing::get('diary','DefaultController');
Routing::get('main','DefaultController');
Routing::get('activity','DefaultController');

Routing::post('login','SecurityController');
Routing::post('setUserData','ProfileController');
Routing::post('show','ActivityController');
Routing::post('createUser','ProfileController');

Routing::run($path);
?>
