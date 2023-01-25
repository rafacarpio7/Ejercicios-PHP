<?php

session_start();
echo session_id();
echo "<pre>";
print_r($_REQUEST['platos']);
echo "</pre>";
$servername = "localhost";
$username = "root";
$password = "";
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
/*
    try {
        $conexion = new PDO("mysql:host=$servername;dbname=mi_restaurante_favorito;charset=utf8",$username,$password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement =$conexion->prepare("SELECT id FROM platos  WHERE nombre_plato=:nombrePlato;");
        $statement->bindParam('nombrePlato',$_REQUEST['platos']);
        $statement->execute();

        $platos =$statement->fetchAll();

        if (count($platos)>0) {
           
        }
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
*/




    if (isset($_REQUEST['btnAñadir'])) {
        foreach ($_REQUEST['platos'] as $key=>$value ) {
            if (empty($_SESSION) || !array_key_exists($_REQUEST['platos'][$key],$_SESSION)) {
                $_SESSION[$_REQUEST['platos'][$key]]=1;
            }else {
                $cantidadPlatos= $_SESSION[$value]+1;
                $_SESSION[$_REQUEST['platos'][$key]]=$cantidadPlatos;
            }
        }
    }

    if (isset($_REQUEST['btnEliminar'])) {
        foreach ($_REQUEST['platos'] as $key=>$value ) {
            if (empty($_SESSION) || !array_key_exists($_REQUEST['platos'][$key],$_SESSION)) {
                
            }else{
                $cantidadPlatos= $_SESSION[$value]-1;
                $_SESSION[$_REQUEST['platos'][$key]]=$cantidadPlatos;
            }
        }
    }



    
    print_r($_SESSION);


    ?>

    <div>
        <ul>
            <?php
                foreach ($_SESSION as $key=>$value) {
                    echo "<li>". $key ." : " . $value.  "</li>";
                }
            ?>
        </ul>   

    </div>
</body>
</html>