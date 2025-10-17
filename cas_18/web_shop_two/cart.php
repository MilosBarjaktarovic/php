<?php
include 'includes/db.php';
include 'includes/bootstrap.php';
if(!isset($_SESSION['user'])) header("Location: login.php");

if(empty($_SESSION['cart'])) {
    echo "<h3>Korpa je prazna!</h3>";
} else {
    $ids = implode(',', array_map('intval', $_SESSION['cart']));
    $query = "SELECT * FROM proizvodi WHERE id IN ($ids)";
    $result = $conn->query($query);
    $total = 0;
    echo "<h2>Vaša korpa:</h2>";
    while($row = $result->fetch_assoc()) {
        echo "<p>{$row['ime']} — {$row['cena']} RSD</p>";
        $total += $row['cena'];
    }
    echo "<hr><p>Ukupno: <b>$total RSD</b></p>";
}
include 'includes/footer.php';
?>
