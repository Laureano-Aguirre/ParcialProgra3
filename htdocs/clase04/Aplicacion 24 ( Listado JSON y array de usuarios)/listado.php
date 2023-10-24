<?php

/*
Archivo: listado.php
método:GET
Recibe qué listado va a retornar(ej:usuarios,productos,vehículos,etc.),por ahora solo tenemos
usuarios).
En el caso de usuarios carga los datos del archivo usuarios.json.
se deben cargar los datos en un array de usuarios.
Retorna los datos que contiene ese array en una lista.
Hacer los métodos necesarios en la clase usuario
*/
    $usuariosArray = [];

    if (isset($_GET['listado']) && $_GET['listado'] === 'usuarios') {

        $usuariosArray = cargarUsuariosDesdeJSON("usuarios.json");
    
        if (!empty($usuariosArray)) {
            echo '<h1>Lista de Usuarios:</h1>';
            echo '<ul>';
            $usuarios = cargarUsuariosDesdeJSON("usuarios.json");

            mostrarUsuarios($usuarios);

            /* foreach ($usuariosArray as $usuario) {
                // Utiliza los métodos getters de la clase Usuario para obtener los atributos
                //echo '<li>ID: ' . $usuario->getId() . ', Nombre: ' . $usuario->getNombre() . ', Clave: ' . $usuario->getClave() . ', Mail: ' . $usuario->getMail() . ', Fecha: ' . $usuario->getFecha() . '</li>';
            } */
    
            echo '</ul>';
        } else {
            echo 'No se encontraron usuarios en el archivo JSON.';
        }
    } else {
        echo 'No se ha especificado un listado válido.';
    }

    function mostrarUsuarios($usuarios){

        // Itera sobre el array de usuarios
        foreach ($usuarios as $usuario) {

            // Muestra la información del usuario
            echo "<br>ID: " . $usuario->id . "<br>\n";
            echo "Nombre: " . $usuario->nombre . "<br>\n";
            echo "Clave: " . $usuario->clave . "<br>\n";
            echo "Correo electrónico: " . $usuario->mail . "<br>\n";
            echo "Fecha de creación: " . $usuario->fecha . "<br>\n";
        }
    }

function cargarUsuariosDesdeJSON($archivo){

    // Lee el contenido del archivo JSON
    $contenidoJSON = file_get_contents($archivo);

    // Decodifica el contenido JSON
    $usuario = json_decode($contenidoJSON);

    // Verifica si la decodificación fue exitosa
    if ($usuario) {
        echo 'Decodificacion exitosa...';
        return $usuario;
    } else {
        echo "Error al decodificar el archivo JSON.";
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