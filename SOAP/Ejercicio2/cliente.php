
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">

        Fecha a Consultar : <input type="date" name="fechaParam" >
        <input type="submit" name="btnEnviar" value="Enviar">

    </form>
    <?php

    $opciones = array('uri'=>'http://localhost/Ejercicios-PHP/SOAP/Ejercicio2',
                        'location'=>'http://localhost/Ejercicios-PHP/SOAP/Ejercicio2/server.php');

    try {
        $cliente = new SoapClient(null,$opciones);
        if (isset($_REQUEST['btnEnviar'])) {
            $respuesta = $cliente->booleanFecha($_REQUEST['fechaParam']);
            echo $respuesta;
        }
    } catch (SoapFault $e) {
        echo "ERROR: " . $e->getMessage();
    }

    ?>
</body>
</html>
