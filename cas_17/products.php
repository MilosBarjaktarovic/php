<?php 
include 'header.php';
include 'db.php';
?>

<div class="container mt-5">
    <?php if(isset($_SESSION["name"])): ?>
    <h2>Lista proizvoda</h2>
    <div class="row">
        <?php
      $result = $mysqli->query("SELECT * FROM proizvodi"); // tabela je sada 'proizvodi'

      if ($result->num_rows > 0) {
          while($product = $result->fetch_assoc()):
      ?>
        <div class="col-md-4 mb-3">
            <div class="card">
                <?php if(!empty($product['slika'])): ?>
                <img src="<?= htmlspecialchars($product['slika']) ?>" class="card-img-top" alt="<?= htmlspecialchars($product['ime']) ?>">
                <?php endif; ?>
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($product['ime']) ?></h5>
                    <p class="card-text"><?= htmlspecialchars($product['opis']) ?></p>
                    <p class="card-text">Cena: <?= htmlspecialchars($product['cena']) ?> RSD</p>
                    <p class="card-text">Količina: <?= htmlspecialchars($product['kolicina']) ?></p>
                    <a href="cart.php?add=<?= $product['id'] ?>" class="btn btn-primary">Dodaj u korpu</a>
                </div>
            </div>
        </div>
        <?php 
          endwhile;
      } else {
          echo "<p>Nema proizvoda u bazi.</p>";
      }
      ?>
    </div>
    <?php else: ?>
    <h2>Prijavite se da vidite proizvode</h2>
    <a class="btn btn-primary" href="login.php">Login</a>
    <?php endif; ?>
</div>
