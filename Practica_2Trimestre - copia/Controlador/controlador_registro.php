<?php
include_once "../Modelo/Usuarios.php";

$usuarioRegistro = new Usuarios();
if ($usuarioRegistro->registro()) {
    header("location: ../Vista/vistaPrueba.php");
}else{
    header("location: ../Vista/registro.php?$mensaje=Registro incorrecto");
}


?>