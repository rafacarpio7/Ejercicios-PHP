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
        
            <legend>Nuevo Departamento</legend>
            ID Departamento:
            <input type="number" name="idDepartamento" required><br>
            Nombre :
            <input type="text" name="nombre" ><br>
            ID Ubicacion : 
            <input type="text" name="ubicacion" required><br>
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
            $sql = "SELECT COUNT(*) AS 'cantidad' FROM departamento WHERE departamento_ID='".$_REQUEST['idDepartamento']."';";

            

            $result = $conn->query($sql);

            $num = $result->fetch();

            if ($num['cantidad']>0) {
                echo'<script type="text/javascript">
                    alert("No se puede dar de alta el Departamento, ya existe en la base de datos");
                    window.location.href="añadeDepartamentos.php";
                    </script>';
                
                $log = fopen("log.csv","a+b");
                $DateAndTime = date('d-m-Y h:i:s a', time());
                fwrite($log,"INSERT;".$_SESSION['sesion'].";$DateAndTime\n");
                fclose($log);
            }else {
                $sql = "SELECT COUNT(Ubicacion_ID) AS 'cantidad' FROM ubicacion WHERE Ubicacion_ID='".$_REQUEST['ubicacion']."';";
                $result = $conn->query($sql);
                $num = $result->fetch();
                if (!$num['cantidad']>0 && !empty($_REQUEST['ubicacion'])) {
                    echo'<script type="text/javascript">
                    alert("En el campo ID Ubicacion debe introducir un ID de Ubicación valido");
                    window.location.href="añadeDepartamentos.php";
                    </script>';
                    
                    $log = fopen("log.csv","a+b");
                    $DateAndTime = date('d-m-Y h:i:s a', time());
                    fwrite($log,"INSERT;".$_SESSION['sesion'].";$DateAndTime\n");
                    fclose($log);
                } else {
                    $sql= "INSERT INTO departamento (departamento_ID,Nombre,Ubicacion_ID) " 
                        . "VALUES (:idDep,:nom,:ubi)";


                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':idDep', $_REQUEST['idDepartamento']);
                $stmt->bindParam(':nom', $_REQUEST['nombre']);
                $stmt->bindParam(':ubi', $_REQUEST['ubicacion']);
                $stmt->execute();
                $log = fopen("log.csv","a+b");
                $DateAndTime = date('d-m-Y h:i:s a', time());
                fwrite($log,"INSERT;".$_SESSION['sesion'].";$DateAndTime\n");
                fclose($log);
                echo'<script type="text/javascript">
                    alert("Insertado correctamente");
                    window.location.href="departamentos.php";
                    </script>';
                }
   
            }   
        } catch (PDOException $e) {
            echo 'Conexion fallida'. $e->getMessage();
        }
        $conn=null;
    }
?>
</body>
</html>

