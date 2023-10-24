<?php

/*
(1pt.) PizzaConsultar.php: (por POST)Se ingresa Sabor,Tipo, si coincide con algún registro del archivo Pizza.json,
retornar “Si Hay”. De lo contrario informar si no existe el tipo o el sabor.
*/
include 'pizza.php';

if (isset($_POST["sabor"]) && isset($_POST["tipo"])){

    $sabor = $_POST["sabor"];
    $tipo = $_POST["tipo"];
    $pizzas = cargarPizzasDesdeJSON('Pizza.json');
    
    $retorno = Pizza::existePizza($sabor, $tipo, $pizzas);

    if($retorno >= 1 || $retorno <= 3){     //existe, resta definir que existe
        if($retorno === 1){
            echo '<br>Si hay. Existe el sabor y el tipo.';
        }else if($retorno === 2){
            echo '<br>Si hay. Existe solo el sabor.';
        }else if($retorno === 3){
            echo '<br>Si hay. Existe solo el tipo.';
        }
    }else if($retorno === 0){
        echo '<br>No existe ni el tipo ni el sabor.';
    }

}else {
    echo '<br>NParametros incorrectos...';
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
?>