<?php
use PHP28\Controller\UserController;

require_once "vendor/autoload.php";

$controller = new UserController();

if(isset($_POST['register'])) {
    echo $controller->register($_POST);
}

if(isset($_POST['login'])) {
    echo $controller->login($_POST);
}
