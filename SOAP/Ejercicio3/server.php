<?php




$servidor = new SoapServer('https://localhost/Ejercicios-PHP/SOAP/Ejercicio3/tempconvert.wsdl');

$servidor->setClass('TempConvert');

$servidor->handle();

?>