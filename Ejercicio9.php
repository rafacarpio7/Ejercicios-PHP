<!-- Realizar un programa en php donde dado un número del 1 al 7 indique a que día de la
semana corresponde. Si el número no está entre 1 y 7 el programa lo deberá de indicar.-->
<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio 9</title>

    </head>

    <body>

                   
                   
            <?php
            $diaSemana = 5;


            switch ($diaSemana) {
                case 1:
                    echo "<h1>Hoy es LUNES</h1>";
                    break;
                case 2:
                    echo "<h1>Hoy es MARTES</h1>";
                    break;
                case 3:
                    echo "<h1>Hoy es MIERCOLES</h1>";
                    break;
                case 4:
                    echo "<h1>Hoy es JUEVES</h1>";
                    break;
                case 5:
                    echo "<h1>Hoy es VIERNES</h1>";
                    break;
                case 6:
                    echo "<h1>Hoy es SABADO</h1>";
                    break;
                case 7:
                    echo "<h1>Hoy es DOMINGO</h1>";
                    break;
                default:
                    echo "<h2>El dia introducido debe estar entre 1 y 7</h2>";
                    break;
            }

            ?>
        
    </body>
</html>
