<?php

function izracunajPDV($broj) {
    
    if (!is_numeric($broj)) {
        echo "Greška: morate uneti broj!<br>";
        return;
    }

   
    if ($broj < 1) {
        echo "Greška: broj mora biti veći ili jednak 1!<br>";
        return;
    }

    $pdvStopa = 0.22;
    $pdv = $broj * $pdvStopa;

    echo "Osnovica: $broj <br>";
    echo "PDV (22%): $pdv <br>";
    echo "Ukupno: " . ($broj + $pdv) . "<br><br>";
}

// Test 
izracunajPDV(100);   // radi
izracunajPDV(50);    // radi
izracunajPDV(0);     // greška
izracunajPDV("Toma"); // greška
izracunajPDV("123");  // radi jer je numerički string

?>
