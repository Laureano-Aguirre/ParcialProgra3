<?php

/*
Archivo: registro.php
método:POST
Recibe los datos del usuario(nombre, clave,mail )por POST ,
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000). crear un dato con la
fecha de registro , toma todos los datos y utilizar sus métodos para poder hacer el alta,
guardando los datos en usuarios.json y subir la imagen al servidor en la carpeta
Usuario/Fotos/.
retorna si se pudo agregar o no.
Cada usuario se agrega en un renglón diferente al anterior.
Hacer los métodos necesarios en la clase usuario.
*/


if(isset($_POST["nombre"]) && isset($_POST["clave"]) && isset($_POST["mail"])){

    $id = generarIDAutoincremental();
    $fechaRegistro = date('Y-m-d H:i:s');

    $usuario = new Usuario($id, $_POST["nombre"], $_POST["clave"], $_POST["mail"], $fechaRegistro);
    
    if(escribirEnJSON($usuario)){
        echo 'Se escribio correctamente...';
    }else{
        echo 'ERROR...';
    }
}else{
    echo 'Parametros incorrectos';
}

function generarIDAutoincremental() {
    static $id = 1;

    return $id++;
}


function escribirEnJSON($usuario){
    $idUsuario = $usuario->getId();
    $nombreUsuario = $usuario->getNombre();
    $claveUsuario = $usuario->getClave();
    $mailUsuario = $usuario->getMail();
    $fechaRegUsuario = $usuario->getFecha();

    $arrayAsoc = array("ID" => "$idUsuario", "nombre" => "$nombreUsuario", "clave" => "$claveUsuario", "mail" => "$mailUsuario", "fecha" => "$fechaRegUsuario");

    $json = json_encode($arrayAsoc);

    $nombreArchivo = "usuarios.json";

    if($archivo = fopen($nombreArchivo, 'w')){
        fwrite($archivo, $json);
        fclose($archivo);
        return true;
    }else{
        echo "$nombreArchivo no se pudo abrir correctamente";
        return false;
    }
}
class Usuario{
    private $id;
    private $nombre;
    private $clave;
    private $mail;
    private $fecha;

    public function __construct($id, $nombre, $clave, $mail, $fecha)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->mail = $mail;
        $this->fecha = $fecha;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getClave() {
        return $this->clave;
    }

    public function getMail() {
        return $this->mail;
    }

    public function getFecha() {
        return $this->fecha;
    }
}
?>