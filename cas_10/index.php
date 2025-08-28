<?php

$proizvod = 2000;

$dostava = [
'Subotica' => 220,
'Pancevo'=> 10,
'Sarajevo' => 292,
'Podgorica' => 799
];

foreach ($dostava as $grad => $km) {
if ($km <= 100) { $cenaDostave=200; }
    elseif ($km <=200) { $cenaDostave=350; }
    elseif ($km> 200) {
    $cenaDostave = 500;
    } else {
    $cenaDostave = 2000; // fallback
    }

    $ukupnaCena = $proizvod + $cenaDostave;

    echo "Grad: $grad, udaljenost: $km km, cena proizvoda: $proizvod din, cena dostave: $cenaDostave din, ukupno: $ukupnaCena din<br>";
    }
?>
