<?php
require_once "models/db.php";
require_once "models/function.php";

$images = getImages("uploads/");
$message = isset($_GET['msg']) ? $_GET['msg'] : "";
?>

<!DOCTYPE html>
<html lang="sr">

<head>
    <meta charset="UTF-8">
    <title>Upload Slika</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <button id="darkModeBtn">Dark Mode</button>

    <div class="container">

        <h1>Upload Slike</h1>

        <?php if ($message): ?>
        <div class="msg"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>

        <form method="POST" action="upload.php" enctype="multipart/form-data">
            <input type="file" name="profileImage" required>
            <button type="submit">Upload</button>
        </form>

        <h2>Učitane slike</h2>

        <div class="gallery">
            <?php foreach ($images as $key => $img): ?>
            <div class="photo">
                <img src="uploads/<?= $img ?>" alt="<?= $img ?>">
                <p>#<?= $key ?> – <?= $img ?></p>
            </div>
            <?php endforeach; ?>
        </div>

    </div>

    <script>
        const btn = document.getElementById("darkModeBtn");
        btn.addEventListener("click", () => {
            document.body.classList.toggle("dark");
        });

    </script>

</body>

</html>
