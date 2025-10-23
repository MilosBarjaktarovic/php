<?php

require_once 'Zivotinja.php';

class KopnenaZivotinja extends Zivotinja
{
    public $brojNogu;
    
    public function __construct($ime, $tezina, $boja, $brojNogu)
    {
        parent::__construct($ime, $tezina, $boja);
        $this->brojNogu = $brojNogu;
    }

    public function kreceSe()
    {
        return "Hodam po kopnu";
    }
}
