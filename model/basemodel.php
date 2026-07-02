<?php

require_once "../config/Database.php";

abstract class BaseModel
{
    protected $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    abstract public function tampilData();
}