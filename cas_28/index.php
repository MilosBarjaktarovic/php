<?php
require "vendor/autoload.php";

use PHP28\controllers\UserController;

$controller = new UserController();

if ($controller->create("Sima", "3434")) {
    echo "Korisnik uspešno dodat!";
} else {
    echo "Greška prilikom dodavanja!";
}
