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
            <legend>Nuevo Empleados</legend>
            ID Empleado :
            <input type="number" name="idEmpleado" required><br>
            Apellido :
            <input type="text" name="apellido" required><br>
            Nombre : 
            <input type="text" name="nombre" required><br>
            Inicial Segundo Apellido : 
            <input type="text" name="iniApellido" required><br>
            ID Trabajo : 
            <input type="text" name="idTrabajo" required><br>
            ID Jefe :
            <input type="text" name="idJefe" required><br>
            Fecha de Contrato :
            <input type="date" name="fechaContrato" required><br>
            Salario : 
            <input type="text" name="salario" required><br>
            Comision : 
            <input type="text" name="comision" required><br>
            ID Departamento :
            <input type="text" name="idDepartamento" required><br>
            <input type="submit" name="btnAñadir" value="Añadir">
        </fieldset>
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
            $sql = "SELECT COUNT(*) AS 'cantidad' FROM empleados WHERE empleado_ID='".$_REQUEST['idEmpleado']."';";
            $result = $conn->query($sql);
            $num = $result->fetch();

            if ($num['cantidad']>0) {
                echo "No se puede dar de alta, el empleado ya existe en la base de datos <br>";
                $log = fopen("log.csv","a+b");
                $DateAndTime = date('d-m-Y h:i:s a', time());
                fwrite($log,"INSERT;".$_SESSION['sesion'].";$DateAndTime\n");
                fclose($log);
            }else {
                $sql = "SELECT COUNT(trabajo_ID) AS 'cantidad' FROM trabajos WHERE trabajo_ID='".$_REQUEST['idTrabajo']."';";
                $result = $conn->query($sql);
                $num = $result->fetch();
                if (!$num['cantidad']>0) {
                    echo "En el campo ID Trabajo debe introducir un ID de trabajo valido <br>";
                    $log = fopen("log.csv","a+b");
                    $DateAndTime = date('d-m-Y h:i:s a', time());
                    fwrite($log,"INSERT;".$_SESSION['sesion'].";$DateAndTime\n");
                    fclose($log);
                } else {
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT COUNT(empleado_ID) AS 'cantidad' FROM empleados WHERE empleado_ID='".$_REQUEST['idJefe']."';";
                    $result = $conn->query($sql);
                    $num = $result->fetch();
                    if (!$num['cantidad']>0) {
                        echo "En el campo ID Jefe debe introducir un ID de empleado valido <br>";
                        $log = fopen("log.csv","a+b");
                        $DateAndTime = date('d-m-Y h:i:s a', time());
                        fwrite($log,"INSERT;".$_SESSION['sesion'].";$DateAndTime\n");
                        fclose($log);
                    }else {
                        $sql = "SELECT COUNT(departamento_ID) AS 'cantidad' FROM departamento WHERE departamento_ID='".$_REQUEST['idDepartamento']."';";
                        $result = $conn->query($sql);
                        $num = $result->fetch();
                    if (!$num['cantidad']>0) {
                        echo "En el campo ID Departamento debe introducir un ID de Departamento valido <br>";
                        $log = fopen("log.csv","a+b");
                        $DateAndTime = date('d-m-Y h:i:s a', time());
                        fwrite($log,"INSERT;".$_SESSION['sesion'].";$DateAndTime\n");
                        fclose($log);
                    }else {
                        $sql= "INSERT INTO empleados (empleado_ID,Apellido,Nombre,Inicial_del_segundo_apellido,Trabajo_id,Jefe_id,Fecha_contrato,Salario,Comision,Departamento_ID) " 
                        . "VALUES (:idEmpl,:ape,:nom,:iniApe,:idTrab,:idJefe,:fecha,:salario,:comision,:idDep)";


                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':idEmpl', $_REQUEST['idEmpleado']);
                        $stmt->bindParam(':ape', $_REQUEST['apellido']);
                        $stmt->bindParam(':nom', $_REQUEST['nombre']);
                        $stmt->bindParam(':iniApe', $_REQUEST['iniApellido']);
                        $stmt->bindParam(':idTrab', $_REQUEST['idTrabajo']);
                        $stmt->bindParam(':idJefe', $_REQUEST['idJefe']);
                        $stmt->bindParam(':fecha', $_REQUEST['fechaContrato']);
                        $stmt->bindParam(':salario', $_REQUEST['salario']);
                        $stmt->bindParam(':comision', $_REQUEST['comision']);
                        $stmt->bindParam(':idDep', $_REQUEST['idDepartamento']);
                        $stmt->execute();
                        $log = fopen("log.csv","a+b");
                        $DateAndTime = date('d-m-Y h:i:s a', time());
                        fwrite($log,"INSERT;".$_SESSION['sesion'].";$DateAndTime\n");
                        fclose($log);
                        echo "Insertado correctamente";
                    }


                    
                }
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

