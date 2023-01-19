<?php

class UserProfile implements JsonSerializable
{
    private $image;
    private $name;
    private $surname;
    private $sex;
    private $birth_date;
    private $height;
    private $weight;
    private $ID_user;

    public function __construct($image, $name, $surname, $sex, $birth_date, $height, $weight, $ID_user)
    {
        $this->image = $image;
        $this->name = $name;
        $this->surname = $surname;
        $this->sex = $sex;
        $this->birth_date = $birth_date;
        $this->height = $height;
        $this->weight = $weight;
        $this->ID_user = $ID_user;
    }


    public function getImage()
    {
        if(is_null($this->image))
            return 'profile_picture.svg';
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    public function getSex()
    {
        return $this->sex;
    }

    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    public function getBirthDate()
    {
        return $this->birth_date;
    }

    public function setBirthDate($birth_date)
    {
        $this->birth_date = $birth_date;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }
    public function getIDUser()
    {
        return $this->ID_user;
    }

    public function setIDUser($ID_user)
    {
        $this->ID_user = $ID_user;
    }

    public function jsonSerialize()
    {
       return array(
           'image'=>$this->image,
           'name'=>$this->name,
           'surname'=>$this->surname,
           'sex'=>$this->sex,
           'birth_date'=>$this->birth_date,
           'height'=>$this->height,
           'weight'=>$this->weight,
           'ID_user'=>$this->ID_user
       );
    }
}