<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Activity.php';

class ActivityRepository extends Repository
{
    public function getActivity(string $date){
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM public.activities WHERE activity_date = :date');

        $stmt->bindParam(':date',$date,PDO::PARAM_STR);
        $stmt->execute();
        $activity = $stmt->fetch(PDO::FETCH_ASSOC);

        if($activity == false){
            return null;
        }
    }

    public function addActivity(Activity $activity){

    }
}