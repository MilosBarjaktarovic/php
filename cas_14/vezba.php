<?php 

if(!isset($_POST["email"]) || !isset($_POST["password"])){
    die("Niste uneli email ili password");
}

$email = $_POST["email"];
$password = $_POST["password"];

// 1. Konekcija na bazu
$conn = mysqli_connect("localhost", "root", "", "web_shop");

if(!$conn){
    die("Neuspela konekcija: " . mysqli_connect_error());
}

// 2. Šifriraj lozinku
$hash_password = password_hash($password, PASSWORD_DEFAULT);

// 3. SQL upit (pazi: kolona je "sifra", ne "lozinka")
$sql = "INSERT INTO korisnici (email, sifra) VALUES (?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if(!$stmt){
    die("Greška u pripremi upita: " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ss", $email, $hash_password);

// 4. Izvršavanje
if(mysqli_stmt_execute($stmt)){
    echo "✅ Uspešno ste se registrovali!";
} else {
    echo "❌ Greška: " . mysqli_error($conn);
}

// Zatvori konekciju
mysqli_close($conn);

?>
