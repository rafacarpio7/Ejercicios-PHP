<?php


try {
    $cliente = new SoapClient('http://localhost/Ejercicios-PHP/SOAP/EjemploSinWSLD/conf.wsdl');
    $respuesta = $cliente->resta(5,2);
    echo $respuesta;
} catch (SoapFault $e) {
    echo "ERROR: " . $e->getMessage();
}

?>