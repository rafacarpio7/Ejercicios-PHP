<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
</head>
<header>
    <a class="logo-inicio" href="index.html" ><img class="logo"  src="imgs/logo.png" alt="logo"></a>
        <nav>
            <ul class="navbar">
                <li><a href="clientes.php"> Clientes </a></li>
                <li><a href="empleados.php"> Empleados </a></li>
                <li><a href="trabajos.php"> Trabajos </a></li>
                <li><a href="departamentos.php"> Departamentos </a></li>
                <li><a href="ubicacion.php"> Ubicacion </a></li>
            </ul>
        </nav>
        <a class="tag" target="_blank"  href=""><button>Desconectar</button></a>
    </header>
<body>
    <form action="" method="post">
        <fieldset>
            <legend>Nuevo Departamento</legend>
            ID Departamento:
            <input type="number" name="idDepartamento" required>
            Nombre :
            <input type="text" name="nombre" required>
            ID Ubicacion : 
            <input type="text" name="ubicacion" >
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
            $sql = "SELECT COUNT(*) AS 'cantidad' FROM departamento WHERE departamento_ID='".$_REQUEST['idDepartamento']."';";

            

            $result = $conn->query($sql);

            $num = $result->fetch();

            if ($num['cantidad']>0) {
                echo "No se puede dar de alta el Departamento, ya existe en la base de datos <br>";
            }else {
                $sql = "SELECT COUNT(Ubicacion_ID) AS 'cantidad' FROM ubicacion WHERE Ubicacion_ID='".$_REQUEST['ubicacion']."';";
                $result = $conn->query($sql);
                $num = $result->fetch();
                if (!$num['cantidad']>0 && !empty($_REQUEST['ubicacion'])) {
                    echo "En el campo ID Ubicacion debe introducir un ID de Ubicación valido o vacio <br>";
                } else {
                    $sql= "INSERT INTO departamento (departamento_ID,Nombre,Ubicacion_ID) " 
                        . "VALUES (:idDep,:nom,:ubi)";


                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':idDep', $_REQUEST['idDepartamento']);
                $stmt->bindParam(':nom', $_REQUEST['nombre']);
                $stmt->bindParam(':ubi', $_REQUEST['ubicacion']);
                $stmt->execute();
                echo "Insertado correctamente";
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

