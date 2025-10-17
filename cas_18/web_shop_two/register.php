<?php
include 'includes/db.php';
include 'includes/bootstrap.php';

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Provera da li email vec postoji
    $stmt = $conn->prepare("SELECT id FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        echo "<div class='alert alert-danger'>Email je već registrovan!</div>";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);
        if($stmt->execute()) {
            echo "<div class='alert alert-success'>Uspešna registracija! <a href='login.php'>Prijavi se</a></div>";
        } else {
            echo "<div class='alert alert-danger'>Greška: " . $stmt->error . "</div>";
        }
    }
}
?>

<div class="container mt-4">
    <h2>Registracija</h2>
    <form method="POST" class="col-md-4 col-12">
        <div class="mb-3">
            <label class="form-label">Korisničko ime</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Lozinka</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Registruj se</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
