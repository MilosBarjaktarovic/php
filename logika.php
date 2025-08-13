<?php
if (isset($_GET['izracunaj'])) {
    $cena = floatval($_GET['cena']);
    $kategorija = $_GET['kategorija'];
    $porez = isset($_GET['porez']);

    // Dodavanje fiksne vrednosti po kategoriji
    if ($kategorija == "hrana") {
        $cena += 50;
    } elseif ($kategorija == "oprema") {
        $cena += 350;
    }

    // Dodavanje poreza ako je čekirano
    if ($porez) {
        $cena += $cena * 0.10;
    }

    echo "<h3>Ukupna cena proizvoda: " . number_format($cena, 2) . " dinara</h3>";
}
?>
