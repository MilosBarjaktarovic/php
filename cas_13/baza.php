<?php
$baza = mysqli_connect("localhost", "root", "", "prvi_cas");

if (mysqli_connect_error()) {
    die("Neuspela konekcija sa bazom podataka");
}

$poruka = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ime = trim($_POST['ime']);
    $opis = trim($_POST['opis']);
    $cena = trim($_POST['cena']);
    $dan_nabavke = trim($_POST['dan_nabavke']);
    $kolicina = trim($_POST['kolicina']);

    
    if (empty($ime) || empty($opis) || empty($cena) || empty($dan_nabavke) || empty($kolicina)) {
        $poruka = "<p style='color:red; font-weight:bold;'>❗ Morate uneti sve podatke!</p>";
    } else {
        $query = "INSERT INTO proizvodi (ime, opis, cena, dan_nabavke, kolicina) 
                  VALUES ('$ime', '$opis', $cena, '$dan_nabavke', $kolicina)";

        if ($baza->query($query)) {
            $poruka = "<p style='color:green; font-weight:bold;'>✅ Uspešno dodat proizvod!</p>";
        } else {
            $poruka = "<p style='color:red;'>⚠️ Greška prilikom dodavanja: " . $baza->error . "</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="sr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodavanje proizvoda</title>
</head>

<body>

    <h2>Dodaj novi proizvod</h2>


    <?php if (!empty($poruka)) echo $poruka; ?>

    <form method="POST" action="">
        <input type="text" name="ime" placeholder="Ime proizvoda"><br><br>
        <input type="text" name="opis" placeholder="Opis"><br><br>
        <input type="number" name="cena" placeholder="Cena"><br><br>
        <input type="date" name="dan_nabavke" placeholder="Datum nabavke"><br><br>
        <input type="number" name="kolicina" placeholder="Količina"><br><br>
        <button type="submit">Pošalji</button>
    </form>

</body>

</html>
