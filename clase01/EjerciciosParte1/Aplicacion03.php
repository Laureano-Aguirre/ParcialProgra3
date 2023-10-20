<?php
    /*
    Dadas tres variables numéricas de tipo entero $a, $b y $c realizar una aplicación que muestre
    el contenido de aquella variable que contenga el valor que se encuentre en el medio de las tres
    variables. De no existir dicho valor, mostrar un mensaje que indique lo sucedido. Ejemplo 1: $a
    = 6; $b = 9; $c = 8; => se muestra 8.
    Ejemplo 2: $a = 5; $b = 1; $c = 5; => se muestra un mensaje “No hay valor del medio”
    */
    $a=1;
    $b=5;
    $c=1;
    
    if($a == $b || $b == $c || $c == $a)
    {
        echo"Hay dos numeros iguales, no puede haber numero medio.";
    }
    else
    {
        if($a > $b && $a < $c)
        {
            echo "el numero del medio es $a";
        }
        elseif($a < $b && $a > $c)
        {
            echo "el numero del medio es $a";
        }
        elseif($c > $b && $c < $a)
        {
            echo "el numero del medio es $c";
        }
        elseif($c < $b && $c > $a)
        {
            echo "el numero del medio es $c";
        }
        elseif($b > $c && $b < $a)
        {
            echo "el numero del medio es $b";
        }
        elseif($b < $c && $b > $a)
        {
            echo "el numero del medio es $b";
        }
    }
?>