<?php
// models/image.php
// -------------------------------------------------
// MODEL: Rukuje unosom i čitanjem slika iz baze
// -------------------------------------------------

class Image {

    // Dozvoljene ekstenzije (tipizacija: array)
    public static array $allowed_extensions = ["jpg", "jpeg", "png", "gif"];

    // INSERT – čuva jedan fajl u bazi
    // Tipizacija parametara i povratne vrednosti
    public static function saveImage(mysqli $conn, string $fileName): bool {
        $sql = "INSERT INTO images (file_name) VALUES ('$fileName')";
        return $conn->query($sql);
    }

    // SELECT – vraća sve slike
    public static function getAll(mysqli $conn): mysqli_result|false {
        $sql = "SELECT * FROM images ORDER BY id DESC";
        return $conn->query($sql);
    }
}
