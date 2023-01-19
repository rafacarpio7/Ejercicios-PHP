<?php
if (isset($_SESSION['usuario'])) {
    session_start();
    $_SESSION['usuario']=$_REQUEST['camareroId'];
}

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
    <form action="" method="get">
        <?php
            foreach ($registros as $key ) {
                echo "Plato de ".$key['nombre_plato']. " :".$key['precio']."€"."<input type='checkbox' name='platos' id='".$key['id']."' value='".$key['nombre_plato']."' >" ;
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
            $_SESSION['producto']=array('nombre'=>$_REQUEST['platos']);
        }

        print_r($_SESSION);
    ?>
</body>
</html>