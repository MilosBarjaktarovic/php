<?php
include "baza.php";
session_start();

$message = "";

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $sifra = $_POST['sifra'];

    // Preuzmi korisnika iz baze
    $stmt = mysqli_prepare($conn, "SELECT * FROM korisnici WHERE email=?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $rezultat = mysqli_stmt_get_result($stmt);
    $korisnik = mysqli_fetch_assoc($rezultat);

    if ($korisnik && password_verify($sifra, $korisnik['sifra'])) {
        $_SESSION['user'] = $korisnik['email'];
        header("Location: index.php"); // prebacuje na index nakon uspešnog logina
        exit();
    } else {
        $message = "❌ Pogrešan email ili šifra!";
    }
}
?>

<!DOCTYPE html>
<html lang="sr">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <form method="POST" action="">
            <h2>Prijava</h2>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="sifra" placeholder="Šifra" required>
            <button type="submit" name="login">Uloguj se</button>
            <p><?= $message ?></p>
        </form>
    </div>
</body>

</html>
