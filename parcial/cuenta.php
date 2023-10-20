<?php

class Cuenta implements JsonSerializable
{
    private $id;
    private $nombre;
    private $apellido;
    private $tipoDocumento;
    private $nroDocumento;
    private $email;
    private $tipoCuenta;
    private $moneda;
    private $saldoInicial;

    public function __construct($id, $nombre, $apellido, $tipoDocumento, $nroDocumento, $email, $tipoCuenta, $moneda, $saldoInicial)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->tipoDocumento = $tipoDocumento;
        $this->nroDocumento = $nroDocumento;
        $this->email = $email;
        $this->tipoCuenta = $tipoCuenta;
        $this->moneda = $moneda;
        $this->saldoInicial = $saldoInicial;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getTipoDocumento()
    {
        return $this->tipoDocumento;
    }

    public function getNroDocumento()
    {
        return $this->nroDocumento;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getTipoCuenta()
    {
        return $this->tipoCuenta;
    }

    public function getMoneda()
    {
        return $this->moneda;
    }

    public function getSaldoInicial()
    {
        return $this->saldoInicial;
    }

    public function setId($nuevoId) {
        $this->id= $nuevoId;
    }

    public static function existeCuenta($cuentas, $nombreCuenta, $tipoCuenta)
    {        
        if ($cuentas) {
            foreach($cuentas as $cuenta){
                if($cuenta->nombre === $nombreCuenta && $cuenta->tipoCuenta === $tipoCuenta){
                    return 1;       //coincide ambas
                }elseif($cuenta->nombre === $nombreCuenta && $cuenta->tipoCuenta !== $tipoCuenta){
                    return 2;       //coincide solo el nombre
                }elseif($cuenta->tipoCuenta === $tipoCuenta && $cuenta->nombre !== $nombreCuenta){
                    return 3;       //coincide solo tipo de cuenta
                }
            }
        } else {
            echo "<br>Archivo vacio...";
        }
        return 0;
    }

    public static function actualizarSaldo($cuentas, $nombreCuenta, $tipoCuenta, $saldo){
        if($cuentas){
            foreach($cuentas as $cuenta){
                if($cuenta->nombre === $nombreCuenta && $cuenta->tipoCuenta === $tipoCuenta){
                    $cuenta->saldoInicial =  $cuenta->saldoInicial + $saldo;
                    return $cuentas;
                }
            }
        }else{
            echo'<br>Array vacio...';
            return false;
        }
    }

    public static function retornarCuenta($cuentas, $nombreCuenta, $tipoCuenta){
        if($cuentas){
            foreach($cuentas as $cuenta){
                if($cuenta->nombre === $nombreCuenta && $cuenta->tipoCuenta === $tipoCuenta){
                    return $cuenta;
                }
            }
        }else{
            echo'<br>Array vacio...';
        }
        return null;
    }

    public static function buscarCuentaPorNro($cuentas, $numeroCuenta){
        if($cuentas){
            foreach($cuentas as $cuenta){
                if($numeroCuenta == $cuenta->id){
                    return $cuenta;
                }
            }
        }else{
            echo'<br>Array vacio...';
        }
        return null;
    }
}