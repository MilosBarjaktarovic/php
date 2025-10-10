<?php
require_once "baza.php";
session_start();

// Prikaz greške logina ako postoji
$login_error = $_SESSION['login_error'] ?? '';
unset($_SESSION['login_error']);

// Dohvati sve proizvode
$rezultat = $baza->query("SELECT * FROM proizvodi");
$proizvodi = $rezultat->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="sr">

<head>
    <meta charset="UTF-8">
    <title>Proizvodi</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <?php if (isset($_SESSION['user'])): ?>
        <p>Ulogovani ste kao: <?= htmlspecialchars($_SESSION['user']) ?> | <a href="logout.php">Odjavi se</a></p>
        <?php else: ?>
        <form action="loginUser.php" method="post">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="sifra" placeholder="Šifra" required>
            <button type="submit" name="login">Uloguj se</button>
        </form>
        <p><?= $login_error ?></p>
        <p><a href="registracija.php">Registracija</a></p>
        <?php endif; ?>

        <h1>Lista proizvoda</h1>
        <?php foreach ($proizvodi as $p): ?>
        <div class="proizvod">
            <h2><?= $p['ime'] ?></h2>
            <p><?= $p['opis'] ?></p>
            <p>Cena: <?= $p['cena'] ?> | Na stanju: <?= $p['kolicina'] ?></p>
            <a href="proizvod.php?id=<?= $p['id'] ?>">Pogledaj proizvod</a>
        </div>
        <?php endforeach; ?>
    </div>
</body>

</html>
