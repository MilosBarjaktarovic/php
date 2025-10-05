<?php include "baza.php"; ?>

<!DOCTYPE html>
<html lang="sr">

<head>
    <meta charset="UTF-8">
    <title>Kreiranje proizvoda</title>
</head>

<body>
    <h2>Dodaj proizvod</h2>
    <form method="POST" action="">
        <input type="text" name="ime" placeholder="Naziv proizvoda" required>
        <input type="text" name="opis" placeholder="Opis proizvoda" required>
        <button type="submit" name="submit">Sačuvaj</button>
    </form>

    <?php
    if(isset($_POST['submit'])){
        $ime = trim($_POST['ime']);
        $opis = trim($_POST['opis']);

        // 1. Proveri da li proizvod već postoji
        $check = "SELECT * FROM proizvodi WHERE ime = ?";
        $stmtCheck = mysqli_prepare($conn, $check);
        mysqli_stmt_bind_param($stmtCheck, "s", $ime);
        mysqli_stmt_execute($stmtCheck);
        $result = mysqli_stmt_get_result($stmtCheck);

        if(mysqli_num_rows($result) > 0){
            echo "<p style='color:red;'>❌ Proizvod već postoji u bazi!</p>";
        } else {
          
            $sql = "INSERT INTO proizvodi (ime, opis) VALUES (?, ?)";
            $stmt = mysqli_prepare($conn, $sql);

            if($stmt){
                mysqli_stmt_bind_param($stmt, "ss", $ime, $opis);
                if(mysqli_stmt_execute($stmt)){
                    echo "<p style='color:green;'>✅ Proizvod uspešno dodat!</p>";
                } else {
                    echo "<p style='color:red;'>❌ Greška pri dodavanju proizvoda!</p>";
                }
                mysqli_stmt_close($stmt);
            }
        }

        mysqli_stmt_close($stmtCheck);
    }
    ?>
</body>

</html>
