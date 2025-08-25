<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Navigacija</title>
    <style>
        nav {
            background-color: #333;
            padding: 10px;
        }

        nav a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

    </style>
</head>

<body>

    <?php 
   
    $linkovi = [
        "Home" => "home.php",
        "About Us" => "about.php",
        "Contact" => "contact.php"
    ]; 
    ?>

    <nav>
        <?php foreach ($linkovi as $naziv => $url): ?>
        <a href="<?= $url ?>"><?= $naziv ?></a>
        <?php endforeach; ?>
    </nav>

    <h1>Dobrodošli na moju stranicu!</h1>

</body>

</html>
