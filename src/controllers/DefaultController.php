<?php

require_once 'AppController.php';

class DefaultController extends AppController{

    public function login(){
        $this->render('login');
    }
    public function register(){
        $this->render('register');
    }
    public function main(){
        try {
            if (!isset($_COOKIE['ID_user'])) {
                throw new Exception("No user");
            }
            $this->render('main');
        }catch (Exception $ex){
            $this->render('login',['messages'=>['Aby przejść dalej musisz się zalogować']]);
        }
    }
    public function info(){
        try {
            if (!isset($_COOKIE['ID_user'])) {
                throw new Exception("No user");
            }
            $this->render('info');
        }catch (Exception $ex){
            $this->render('login',['messages'=>['Aby przejść dalej musisz się zalogować']]);
        }
    }
    public function settings(){
        try {
            if (!isset($_COOKIE['ID_user'])) {
                throw new Exception("No user");
            }
            $this->render('settings');
        }catch (Exception $ex){
            $this->render('login',['messages'=>['Aby przejść dalej musisz się zalogować']]);
        }
    }

    public function activity(){
        try {
            if (!isset($_COOKIE['ID_user'])) {
                throw new Exception("No user");
            }
            $this->render('activity');
        }catch (Exception $ex){
            $this->render('login',['messages'=>['Aby przejść dalej musisz się zalogować']]);
        }
    }
    public function diary(){
        try {
            if (!isset($_COOKIE['ID_user'])) {
                throw new Exception("No user");
            }
            $this->render('diary');
        }catch (Exception $ex){
            $this->render('login',['messages'=>['Aby przejść dalej musisz się zalogować']]);
        }
    }
}