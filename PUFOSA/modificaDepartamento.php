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
        <!-- Formulario con los datos prestablecidos del dato de la tabla a modificar
                    establecido como value del propio campo del formulario,
                    solo vamos a bloquear el campo id para que no pueda modificarse -->
            <legend>Modifica Departamento</legend>
            ID Departamento :
            <input type="text" name="idDepartamento" value="<?=$_REQUEST['departamentoId']?>"disabled><br>
            Nombre :
            <input type="text" name="nombre" value="<?=$_REQUEST['nombreDep']?>" required><br>
            ID Ubicacion : 
            <input type="text" name="idUbicacion" value="<?=$_REQUEST['ubicacionId']?>" required><br>
            <input type="submit" name="btnModificar" value="Modificar">
        
    </form>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $sql="";
    $idDepartamentoGuardado = $_REQUEST['departamentoId'];
    if (isset($_REQUEST['btnModificar'])) {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=pufosa;charset=utf8",$username,$password);
            //En este apartado comprobamos lo mismo que hemos comprobado a la hora de insertar ya que
            // es necesario que ciertos campos que son foreign key existan en la propia base de datos

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                $sql = "SELECT COUNT(Ubicacion_ID) AS 'cantidad' FROM ubicacion WHERE Ubicacion_ID='".$_REQUEST['ubicacionId']."';";
                $result = $conn->query($sql);
                $num = $result->fetch();
                if (!$num['cantidad']>0) {
                    echo'<script type="text/javascript">
                                alert("En el campo Ubicacion ID debe introducir un valor de ubicacion id valido");
                                window.location.href="modificaDepartamento.php";
                                </script>';
                    
                    $log = fopen("log.csv","a+b");
                    $DateAndTime = date('d-m-Y h:i:s a', time());
                    fwrite($log,"UPDATE;".$_SESSION['sesion'].";$DateAndTime\n");
                    fclose($log);
                }else{
                    $conn = new PDO("mysql:host=$servername;dbname=pufosa;charset=utf8",$username,$password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
                    $sql = "UPDATE departamento SET departamento_ID=:depID,Nombre=:nom,Ubicacion_ID=:ubicID WHERE departamento_ID=:departamentoIDGuardada;";
        
                    $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':depID', $idDepartamentoGuardado);
                        $stmt->bindParam(':nom', $_REQUEST['nombre']);
                        $stmt->bindParam(':ubicID', $_REQUEST['idUbicacion']);
                        $stmt->bindParam(':departamentoIDGuardada', $idDepartamentoGuardado);
                        $log = fopen("log.csv","a+b");
                        $DateAndTime = date('d-m-Y h:i:s a', time());
                        fwrite($log,"UPDATE;".$_SESSION['sesion'].";$DateAndTime\n");
                        fclose($log);
                        if ($stmt->execute()) {
                            echo'<script type="text/javascript">
                                alert("Departamento modificado correctamente");
                                window.location.href="departamentos.php";
                                </script>';
                        }
                }
              
        }catch (PDOException $e) {
            echo 'Conexion fallida'. $e->getMessage();
        }
    }
        $conn=null;
    
    ?>

</body>
</html>