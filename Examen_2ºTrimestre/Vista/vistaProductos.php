<!DOCTYPE html>
<?php
include_once "../Controlador/Controlador_listadoProductos.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a class="tag" href="../Controlador/logout.php"><button>Desconectar</button></a>
    <?php mostrarTabla($registrosMostrar) ;

    if (isset($_REQUEST['añadir'])) {

        if (isset($_REQUEST['productos'])) {

            foreach ($_REQUEST['productos'] as $key=>$value ) {
                if (empty($_SESSION) || !array_key_exists($_REQUEST['productos'][$key],$_SESSION)) {
                    $_SESSION[$_REQUEST['productos'][$key]]=1;

                }else {
                    $cantidadProductos= $_SESSION[$value]+1;
                    $_SESSION[$_REQUEST['productos'][$key]]=$cantidadProductos;

                }
            }
        }
        
    }

    if (isset($_REQUEST['eliminar'])) {

        if (!empty($_REQUEST['productos'])) {

            foreach ($_REQUEST['productos'] as $key=>$value ) {

                if (empty($_SESSION) || !array_key_exists($_REQUEST['productos'][$key],$_SESSION)) {
                    
                }else{

                    if ($_SESSION[$value]<=0) {
                        
                    } else {
                    
                        $cantidadProductos= $_SESSION[$value]-1;
                    $_SESSION[$_REQUEST['productos'][$key]]=$cantidadProductos;

                    }
                }
            }
        }
    }
    if (isset($_REQUEST['cerrarPedido'])) {

        header("Location: resumenPedido.php");

    }
    
    ?>

<div>
        <ul>
            <?php

            echo "Carrito de : ".$_SESSION['idUsuario'];

                foreach ($_SESSION as $key=>$value) {
                    if ($key=='idUsuario') {
                        
                    }else {
                        echo "<li>". $key ." : " . $value.  "</li>";
                    }
                    
                }
            ?>
        </ul>   

    </div>
</body>
</html>