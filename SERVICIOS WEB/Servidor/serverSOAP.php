<?php
include "librari.php";

$options = array('uri'=>"https://localhost/Ejercicios-PHP/SERVICIOS%20WEB/Servidor/");

$server = new SoapServer(null,$options);

$server->setClass('librari');

$server->handle();

?>