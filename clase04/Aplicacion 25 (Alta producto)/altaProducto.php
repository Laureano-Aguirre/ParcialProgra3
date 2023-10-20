<?php

/*
Archivo: altaProducto.php
método:POST
Recibe los datos del producto(código de barra (6 sifras ),nombre ,tipo, stock, precio )por POST ,
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000). crear un objeto y
utilizar sus métodos para poder verificar si es un producto existente, si ya existe el producto se le
suma el stock , de lo contrario se agrega al documento en un nuevo renglón
Retorna un :
“Ingresado” si es un producto nuevo
“Actualizado” si ya existía y se actualiza el stock.
“no se pudo hacer“si no se pudo hacer
Hacer los métodos necesarios en la clase
*/

include "producto.php";

if (isset($_POST["codigoBarras"]) && isset($_POST["nombre"]) && isset($_POST["tipo"]) && isset($_POST["stock"]) && isset($_POST["precio"])) {

    $nombreProducto = $_POST["nombre"];
    $stockProducto = $_POST["stock"];

    $productos = cargarProductosDesdeJSON("productos.json");
    var_dump($productos);
    mostrarProductos($productos);
    $producto = new Producto($id, $_POST["codigoBarras"], $nombreProducto, $_POST["tipo"], $stockProducto, $_POST["precio"]);

    if (!Producto::existeProducto($nombreProducto, $productos)) {
        $id = generarIDAutoincremental(); 
        
        if (escribirEnJSON($producto, $id)) {
            
            echo '<br>Ingresado...';
            
            $productos = cargarProductosDesdeJSON("productos.json");
            var_dump($productos);
            mostrarProductos($productos);
        }
    }else {
        echo '<br>Ya existe el producto, actualizandolo...';
        if(actualizarJSON($productos, $producto, $nombreProducto, $stockProducto)){
            echo'<br>Producto actualizado...<br>';
        }else{
            echo'<br>Error al actualizar el producto...<br>';
        }
        
    }
}else {
    echo '<br>No se pudo hacer...';
}

function escribirEnJSON($producto, $id){

    // Lee el contenido del archivo JSON
    $contenidoJSON = file_get_contents("productos.json");
    echo'<br> ENTRE A ESCRIBIR EN JSON<br>';

    // Decodifica el contenido JSON
    $productos = json_decode($contenidoJSON);
    
    if($productos){
        echo'<br> ENTRE A ESCIRIBIR EN JSON3<br>';
        $codBarras = $producto->getCodigoBarras();
        $nombre = $producto->getNombre();
        $tipo = $producto->getTipo();
        $stock = $producto->getStock();
        $precio = $producto->getPrecio();

        $arrayAsoc = array("id" => "$id", "codigoBarras" => "$codBarras", "nombre" => "$nombre", "tipo" => "$tipo", "stock" => "$stock", "precio" => "$precio");

        $productos[] = $arrayAsoc;

        $json = json_encode($productos);

        $nombreArchivo = "productos.json";

        if($archivo = fopen($nombreArchivo, 'w')){
            fwrite($archivo, $json);
            fclose($archivo);
            return true;
        }else{
            echo "<br>$nombreArchivo no se pudo abrir correctamente";
            return false;
        }
    }else{
        $codBarras = $producto->getCodigoBarras();
        $nombre = $producto->getNombre();
        $tipo = $producto->getTipo();
        $stock = $producto->getStock();
        $precio = $producto->getPrecio();

        $arrayAsoc = array("id" => "$id", "codigoBarras" => "$codBarras", "nombre" => "$nombre", "tipo" => "$tipo", "stock" => "$stock", "precio" => "$precio");

        $productos[] = $arrayAsoc;

        $json = json_encode($productos);

        $nombreArchivo = "productos.json";

        if($archivo = fopen($nombreArchivo, 'w')){
            fwrite($archivo, $json);
            fclose($archivo);
            return true;
        }else{
            echo "<br>$nombreArchivo no se pudo abrir correctamente";
            return false;
        }
        echo'<br> ENTRE A ESCIRIBIR EN JSON2<br>';
    }
    
}

function actualizarJSON($productos, $producto, $nombreProducto, $stock){
    foreach($productos as $producto){
        if($producto->nombre === $nombreProducto){
            echo"<br>$producto->stock";
            $producto->stock += $stock;
            echo"<br>$producto->stock";
            break;
        }
    }

    $json = json_encode($productos);

        $nombreArchivo = "productos.json";

        if($archivo = fopen($nombreArchivo, 'w')){
            fwrite($archivo, $json);
            fclose($archivo);
            return true;
        }else{
            echo "<br>$nombreArchivo no se pudo abrir correctamente";
            return false;
        }

}

function mostrarProductos($productos){

    if($productos){
        echo'<br> ENTRE A MOSTRAR PRODUCTOS<br>';
        foreach ($productos as $producto) {

            echo "<br>ID: " . $producto->id . "<br>\n";
            echo "Codigo de barras: " . $producto->codigoBarras . "<br>\n";
            echo "Nombre: " . $producto->nombre . "<br>\n";
            echo "Tipo: " . $producto->tipo . "<br>\n";
            echo "Stock: " . $producto->stock . "<br>\n";
            echo "Precio: " . $producto->precio . "<br>\n";
        }
    }else{
        echo'<br> ARRAY VACIO...<br>';
    }
    
}

function generarIDAutoincremental() {

    // Lee el contenido del archivo JSON
    $contenidoJSON = file_get_contents("productos.json");

    // Decodifica el contenido JSON
    $productos = json_decode($contenidoJSON);

    // Obtiene el ID más alto
    $id = 0;
    foreach ($productos as $producto) {
        if ($producto->id > $id) {
            $id = $producto->id;
        }
    }

    // Devuelve el ID más alto + 1
    return $id + 1;
}

function cargarProductosDesdeJSON($archivo){

    // Lee el contenido del archivo JSON
    $contenidoJSON = file_get_contents($archivo);

    // Decodifica el contenido JSON
    $productos = json_decode($contenidoJSON);

    // Verifica si la decodificación fue exitosa
    if ($productos) {
        echo '<br>Decodificacion exitosa...';
        return $productos;
    } else {
        echo "<br>Error al decodificar el archivo JSON.";
    }
}



?>
