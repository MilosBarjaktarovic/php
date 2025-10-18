<?php

class Auto
{

public $marka;
public $model;
public $kubikaza;
public $boja;

public function prikaziAuto()
{
echo "Auto marka: " . $this->marka . " " . "Model: " . $this->model . " " . "Kubikaza: " . $this->kubikaza . "<br>";
}

public function promeniBoju($novaBoja)
{
    $this->boja = $novaBoja;
}

}
