<?php
// ---------------------------------------------------
// Ovo je glavna stranica.
// Učitavamo konekciju i model, pa prikazujemo slike.
// ---------------------------------------------------

require_once "models/db.php";
require_once "models/image.php";

// Uzimamo sve slike iz baze
$images = Image::getAll($conn);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Galerija slika</title>
</head>

<body>

    <h1>Galerija slika</h1>

    <a href="upload.php">➕ Upload nove slike</a>

    <hr>

    <?php
// Ako nema slika
if ($images->num_rows == 0) {
    echo "<p>Nema slika u bazi.</p>";
} else {

    // Prikaz svake slike
    while ($row = $images->fetch_assoc()) {
        echo "<div style='margin:10px; display:inline-block;'>";
        echo "<img src='uploads/" . $row['file_name'] . "' width='200' />";
        echo "</div>";
    }
}
?>

</body>

</html>
