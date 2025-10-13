<?php include 'header.php'; ?>

<div class="container mt-5">
    <?php if(isset($_SESSION["name"])): ?>
    <h2>Pozdrav, <?= htmlspecialchars($_SESSION["name"]) ?>!</h2>
    <p>Dobrodošli na glavnu stranicu.</p>
    <?php else: ?>
    <h2>Dobrodošli!</h2>
    <p>Molimo vas da se prijavite da biste pristupili dodatnim funkcijama.</p>
    <?php endif; ?>
</div>
