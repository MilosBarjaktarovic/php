<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="public/style.css">
</head>

<body>

    <div class="box">
        <h2>Log in</h2>

        <form action="decisionMaker.php" method="POST">
            <input type="text" name="username" placeholder="Unesite username" required>
            <input type="password" name="password" placeholder="Unesite šifru" required>
            <button type="submit" name="login">Uloguj se</button>
        </form>

        <a href="register.php">Nemate nalog? Registrujte se</a>
    </div>

</body>

</html>
