<?php

require_once __DIR__.'/../../Database.php';

class Repository
{
    protected $database;
//    zrobic singleton
    public function __construct()
    {
        $this->database = new Database();
    }
}