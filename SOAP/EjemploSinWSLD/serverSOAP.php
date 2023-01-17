<?php
include('Calculadora.php');



$servidor = new SoapServer('http://localhost/Ejercicios-PHP/SOAP/EjemploSinWSLD/conf.wsdl');

$servidor->setClass('Calculadora');

$servidor->handle();

?>