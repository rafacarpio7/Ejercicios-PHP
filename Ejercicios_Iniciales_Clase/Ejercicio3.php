<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio 3</title>
        <?php

            $num1 = 2; 
            $num2 = 2; 
            $res ; 
            $sum ;  
            $div ; 
            $mod ;
            function resta() {
                global $num1,$num2;
                return  $num1 - $num2;
            }

            function multiplicacion($numero1,$numero2) {
                return  $numero1 * $numero2;
            }

        ?>
    </head>

    <body>

        
            <?php
            include 'Ejercicio3-2.php';
            include 'Ejercicio3-3.php';
            $sum = $num1 + $num2 ;



            echo "<h2> El resultado de la suma es: $sum  </h2></br>" ;
            echo "<h2> El resultado de la resta es:" .resta()," </h2></br>" ;
            echo "<h2> El resultado de la multiplicacion es: ".multiplicacion($num1,$num2)," </h2></br>" ;
            echo "<h2> El resultado de la division es: ".$div ,"</h2></br>" ;
            echo "<h2> El resultado del modulo  es: ".$mod," </h2></br>" ;

            ?> 
        
        


    </body>
</html>