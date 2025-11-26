<?php

namespace PHP28\controllers;

use PHP28\models\Db;
use PHP28\models\User;
use PDO;

class UserController
{
    public function create($name, $password)
    {
        $db = Db::getConnection();

        $sql = "INSERT INTO users (username, password) VALUES (:name, :password)";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':password', $password);

        return $stmt->execute();
    }
}
