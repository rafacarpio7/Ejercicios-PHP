<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
    if (isset($_POST['nombre'])) {
        $nombre = (int)$_POST['nombre'];

        if (is_integer($nombre)) {
            echo "El numero $nombre es entero" ; 
        }else {
            echo "No admitido";
        }
    
    }else {
        echo "El formulario esta vacio";
    }
    
?>
</head>

<body>


    <form method="post" action="">

        <label for="nombre">Nombre:</label>
        <input type="number" name="nombre" require>

        <p><input type="submit" name="botonEnviar" value="Enviar datos"></p>
    </form>


</body>

</html>