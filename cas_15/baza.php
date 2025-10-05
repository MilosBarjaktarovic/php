<?php
$host = "localhost";
$user = "root"; 
$pass = "";
$dbname = "web_shop";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if(!$conn){
    die("Greška pri konekciji: " . mysqli_connect_error());
}
?>
