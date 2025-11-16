<?php

declare(strict_types=1);

$name = "Milos";


 echo $name === "Milos" ? "Hello, Milos!" : "Hello, guest!";
  
 
function isLegalAge(int $age): bool
{
    return $age >= 18;

}

if (isLegalAge(23)) {
   die("<span style='color:green;'>  Access granted. You are old enough.</span>");
} else {
    die("<span style='color:red;'>  Access denied. You must be at least 18 years old.</span>");
}           
    





?>
