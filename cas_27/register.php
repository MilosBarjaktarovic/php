<?php

require_once "db.php";
require_once "User.php";

if ($_POST) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Konekcija
    $database = new Database();
    $db = $database->connect();

    // Kreiranje User objekta
    $user = new User($db);

    // Registracija
    $message = $user->register($username, $password);

    echo "<h3>$message</h3>";
    echo "<a href='index.php'>Nazad</a>";
}
