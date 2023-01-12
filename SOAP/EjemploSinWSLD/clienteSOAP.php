<?php

$opciones = array('uri'=>'http://localhost/Ejercicios-PHP/SOAP/EjemploSinWSLD',
                    'location'=>'http://localhost/Ejercicios-PHP/SOAP/EjemploSinWSLD/serverSOAP.php');

try {
    $cliente = new SoapClient(null,$opciones);
    $respuesta = $cliente->suma(2,2);
    echo $respuesta;
} catch (SoapFault $e) {
    echo "ERROR: " . $e->getMessage();
}

?>