<?php

$korisnici = ["Toma", "Petar", "Marko"];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime = trim($_POST["ime"]); 

   
    if (strlen($ime) < 3) {
        echo "<p style='color:red;'>Morate uneti više od 3 karaktera.</p>";
    } else {
        
        $pronadjen = false;
        foreach ($korisnici as $korisnik) {
            if (strtolower($ime) === strtolower($korisnik)) {
                $pronadjen = true;
                break;
            }
        }

        if ($pronadjen) {
            echo "<p style='color:green;'>Pronašao si korisnika.</p>";
        } else {
            echo "<p style='color:orange;'>Niste pronašli korisnika sa tim imenom.</p>";
        }
    }
}
?>
