<?php
include "baza.php";
session_start();

if (!isset($_SESSION['user'])) {
    die("Morate biti prijavljeni. <a href='login.php'>Prijava</a>");
}
?>

<form method="POST">
    <h2>Dodaj proizvod</h2>
    <input type="text" name="ime" placeholder="Naziv proizvoda" required>
    <input type="text" name="opis" placeholder="Opis proizvoda" required>
    <button type="submit" name="dodaj">Sačuvaj</button>
</form>

<?php
if (isset($_POST['dodaj'])) {
    $ime = trim($_POST['ime']);
    $opis = trim($_POST['opis']);

    $check = mysqli_query($conn, "SELECT * FROM proizvodi WHERE ime='$ime'");
    if (mysqli_num_rows($check) > 0) {
        echo "❌ Proizvod već postoji!";
    } else {
        mysqli_query($conn, "INSERT INTO proizvodi (ime, opis) VALUES ('$ime', '$opis')");
        echo "✅ Proizvod dodat!";
    }
}
?>
