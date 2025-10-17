<?php include 'header.php'; ?>

<div class="container mt-5">
    <h3>Login</h3>
    <form action="login_logic.php" method="POST" class="mt-3">
        <div class="mb-3">
            <input type="text" name="name" class="form-control" placeholder="Unesite ime" required>
        </div>
        <button class="btn btn-primary">Prijavi me</button>
    </form>
</div>
