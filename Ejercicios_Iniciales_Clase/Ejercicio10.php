<!-- Realizar un programa en php que escriba por pantalla la sucesión de Fibonacci. Cada
número de la serie de Fibonacci se forma sumando los dos números anteriores.-->
<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio 10</title>

    </head>

    <body>

            
            
    <?php
        function fibonacci($numeroCorte) {
            $fibo1 = 1;
            $fibo2 = 0;
            for ($i=0; $i <=$numeroCorte; $i++) { 
                $fibo3=$fibo1+$fibo2;
                $fibo1=$fibo2;
                $fibo2=$fibo3;
                echo $fibo3." ";
            }
            
        }

        

        
        fibonacci(10);

    ?>
        
    </body>
</html>
