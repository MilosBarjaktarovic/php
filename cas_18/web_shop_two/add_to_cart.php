<?php
include 'includes/db.php';
session_start();
if(!isset($_SESSION['user'])) header("Location: login.php");

$id = intval($_POST['id']);
if(!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

if(!in_array($id, $_SESSION['cart'])) $_SESSION['cart'][] = $id;

header("Location: cart.php");
exit;
?>
