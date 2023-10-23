<?php

/*
Debe recibir todos los datos propios de una cuenta (a excepción del saldo); si dicha
cuenta existe (comparar por Tipo y Nro. de Cuenta) se modifica, de lo contrario
informar que no existe esa cuenta.
*/

require_once 'cuenta.php';

if ($_SERVER['REQUEST_METHOD'] === 'PUT'){
    $datosCuerpo = file_get_contents(('php://input'));      //tomo los valores del cuerpo del mensaje
    $cuentaNueva = json_decode($datosCuerpo, true);               //los decodifico

    $cuentas = cargarCuentasDesdeJSON('banco.json');


    if($datos !== null){
        if (isset($datos["id"]) && isset($datos["nombre"]) && isset($datos["apellido"]) && isset($datos["tipoDocumento"]) && isset($datos["nroDocumento"]) && isset($datos["email"]) && isset($datos["tipoCuenta"]) && isset($datos["moneda"])){
            $cuenta = Cuenta::buscarCuentaPorNro($cuentas, $datos["id"], $datos["tipoCuenta"]);
            if($cuenta !== null){
                echo'<br>La cuenta que intenta modificar existe, estamos modificandola, aguarde...';
                if($cuentaNueva->modificarCuenta(isset($datos["nombre"]), isset($datos["apellido"]), isset($datos["tipoDocumento"]), isset($datos["nroDocumento"]), isset($datos["email"]), isset($datos["moneda"]))){
                    $cuentasActualizada = Cuenta::actualizarCuentas($cuentas, $cuentaNueva, $datos["id"]);
                    if($cuentasActualizada){
                        if(actualizarJSON($cuentasActualizada)){
                            echo'<br>Cuenta modificada con exito...';
                        }else{
                            echo'<br>Error al actualizar el JSON...';
                        }
                    }else{
                        echo'<br>Error al actualizar la cuenta...';
                    }
                }
            }else{
                echo'<br>La cuenta que intenta modificar no existe...';
            }
        }else{
            echo'<br>Parametros incorrectos';
        }
    }else{
        echo'<br>No hay datos en el cuerpo enviado';
    }
}else{
    echo'<br>Error en el REQUEST METHOD';
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

?>