<?php
require_once "Baza.php";

class Product 
{
    public $ime;
    public $opis;
    public $cena;
    public $slika;
    public $kolicina;
    private $baza;

    public function __construct($ime, $opis, $cena, $slika, $kolicina)
    {
        $this->ime = $ime;
        $this->opis = $opis;
        $this->cena = $cena;
        $this->slika = $slika;
        $this->kolicina = $kolicina;

        // Napravi novu konekciju pomoću klase Baza
        $this->baza = new Baza();
    }

    public function save()
    {
        $ime = $this->baza->konekcija->real_escape_string($this->ime);
        $opis = $this->baza->konekcija->real_escape_string($this->opis);
        $cena = $this->baza->konekcija->real_escape_string($this->cena);
        $slika = $this->baza->konekcija->real_escape_string($this->slika);
        $kolicina = $this->baza->konekcija->real_escape_string($this->kolicina);

        $upit = "INSERT INTO proizvodi (ime, opis, cena, slika, kolicina)
                 VALUES ('$ime', '$opis', $cena, '$slika', $kolicina)";

        if ($this->baza->konekcija->query($upit)) {
            echo "Proizvod '$ime' uspešno dodat u bazu.<br>";
        } else {
            echo "Greška pri unosu proizvoda: " . $this->baza->konekcija->error . "<br>";
        }
    }
}
