<?php
/*
Aguirre Laureano
Crear una función que reciba como parámetro un string ($palabra) y un entero ($max). La
función validará que la cantidad de caracteres que tiene $palabra no supere a $max y además
deberá determinar si ese valor se encuentra dentro del siguiente listado de palabras válidas:
“Recuperatorio”, “Parcial” y “Programacion”. Los valores de retorno serán: 1 si la palabra
pertenece a algún elemento del listado.
0 en caso contrario.
*/
$palabra = "Hola";

$max = 13;

$resultado = Validar($palabra, $max);

if($resultado == 1)
{
    echo "El largo de la palabra cumple con las condiciones y es: $palabra";
}
else
{
    echo 'El largo de la palabra no cumple con las condiciones o no es ninguna de las palabras aceptados.';
}
//echo "el largo es: $lenght";

function Validar($palabra, $max)
{
    $lenght = strlen($palabra);
    if($max <= $lenght)
    {
        $stringRecu = "Recuperatorio";
        $stringParcial = "Parcial";
        $stringProgra = "Programacion";

        if($palabra == $stringRecu)
        {
            $palabraFinal = $palabra;
            return 1;
        }
        elseif($palabra == $stringParcial)
        {
            $palabraFinal = $palabra;
            return 1;
        }
        elseif($palabra == $stringProgra)
        {
            $palabraFinal = $palabra;
            return 1;
        }
    }
    else
    {
        return 0;
    }
}
?>