<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>PUFOSA - LOG</title>
</head>
<body>
    <?php
    include_once "CRUD.php";

    $log = fopen("log.csv","rb");


    echo "<table style='width: 400px;' ><th style='font-size: 28px';>Fichero LOG</th>";
    

    while (feof($log)==false) {
        // mostramos por cada linea hasta que encuentra un salto de linea en un td de una tabla
        // hasta que no encuentra mas lineas
        // En este caso he intentado tambien sacarlo para establecer un formato mas estetico pero sin resultado
        echo "<tr>
                <td>".fgets($log)."</td>
                </tr>";

        /*echo "<tr> 
                    <td>".substr(fgets($log), 0, 6)." </td>
                    <td>Prueba</td>
                    <td>".substr(fgets($log), 7, 4). "</td>
                    <td>".substr(fgets($log), 12, 22)."</td>
              </tr>";
           */
         
        //echo fgets($log). "<br>";
    }
    echo "</table>"
    ?>


</body>
</html>