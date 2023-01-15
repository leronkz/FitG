<?php

class User
{
    private $email;
    private $password;
    private $ID_user;

    public function __construct(string $email, string $password, $ID_user=null)
    {
        $this->email = $email;
        $this->password = $password;
        $this->ID_user = $ID_user;
    }

    public function getEmail(): string
    {
        return $this->email;
    }


    public function setEmail(string $email)
    {
        $this->email = $email;
    }


    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getIDUser() : int
    {
        return $this->ID_user;
    }

    public function setIDUser(int $ID_user)
    {
        $this->ID_user = $ID_user;
    }
}