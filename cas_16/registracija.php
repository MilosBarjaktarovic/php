<?php
require_once "baza.php";
session_start();
$message = "";

if (isset($_POST['submit'])) {
    $email = trim($_POST['email']);
    $sifra = trim($_POST['sifra']);

    $stmt = $baza->prepare("SELECT * FROM korisnici WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $rezultat = $stmt->get_result();

    if ($rezultat->num_rows > 0) {
        $message = "❌ Korisnik već postoji!";
    } else {
        $hash_sifra = password_hash($sifra, PASSWORD_DEFAULT);
        $stmt2 = $baza->prepare("INSERT INTO korisnici (email, sifra) VALUES (?, ?)");
        $stmt2->bind_param("ss", $email, $hash_sifra);
        if ($stmt2->execute()) {
            $message = "✅ Registracija uspešna! <a href='index.php'>Prijavi se</a>";
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
    <div class="container">
        <h2>Registracija</h2>
        <form method="POST" action="">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="sifra" placeholder="Šifra" required>
            <button type="submit" name="submit">Registruj se</button>
            <p><?= $message ?></p>
        </form>
    </div>
</body>

</html>
