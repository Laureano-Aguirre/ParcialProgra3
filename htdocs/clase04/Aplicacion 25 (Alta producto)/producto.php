<?php

class Producto{
    private $id;
    private $codigoBarras;
    private $nombre;
    private $tipo;
    private $stock;
    private $precio;

    public function __construct($id, $codigoBarras, $nombre, $tipo, $stock, $precio)
    {
        $this->id = $id;
        $this->codigoBarras = $codigoBarras;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->stock = $stock;
        $this->precio = $precio;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getCodigoBarras() {
        return $this->codigoBarras;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getStock() {
        return $this->stock;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public static function existeProducto($nombreProducto, $productos){
        echo '<br> ENTRE EN EXISTE PRODUCTO<br>';
        if ($productos) {
            echo '<br>ENTRE EN EXISTE PRODUCTOS 2<br>';
            foreach ($productos as $producto) {
                if ($producto->nombre === $nombreProducto) {
                    return true;
                }
            }
        } else {
            echo "<br>Archivo vacio...";
        }
        return false; // Devuelve false solo después de comprobar todos los productos
    }

    
}


?>