<?php
/*
En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos
los métodos.
*/

include "garage.php";

$garage1 = new Garage("La Boca Garage", 1500);

echo "Garage 1:";
echo"{$garage1->MostrarGaraje()}";

$auto1 = new Auto('Chevrolet', 'Violeta', 1000000);
$garage1->Add($auto1);

$garage1->MostrarGaraje();

$auto2 = new Auto('Ferrari', 'Rojo', 3333);
$garage1->Add($auto2);
$garage1->MostrarGaraje();

$garage1->Remove($auto2);

$garage1->MostrarGaraje();

?>