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
            <!-- Formulario de login del usuario con contraseña establecida "Daw2" -->
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
       //Inicio de sesion para activar el $_SESSION y establecimiento de contraseña para todos los users
        session_start();
    $contraseña = "Daw2";
    //Guardamos el id que se usa en el login para usos posteriores -
    // si este no existe o es erroneo se va a machacar este dato hasta que sea un login existoso y ahi si tendremos un id correcto
    $_SESSION['sesion']=$_REQUEST['idLogin'];
    
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=pufosa;charset=utf8",
        $username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $statement2= $conn->query("SELECT Nombre,Apellido FROM EMPLEADOS WHERE EMPLEADO_ID=".$_SESSION['sesion']."");
        //Sacamos el nombre y el apellido para mostrar en la pestaña de indice.php del usuario logueado
        while ($consulta = $statement2->fetch()) {
            $_SESSION['nombre']=$consulta['Nombre'];
            $_SESSION['apellido']=$consulta['Apellido'];
        }

        $statement = $conn->prepare("SELECT EMPLEADO_ID FROM EMPLEADOS WHERE EMPLEADO_ID=:empleadoId");

        $statement->bindParam(':empleadoId', $_REQUEST['idLogin']);
        
        $statement->execute();

        $registros = $statement->fetchAll(PDO::FETCH_ASSOC);
        // Comprobamos que el id introducido corresponda con los existentes en la base de datos
        if (count($registros)>0) {

            $statement = $conn->prepare("SELECT empleado_id FROM empleados
            INNER JOIN trabajos ON empleados.Trabajo_ID=trabajos.Trabajo_ID
            WHERE (trabajos.Funcion LIKE '%MANAGER%' OR empleados.Jefe_ID IS NULL) AND empleados.EMPLEADO_ID=:empleadoId ;");

            $statement->bindParam(':empleadoId', $_REQUEST['idLogin']);
            $statement->execute();

            $administradores =$statement->fetchAll(PDO::FETCH_ASSOC);
            // Comprobamos si el user introducido es administrador , 
            //es decir manager para posteriormente establecer una variable en $_SESSION que diga que tipo de user es
            if (count($administradores)>0) {
                $statement = $conn->prepare("SELECT empleado_id FROM empleados
                INNER JOIN trabajos ON empleados.Trabajo_ID=trabajos.Trabajo_ID
                WHERE trabajos.Funcion LIKE '%PRESIDENT%' AND empleados.EMPLEADO_ID=:empleadoId ;");

                $statement->bindParam(':empleadoId', $_REQUEST['idLogin']);
                $statement->execute();
                $presidente = $statement->fetchAll(PDO::FETCH_ASSOC);
                // comprobacion de si es presidente el id introducido en el campo del login y si la contraseña es correcta
                if (count($presidente)>0 && $_REQUEST['contraseña']==$contraseña) {
                    //Se establecen los valores en el $_SESSION  y redirigimos a inicio.php
                    $_SESSION['presidente']='si';
                    header("Location: inicio.php");
                } else if($_REQUEST['contraseña']==$contraseña){
                    //Se establecen los valores en el $_SESSION  y redirigimos a inicio.php
                    $_SESSION['admin']='si';
                    header("Location: inicio.php");
                }
            }else if ( $_REQUEST['contraseña']==$contraseña){
                //Se establecen los valores en el $_SESSION  y redirigimos a inicio.php
                $_SESSION['empleado']='si';
                header("Location: inicio.php");
            }


        } else {
            //Capturar error de login no valido tanto por contraseña como por usuario
            echo'<script type="text/javascript">
                    alert("Usuario o contraseña no valida");
                    window.location.href="index.php";
                    </script>';
        }

    }catch (PDOException $e) {
        echo 'Conexion fallida'. $e->getMessage();
    }
    
    
        
    }

    
    

    ?>
</body>

</html>