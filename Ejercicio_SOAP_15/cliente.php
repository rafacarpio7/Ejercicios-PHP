<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

$opciones = array('uri'=>'http://localhost/Ejercicios-PHP/Examen_Sorpresa2%c2%baTerm/post.php',
                    'location'=>'https://localhost/Ejercicios-PHP/Ejercicio_SOAP_15/servidor.php');

try {
    $cliente = new SoapClient(null,$opciones);
    if (isset($_REQUEST['btnEnviar'])) {
        $respuesta = $cliente->booleanAdopcion($_REQUEST['idAnimal']);
        echo $respuesta;
    }
} catch (SoapFault $e) {
    echo "ERROR: " . $e->getMessage();
}

?>
</body>
</html>