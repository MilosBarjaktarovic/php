<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="public/style.css">
</head>

<body>

    <div class="box">
        <h2>Registracija</h2>

        <form action="decisionMaker.php" method="POST">
            <input type="text" name="username" placeholder="Unesite username" required>
            <input type="password" name="password" placeholder="Unesite šifru" required>
            <button type="submit" name="register">Registruj se</button>
        </form>

        <a href="index.php">Imate nalog? Log in</a>
    </div>

</body>

</html>
