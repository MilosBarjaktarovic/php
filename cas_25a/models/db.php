<?php
// db.php
// --------------------------------------------
// Ovaj fajl pravi konekciju sa MySQL bazom.
// Koristimo mysqli, jer se najviše koristi u starijim tutorijalima.
// --------------------------------------------

// Povezivanje sa bazom
$server = "localhost";
$user = "root";
$password = "";
$database = "php_23"; 

// mysqli konekcija
$conn = new mysqli($server, $user, $password, $database);

// Provera konekcije
if ($conn->connect_error) {
    die("Greška u konekciji: " . $conn->connect_error);
}
?>
