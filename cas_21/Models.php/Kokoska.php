<?php
require_once "KopnenaZivotinja.php";

class Kokoska extends KopnenaZivotinja
{
    public function __construct($ime, $tezina, $boja)
    {
        parent::__construct($ime, $tezina, $boja, 2);

    }

    public function oglasiSe()
    {
        return 'Ko ko ko!';
    }
}
