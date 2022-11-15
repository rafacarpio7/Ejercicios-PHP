<?php
// Abrimos la sesion por si no se encuentra abierta e inmediatamente la cerramos y localizamos al index para volver a iniciar sesion
session_start();
session_destroy();
header("Location: index.php");
?>