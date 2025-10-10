<?php
require_once "baza.php";
session_start();

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $sifra = $_POST['sifra'];

    $stmt = $baza->prepare("SELECT * FROM korisnici WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $rezultat = $stmt->get_result();
    $korisnik = $rezultat->fetch_assoc();

    if ($korisnik && password_verify($sifra, $korisnik['sifra'])) {
        $_SESSION['user'] = $korisnik['email'];
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['login_error'] = "❌ Pogrešan email ili šifra!";
        header("Location: index.php");
        exit();
    }
}
?>
