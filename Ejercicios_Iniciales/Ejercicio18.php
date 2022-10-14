<!-- Realizar un script en PHP se obtenga un número aleatorio entre 1 y 100.
Deberá mostrarse en pantalla el número generado y la suma de todos los números
pares anteriores a él.
 -->
<html>

<head>
    <title>Ejercicio 18</title>
</head>
<body>
    <?php
    $suma=0;
    
    for ($i=0; $i <= rand(1,100); $i++) { 
        if (($i%2)==0) {
            
            $suma = $suma + $i;
            echo "$suma </br>";
        }
    }
    echo $suma

    

    

    ?>
</body>


</html>