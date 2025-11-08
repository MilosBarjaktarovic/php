<?php

// Provera da li je fajl uploadovan
if (!isset($_FILES["profileImage"])) {
    die("Niste uploadovali fajl!");
}

// Provera veličine fajla
$imageSize = $_FILES["profileImage"]["size"];
$maxFileSize = 2 * 1024 * 1024; // 2MB
if ($imageSize > $maxFileSize) {
    die("Fajl je prevelik, maksimalna dozvoljena velicina je 2MB");
}

// Provera tipa fajla
$allowedExtensions = ["image/jpg", "image/jpeg", "image/png", "image/gif"];
$imageType = $_FILES["profileImage"]["type"];
if (!in_array($imageType, $allowedExtensions)) {
    die("Format slike nije dobar, mora biti: image/jpg, image/jpeg, image/png, image/gif");
}

// Provera dimenzija slike
$imageTmpName = $_FILES["profileImage"]["tmp_name"];
list($width, $height) = getimagesize($imageTmpName);

if ($width != 1920 || $height != 1024) {
    die("Slika mora imati dimenzije 1920x1024 (širina x visina). Trenutne dimenzije: {$width}x{$height}");
}

// Folder za upload
$uploadDir = "uploads/";
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true); // kreira folder ako ne postoji
}

// Puni put do fajla
$uploadFile = $uploadDir . basename($_FILES["profileImage"]["name"]);

// Premestanje fajla
if (move_uploaded_file($imageTmpName, $uploadFile)) {
    echo "Fajl je uspešno uploadovan u folder uploads!";
} else {
    die("Došlo je do greške prilikom uploadovanja fajla.");
}
?>
