<?php include 'header.php'; ?>

<div class="container mt-5">
    <h3>Prijava korisnika</h3>
    <form action="login_logic.php" method="POST" class="mt-3">
        <div class="mb-3">
            <input type="text" name="name" class="form-control" placeholder="Unesite ime" required>
        </div>
        <button class="btn btn-primary">Zapamti me</button>
    </form>
</div>
