<?php


$baza = mysqli_connect("Localhost", "root", "", "prvi_cas");


if(mysqli_connect_error())
{
    die("Neuspela konekcija sa baze podataka");
};


// mysqli_query($baza, "INSERT INTO korisnici  (email, lozinka, datum_rodjenja) VALUES ('petar@gmail.com', '3333' , '2007-09-06') ");

$ime = 'Jabuka';
$opis = 'Crvena i sočna';
$cena = 180;
$dan_nabavke = '2024-06-10';
$kolicina = 50;




$baza->query("INSERT INTO proizvodi (ime, opis , cena, dan_nabavke, kolicina) VALUES ('$ime', '$opis', $cena, '$dan_nabavke', $kolicina) ");



?>
