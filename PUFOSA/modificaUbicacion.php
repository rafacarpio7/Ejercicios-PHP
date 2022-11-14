<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
</head>
<?php
include_once "CRUD.php";
    ?>
<body>
    <form action="" method="post">
        <fieldset>
            <legend>Modifica Ubicacion</legend>
            ID Trabajo :
            <input type="text" name="idUbicacion" value="<?=$_REQUEST['trabajoId']?>"disabled><br>
            Funcion :
            <input type="text" name="grupoRegional" value="<?=$_REQUEST['grupoRegional']?>" required><br>
            <input type="submit" name="btnModificar" value="Modificar">
        </fieldset>
    </form>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $sql="";
    $idUbicacionGuardado = $_REQUEST['ubicacionId'];
    if (isset($_REQUEST['btnModificar'])) {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=pufosa;charset=utf8",$username,$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE ubicacion SET Ubicacion_ID=:ubiID,GrupoRegional=:grupRegi WHERE Ubicacion_ID=:UbicacionIDGuardada;";

            $stmt = $conn->prepare($sql);
                $stmt->bindParam(':ubiID', $idUbicacionGuardado);
                $stmt->bindParam(':grupRegi', $_REQUEST['nombre']);
                $stmt->bindParam(':UbicacionIDGuardada', $idUbicacionGuardado);
                $log = fopen("log.csv","a+b");
                $DateAndTime = date('d-m-Y h:i:s a', time());
                fwrite($log,"UPDATE;".$_SESSION['sesion'].";$DateAndTime\n");
                fclose($log);
                if ($stmt->execute()) {
                    echo'<script type="text/javascript">
                                alert("Ubicacion modificada correctamente");
                                window.location.href="ubicacion.php";
                                </script>';
                }
                
              
        }catch (PDOException $e) {
            echo 'Conexion fallida'. $e->getMessage();
        }
    }
        $conn=null;
    
    ?>

</body>
</html>