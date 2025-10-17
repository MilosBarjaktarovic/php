<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'includes/bootstrap.php';
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="index.php">Web Shop</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Glavna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products.php">Proizvodi</a>
                </li>
                <?php if(isset($_SESSION["name"])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">Korpa (<?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?>)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
