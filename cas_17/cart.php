<?php
include 'header.php';
include 'db.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Dodavanje proizvoda u korpu
if (isset($_GET['add'])) {
    $id = (int)$_GET['add'];
    if ($id > 0) {
        $_SESSION['cart'][] = $id;
    }
    header("Location: cart.php");
    exit;
}

// Dohvati proizvode u korpi
$cart_products = [];
if (!empty($_SESSION['cart'])) {
    // sigurnosna provera da niz nije prazan
    $ids_array = array_map('intval', $_SESSION['cart']);
    $ids = implode(',', $ids_array);

    if (!empty($ids)) {
        $result = $mysqli->query("SELECT * FROM proizvodi WHERE id IN ($ids)");

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $cart_products[] = $row;
            }
        } else {
            echo "<p>Greška u SQL upitu: " . $mysqli->error . "</p>";
        }
    }
}
?>

<div class="container mt-5">
    <h2>Vaša korpa</h2>
    <?php if (!empty($cart_products)): ?>
    <ul class="list-group">
        <?php foreach ($cart_products as $prod): ?>
        <li class="list-group-item">
            <?= htmlspecialchars($prod['ime']) ?> - <?= htmlspecialchars($prod['cena']) ?> RSD
            (Količina: <?= htmlspecialchars($prod['kolicina']) ?>)
        </li>
        <?php endforeach; ?>
    </ul>
    <?php else: ?>
    <p>Vaša korpa je prazna.</p>
    <?php endif; ?>
</div>
