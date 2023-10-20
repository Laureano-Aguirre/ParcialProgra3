<?php
 /*
    Obtenga la fecha actual del servidor (función date) y luego imprímala dentro de la página con
    distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
    año es. Utilizar una estructura selectiva múltiple.
 */

    //$formato = "dd/MM/AAAA";
    $date = date("d-m-Y");

    $mes = date("m", strtotime($date));

    if($mes >= 12 || $mes <=03)
    {
        $estacion = 'verano';
    }   elseif($mes >=03 || $mes <= 6)
        {
            $estacion = 'otoño';
        }   elseif($mes >=6 || $mes <= 9)
            {
                $estacion = 'invierno';
            }   else if($mes >=9 || $mes <= 12)
                {
                    $estacion = 'primavera';
                }
    echo "La fecha es: $date, y estamos en $estacion!";
?>