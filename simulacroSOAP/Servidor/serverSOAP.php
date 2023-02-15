<?php
include "vivienda.php";

$options = array('uri'=>"http://localhost/Ejercicios-PHP/simulacroSOAP/Servidor/");

$server = new SoapServer(null,$options);

$server->setClass('vivienda');

$server->handle();

?>