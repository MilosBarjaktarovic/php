<?php
session_start();
?>
<!DOCTYPE html>
<html lang="sr">

<head>
    <meta charset="UTF-8">
    <title>Web Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
        <a class="navbar-brand text-white" href="index.php">WebShop</a>
        <div class="navbar-nav ms-auto">
            <a class="nav-link text-white" href="index.php">Glavna</a>
            <?php if (isset($_SESSION['user'])): ?>
            <a class="nav-link text-white" href="cart.php">Korpa</a>
            <a class="nav-link text-white" href="logout.php">Logout</a>
            <?php else: ?>
            <a class="nav-link text-white" href="login.php">Login</a>
            <a class="nav-link text-white" href="register.php">Registracija</a>
            <?php endif; ?>
        </div>
    </nav>
    <div class="container mt-4">
