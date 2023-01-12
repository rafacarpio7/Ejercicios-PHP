<?php
include('Animal.php');

$opciones = array('uri'=>'http://localhost/Ejercicios-PHP/SOAP/Ejercicio1');

$servidor = new SoapServer(NULL,$opciones);

$servidor->setClass('Animal');

$servidor->handle();

?>