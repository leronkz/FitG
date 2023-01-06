<?php

require 'Routing.php';


$path = trim($_SERVER['REQUEST_URI'],'/');

$path = parse_url($path,PHP_URL_PATH);

Routing::get('','DefaultController');
Routing::get('register','DefaultController');
Routing::post('login','SecurityController');
Routing::get('main','DefaultController');
//Routing::get('info','DefaultController');
Routing::get('profile','DefaultController');
//Routing::get('settings','DefaultController');
//Routing::get('diary','DefaultController');
//Routing::get('activity','DefaultController');
Routing::run($path);

?>
