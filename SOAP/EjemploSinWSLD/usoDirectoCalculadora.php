<?php
include('Calculadora.php');
$calc= new Calculadora();
$respuesta= $calc->suma(2,2);
echo $respuesta;
?>