<?php
include('Fecha.php');

$opciones = array('uri'=>'http://localhost/Ejercicios-PHP/SOAP/Ejercicio2');

$servidor = new SoapServer(NULL,$opciones);

$servidor->setClass('Fecha');

$servidor->handle();

?>