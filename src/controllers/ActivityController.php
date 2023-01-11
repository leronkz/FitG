<?php

require_once 'AppController.php';

class ActivityController extends AppController
{
    public function show(){

        if(!$this->isPost()){
            return $this->render('diary');
        }
        $date = $_POST['activity-date'];

    }
}