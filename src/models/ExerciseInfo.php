<?php

class ExerciseInfo
{
    private $ID_exercise;
    private $s_weight1;
    private $s_reps1;
    private $s_weight2;
    private $s_reps2;
    private $s_weight3;
    private $s_reps3;
    private $s_weight4;
    private $s_reps4;
    private $s_weight5;
    private $s_reps5;
    private $s_weight6;
    private $s_reps6;

    public function __construct($ID_exercise, $s_weight1, $s_reps1, $s_weight2, $s_reps2, $s_weight3, $s_reps3, $s_weight4, $s_reps4, $s_weight5, $s_reps5, $s_weight6, $s_reps6)
    {
        $this->ID_exercise = $ID_exercise;
        $this->s_weight1 = $s_weight1;
        $this->s_reps1 = $s_reps1;
        $this->s_weight2 = $s_weight2;
        $this->s_reps2 = $s_reps2;
        $this->s_weight3 = $s_weight3;
        $this->s_reps3 = $s_reps3;
        $this->s_weight4 = $s_weight4;
        $this->s_reps4 = $s_reps4;
        $this->s_weight5 = $s_weight5;
        $this->s_reps5 = $s_reps5;
        $this->s_weight6 = $s_weight6;
        $this->s_reps6 = $s_reps6;
    }

    public function getIDExercise()
    {
        return $this->ID_exercise;
    }

    public function setIDExercise($ID_exercise)
    {
        $this->ID_exercise = $ID_exercise;
    }

    public function getSWeight1()
    {
        return $this->s_weight1;
    }

    public function setSWeight1($s_weight1)
    {
        $this->s_weight1 = $s_weight1;
    }

    public function getSReps1()
    {
        return $this->s_reps1;
    }

    public function setSReps1($s_reps1)
    {
        $this->s_reps1 = $s_reps1;
    }

    public function getSWeight2()
    {
        return $this->s_weight2;
    }

    public function setSWeight2($s_weight2)
    {
        $this->s_weight2 = $s_weight2;
    }

    public function getSReps2()
    {
        return $this->s_reps2;
    }

    public function setSReps2($s_reps2)
    {
        $this->s_reps2 = $s_reps2;
    }

    public function getSWeight3()
    {
        return $this->s_weight3;
    }

    public function setSWeight3($s_weight3)
    {
        $this->s_weight3 = $s_weight3;
    }

    public function getSReps3()
    {
        return $this->s_reps3;
    }

    public function setSReps3($s_reps3)
    {
        $this->s_reps3 = $s_reps3;
    }

    public function getSWeight4()
    {
        return $this->s_weight4;
    }

    public function setSWeight4($s_weight4)
    {
        $this->s_weight4 = $s_weight4;
    }

    public function getSReps4()
    {
        return $this->s_reps4;
    }

    public function setSReps4($s_reps4)
    {
        $this->s_reps4 = $s_reps4;
    }

    public function getSWeight5()
    {
        return $this->s_weight5;
    }

    public function setSWeight5($s_weight5)
    {
        $this->s_weight5 = $s_weight5;
    }

    public function getSReps5()
    {
        return $this->s_reps5;
    }

    public function setSReps5($s_reps5)
    {
        $this->s_reps5 = $s_reps5;
    }

    public function getSWeight6()
    {
        return $this->s_weight6;
    }

    public function setSWeight6($s_weight6)
    {
        $this->s_weight6 = $s_weight6;
    }

    public function getSReps6()
    {
        return $this->s_reps6;
    }

    public function setSReps6($s_reps6)
    {
        $this->s_reps6 = $s_reps6;
    }


}