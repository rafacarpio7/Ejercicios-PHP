<?php

    include_once "../Modelo/Usuarios.php";

    $usuarioLogin = new Usuarios();

    $registros = $usuarioLogin->login();
    // Comprobamos que coincida código, nombre de usuario y contraseña



    if (count($registros)<=0) {
        header("location: ../Vista/login.php?mensaje=Login incorrecto");
    } else {
        if ($_REQUEST['idLogin']=='admin') {
            session_start();
            if ($_REQUEST["idLogin"] == $registros[0]["id_usuario"]&&$_REQUEST["contraseña"]=='1234') {
                $_SESSION['idUsuario']=$_REQUEST['idLogin'];
                header("location: ../Vista/vista_viviendas.php");
            }else{
                header("location: ../Vista/login.php?mensaje=Login incorrecto");
            }
            
        } else {
            if (password_verify($_REQUEST["contraseña"], $registros[0]["password"])&&($_REQUEST["idLogin"] == $registros[0]["id_usuario"])) {
                session_start();
                $_SESSION['idUsuario']=$_REQUEST['idLogin'];
                header("location: ../Vista/vista_viviendas.php");
            } else {
                header("location: ../Vista/login.php?mensaje=Login incorrecto");
            }
        }
    }
    
?>