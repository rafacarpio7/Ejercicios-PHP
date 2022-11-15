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
        
            <legend>Nueva Ubicacion</legend>
            ID Ubicacion:
            <input type="number" name="idUbicacion" required><br>
            Region :
            <input type="text" name="region" ><br>
            <input type="submit" name="btnAñadir" value="Añadir">
        
    </form>

<?php
    $tblDatos = null;
    $servername = "localhost";
    $username = "root";
    $password = "";
    $sql="";

    if (isset($_REQUEST['btnAñadir'])) {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=pufosa;charset=utf8",$username,$password);


            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT COUNT(*) AS 'cantidad' FROM ubicacion WHERE Ubicacion_ID='".$_REQUEST['idUbicacion']."';";
            $result = $conn->query($sql);
            $num = $result->fetch();

            //Comprobacion si ya existe el id de ubicacion en nuestra base de datos
            if ($num['cantidad']>0) {
                echo'<script type="text/javascript">
                        alert("No se puede dar de alta la Ubicacion, ya existe en la base de datos");
                        window.location.href="añadeUbicacion.php";
                        </script>';
                
                $log = fopen("log.csv","a+b");
                $DateAndTime = date('d-m-Y h:i:s a', time());
                fwrite($log,"INSERT;".$_SESSION['sesion'].";$DateAndTime\n");
                fclose($log);
            }else {
                // Insercion de datos 
                    $sql= "INSERT INTO ubicacion (Ubicacion_ID,GrupoRegional) " 
                        . "VALUES (:idUbi,:gruReg)";


                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':idUbi', $_REQUEST['idUbicacion']);
                $stmt->bindParam(':gruReg', $_REQUEST['region']);
                $stmt->execute();
                $log = fopen("log.csv","a+b");
                $DateAndTime = date('d-m-Y h:i:s a', time());
                fwrite($log,"INSERT;".$_SESSION['sesion'].";$DateAndTime\n");
                fclose($log);
                echo'<script type="text/javascript">
                        alert("Insertado correctamente");
                        window.location.href="ubicacion.php";
                        </script>';
                
            }   
        } catch (PDOException $e) {
            echo 'Conexion fallida'. $e->getMessage();
        }
        $conn=null;
    }
?>
</body>
</html>

