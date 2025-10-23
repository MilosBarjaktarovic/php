<?php

class Zivotinja
{
    public $ime;
    public $tezina;
    public $boja;

    public function __construct($ime, $tezina,$boja)
    {
        $this->ime = $ime;
        $this ->tezina = $tezina;
        $this->boja = $boja;
    }


}
