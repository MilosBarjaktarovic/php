<?php
include 'includes/db.php';
include 'includes/bootstrap.php';

$result = $conn->query("SELECT * FROM proizvodi");
?>

<div class="container">
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
                    <?php if(isset($_SESSION['user'])): ?>
                    <form method="POST" action="add_to_cart.php" class="mt-2">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <button type="submit" class="btn btn-success">Dodaj u korpu</button>
                    </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
