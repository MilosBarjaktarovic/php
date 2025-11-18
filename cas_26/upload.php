<?php

$uploadDir = "uploads/";

if (!isset($_FILES['profileImage'])) {
    header("Location: index.php?msg=Nijedna slika nije izabrana.");
    exit();
}

$file = $_FILES['profileImage'];
$allowed = ["jpg", "jpeg", "png", "gif", "webp"];
$ext = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));

// 1. Provera ekstenzije
if (!in_array($ext, $allowed)) {
    header("Location: index.php?msg=Dozvoljene ekstenzije: jpg, png, gif, webp.");
    exit();
}

// 2. Provera greške
if ($file["error"] !== 0) {
    header("Location: index.php?msg=Greška pri uploadu slike.");
    exit();
}

// 3. Provera veličine
if ($file["size"] > 5 * 1024 * 1024) { // 5MB
    header("Location: index.php?msg=Slika je prevelika! Maksimalno 5MB.");
    exit();
}

// 4. Novi naziv
$newName = time() . "_" . $file["name"];
$path = $uploadDir . $newName;

// 5. Prebacivanje
if (move_uploaded_file($file["tmp_name"], $path)) {
    header("Location: index.php?msg=Uspeh! Slika je uploadovana.");
    exit();
} else {
    header("Location: index.php?msg=Neuspešno čuvanje slike.");
    exit();
}
?>
