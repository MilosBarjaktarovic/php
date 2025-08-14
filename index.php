<!DOCTYPE html>
<html lang="sr">

<head>
    <meta charset="UTF-8">
    <title>Izračunavanje cene</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Izračunavanje cene proizvoda</h2>

    <form method="GET" action="">
        <label for="cena">Cena proizvoda:</label>
        <input type="number" name="cena" id="cena" required><br><br>

        <label for="kategorija">Kategorija:</label>
        <select name="kategorija" id="kategorija" required>
            <option value="">Izaberi</option>
            <option value="hrana">Hrana</option>
            <option value="oprema">Oprema za računar</option>
        </select><br><br>

        <label>
            <input type="checkbox" name="porez"> Izračunaj porez (10%)
        </label><br><br>

        <button type="submit" name="izracunaj">Izračunaj</button>
    </form>

    <div class="rezultat">
        <?php include 'logika.php'; ?>
    </div>
</body>

</html>
