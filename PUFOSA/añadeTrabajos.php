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
        
            <legend>Nuevo Trabajo</legend>
            ID Trabajo:
            <input type="number" name="idTrabajo" required><br>
            Funcion :
            <input type="text" name="funcion" ><br>
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
            $sql = "SELECT COUNT(*) AS 'cantidad' FROM trabajos WHERE Trabajo_ID='".$_REQUEST['idTrabajo']."';";
            $result = $conn->query($sql);
            $num = $result->fetch();


            if ($num['cantidad']>0) {
                echo'<script type="text/javascript">
                        alert("No se puede dar de alta el Trabajo, ya existe en la base de datos");
                        window.location.href="añadeTrabajos.php";
                        </script>';
                
                $log = fopen("log.csv","a+b");
                $DateAndTime = date('d-m-Y h:i:s a', time());
                fwrite($log,"INSERT;".$_SESSION['sesion'].";$DateAndTime\n");
                fclose($log);
            }else {
                    $sql= "INSERT INTO trabajos (Trabajo_ID,FUNCION) " 
                        . "VALUES (:idTrab,:fun)";


                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':idTrab', $_REQUEST['idTrabajo']);
                $stmt->bindParam(':fun', $_REQUEST['funcion']);
                $stmt->execute();
                $log = fopen("log.csv","a+b");
                $DateAndTime = date('d-m-Y h:i:s a', time());
                fwrite($log,"INSERT;".$_SESSION['sesion'].";$DateAndTime\n");
                fclose($log);
                echo'<script type="text/javascript">
                        alert("Insertado correctamente");
                        window.location.href="trabajos.php";
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

