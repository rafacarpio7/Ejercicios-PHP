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
        
            <legend>Login</legend>
            ID de usuario :
            <input type="text" name="idLogin" required><br>
            Contraseña :
            <input type="password" name="contraseña" required><br>
            <input type="submit" name="btnLogin" value="Entrar">
            <input type="hidden" name="idEmpleado">
        
    </form>


    <?php
    if (isset($_REQUEST['btnLogin'])) {
       
        session_start();
    $contraseña = "Daw2";
    $_SESSION['sesion']=$_REQUEST['idLogin'];
    
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
                if (count($presidente)>0 && $_REQUEST['contraseña']==$contraseña) {
                    $_SESSION['presidente']='si';
                    header("Location: inicio.php");
                } else if($_REQUEST['contraseña']==$contraseña){
                    $_SESSION['admin']='si';
                    header("Location: inicio.php");
                }
            }else if ( $_REQUEST['contraseña']==$contraseña){
                $_SESSION['empleado']='si';
                header("Location: inicio.php");
            }

        } else {
            echo "Usuario o contraseña no valida ";
        }

    }catch (PDOException $e) {
        echo 'Conexion fallida'. $e->getMessage();
    }
    
    
        
    }

    
    

    ?>
</body>

</html>