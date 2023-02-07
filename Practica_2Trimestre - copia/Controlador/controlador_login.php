<?php

    require("../Modelo/Usuarios.php");

    $usuarioLogin = new Usuarios();

    $registros = $usuarioLogin->login();


    // Comprobamos que coincida código, nombre de usuario y contraseña

    if (password_verify($_REQUEST["contraseña"], $registros[0]["password"])&&($_REQUEST["idLogin"] == $registros[0]["id_usuario"])) {
        $_SESSION['idUsuario']=$_REQUEST['idLogin'];
    }


?>