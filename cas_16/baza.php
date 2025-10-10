<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "web_shop";

$conn = mysqli_connect($server, $user, $pass, $db);

if(!$conn){
    die("Greška pri konekciji sa bazom: " . mysqli_connect_error());
}
?>
