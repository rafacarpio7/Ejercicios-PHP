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
            <legend>Modifica Ubicacion</legend>
            ID Trabajo :
            <input type="text" name="idUbicacion" value="<?=$_REQUEST['trabajoId']?>"disabled><br>
            Funcion :
            <input type="text" name="grupoRegional" value="<?=$_REQUEST['grupoRegional']?>" required><br>
            <input type="submit" name="btnModificar" value="Modificar">
        </fieldset>
    </form>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $sql="";
    $idUbicacionGuardado = $_REQUEST['ubicacionId'];
    if (isset($_REQUEST['btnModificar'])) {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=pufosa;charset=utf8",$username,$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE ubicacion SET Ubicacion_ID=:ubiID,GrupoRegional=:grupRegi WHERE Ubicacion_ID=:UbicacionIDGuardada;";

            $stmt = $conn->prepare($sql);
                $stmt->bindParam(':ubiID', $idUbicacionGuardado);
                $stmt->bindParam(':grupRegi', $_REQUEST['nombre']);
                $stmt->bindParam(':UbicacionIDGuardada', $idUbicacionGuardado);
                
                if ($stmt->execute()) {
                    header("Location: Ubicacion.php");
                }
                
              
        }catch (PDOException $e) {
            echo 'Conexion fallida'. $e->getMessage();
        }
    }
        $conn=null;
    
    ?>

</body>
</html>