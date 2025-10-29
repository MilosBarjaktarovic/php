<?php

require_once "Modeli/Korisnik.php";

// Napravi objekat klase Korisnik
$korisnik = new Korisnik();

// ✅ Dodavanje novih korisnika
$korisnik->register("pera@example.com", "12345");
$korisnik->register("mika@example.com", "54321");

// ✅ Ažuriranje postojećeg korisnika (primer)
$korisnik->update(1, "noviemail@example.com", "nova_lozinka");

// ✅ Brisanje korisnika (primer)
$korisnik->delete(2);

?>
