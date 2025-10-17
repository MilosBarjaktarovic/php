<?php include 'header.php'; ?>

<div class="container mt-5">
    <?php if(isset($_SESSION["name"])): ?>
    <h2>Pozdrav, <?= htmlspecialchars($_SESSION["name"]) ?>!</h2>
    <p>Dobrodošli u Web Shop. Pogledajte naše proizvode.</p>
    <a class="btn btn-success" href="products.php">Proizvodi</a>
    <?php else: ?>
    <h2>Dobrodošli!</h2>
    <p>Molimo vas da se prijavite da biste pristupili proizvodima.</p>
    <a class="btn btn-primary" href="login.php">Login</a>
    <?php endif; ?>
</div>
