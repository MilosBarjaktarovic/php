<?php

require_once "vendor/autoload.php";

use PHP28\Controller\UserController;

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


if(session_status() === PHP_SESSION_NONE){
    session_start();
}


if(isset($_POST['register'])) {
    $userController = new UserController();
    $userController->register($_POST);
}

if(isset($_POST['login'])) {
$userController = new UserController();
$userController->login($_POST);
}
