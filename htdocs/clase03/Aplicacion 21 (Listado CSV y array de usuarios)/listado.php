<?php

/*
Archivo: listado.php
método:GET
Recibe qué listado va a retornar(ej:usuarios,productos,vehículos,...etc),por ahora solo tenemos
usuarios).
En el caso de usuarios carga los datos del archivo usuarios.csv.
se deben cargar los datos en un array de usuarios.
Retorna los datos que contiene ese array en una lista
*/


if(isset($_GET['listado']) && $_GET['listado'] === 'usuarios'){

    $usuariosArray = cargarUsuariosDesdeCSV("usuarios.csv");
    echo '<h1>Lista de Usuarios:</h1>';
    echo '<ul>';
    foreach ($usuariosArray as $usuario) {
        echo '<li>' . implode(', ', $usuario) . '</li>';
    }
    echo '</ul>';
} else {
    echo 'No se ha especificado un listado válido.';
}

function cargarUsuariosDesdeCSV($archivo){
    $usuarios = [];
    if(($handle = fopen($archivo, 'r')) !== false){
        while (($data = fgetcsv($handle, 1000, ',')) !== false) {
            $usuarios[] = $data;
        }
        fclose($handle);
    }
    return $usuarios;
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

    

    public function getClave(){
        return $this->clave;
    }
}

?>