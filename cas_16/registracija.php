<?php
include "baza.php";
session_start();

$message = "";

if (isset($_POST['submit'])) {
    $email = trim($_POST['email']);
    $sifra = trim($_POST['sifra']);

    // Proveri da li već postoji korisnik
    $provera = mysqli_prepare($conn, "SELECT * FROM korisnici WHERE email=?");
    mysqli_stmt_bind_param($provera, "s", $email);
    mysqli_stmt_execute($provera);
    $rezultat = mysqli_stmt_get_result($provera);

    if (mysqli_num_rows($rezultat) > 0) {
        $message = "❌ Korisnik sa ovim email-om već postoji!";
    } else {
        // Šifrovanje lozinke
        $hash_sifra = password_hash($sifra, PASSWORD_DEFAULT);

        // Ubacivanje novog korisnika
        $stmt = mysqli_prepare($conn, "INSERT INTO korisnici (email, sifra) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, "ss", $email, $hash_sifra);
        if (mysqli_stmt_execute($stmt)) {
            $message = "✅ Registracija uspešna! <a href='login.php'>Prijavi se</a>";
        } else {
            $message = "Greška pri registraciji!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="sr">

<head>
    <meta charset="UTF-8">
    <title>Registracija</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <p>Ulogovani ste kao: <?= htmlspecialchars($_SESSION['user']) ?></p>
    <a href="logout.php">Odjavi se</a>

    <div class="container">
        <form method="POST" action="">
            <h2>Registracija</h2>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="sifra" placeholder="Šifra" required>
            <button type="submit" name="submit">Registruj se</button>
            <p><?= $message ?></p>
        </form>
    </div>
</body>

</html>
