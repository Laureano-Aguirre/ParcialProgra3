<?php
/*
Crear la clase Garage que posea como atributos privados:

_razonSocial (String)
_precioPorHora (Double)
_autos (Autos[], reutilizar la clase Auto del ejercicio anterior)
Realizar un constructor capaz de poder instanciar objetos pasándole como

parámetros: i. La razón social.
ii. La razón social, y el precio por hora.

Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y
que mostrará todos los atributos del objeto.
Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un
objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.
Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage”
(sólo si el auto no está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Add($autoUno);
Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del
“Garage” (sólo si el auto está en el garaje, de lo contrario informarlo). Ejemplo:
$miGarage->Remove($autoUno);
*/

class Garage{
    private $_razonSocial;
    private $_precioPorHora;
    private $_autos = [];

    public function __construct($_razonSocial, $_precioPorHora = null)
    {
        $this->_razonSocial = $_razonSocial;
        $this->_precioPorHora = $_precioPorHora;
    }

    public function MostrarGaraje(){
        echo"<br><br>RAZON SOCIAL: {$this->_razonSocial}<br>";
        if($this->_precioPorHora !== null){
            echo"PRECIO POR HORA: {$this->_precioPorHora}<br>";
        }
        if (!empty($this->_autos)) { 
            $this->MostrarAutos();
        }
        else{
            echo'GARAJE VACIO<br>';
        }
    }

    public function MostrarAutos(){
        echo"Autos en el garage: <br>";
        foreach($this->_autos as $auto){
            $auto->MostrarAuto($auto);
            echo"<br>";
        }
    }

    public function Equals($auto){
        foreach($this->_autos as $autoGaraje){
            if ($autoGaraje->getMarca() === $auto->getMarca() && $autoGaraje->getColor() === $auto->getColor()) {
                return true; 
            }
        }
        return false; 
    }
    

    public function Add($auto){ 
        if(!$this->Equals($auto)){
            $this->_autos[] = $auto;
            echo'AUTO AGREGADO...';
            return true;
        }
        else{
            echo'<BR>NO SE PUDO AGREGAR EL AUTO...';
            return false;
        }
        
    }

    public function Remove($auto){
        $retorno = array_search($auto, $this->_autos);

        if($retorno !== false){
            unset($this->_autos[$retorno]);
        }
    }
}

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

    public function getMarca(){
        return $this->_marca;
    }

    public function getColor(){
        return $this->_color;
    }
}

?>