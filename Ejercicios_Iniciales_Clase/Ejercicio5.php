<!-- Realiza un programa en php que dados dos números indique cuál de dos números es el
mayor. Inicialmente el programa mostrará el valor de los números y a continuación
indicará: El número _ es mayor que el número _. -->
<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio 5</title>

    </head>

    <body>

        
            <?php
            $numero1 = 5 ;
            $numero2 = 7 ;
            if ($numero1>$numero2) {
                echo "<h2>El numero $numero1 es mayor que $numero2</h2>";
            } elseif ($numero1<$numero2) {
                echo "<h2>El numero $numero1 es menor que $numero2</h2>";
            } else {
                echo "<h2>El numero $numero1 es igual al numero $numero2</h2>";
            }
            ?> 
        
    </body>
</html>
