<?php
session_start();
if (isset($_SESSION['idUsuario'])) {
    header("Location: ../Vista/vista_viviendas.php");
} else {
    header("Location: ../Vista/login.php");
}


?>