<?php

class ActivityInfo
{
    private $ID_activity;
    private $ID_exercise;
    private $ID_activity_info;

    public function __construct($ID_activity, $ID_exercise, $ID_activity_info=null)
    {
        $this->ID_activity = $ID_activity;
        $this->ID_exercise = $ID_exercise;
        $this->ID_activity_info = $ID_activity_info;
    }

    public function getIDActivity()
    {
        return $this->ID_activity;
    }

    public function setIDActivity($ID_activity)
    {
        $this->ID_activity = $ID_activity;
    }

    public function getIDExercise()
    {
        return $this->ID_exercise;
    }

    public function setIDExercise($ID_exercise)
    {
        $this->ID_exercise = $ID_exercise;
    }

    public function getIDActivityInfo()
    {
        return $this->ID_activity_info;
    }

    public function setIDActivityInfo($ID_activity_info)
    {
        $this->ID_activity_info = $ID_activity_info;
    }


}