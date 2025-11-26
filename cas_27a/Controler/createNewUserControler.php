<?php

require_once "../models/User.php";

if (!isset($_POST['username']) || !isset($_POST['password'])) {
    die("Niste uneli sve podatke");
}

$user = new User();

if ($user->userExists($_POST['username'])) {
    die("Korisnik sa tim imenom već postoji u bazi");
}

$user->create($_POST['username'], $_POST['password']);

echo "Uspešna registracija!";
