<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Activity.php';
require_once __DIR__.'/../models/Exercise.php';
class ActivityRepository extends Repository
{
    public function getActivityByDate(int $ID_user,string $date){
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM activities WHERE "ID_user"=:ID_user AND activity_date=:date
        ');
        $stmt->bindParam(":ID_user",$ID_user,PDO::PARAM_INT);
        $stmt->bindParam(":date",$date,PDO::PARAM_STR);
        $stmt->execute();
        $activity = $stmt->fetch(PDO::FETCH_ASSOC);
        if($activity == false)
            return null;
        return new Activity(
            $activity['ID_user'],
            $activity['activity_date'],
            $activity['ID_activity']
        );
    }
    public function getActivity(int $ID_user,string $date){
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM exercises LEFT OUTER JOIN public.activities a on exercises."ID_activity" = a."ID_activity"
        WHERE a."ID_user"=:ID_user AND a.activity_date=:date
        ');
        $stmt->bindParam(":ID_user", $ID_user,PDO::PARAM_INT);
        $stmt->bindParam(":date", $date,PDO::PARAM_STR);
        $stmt->execute();
        $activity = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($activity == false)
            return null;
        return $activity;
    }
    public function isAddedActivity(Activity $activity){
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM public.activities WHERE "ID_user"=:ID_user AND activity_date=:date
        ');
        $IDUser = $activity->getIDUser();
        $stmt->bindParam(":ID_user", $IDUser,PDO::PARAM_INT);
        $activityDate = $activity->getActivityDate();
        $stmt->bindParam(":date", $activityDate,PDO::PARAM_STR);
        $stmt->execute();
        $act = $stmt->fetch(PDO::FETCH_ASSOC);
        if($act == false){
            return false;
        }
        return true;
    }
    public function addActivity(Activity $activity){
        if(!$this->isAddedActivity($activity)) {
            $stmt = $this->database->connect()->prepare('
            INSERT INTO public.activities("ID_user", activity_date) 
            VALUES(?,?)
            ');
            $stmt->execute([
                $activity->getIDUser(),
                $activity->getActivityDate()
            ]);
        }
    }
    public function addExercise(Exercise $exercise){
        $stmt = $this->database->connect()->prepare('
        INSERT INTO public.exercises(exercise_name, number_of_series, s_weight1,s_reps1,s_weight2,s_reps2,s_weight3,s_reps3,s_weight4,s_reps4,s_weight5,s_reps5,s_weight6,s_reps6,"ID_activity") 
        VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
        ');
        $stmt->execute([
            $exercise->getExerciseName(),
            $exercise->getNumOfSeries(),
            $exercise->getSWeight1(),
            $exercise->getSReps1(),
            $exercise->getSWeight2(),
            $exercise->getSReps2(),
            $exercise->getSWeight3(),
            $exercise->getSReps3(),
            $exercise->getSWeight4(),
            $exercise->getSReps4(),
            $exercise->getSWeight5(),
            $exercise->getSReps5(),
            $exercise->getSWeight6(),
            $exercise->getSReps6(),
            $exercise->getIDActivity()
        ]);
    }
}