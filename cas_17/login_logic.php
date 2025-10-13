<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_POST['name']) || empty($_POST['name'])) {
    die("Niste uneli ime.");
}

$_SESSION["name"] = $_POST["name"];
header("Location: index.php");
exit;
