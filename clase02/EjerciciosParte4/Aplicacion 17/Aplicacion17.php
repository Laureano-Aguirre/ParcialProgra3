<?php
/*
Realizar una clase llamada “Auto” que posea los siguientes atributos

privados: _color (String)
_precio (Double)
_marca (String).
_fecha (DateTime)

Realizar un constructor capaz de poder instanciar objetos pasándole como

parámetros: i. La marca y el color.
ii. La marca, color y el precio.
iii. La marca, color, precio y fecha.

Realizar un método de instancia llamado “AgregarImpuestos”, que recibirá un doble
por parámetro y que se sumará al precio del objeto.
Realizar un método de clase llamado “MostrarAuto”, que recibirá un objeto de tipo “Auto”
por parámetro y que mostrará todos los atributos de dicho objeto.
Crear el método de instancia “Equals” que permita comparar dos objetos de tipo “Auto”. Sólo
devolverá TRUE si ambos “Autos” son de la misma marca.
Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son
de la misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double con
la suma de los precios o cero si no se pudo realizar la operación.
Ejemplo: $importeDouble = Auto::Add($autoUno, $autoDos);


*/
class Auto{
    private $_color;
    private $_precio;
    private $_marca;
    private $_fecha;

    public function __construct($_marca, $_color, $_precio = null, $_fecha = null){
        $this->_marca = $_marca;
        $this->_color = $_color;
        $this->_precio = $_precio;
        $this->_fecha = $_fecha;
    }

    public function AgregarImpuesto($valorAgregado){
        $this->_precio = $this->_precio + $valorAgregado;
    }

    function MostrarAuto($auto){
        if($auto->_precio != null){
            echo("<br> MARCA: $auto->_marca <br>
            COLOR: $auto->_color <br>
            PRECIO: $auto->_precio <br>");
        }elseif($auto->_precio == null){
            echo("MARCA: $auto->_marca <br>
            COLOR: $auto->_color <br>");
        }elseif($auto->_fecha != null){
            echo("MARCA: $auto->_marca <br>
            COLOR: $auto->_color <br>
            PRECIO: $auto->_precio <br>
            FECHA: $auto->_fecha <br>");
        }elseif($auto->_fecha == null){
            echo("MARCA: $auto->_marca <br>
            COLOR: $auto->_color <br>
            PRECIO: $auto->_precio <br>");
        }
    }

    function Equals($auto1, $auto2){
        if($auto1->_marca == $auto2->_marca){
            return true;
        }
    }

    function Add($auto1, $auto2){
        if(($auto1->_marca == $auto2->_marca) && ($auto1->_color == $auto2->_color)){
            return $precioTotal = $auto1->_precio + $auto2->_precio;
        }else{
            return 0;
        }
    }
}



?>