<?php

/*
ConsultarCuenta.php: (por POST) Se ingresa Tipo y Nro. de Cuenta, si coincide con
algún registro del archivo banco.json, retornar la moneda/s y saldo de la cuenta/s. De
lo contrario informar si no existe la combinación de nro y tipo de cuenta o, si existe el
número y no el tipo para dicho número, el mensaje: “tipo de cuenta incorrecto”.
*/

include "cuenta.php";

if(isset($_POST["nombre"]) && isset($_POST["tipoCuenta"])){
    $nombreCuenta = $_POST["nombre"];
    $tipoCuenta = $_POST["tipoCuenta"];
    $cuentas = cargarCuentasDesdeJSON("banco.json");

    if(Cuenta::existeCuenta($cuentas, $nombreCuenta, $tipoCuenta) === 1){
        echo'<br>La cuenta ya existe, retornando la moneda y el saldo de la cuenta...';
        $cuenta = Cuenta::retornarCuenta($cuentas, $nombreCuenta, $tipoCuenta);
        echo"<br>DATOS DE LA CUENTA<br>";
        echo"<br>Moneda: {$cuenta->moneda}";
        echo"<br>Saldo: {$cuenta->saldoInicial}";
    }elseif(Cuenta::existeCuenta($cuentas, $nombreCuenta, $tipoCuenta) === 2){
        echo'<br>La cuenta ya existe, pero solo coincide el nombre de la misma.';
    }elseif(Cuenta::existeCuenta($cuentas, $nombreCuenta, $tipoCuenta) === 3){
        echo'<br>La cuenta ya existe, pero solo coincide el tipo de cuenta.';
    }else{
        echo'<br>La cuenta no existe.';
    }

}

function cargarCuentasDesdeJSON($archivo){

    // leo el contenido
    $contenidoJSON = file_get_contents($archivo);

    // lo decodifico
    $cuentas = json_decode($contenidoJSON, false);

    // confirmo que este cargado el array
    if (is_array($cuentas)) {
        echo '<br>Decodificacion exitosa...';
        return $cuentas;
    } else {
        echo "<br>Error al decodificar el archivo JSON.";
    }
}

?>