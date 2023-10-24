<?php

/*
Archivo: registro.php
método:POST
Recibe los datos del usuario(nombre, clave,mail )por POST ,
crear un objeto y utilizar sus métodos para poder hacer el alta,
guardando los datos en usuarios.csv.
retorna si se pudo agregar o no.
Cada usuario se agrega en un renglón diferente al anterior.
Hacer los métodos necesarios en la clase usuario
*/


if(isset($_POST["nombre"]) && isset($_POST["clave"]) && isset($_POST["mail"])){
    $clave = $_POST["clave"];
    $usuario = new Usuario($_POST["nombre"], $_POST["clave"], $_POST["mail"]);
    $clave = $usuario->getClave();
    

    if($usuario->Escribir()){
        echo 'Se escribio correctamente...';
        echo "clave: {$clave}";
    }else{
        echo 'No se pudo guardar en el archivo...';
    }
}else{
    echo 'Parametros incorrectos';
}

class Usuario{
    private $nombre;
    private $clave;
    private $mail;

    public function __construct($nombre, $clave, $mail)
    {
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->mail = $mail;
    }

    function Escribir(){
        $archivo = fopen("usuarios.csv", "a");
        if ($archivo === false) {
            return false;
        }
        else{
            $fila = [$this->nombre, $this->clave, $this->mail];
            $filaCSV = implode(",", $fila) . "\n";
            fwrite($archivo, $filaCSV);
            fclose($archivo); 
            return true;
        }
    }

    public function getClave(){
        return $this->clave;
    }
}
?>
