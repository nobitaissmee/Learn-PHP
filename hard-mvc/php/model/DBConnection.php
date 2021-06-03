<?php

class DBConnection{
    private $host="mysql:host=localhost;dbname=hard_mvc";
    private $user="root";
    private $password="789952a@";

    public function __construct()
    {
    }

    public function connect(): PDO
    {
        return new PDO($this->host,$this->user,$this->password);
    }
}
