<?php

class Pizza implements JsonSerializable{
    private $id;
    private $sabor;
    private $precio;
    private $tipo;
    private $cantidad;

    public function __construct($id, $sabor, $precio, $tipo, $cantidad)
    {
        $this->id = $id;
        $this->sabor = $sabor;
        $this->precio = $precio;
        $this->tipo = $tipo;
        $this->cantidad = $cantidad;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function getId() {
        return $this->id;
    }

    public function getSabor() {
        return $this->sabor;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public static function existePizza($sabor, $tipo, $pizzas){
        echo '<br> ENTRE EN EXISTE PRODUCTO<br>';
        if ($pizzas) {
            echo '<br>ENTRE EN EXISTE PRODUCTOS 2<br>';
            foreach ($pizzas as $pizza) {
                if ($pizza->sabor === $sabor ) {
                    if($pizza->tipo === $tipo){
                        return 1; //existe sabor y tipo
                    }else{
                        return 2; //existe solo sabor
                    }
                }else if($pizza->tipo === $tipo){
                    if($pizza->sabor === $sabor){
                        return 1; //existe sabor y tipo
                    }else{
                        return 3; //existe solo tipo
                    }
                }
            }
        } else {
            echo "<br>Archivo vacio...";
        }
        return 0; // Devuelve 0 en caso de que no exista ni tipo ni sabor
    }
}

?>