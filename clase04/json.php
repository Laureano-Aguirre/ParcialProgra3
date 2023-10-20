<?php
//array indexado a JSON
$array = array("Jorge", "Hernan", "Pedro", "Marta");

$json = json_encode($array);

echo $json;

//array asociativo a JSON
$arrayAsoc = array("nombre" => "Jorge", "edad"=>"32");
$json_c = json_encode($arrayAsoc);
echo $json_c;

//clase/objeto a JSON
$clase = new stdClass();
$clase->nombre = 'Jorge';
$clase->edad = 32;

$json_b = json_encode($clase);

echo $json_b;

//JSON a PHP
$json_obj = '{"nombre":"Pedro", "edad":37}';
$obj = json_decode($json_obj);
var_dump($obj);
?>