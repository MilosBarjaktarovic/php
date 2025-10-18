<?php

require_once "klase/Person.php";

$osoba1 = new Person();
$osoba1->ime = "Milos";
$osoba1->prezime = "Barjaktarovic";
$osoba1->godinaRodjenja = 1983;
$osoba1->visina = 194;
$osoba1->tezina = 128;

$osoba2 = new Person();
$osoba2->ime = "Tomislav";
$osoba2->prezime = "Nikolic";
$osoba2->godinaRodjenja = 1993;
$osoba2->visina = 185;
$osoba2->tezina = 90;

echo $osoba2->predstaviSe();
echo "Ja imam " . $osoba2->IzracunajGodine() . " godina " . "</br>";

echo $osoba1->predstaviSe();
echo "Ja imam " . $osoba1->IzracunajGodine() . " godina ";
