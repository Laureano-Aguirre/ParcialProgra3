<?php

switch($_SERVER['REQUEST_METHOD']){
    case 'GET':
        switch($_GET['accion']){
            case 'sesion':
                include 'sesiones.php';
                break;
            case 'buscar':
                echo 'buscar archivo';
                break;
            case 'json':
                include 'json.php';
                break;
            default:
                echo 'hola pusiste cualquiera';
        }
        break;
        case 'POST':
            echo 'POST';
            break;
        default:
            echo 'Verbo no permitido';
            break;
}

?>