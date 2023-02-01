<?php
session_start();
if (isset($_SESSION['idUsuario'])) {
    header("Location: ../Vista/vistaPrueba.php");
} else {
    header("Location: ../Vista/login.php");
}


?>