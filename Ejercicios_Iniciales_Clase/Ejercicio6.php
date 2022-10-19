<!-- Realizar un programa en php en el que dado un número entero positivo determine si es
par o impar. Si el número no es un entero positivo deberá de mostrar un mensaje
indicándolo (la función is_integer puede ayudarte) -->
<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio 6</title>

    </head>

    <body>

        
            <?php
            $numero = 6.1 ;
            switch (is_int($numero)) {
                case TRUE:
                    if (($numero%2)==0) {
                        echo "<h1>El numero $numero es par</h1>";
                    
                    }else {
                        echo "<h1>El numero $numero es impar</h1>";
                    }
                    break;
                
                case FALSE:
                    echo "<h1>El numero $numero no es entero</h1>";
                    break;
            }
            ?> 
        
    </body>
</html>
