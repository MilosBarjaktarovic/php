<?php

require_once 'DB.php';

class User extends DB {
    
    public function userExists(string $username): bool
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :name");
        $stmt->bindParam(":name", $username);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }

    public function create(string $username, string $password): void
    {
        $stmt = $this->db->prepare("INSERT INTO users (username, password) VALUES (:name, :password)");
        $stmt->bindParam(":name", $username);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
    }
}
