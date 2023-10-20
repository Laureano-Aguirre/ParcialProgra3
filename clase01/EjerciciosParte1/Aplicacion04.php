<?php

    /*
    Escribir un programa que use la variable $operador que pueda almacenar los símbolos
    matemáticos: ‘+’, ‘-’, ‘/’ y ‘*’; y definir dos variables enteras $op1 y $op2. De acuerdo al
    símbolo que tenga la variable $operador, deberá realizarse la operación indicada y mostrarse el
    resultado por pantalla.
    */

    $operador = '*';
    $op1 = 4;
    $op2 = 2;
    $resultado;
    $operacion;

    if($operador == '+')
    {
        $resultado = $op1 + $op2;
        $operacion = 'suma';
    }
    elseif($operador == '-')
    {
        $resultado = $op1 - $op2;
        $operacion = 'resta';
    }
    elseif($operador == '*')
    {
        $resultado = $op1 * $op2;
        $operacion = 'multiplicacion';
    }
    elseif($operador == '/')
    {
        $resultado = $op1 / $op2;
        $operacion = 'division';
    }

    echo "El resultado de la $operacion da $resultado.";
?>