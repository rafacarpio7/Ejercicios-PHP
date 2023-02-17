<?php
session_start();
if (isset($_REQUEST['enviar'])) {
    require "../Modelo/UsuarioDAO.php";
    require "../Modelo/Usuario.php";
    $usuarioTO = new Usuario();
    $usuarioDAO = new UsuarioDAO();
    $usuarioDAO->conectar();
    if ($usuarioDAO->validarAcceso($_REQUEST['usuario'],$_REQUEST['contrasena1'])) {
        header("Location:../Vista/vistaProductos.php");
    } else {
        echo "Login incorrecto pruebe de nuevo";
    }
    
    
} else {
    # code...
}


?>