<!-- Realiza un programa en php que dados dos números indique cuál de dos números es el
mayor. Inicialmente el programa mostrará el valor de los números y a continuación
indicará: El número _ es mayor que el número _. -->
<html>

<head>

<title>
    Ejercicio 5
</title>
</head>

<body>

    <?php
        
        function suma($numerador1,$numerador2) {
            $resultado = $numerador1+$numerador2 ;
            
            return $resultado;
        }


        $num1 = 2 ;
        $num2 = 2 ;
        $sum = $num1 + $num2;

        echo "<h2> $sum </h2> ";

        echo suma($num1,$num2);



    ?>

</body>
</html>
