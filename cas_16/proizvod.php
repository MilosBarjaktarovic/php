<?php
include "baza.php";

$id = $_GET['id'] ?? null;
if (!$id) {
    die("Proizvod nije pronađen!");
}

$result = mysqli_query($conn, "SELECT * FROM proizvodi WHERE id=$id");
$proizvod = mysqli_fetch_assoc($result);

if (!$proizvod) {
    die("Proizvod ne postoji!");
}
?>

<h2><?php echo htmlspecialchars($proizvod['ime']); ?></h2>
<p><?php echo htmlspecialchars($proizvod['opis']); ?></p>
<a href="index.php">⬅ Nazad</a>
