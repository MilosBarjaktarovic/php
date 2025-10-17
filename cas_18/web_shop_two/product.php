<?php
include 'includes/db.php';
include 'includes/bootstrap.php';

if(!isset($_GET['id'])) die("Fali ID proizvoda");

$id = intval($_GET['id']);
$stmt = $conn->prepare("SELECT * FROM proizvodi WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();
if(!$product) die("Proizvod ne postoji");
?>

<div class="container">
    <div class="card mb-3">
        <img src="images/<?= $product['slika'] ?>" class="card-img-top" alt="<?= $product['ime'] ?>">
        <div class="card-body">
            <h3 class="card-title"><?= $product['ime'] ?></h3>
            <p class="card-text"><?= $product['opis'] ?></p>
            <p class="card-text"><b>Cena:</b> <?= $product['cena'] ?> RSD</p>
            <?php if(isset($_SESSION['user'])): ?>
            <form method="POST" action="add_to_cart.php">
                <input type="hidden" name="id" value="<?= $product['id'] ?>">
                <button type="submit" class="btn btn-success">Dodaj u korpu</button>
            </form>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
