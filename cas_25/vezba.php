<?php

$age = 22;
$name = "Milos";

echo $name === "Milos" && $age >= 18 ? "Hello, Milos You are old enought."  : "Hello, guest or you are not old enought.";


$cityName = $_GET["city"] ?? "London";
echo "<br>";
echo "You are from " . $cityName;

$country = $_GET["country"] ?? "England";
echo "<br>";
echo "You are from country $country, and city $cityName";
echo "<br>";
