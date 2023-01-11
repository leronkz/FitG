<?php
use function CommonMark\Render;

require_once 'AppController.php';

class DefaultController extends AppController{

    public function login(){
        $this->render('login');
    }
    public function register(){
        $this->render('register');
    }
    public function main(){
        $this->render('main');
    }
    public function info(){
        $this->render('info');
    }
    public function settings(){
        $this->render('settings');
    }

    public function activity(){
        $this->render('activity');
    }
    public function diary(){
        $this->render('diary');
    }
}