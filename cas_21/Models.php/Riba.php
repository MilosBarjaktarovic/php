<?php

require_once 'VodenaZivotinja.php';

class Riba extends VodenaZivotinja 
{
    public function __construct($ime, $tezina, $boja)
    {
        parent::__construct($ime, $tezina, $boja,"slatka");

    }
    public function oglasiSe()
    {
        return "Blub blub";
    }
}
