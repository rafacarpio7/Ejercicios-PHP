<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <form action="" method="post">
        <fieldset>
            <legend>Login</legend>
            ID de usuario :
            <input type="text" name="idLogin" required>
            Contraseña :
            <input type="password" name="contraseña" required>
            <input type="submit" name="btnLogin" value="Entrar">
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
            WHERE (trabajos.Funcion LIKE '%MANAGER%' OR '%PRESIDENT%') AND empleados.EMPLEADO_ID=:empleadoId ;");
            $statement->bindParam(':empleadoId', $_REQUEST['idLogin']);
        
            

            $statement->execute();

            $presidentes =$statement->fetchAll(PDO::FETCH_ASSOC);
            if (count($presidentes)>0) {
                
                header("Location: CRUDadmin.php");
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