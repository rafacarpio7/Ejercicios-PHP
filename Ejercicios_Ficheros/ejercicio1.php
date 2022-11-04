<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Opcion de lectura</p> <br> <br>
    <?php
    $fichero = fopen("fichero.txt","r+b");

    if (!$fichero) {
        echo "error al abrir el archivo";
    }

    $cadena = fread($fichero,filesize("fichero.txt"));
    echo $cadena;

    fwrite($fichero,"mañana");
    
    rewind($fichero);
    $cadena = fread($fichero,filesize("fichero.txt"));
    echo $cadena;

    echo "</br>---------------------------------";

    $pagina = file_get_contents("http://elpais.com/");
    echo $pagina;
    ?>
</body>
</html>