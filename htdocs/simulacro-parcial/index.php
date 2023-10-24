<?php

/*
(1 pt.) index.php:Recibe todas las peticiones que realiza el postman, y administra a que archivo se debe incluir.
*/

switch($_SERVER['REQUEST_METHOD']){
        case 'GET':
            include 'PizzaCarga.php';
            break;
        case 'POST':
            include 'PizzaConsultar.php';
            break;
        default:
            echo 'ERROR ...';
            break;
}

?>