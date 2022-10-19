<!--Realiza un programa en php en el que se declare un vector donde en cada posición se
almacene un día de la semana. A continuación imprima la posición que corresponda
para que en pantalla se muestre: miércoles.-->
<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio 12</title>

    </head>

    <body>

            
            
    <?php
        $vector  = array(1 => "lunes",2 => "martes",3 => "miercoles",4 => "jueves",5 => "viernes",6 => "sabado", 7 => "domingo");
        foreach ($vector as $key =>$value) {
            if ($key == 3 || $value=="miercoles") {
                echo "<h1>hoy es el dia $key de la semana y es $value</h1>";
            }
        }

    ?>
        
    </body>
</html>
