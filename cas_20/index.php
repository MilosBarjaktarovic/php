<?php
require_once "models/Product.php";

// Kreiranje proizvoda i čuvanje u bazi
$krompir = new Product("Krompir", "Sveži domaći krompir", 120, "krompir.jpg", 50);
$krompir->save();

$paradajz = new Product("Paradajz", "Crveni i sočni paradajz", 150, "paradajz.jpg", 30);
$paradajz->save();

$kupus = new Product("Kupus", "Zeleni kupus", 90, "kupus.jpg", 40);
$kupus->save();

$salata = new Product("Salata", "Sveža zelena salata", 80, "salata.jpg", 25);
$salata->save();
