<?php
include('Validador.php');

$opciones = array('uri'=>'https://localhost/Ejercicios-PHP/Examen_2%C2%BATrimestre/SOAP/');

$servidor = new SoapServer(NULL,$opciones);

$servidor->setClass('Validador');

$servidor->handle();

?>