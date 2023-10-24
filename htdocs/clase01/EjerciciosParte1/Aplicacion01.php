   
<?php
/*
Aplicación No 1 (Sumar números)
Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números
se sumaron.
*/
    $suma = 0;
    $contador = 0;

    for ($i = 1; $suma + $i <= 1000; $i++) {
        $suma += $i;
        $contador++;
    }

    echo "\nNúmeros sumados: ";
    for ($i = 1; $i <= $contador; $i++) {
        echo "$i";
        if ($i < $contador) {
            echo ", ";
        }
    }

    echo "\nTotal de números sumados: $contador";
?>
