<?php

class Baza
{
    public $konekcija;

    public function __construct()
    {
        // Kreiranje konekcije ka MySQL bazi
        $this->konekcija = mysqli_connect("localhost", "root", "", "web_shop_two");

        // Provera da li je konekcija uspešna
        if (!$this->konekcija) {
            die("Greška pri konekciji sa bazom: " . mysqli_connect_error());
        }
    }
}
