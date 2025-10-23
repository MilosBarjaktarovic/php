<?php

require_once "VodenaZivotinja.php";

class Meduza extends VodenaZivotinja 
{
    public function __construct($ime, $tezina, $boja)
    {
        parent::__construct($ime, $tezina, $boja,"slana");

    }
    public function oglasiSe()
    {
        return "Zzzzz";
    }

}
