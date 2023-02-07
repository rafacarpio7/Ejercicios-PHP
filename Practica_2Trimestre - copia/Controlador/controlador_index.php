<?php
session_start();

if (isset($_SESSION['idUsuario'])) {
    require("funciones.php");
    require("controlador_viviendas.php");
    require("../Vista/vista_viviendas.php");
} else {
    if (isset($_REQUEST['btnLogin'])) {

        require("controlador_login.php");

        if (isset($_SESSION['idUsuario'])) {
            require("funciones.php");
            require("controlador_viviendas.php");
            require("../Vista/vista_viviendas.php");
            if (isset($_GET['filtrosNAVBAR'])) {
                require("funciones.php");
                require("controlador_viviendas.php");
                require("funciones.php");
            } else {
                # code...
            }
            
        } else {
            # code...
        }
        
    } else {
        require("../Vista/login.php");
    }
    
}


?>