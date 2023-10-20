<?php
    /*
    Aguirre Laureano
    Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
    de las letras del Array.
    Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.
    */

    $arrayCaracteres = ["H", "O", "L", "A"];
    $arrayInvertido = invertirArray($arrayCaracteres);
    print_r($arrayInvertido);

    function invertirArray($arrayCaracteres) 
    {
        $arrayInvertido = array();
      
        for ($i = count($arrayCaracteres) - 1; $i >= 0; $i--) 
        {
          $arrayInvertido[] = $arrayCaracteres[$i];
        }
      
        return $arrayInvertido;
    }
    
?>