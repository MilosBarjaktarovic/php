<?php
include "baza.php";
session_start();

// Ako korisnik nije ulogovan, preusmeri ga na login
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>



<?php include "baza.php"; ?>

<h2>Pretraga proizvoda</h2>
<form method="GET">
    <input type="text" name="q" placeholder="Pretraži po nazivu ili opisu">
    <button type="submit">Pretraži</button>
</form>

<a href="dodaj.php">➕ Dodaj proizvod</a>

<?php
$q = isset($_GET['q']) ? trim($_GET['q']) : '';
if ($q) {
    $sql = "SELECT * FROM proizvodi WHERE ime LIKE '%$q%' OR opis LIKE '%$q%'";
} else {
    $sql = "SELECT * FROM proizvodi";
}

$result = mysqli_query($conn, $sql);

echo "<ul>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<li><a href='proizvod.php?id={$row['id']}'>" . htmlspecialchars($row['ime']) . "</a></li>";
}
echo "</ul>";
?>
