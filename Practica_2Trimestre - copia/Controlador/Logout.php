<?php
// Abrimos la sesion por si no se encuentra abierta e inmediatamente la cerramos y localizamos al index para volver a iniciar sesion
session_start();
$usuario = $_SESSION['idUsuario'];
setcookie($usuario,date("d-m-Y H:i:s"), time()+60*60*24,'/');
session_destroy();
header("Location: ../index.php");
?>