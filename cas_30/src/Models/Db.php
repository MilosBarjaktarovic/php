<?php
namespace PHP28\Models;

use PDO;
use PDOException;

class Db {
    protected $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=php27;charset=utf8", "root", "");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("Greška sa bazom: " . $e->getMessage());
        }
    }
}
