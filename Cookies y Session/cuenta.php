<?php
$servername = "localhost";
$username = "root";
$password = "";
session_start();
    try{
        $conexion = new PDO("mysql:host=$servername;dbname=mi_restaurante_favorito;charset=utf8",$username,$password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement =$conexion->prepare("SELECT nombre_plato,precio FROM platos ;");
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
    <h1>Cuenta</h1>
    <?php
    $totalCuenta=0;
        foreach ($_SESSION as $key => $value) {
            foreach ($registros as $clave => $valor) {
                if ($key===$valor[0]) {
                    echo '<ul><li>'.$key.' : '.$value*$valor[1].'</li></ul>';
                    $totalCuenta += $value*$valor[1];
                }
            }
        }
        echo '<h2>Total Cuenta : '.$totalCuenta.'</h2>'
    ?>
    <a class="tag" href="logout.php"><button>Cerrar Mesa</button></a>
</body>
</html>