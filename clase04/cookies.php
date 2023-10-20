<?php

if(isset($_COOKIE['prueba'])){
    echo "<p> La cookie ha sido creada con exito <p>";
}else{
    echo "<p> La cookie no eciste, se va a crear ahora<p>";
    setcookie("prueba", 1, time() + (60*2));
}

?>