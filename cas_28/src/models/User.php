<?php

namespace PHP28\models;

class User
{
    public $id;
    public $name;
    public $password;

    public function __construct($name, $password)
    {
        $this->name = $name;
        $this->password = $password;
    }
}
