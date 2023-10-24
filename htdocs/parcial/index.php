<?php

/*
index.php: Recibe todas las peticiones que realiza el cliente (utilizaremos Postman),
y administra a qué archivo se debe incluir.
*/

switch ($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        include_once("./ConsultarMovimientos.php");
        break;
    case "POST":
        switch ($_POST["action"]) {
            case "CuentaAlta":
                include_once("./CuentaAlta.php");
                break;
            case "ConsultarCuenta":
                include_once("./ConsultarCuenta.php");
                break;
            case "DepositoCuenta":
                include_once("./DepositoCuenta.php");
                break;
            case "RetiroCuenta":
                include_once("./RetiroCuenta.php");
                break;
            case "AjusteCuenta":
                include_once("./AjusteCuenta.php");
                break;
        }
        break;
    case "PUT":
        include_once("./ModificarCuenta.php");
        break;
    case "DELETE":
        include_once("./BorrarCuenta.php");
        break;
    default:
        echo'<br>Parametors incorrectos...';
        break;
}
?>