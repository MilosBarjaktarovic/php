<?php

require_once "Zivotinja.php";

class VodenaZivotinja extends Zivotinja
{
    public $tipVode;

    public function __consturct($ime, $tezina,$boja, $tipVode)
    {
        parent::__construct($ime, $tezina, $boja);
        $this->tipVode = $tipVode;
    }

    public function pliva()
    {
        return "Plivam u " . $this->tipVode . " vodi.";
    }
}
