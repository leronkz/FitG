<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/SessionRepository.php';
class SecurityController extends AppController
{
    public function login(){

        $url = "http://$_SERVER[HTTP_HOST]";

        if(isset($_COOKIE["ID_user"])) {
            header("Location: {$url}/main");
            return;
        }

        $userRepository = new UserRepository();
        $sessionRepository = new SessionRepository();
        if(!$this->isPost()){
            return $this->login('login');
        }

        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = $userRepository->getUserByEmail($email);

        if(!$user){
            return $this->render('login',['messages'=> ['User not found!']]);
        }

        if($user->getEmail() !==$email){
            return $this->render('login',['messages'=> ['User with this email not exist!']]);
        }
        if(!password_verify($password,$user->getPassword())){
            return $this->render('login',['messages'=> ['Wrong password']]);
        }

        $user_cookie = 'ID_user';
        $cookie_value = $user->getIDUser();
        setcookie($user_cookie,$cookie_value, time()+(60*30),"/");
        $sessionRepository->addSession($user->getIDUser());

        return $this->render('main');
    }
    public function logout(){
        $sessionRepository = new SessionRepository();
        $sessionRepository->updateSession($_COOKIE["ID_user"]);

        setcookie('ID_user', $_COOKIE['ID_user'], time() - 10, "/");

        return $this->render('login');
    }
}