<?php

$servername = "localhost";
$username = "root";
$password = "";
$conexion = new PDO("mysql:host=$servername",$username,$password);
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>