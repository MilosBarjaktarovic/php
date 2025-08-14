<?php
$naslov = "Postani programer";

$navigacija = [
    "Home" => "#",
    "About us" => "#",
    "Contact" => "#"
];
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $naslov; ?></title>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
      margin: 50px;
    }

    .nav {
      list-style-type: none;
      padding: 0;
    }

    .nav li {
      display: inline;
      margin: 0 10px;
    }

    .nav a {
      text-decoration: none;
      color: blue;
    }

    .nav a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <h1><?php echo $naslov; ?></h1>

  <ul class="nav">
    <?php
    foreach ($navigacija as $ime => $link) {
        echo "<li><a href=\"$link\">$ime</a></li>";
    }
    ?>
  </ul>

</body>
</html>
