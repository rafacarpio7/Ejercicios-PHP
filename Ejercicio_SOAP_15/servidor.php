<?php
include('Viviendas.php');

$opciones = array('uri'=>'http://localhost/Ejercicios-PHP/Ejercicio_SOAP_15/');

$servidor = new SoapServer(NULL,$opciones);

$servidor->setClass('Viviendas');

$servidor->handle();

?>