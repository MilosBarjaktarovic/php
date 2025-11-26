<!DOCTYPE html>
<html>

<head>
    <title>Registracija</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <div class="form-container">
        <h2>Registracija</h2>

        <form action="Controler/createNewUserControler.php" method="POST">
            <input type="text" name="username" placeholder="Unesite username" required>
            <input type="password" name="password" placeholder="Unesite password" required>
            <button type="submit">Sačuvaj</button>
        </form>
    </div>

</body>

</html>
