<?php

/*
(1 pt.) PizzaCarga.php: (por GET)se ingresa Sabor, precio, Tipo (“molde” o “piedra”), cantidad( de unidades). Se
guardan los datos en en el archivo de texto Pizza.json, tomando un id autoincremental como
identificador(emulado) .Sí el sabor y tipo ya existen , se actualiza el precio y se suma al stock existente.
*/
include 'pizza.php';

if (isset($_GET["sabor"]) && isset($_GET["precio"]) && isset($_GET["tipo"]) && isset($_GET["cantidad"])){

    $sabor = $_GET["sabor"];
    $tipo = $_GET["tipo"];
    $pizzas = cargarPizzasDesdeJSON('Pizza.json');

    Pizza::existePizza($sabor, $tipo, $pizzas);

    if($retorno >= 1 || $retorno <= 3){     //existe, resta definir que existe
        if($retorno === 1){
            echo '<br>Si hay. Existe el sabor y el tipo.';
        }else if($retorno === 2){
            echo '<br>Si hay. Existe solo el sabor.';
        }else if($retorno === 3){
            echo '<br>Si hay. Existe solo el tipo.';
        }
    }else if($retorno === 0){
        echo '<br>No existe ni el tipo ni el sabor. Agregandola...';
        $id = generarIDAutoincremental();
        $pizza = new Pizza($id, $sabor, $_GET["precio"], $tipo, $_GET["cantidad"]);

        
    }
}else{
    echo'<br>Parametros incorrectos.';
}

function cargarPizzasDesdeJSON($archivo){

    // leo el contenido
    $contenidoJSON = file_get_contents($archivo);

    // lo decodifico
    $pizzas = json_decode($contenidoJSON);

    // confirmo que este cargado el array
    if ($pizzas) {
        echo '<br>Decodificacion exitosa...';
        return $pizzas;
    } else {
        echo "<br>Error al decodificar el archivo JSON.";
    }
}

function generarIDAutoincremental() {

    $contenidoJSON = file_get_contents("Pizza.json");   //lee el contenido del archivo

    $pizzas = json_decode($contenidoJSON);   //lo decodifica

    $id = 0;
    foreach ($pizzas as $pizza) {
        if ($pizzas->id > $id) {
            $id = $pizza->id;    //busca el ultimo id
        }
    }

    return $id + 1; //devuelve el que le sigue del ultimo
}

?>