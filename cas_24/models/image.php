<?php
// image.php (MODEL)
// -----------------------------------------------------------
// Ovaj fajl obrađuje logiku za upload slika
// i rad sa bazom (INSERT, SELECT).
// self:: znači da pozivamo statičko svojstvo SAME klase.
// -----------------------------------------------------------

// Dozvoljene ekstenzije
class Image {

    // statičko svojstvo, poziva se sa self::
    public static $allowed_extensions = ["jpg", "jpeg", "png", "gif"];

    // Funkcija koja ubacuje sliku u bazu
    public static function saveImage($conn, $fileName) {

        // SQL upit
        $sql = "INSERT INTO images (file_name) VALUES ('$fileName')";

        // Izvršavanje
        return $conn->query($sql);
    }

    // Uzimanje svih slika iz baze
    public static function getAll($conn) {
        $sql = "SELECT * FROM images ORDER BY id DESC";
        return $conn->query($sql);
    }
}
?>
