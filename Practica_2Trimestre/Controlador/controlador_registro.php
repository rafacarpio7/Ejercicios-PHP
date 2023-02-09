<?php
include_once "../Modelo/Usuarios.php";

if (isset($_REQUEST['btnRegistro'])) {
    $usuarioRegistro = new Usuarios();

    $registrosUsuariosLogeados = $usuarioRegistro->compruebaUsuarioRegistro();

        if (count($registrosUsuariosLogeados)>0) {
            header("location: ../Vista/vista_usuarios.php?mensajeError=El usuario introducido ya se encuentra en la base de datos");
        } else {
            $usuarioRegistro->registro();
        } 
}

?>