<?php 

require_once "klase/Auto.php";

$audiA4 = new Auto();
$audiA4->marka = "Audi";
$audiA4->model = "A4";
$audiA4->kubikaza = "2.0 TDI";
$audiA4->boja = "Crna";

$yugo = new Auto();
$yugo->marka = "Zastava";
$yugo->model = "Yugo 55";
$yugo->kubikaza = 1600;
$yugo->boja = "Bela";


//echo "napravili smo novi Yugo auto. Marka je" .$yugo->model;
//echo "napravili smo novi Audi auto. Marka je" .$audiA4->model;

echo $yugo->prikaziAuto();
echo $audiA4->prikaziAuto();

$yugo->promeniBoju("crvena");
echo "Nova boja Yuga je " . $yugo->boja . " . " . "</br>";
$audiA4->promeniBoju("plava");
echo "Nova boja Audija je " . $audiA4->boja . " . " . "</hr>";
