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
  <select name="zona" >
    <option value="vacio" select>--------</option>
    <option value="Norte">Norte</option>
    <option value="Sur">Sur</option>
    <option value="Este">Este</option>
    <option value="Oeste">Oeste</option>
    <option value="Centro">Centro</option>
  </select>
  <input type="submit" name="btnEnviar" value="Enviar">

</form>

    
<?php

$opciones = array('uri'=>'http://localhost/Ejercicios-PHP/Ejercicio_SOAP_15/',
                    'location'=>'http://localhost/Ejercicios-PHP/Ejercicio_SOAP_15/servidor.php');
$opciones = array('uri'=>'http://localhost/Ejercicios-PHP/Ejercicio_SOAP_15/',
                    'location'=>'http://localhost/Ejercicios-PHP/Ejercicio_SOAP_15/servidor.php');

try {
    $cliente = new SoapClient(null,$opciones);

    if (isset($_REQUEST['btnEnviar'])) {
        if ($_REQUEST['zona']=='vacio') {
            $respuesta = $cliente->totalViviendas();
            echo $respuesta;
        } else {
            $respuesta = $cliente->totalViviendasFiltro($_REQUEST['zona']);
            echo $respuesta;
        }
        
        
    }
} catch (SoapFault $e) {
    echo "ERROR: " . $e->getMessage();
}

?>
</body>
</html>