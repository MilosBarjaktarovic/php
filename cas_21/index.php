<?php

require_once "Models.php/Pas.php";
require_once "Models.php/Kokoska.php";
require_once "Models.php/Riba.php";
require_once "Models.php/Meduza.php";

$pas = new Pas("Tara", 45, "crna", "Cane Corso");

$kokoska = new Kokoska("Koka", 3, "bela");

$riba = new Riba("Zlatna ribica", 0.2, "zlatna");

$meduza = new Meduza("Plava meduza", 1, "plava");

$zivotinje = [$pas, $kokoska, $riba, $meduza];
foreach ($zivotinje as $zivotinja) {
    echo $zivotinja->ime . " govori: " . $zivotinja->oglasiSe() . "<br>";
}


?>
