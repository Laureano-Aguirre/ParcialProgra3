<?php

/*
En testAuto.php:
● Crear dos objetos “Auto” de la misma marca y distinto color.
● Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
● Crear un objeto “Auto” utilizando la sobrecarga restante.

● Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500
al atributo precio.
● Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el
resultado obtenido.
● Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o
no.
● Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3,
5)
*/
include "Aplicacion17.php";

$auto1 = new Auto('Ford', 'Rojo');
$auto2 = new Auto('Ford', 'Rojo');

$auto3 = new Auto('Toyota', 'Celeste', 1500);
$auto4 = new Auto('Toyota', 'Celeste', 500);

$auto5 = new Auto('Ferrari', 'Amarillo', 30000, 20/9/2000);

echo "Auto 3:";
echo"". $auto3->MostrarAuto($auto3);
echo "<br>Auto 4:";
echo"". $auto4->MostrarAuto($auto4);
echo "<br>Auto 5:";
echo"". $auto5->MostrarAuto($auto5);
$auto3->AgregarImpuesto(1500);
$auto4->AgregarImpuesto(1500);
$auto5->AgregarImpuesto(1500);
echo'<br>IMPUESTOS AGREGADOS...<br>';
echo "<br>Auto 3:";
echo"". $auto3->MostrarAuto($auto3);
echo "<br>Auto 4:";
echo"". $auto4->MostrarAuto($auto4);
echo "<br>Auto 5:";
echo"". $auto5->MostrarAuto($auto5);

echo'<br>SUMANDO AUTOS...<br>';

$importeFinal = $auto1->Add($auto1, $auto2);

echo "IMPORTE FINAL {$importeFinal} <br>";

echo'<br>COMPARANDO AUTOS...<br>';

$comparacion = $auto1->Equals($auto1, $auto2);

if($comparacion == true)
{
    echo'<br>SON IGUALES...<br>';
}
else{
    echo'<br>NO SON IGUALES...<br>';
}

?>