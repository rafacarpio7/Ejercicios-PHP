<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";

if (isset($_REQUEST['camareroId'])) {
    $conexion = new PDO("mysql:host=$servername;dbname=mi_restaurante_favorito;charset=utf8",$username,$password);
    $sql = "SELECT usuario, contrasena FROM usuarios WHERE usuario = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(1, $_REQUEST['camareroId']);
        $stmt->execute();
        $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (password_verify($_REQUEST["contrasena"], $registros[0]["contrasena"])&&($_REQUEST["camareroId"] == $registros[0]["usuario"])) {
            $_SESSION['idUsuario']=$_REQUEST['camareroId'];
        } else {
            header("location: login.php");
        }
} else {
}


try {
    $conexion = new PDO("mysql:host=$servername;dbname=mi_restaurante_favorito;charset=utf8",$username,$password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement =$conexion->prepare("SELECT * FROM platos ;");
    $statement->execute();

    $registros =$statement->fetchAll();



} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a class="tag" href="logout.php"><button>Desconectar</button></a>
    <form action="" method="get">
        <?php
            foreach ($registros as $key ) {
                echo "Plato de ".$key['nombre_plato']. " :".$key['precio']."€"."<input type='checkbox' name='platos[]' id='".$key['id']."' value='".$key['nombre_plato']."' ><br>" ;
                
            }
        ?>
        <br>
        <input type="submit" name="btnAñadir" value="Añadir">
        <input type="submit" name="btnEliminar" value="Eliminar">
        <input type="submit" name="btnBorrarTodo" value="Borrar Todo">
        <input type="submit" name="btnCerrarCuenta" value="Cerrar cuenta"> 
        
    </form>

    <?php

    if (isset($_REQUEST['btnAñadir'])) {
        if (!empty($_REQUEST['platos'])) {
            foreach ($_REQUEST['platos'] as $key=>$value ) {
                if (empty($_SESSION) || !array_key_exists($_REQUEST['platos'][$key],$_SESSION)) {
                    $_SESSION[$_REQUEST['platos'][$key]]=1;
                }else {
                    $cantidadPlatos= $_SESSION[$value]+1;
                    $_SESSION[$_REQUEST['platos'][$key]]=$cantidadPlatos;
                }
            }
        }
        
    }

    if (isset($_REQUEST['btnEliminar'])) {
        if (!empty($_REQUEST['platos'])) {
            foreach ($_REQUEST['platos'] as $key=>$value ) {
                if (empty($_SESSION) || !array_key_exists($_REQUEST['platos'][$key],$_SESSION)) {
                    
                }else{
                    if ($_SESSION[$value]<=0) {
                        
                    } else {
                        $cantidadPlatos= $_SESSION[$value]-1;
                    $_SESSION[$_REQUEST['platos'][$key]]=$cantidadPlatos;
                    }
                }
            }
        }
    }

    if (isset($_REQUEST['btnCerrarCuenta'])) {
        header("Location: cuenta.php");
    }

    if (isset($_REQUEST['btnBorrarTodo'])) {
        foreach ($_SESSION as $key => $value) {
            # code...
        }
    }
    




    ?>

    <div>
        <ul>
            <?php
                foreach ($_SESSION as $key=>$value) {
                    if ($key=='idUsuario') {
                        
                    }else {
                        echo "<li>". $key ." : " . $value.  "</li>";
                    }
                    
                }
            ?>
        </ul>   

    </div>


    <div>
        <ul>
            <h1>Platos mas pedidos</h1>
            <?php
            foreach ($_COOKIE as $key=>$value) {
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