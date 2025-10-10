<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_shop";

$baza = new mysqli($servername, $username, $password, $dbname);

if ($baza->connect_error) {
    die("Greška pri konekciji: " . $baza->connect_error);
}
?>
