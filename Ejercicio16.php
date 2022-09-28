<!-- Realiza una matriz de 3 filas por 4 columnas. El contenido de cada uno de los elementos
de la matriz se generará de manera aleatoria. Una vez generada:
• Muestra el contenido de la matriz en formato filas x columnas
• Identifica el número mayor y menor generado dentro de la matriz
• Calcula la media de los números impares contenidos en la matriz
• Imprime únicamente la diagonal
• Imprime únicamente la primera columna
 -->
<html>

<head>
    <title>Ejercicio 16</title>
</head>

<body>
    <?php
    
    $matriz = array(
                array(rand(1,10),rand(1,10),rand(1,10),rand(1,10)),
                array(rand(1,10),rand(1,10),rand(1,10),rand(1,10)),
                array(rand(1,10),rand(1,10),rand(1,10),rand(1,10)));
    print_r($matriz);

    foreach ($matriz as $key => $value) {
        echo "<h1>($value[0],$value[1],$value[2],$value[3])</h1>";
    }

    

    ?>
</body>


</html>