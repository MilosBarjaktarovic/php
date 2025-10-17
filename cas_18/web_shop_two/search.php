<?php
include 'includes/db.php';
include 'includes/bootstrap.php';

$search = isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '';
$stmt = $conn->prepare("SELECT * FROM proizvodi WHERE ime LIKE ?");
$param = "%$search%";
$stmt->bind_param("s", $param);
$stmt->execute();
$result = $stmt->get_result();
?>

<div class="container">
    <h2>Pretraga: <?= $search ?></h2>
    <div class="row">
        <?php while($row = $result->fetch_assoc()): ?>
        <div class="col-md-4 col-12 mb-4">
            <div class="card h-100">
                <img src="images/<?= $row['slika'] ?>" class="card-img-top" alt="<?= $row['ime'] ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $row['ime'] ?></h5>
                    <p class="card-text"><?= $row['opis'] ?></p>
                    <p class="card-text"><b>Cena:</b> <?= $row['cena'] ?> RSD</p>
                    <a href="product.php?id=<?= $row['id'] ?>" class="btn btn-primary">Pogledaj proizvod</a>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
