<?php


try {
    $cliente = new SoapClient('https://localhost/Ejercicios-PHP/SOAP/Ejercicio3/tempconvert.wsdl');

    $array = array('celsius'=>'40');
    
    $respuesta = $cliente->resta(5,2);
    echo $respuesta;
} catch (SoapFault $e) {
    echo "ERROR: " . $e->getMessage();
}

?>