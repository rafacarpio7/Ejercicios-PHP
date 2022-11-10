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
    session_start();

    if (!empty($_SESSION['presidente'])) {
        echo '<header>
        <a class="logo-inicio" href="index.html" ><img class="logo"  src="logo.png" alt="logo"></a>
            <nav>
                <ul class="navbar">
                    <li><a href="clientes.php"> Clientes </a></li>
                    <li><a href="empleados.php"> Empleados </a></li>
                    <li><a href="trabajos.php"> Trabajos </a></li>
                    <li><a href="departamentos.php"> Departamentos </a></li>
                    <li><a href="ubicacion.php"> Ubicacion </a></li>
                    <li><a href="informeDepartamentos.php"> Informe Departamentos </a></li>
                </ul>
            </nav>
            <a class="tag" href="logout.php"><button>Desconectar</button></a>
        </header>';
    } else if(!empty($_SESSION['admin'])){
        echo '<header>
        <a class="logo-inicio" href="index.html" ><img class="logo"  src="logo.png" alt="logo"></a>
            <nav>
                <ul class="navbar">
                    <li><a href="clientes.php"> Clientes </a></li>
                    <li><a href="empleados.php"> Empleados </a></li>
                    <li><a href="trabajos.php"> Trabajos </a></li>
                    <li><a href="departamentos.php"> Departamentos </a></li>
                    <li><a href="ubicacion.php"> Ubicacion </a></li>
                    
                </ul>
            </nav>
            <a class="tag"   href="logout.php"><button>Desconectar</button></a>
        </header>';
    }else {
        echo '<header>
        <a class="logo-inicio" href="index.html" ><img class="logo"  src="logo.png" alt="logo"></a>
            <nav>
                <ul class="navbar">
                    <li><a href="clientes.php"> Clientes </a></li>
                </ul>
            </nav>
            <a class="tag"   href="logout.php"><button>Desconectar</button></a>
        </header>';
    }


    
    ?>
<body>
    <form action="" method="post">
        <fieldset>
            <legend>Nueva Ubicacion</legend>
            ID Ubicacion:
            <input type="number" name="idUbicacion" required><br>
            Region :
            <input type="text" name="region" required><br>
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
            $sql = "SELECT COUNT(*) AS 'cantidad' FROM ubicacion WHERE Ubicacion_ID='".$_REQUEST['idUbicacion']."';";
            $result = $conn->query($sql);
            $num = $result->fetch();


            if ($num['cantidad']>0) {
                echo "No se puede dar de alta la Ubicacion, ya existe en la base de datos <br>";
            }else {
                    $sql= "INSERT INTO ubicacion (Ubicacion_ID,GrupoRegional) " 
                        . "VALUES (:idUbi,:gruReg)";


                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':idUbi', $_REQUEST['idUbicacion']);
                $stmt->bindParam(':gruReg', $_REQUEST['region']);
                $stmt->execute();
                echo "Insertado correctamente";
            }   
        } catch (PDOException $e) {
            echo 'Conexion fallida'. $e->getMessage();
        }
        $conn=null;
    }
?>
</body>
</html>

