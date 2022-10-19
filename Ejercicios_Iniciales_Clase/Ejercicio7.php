<!-- Sabiendo que la funcion RAND nos retorna un valor aleatorio entre un rango de dos
enteros: Almacena en una variable un valor entero que la computadora genera de forma
aleatoria entre 1 y 100. Hacer un programa que muestre por pantalla el valor generado.
Mostrar además si es menor o igual a 50 o si es mayor.-->
<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio 7</title>

    </head>

    <body>

                   
                   
            <?php
            $numAleatorio = RAND(1,100);

            if ($numAleatorio>50) {
                echo "<h2>El numero aleatorio es mayor que 50</h2>";
            } else {
                echo "<h2>El numero aleatorio es menor que 50</h2>";
            }
            

            echo "<h3>El numero alearotio es $numAleatorio</h3>";
            ?> 
        
    </body>
</html>
