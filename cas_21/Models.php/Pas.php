<?php

require_once 'KopnenaZivotinja.php';

class Pas extends KopnenaZivotinja
{
    public $rasa;

    public function __construct($ime, $tezina, $boja, $rasa)
    {
        parent::__construct($ime, $tezina, $boja, 4);
        $this->rasa = $rasa;
    }
    public function oglasiSe()
    {
        return "Av Av";
    }
}
