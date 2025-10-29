<?php

class Baza {
    public $sql;

    public function __construct() {
        $this->sql = mysqli_connect("localhost", "root", "", "web_shop_two");

        if (!$this->sql) {
            die("❌ Greška pri povezivanju sa bazom: " . mysqli_connect_error());
        }
    }
}

?>
