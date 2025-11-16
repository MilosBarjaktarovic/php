<?php
// image.php (MODEL)
// -----------------------------------------------------------
// Ovaj fajl obrađuje rad sa slikama:
// - čuvanje naziva slike u bazi
// - čitanje svih slika iz baze
// Uvedena je potpuna tipizacija (type hinting + return types).
// -----------------------------------------------------------

class Image
{
    /**
     * @var array<string> Lista dozvoljenih ekstenzija slike.
     * Statičko svojstvo, poziva se sa self::$allowed_extensions.
     */
    public static array $allowed_extensions = ["jpg", "jpeg", "png", "gif"];


    /**
     * Čuva naziv slike u bazi.
     *
     * @param mysqli $conn        Aktivna MySQL konekcija.
     * @param string $fileName    Naziv fajla koji se insertuje u tabelu.
     *
     * @return bool    Vraća TRUE ako je upit uspešno izvršen, inače FALSE.
     */
    public static function saveImage(mysqli $conn, string $fileName): bool
    {
        $sql = "INSERT INTO images (file_name) VALUES ('$fileName')";
        return $conn->query($sql) === TRUE;
    }


    /**
     * Učitava sve slike iz baze.
     *
     * @param mysqli $conn    Aktivna MySQL konekcija.
     *
     * @return mysqli_result|false   Vraća rezultat SELECT upita ili FALSE ako nije uspeo.
     */
    public static function getAll(mysqli $conn): mysqli_result|false
    {
        $sql = "SELECT * FROM images ORDER BY id DESC";
        return $conn->query($sql);
    }
}
?>
