<?php

$sati = date("H"); 

if ($sati >= 5 && $sati < 12) {
    echo "Dobro jutro!";
} elseif ($sati >= 12 && $sati < 18) {
    echo "Dobar dan!";
} else {
    echo "Laku noć!";
}
?>
