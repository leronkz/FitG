<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Exercise.php';
require_once __DIR__ . '/../models/Activity.php';
require_once __DIR__ . '/../models/ActivityInfo.php';
require_once __DIR__.'/../repository/ActivityRepository.php';

class ActivityController extends AppController
{
    private $activityRepository;
    public function __construct()
    {
        parent::__construct();
        $this->activityRepository = new ActivityRepository();
    }
    public function showTraining(){
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
        if($contentType==="application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);
            header('Content-type: application/json');
            http_response_code(200);
            echo json_encode($this->activityRepository->getActivity($_COOKIE['ID_user'],$decoded['date']));
        }
    }
//   activity.php do przesylania treningu
    public function sendData(){
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if($contentType==="application/json"){
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content,true);
//            var_dump($decoded);
//            $this->createTraining($decoded);
//            $url = "http://$_SERVER[HTTP_HOST]";
//            header("Location: {$url}/main");
        }
    }

    public function createTraining($decoded){

        $activity = new Activity($_COOKIE['ID_user'],$decoded["date"]);
        $this->activityRepository->addActivity($activity);
        $activity = $this->activityRepository->getActivity($_COOKIE['ID_user'],$decoded["date"]);
        $number_of_exercises = count($decoded);
        $exercises = [];
        for($i=0; $i<$number_of_exercises; $i++){
            $n = "exercise".$i;
            $number_of_series = count(($decoded[$n])-1)/3;
            $s_weight2=$s_reps2=$s_weight3=$s_reps3=$s_weight4=$s_reps4=$s_weight5=$s_reps5=$s_weight6=$s_reps6 = null;

            $s_weight1 = floatval($decoded[$n][2]);
            $s_reps1 = intval($decoded[$n][3]);

            if($number_of_series>=2){
                $s_weight2 = floatval($decoded[$n][5]);
                $s_reps2 = intval($decoded[$n][6]);
            }
            if($number_of_series>=3){
                $s_weight3 = floatval($decoded[$n][8]);
                $s_reps3 = intval($decoded[$n][9]);
            }
            if($number_of_series>=4){
                $s_weight4 = floatval($decoded[$n][11]);
                $s_reps4 = intval($decoded[$n][12]);
            }
            if($number_of_series>=5){
                $s_weight5 = floatval($decoded[$n][14]);
                $s_reps5 = intval($decoded[$n][15]);
            }
            if($number_of_series>=6){
                $s_weight6 = floatval($decoded[$n][17]);
                $s_reps6 = intval($decoded[$n][18]);
            }
            $exercises[] = new Exercise($decoded[$n][0],$number_of_series,$s_weight1,$s_reps1,$s_weight2,$s_reps2,$s_weight3,$s_reps3,$s_weight4,$s_reps4,$s_weight5,$s_reps5,$s_weight6,$s_reps6,$activity->getIDActivity());
        }
        foreach ($exercises as $exercise){
            $this->activityRepository->addExercise($exercise);
        }
    }
}