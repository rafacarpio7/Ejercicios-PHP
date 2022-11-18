<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
}</style>
</head>
<body>
    <form action="" method="post">
        <legend>REGISTRO</legend>
        Nombre : 
        <input type="text" placeholder="nombre" name="nombreRegistro" required><br>
        Apellido :
        <input type="text" placeholder="apellido" name="apellidoRegistro" required><br>
        Telefono : 
        <input type="tel" placeholder="telefono" name="telefonoRegistro" required><br>
        Email :
        <input type="email" placeholder="email" name="emailRegistro" required><br>
        <input type="submit" name="btnRegistro" value="REGISTRATE">
        <a href="login.php">
            <input type="button" name="btnLogin" value="LOGIN">
        </a>
    </form>


    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $sql="";
        if (isset($_REQUEST['btnRegistro'])) {
            try {
                include_once 'alumno.php';
                $alumnoRegistro = new Alumno($_REQUEST['nombreRegistro'],$_REQUEST['apellidoRegistro'],$_REQUEST['telefonoRegistro'],$_REQUEST['emailRegistro']);
                $conn = new PDO("mysql:host=$servername;dbname=alumnos_dwec;charset=utf8",$username,$password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                print_r($alumnoRegistro);

                $sql = "SELECT COUNT(*) AS 'cantidad' FROM alumnos WHERE CORREO='".$alumnoRegistro->getEmail()."';";
                $result = $conn->query($sql);
                $num = $result->fetch();

                if ($num['cantidad']>0) {
                    echo "<h2>Ese correo electronico ya esta en uso</h2>";
                }else {

                    if ($alumnoRegistro->compruebaCorreo($alumnoRegistro->getEmail())==false) {
                        echo "<h2>CORREO NO VALIDO</h2>";
                    } else {
                        $sql= "INSERT INTO alumnos (NOMBRE,APELLIDOS,TELEFONO,CORREO) " 
                        . "VALUES (:nom,:ape,:tel,:corr)";
                    $nombreAlumno=$alumnoRegistro->getNombre();
                    $apellidoAlumno = $alumnoRegistro->getApellido();
                    $telefonoAlumno = $alumnoRegistro->getTelefono();
                    $emailAlumno = $alumnoRegistro->getEmail();
                    $contraseña = strtolower($nombreAlumno);
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':nom', $nombreAlumno);
                    $stmt->bindParam(':ape', $apellidoAlumno);
                    $stmt->bindParam(':tel', $telefonoAlumno);
                    $stmt->bindParam(':corr', $emailAlumno);
                    if ($stmt->execute()) {
                        header("Location: login.php?nombreYaRegistrado=$nombreAlumno&contraseñaYaRegistrado=$contraseña");
                    }
                    }
                    
                    
                }



            } catch (Error $e) {
                echo "Error de conexion ". $e ;
            }
        }

    ?>
</body>
</html>