<?php

/*
CuentaAlta.php: (por POST) se ingresa Nombre y Apellido, Tipo Documento, Nro.
Documento, Email, Tipo de Cuenta (CA – caja de ahorro o CC – cuenta corriente),
Moneda ($ o U$S), Saldo Inicial (0 por defecto).
Se guardan los datos en el archivo banco.json, tomando un id autoincremental de 6
dígitos como Nro. de Cuenta (emulado). Sí el nombre y tipo ya existen , se actualiza el
precio y se suma al stock existente.
completar el alta con imagen/foto del usuario/cliente, guardando la imagen con Nro y
Tipo de Cuenta (ej.: NNNNNNTT) como identificación en la carpeta:
/ImagenesDeCuentas/2023.
*/



include "cuenta.php";

if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["tipoDocumento"]) && isset($_POST["nroDocumento"]) && isset($_POST["email"]) && isset($_POST["tipoCuenta"]) && isset($_POST["moneda"]) && isset($_POST["saldoInicial"]) && isset($_FILES["archivo"])){

    $nombre = $_POST["nombre"];
    $tipoCuenta = $_POST["tipoCuenta"];
    $cuentas = cargarCuentasDesdeJSON("banco.json");


    if(Cuenta::existeCuenta($cuentas, $nombre, $tipoCuenta) !== 1){

        $id = generarIDAutoincremental();
        $cuenta = new Cuenta($id, $nombre, $_POST["apellido"], $_POST["tipoDocumento"], $_POST["nroDocumento"], $_POST["email"], $tipoCuenta, $_POST["moneda"], $_POST["saldoInicial"]);
        $archivo = $_FILES['archivo'];
        $nombreImagen = $archivo['name'];
        $tipo = $archivo['type'];
        if(escribirEnJSON($cuenta, $cuentas)){
            echo'<br> La cuenta ha sido creada correctamente.';
            $nombreImagen = generarNombreImagen($tipoCuenta, $id);
            move_uploaded_file($archivo['tmp_name'], 'Imagenes/2023/' . $nombreImagen);
            
        }else{
            echo'<br>Error al crear la cuenta...';
        }

    }else{
        echo'<br>La cuenta ya existe, actualizaremos el saldo...';
        echo"<br>{$_POST["saldoInicial"]}";
        $cuentasActualizada = Cuenta::actualizarSaldo($cuentas, $nombre, $tipoCuenta, $_POST["saldoInicial"]);
        if(actualizarJSON($cuentasActualizada, $tipoCuenta, $nombre, $_POST["saldoInicial"])){
            echo'<br>Exito al actualizar la cuenta...';
        }else{
            echo'<br>No se pudo actualizar la cuenta...';
        }
    }
}else{
    echo'<br>Parametros incorrectos';
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

function escribirEnJson($cuenta, $cuentas){

    $nombreArchivo = "banco.json";
    $json_old = file_get_contents($nombreArchivo);
    $cuentas = json_decode($json_old);

    $cuentas [] = $cuenta;
    $json_new = json_encode($cuentas);
     
    if($archivo = fopen($nombreArchivo, 'w')){
        fwrite($archivo, $json_new);
        fclose($archivo);
        return true;
    }else{
        echo "<br>$nombreArchivo no se pudo abrir correctamente";
        return false;
    }
}

function actualizarJSON($cuentasActualizadas){

    $json = json_encode($cuentasActualizadas);

    $nombreArchivo = "banco.json";

    if($archivo = fopen($nombreArchivo, 'w')){
        fwrite($archivo, $json);
        fclose($archivo);
        return true;
    }else{
        echo "<br>$nombreArchivo no se pudo abrir correctamente";
        return false;
    }

}

function generarIDAutoincremental() {

    $contenidoJSON = file_get_contents("banco.json");   //lee el contenido del archivo

    $cuentas = json_decode($contenidoJSON);   //lo decodifica

    $id = 100000;
    foreach ($cuentas as $cuenta) {
        if ($cuenta->id > $id) {
            $id = $cuenta->id;    //busca el ultimo id
        }
    }

    return $id + 1; //devuelve el que le sigue del ultimo
}

function generarNombreImagen($tipoCuenta, $numeroCuentaID) {
    $nombreArchivo = $numeroCuentaID . $tipoCuenta . ".png"; 
    return $nombreArchivo;
}

?>