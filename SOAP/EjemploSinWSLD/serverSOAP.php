<?php
include('Calculadora.php');

$opciones = array('uri'=>'https://localhost/Ejercicios-PHP/SOAP/EjemploSinWSLD');

$servidor = new SoapServer(NULL,$opciones);

$servidor->setClass('Calculadora');

$servidor->handle();

?>