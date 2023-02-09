<?php
include_once "../Modelo/Usuarios.php";

$usuarios = new Usuarios();

$registrosUsuarios = $usuarios->obtieneSinPass();

if (isset($_REQUEST['btnBorrarUsuario'])) {
    $usuarios->borraUsuario();
}



?>