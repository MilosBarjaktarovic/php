<?php include "baza.php"; ?>

<!DOCTYPE html>
<html lang="sr">

<head>
    <meta charset="UTF-8">
    <title>Pretraga proizvoda</title>
</head>

<body>
    <h2>Pretraga proizvoda</h2>


    <form method="GET" action="">
        <input type="text" name="q" placeholder="Unesi pojam za pretragu">
        <button type="submit">Pretraži</button>
    </form>

    <?php
   
    if(isset($_GET['q']) && trim($_GET['q']) != ""){
        $pojam = "%" . trim($_GET['q']) . "%";

        $sql = "SELECT ime, opis FROM proizvodi WHERE ime LIKE ? OR opis LIKE ?";
        $stmt = mysqli_prepare($conn, $sql);

        if($stmt){
            mysqli_stmt_bind_param($stmt, "ss", $pojam, $pojam);
            mysqli_stmt_execute($stmt);
            $rezultat = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($rezultat) > 0){
                echo "<h3>Rezultati pretrage:</h3><ul>";
                while($red = mysqli_fetch_assoc($rezultat)){
                    echo "<li><b>" . htmlspecialchars($red['ime']) . "</b> - " . htmlspecialchars($red['opis']) . "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>Nema proizvoda za zadati pojam.</p>";
            }

            mysqli_stmt_close($stmt);
        }
    } else {
        
        $sql = "SELECT ime, opis FROM proizvodi";
        $rezultat = mysqli_query($conn, $sql);

        if(mysqli_num_rows($rezultat) > 0){
            echo "<h3>Svi proizvodi:</h3><ul>";
            while($red = mysqli_fetch_assoc($rezultat)){
                echo "<li><b>" . htmlspecialchars($red['ime']) . "</b> - " . htmlspecialchars($red['opis']) . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>Nema proizvoda u bazi.</p>";
        }
    }
    ?>
</body>

</html>
