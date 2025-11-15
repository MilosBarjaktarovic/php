<?php
// upload.php
// ---------------------------------------------------
// Na ovoj stranici korisnik uploaduje sliku.
// U istom fajlu radimo formu i obradu.
// ---------------------------------------------------

require_once "models/db.php";
require_once "models/image.php";

$message = "";

// AKO JE POSLAT FAJL
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Naziv fajla
    $fileName = $_FILES['profileImage']['name'];

    // Privremena putanja
    $tmpName = $_FILES['profileImage']['tmp_name'];

    // Ekstenzija fajla
    $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Provera dozvoljenih ekstenzija preko self::
    if (!in_array($extension, Image::$allowed_extensions)) {
        $message = "Greška: Nedozvoljena ekstenzija fajla!";
    } else {

        // Nova jedinstvena putanja (da se ne prepisuju slike)
        $newName = time() . "_" . $fileName;

        // Putanja gde se slika čuva
        $targetPath = "uploads/" . $newName;

        // Premeštanje slike
        if (move_uploaded_file($tmpName, $targetPath)) {

            // Upis u bazu
            Image::saveImage($conn, $newName);

            $message = "Uspešno uploadovano!";
        } else {
            $message = "Greška pri uploadu!";
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Upload slike</title>
</head>

<body>

    <h1>Upload slike</h1>

    <a href="index.php">⬅ Nazad na galeriju</a>

    <br><br>

    <!-- Poruka ako postoji -->
    <?php if ($message != ""): ?>
    <p><strong><?php echo $message; ?></strong></p>
    <?php endif; ?>

    <!-- Forma -->
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="profileImage" required />
        <br><br>
        <button type="submit">Upload</button>
    </form>

</body>

</html>
