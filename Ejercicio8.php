<!-- Realizar un programa en php donde se declare la variable posición. Esta variable puede
tomar los valores arriba o abajo. Imprimir el valor que toma variable. Si no toma ninguno
de estos dos valores imprimir por pantalla: “La variable contiene otro valor distinto de
arriba y abajo”. Realizar el ejercicio utilizando la sentencia SWITCH-->
<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio 8</title>

    </head>

    <body>

                   
                   
            <?php
            $variable = 'abajo';

            switch ($variable) {
                case 'arriba':
                    echo "<h1> $variable </h1>";
                    break;
                
                case 'abajo':
                    echo "<h1> $variable </h1>";
                    break;
                default:
                    echo "<h2>La variable contiene otro valor distinto de
                    arriba y abajo</h2> ";
            }

            ?>
        
    </body>
</html>
