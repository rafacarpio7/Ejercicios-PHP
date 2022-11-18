<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <style>
        form {
    width: 400px;
    background: #b6e2d3;
    padding-left: 20px;
    padding-top: 5px;
    margin: auto;
    margin-top: 75px;
    border-radius: 4px;


}

input {
    width: 150px;
    padding: 7px;
    border-radius: 4px;
    margin-bottom: 15px;
    margin-left: 10px;
    border: 1px solid #49a09d;
    font-family: 'Ubuntu', sans-serif;
}

legend {
    font-size: 22px;
    margin-bottom: 20px;
    margin-top: 20px;
}
    </style>
</head>
<body>
    <form action="" method="post">
        <legend>Login</legend>
        Nombre Usuario :
        <input type="text" placeholder="nombre" name="nombreUsuario" value="<?=$_GET['nombreYaRegistrado']??"" ?>" required><br>
        Contraseña : 
        <input type="password" placeholder="contraseña" name="contraseñaUsuario" value="<?=$_GET['contraseñaYaRegistrado']??"" ?>"  required><br>
        <input type="submit" name="btnLogin" value="LOGIN">
        <a href="registro.php">
            <input type="button" name="btnRegistro" value="REGISTRO">
        </a>
        
    </form>


    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $sql="";
        if (isset($_REQUEST['btnLogin'])) {
        
        try {
            $conn = new PDO("mysql:host=$servername;dbname=alumnos_dwec;charset=utf8",$username,$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement = $conn->prepare("SELECT NOMBRE FROM alumnos WHERE NOMBRE=:nombre");
            $statement->bindParam(':nombre', $_REQUEST['nombreUsuario']);
            $statement->execute();
            $registros = $statement->fetchAll(PDO::FETCH_ASSOC);
            if (count($registros)>0 && strtolower($_REQUEST['nombreUsuario'])==strtolower($_REQUEST['contraseñaUsuario'])) {
                
                $nombreUsuarioBienvenida=$_REQUEST["nombreUsuario"];
                header("Location: bienvenida.php?bienvenida=$nombreUsuarioBienvenida");
            } else {
                echo "<h2>El usuario o la contraseña son incorrectos</h2>";
                $log = fopen("log.txt","a+b");
                $DateAndTime = date('d-m-Y h:i:s a', time());
                fwrite($log,"LOGIN INCORRECTO;".$_REQUEST['nombreUsuario']."; Fecha y hora : $DateAndTime; Contraseña intentada : ".$_REQUEST['contraseñaUsuario']. "\n");
                fclose($log);
            }
            



        } catch (Error $e) {
           echo "Error de conexion : ".$e;
        }
        
    }

    ?>
</body>
</html>