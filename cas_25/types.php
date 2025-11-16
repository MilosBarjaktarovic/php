<?php

declare(strict_types=1);

function setBio (string $name, string $lastName,int $age ):string
{
   return "My name is $name $lastName and i am $age years old.";

}

$message = setBio("Milos", "Barjaktarovic", 23);
echo $message;
