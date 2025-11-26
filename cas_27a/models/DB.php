<?php

class DB {
    public $db;

    public function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname=php27", "root", "");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
