<?php
require_once "baza.php";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Fali ID proizvoda!");
}

$idProizvoda = (int)$_GET['id'];

$stmt = $baza->prepare("SELECT * FROM proizvodi WHERE id=?");
$stmt->bind_param("i", $idProizvoda);
$stmt->execute();
$rezultat = $stmt->get_result();

if ($rezultat->num_rows == 0) {
    die("Ovaj proizvod ne postoji!");
}

$proizvod = $rezultat->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="sr">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($proizvod['ime']) ?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1><?= $proizvod['ime'] ?></h1>
        <p><?= $proizvod['opis'] ?></p>
        <p>Cena: <?= $proizvod['cena'] ?></p>
        <p><?= $proizvod['kolicina'] == 0 ? "Nema na stanju" : "Ima na stanju" ?></p>
        <a href="index.php">← Nazad na proizvode</a>
    </div>
</body>

</html>
