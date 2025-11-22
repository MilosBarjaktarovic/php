<?php

class User {
    private $conn;
    private $table = "users";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Provera da li username postoji
    public function userExists($username) {
        $query = "SELECT * FROM {$this->table} WHERE username = :username LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':username' => $username]);

        return $stmt->rowCount() > 0;
    }

    // Upis korisnika
    public function register($username, $password) {

        if ($this->userExists($username)) {
            return "Korisnik već postoji!";
        }

        $query = "INSERT INTO {$this->table} (username, password) VALUES (:username, :password)";
        $stmt = $this->conn->prepare($query);

        $stmt->execute([
            ':username' => $username,
            ':password' => $password
        ]);

        return "Uspešno dodat korisnik!";
    }
}
