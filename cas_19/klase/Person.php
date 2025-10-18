<?php

class Person
{
public $ime;
public $prezime;
public $godinaRodjenja;
public $visina;
public $tezina;

public function predstaviSe()
{
return "Zovem se " . $this->ime . " " . $this->prezime . " . ";
}
public function IzracunajGodine()
{
$trenutnaGodina = date("Y");
return $trenutnaGodina - $this->godinaRodjenja;

}

}
