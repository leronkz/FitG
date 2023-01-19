<?php

class Activity
{
    private $ID_user;
    private $activity_date;
    private $ID_activity;

    public function __construct($ID_user, $activity_date,$ID_activity=null)
    {
        $this->ID_activity = $ID_activity;
        $this->ID_user = $ID_user;
        $this->activity_date = $activity_date;
    }

    public function getIDUser()
    {
        return $this->ID_user;
    }

    public function setIDUser($ID_user)
    {
        $this->ID_user = $ID_user;
    }

    public function getActivityDate()
    {
        return $this->activity_date;
    }

    public function setActivityDate($activity_date)
    {
        $this->activity_date = $activity_date;
    }

    public function getIDActivity()
    {
        return $this->ID_activity;
    }

    public function setIDActivity($ID_activity)
    {
        $this->ID_activity = $ID_activity;
    }
}