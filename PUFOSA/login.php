<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Login</title>
</head>

<body>

    <form action="" method="post">
        <fieldset>
            <legend>Login</legend>
            ID de usuario :
            <input type="text" name="idLogin" required><br>
            Contraseña :
            <input type="password" name="contraseña" required><br>
            <input type="submit" name="btnLogin" value="Entrar">
            <input type="hidden" name="idEmpleado">
        </fieldset>
    </form>


    <?php
    if (isset($_REQUEST['btnLogin'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=pufosa;charset=utf8",
        $username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $statement = $conn->prepare("SELECT EMPLEADO_ID FROM EMPLEADOS WHERE EMPLEADO_ID=:empleadoId");

        $statement->bindParam(':empleadoId', $_REQUEST['idLogin']);
        
        $statement->execute();

        $registros = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (count($registros)>0) {

            $statement = $conn->prepare("SELECT empleado_id FROM empleados
            INNER JOIN trabajos ON empleados.Trabajo_ID=trabajos.Trabajo_ID
            WHERE (trabajos.Funcion LIKE '%MANAGER%' OR empleados.Jefe_ID IS NULL) AND empleados.EMPLEADO_ID=:empleadoId ;");

            $statement->bindParam(':empleadoId', $_REQUEST['idLogin']);
            $statement->execute();

            $administradores =$statement->fetchAll(PDO::FETCH_ASSOC);
            if (count($administradores)>0) {
                $statement = $conn->prepare("SELECT empleado_id FROM empleados
                INNER JOIN trabajos ON empleados.Trabajo_ID=trabajos.Trabajo_ID
                WHERE trabajos.Funcion LIKE '%PRESIDENT%' AND empleados.EMPLEADO_ID=:empleadoId ;");

                $statement->bindParam(':empleadoId', $_REQUEST['idLogin']);
                $statement->execute();
                $presidente = $statement->fetchAll(PDO::FETCH_ASSOC);
                if (count($presidente)>0) {
                    header("Location: CRUDpresidente.php");
                } else {
                    header("Location: CRUDadmin.php");
                }
            }else {
                header("Location: CRUDempleados.php");
            }

        } else {
            echo "Usuario no existe ";
        }

    }catch (PDOException $e) {
        echo 'Conexion fallida'. $e->getMessage();
    }
    
    
        
    }

    
    

    ?>
</body>

</html>