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
            <legend>Modifica Departamento</legend>
            ID Departamento :
            <input type="text" name="idDepartamento" value="<?=$_REQUEST['departamentoId']?>"disabled><br>
            Nombre :
            <input type="text" name="nombre" value="<?=$_REQUEST['nombreDep']?>" required><br>
            ID Ubicacion : 
            <input type="text" name="idUbicacion" value="<?=$_REQUEST['ubicacionId']?>" required><br>
            <input type="submit" name="btnModificar" value="Modificar">
        </fieldset>
    </form>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $sql="";
    $idDepartamentoGuardado = $_REQUEST['departamentoId'];
    if (isset($_REQUEST['btnModificar'])) {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=pufosa;charset=utf8",$username,$password);


            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                $sql = "SELECT COUNT(Ubicacion_ID) AS 'cantidad' FROM ubicacion WHERE Ubicacion_ID='".$_REQUEST['ubicacionId']."';";
                $result = $conn->query($sql);
                $num = $result->fetch();
                if (!$num['cantidad']>0) {
                    echo "En el campo Ubicacion ID debe introducir un valor de ubicacion id valido <br>";
                    $log = fopen("log.txt","a+b");
                    $DateAndTime = date('d-m-Y h:i:s a', time());
                    fwrite($log,"....Funcion UPDATE Erronea id ubicacion no valido.....usuario: ".$_SESSION['sesion'].".....$DateAndTime\n");
                    fclose($log);
                }else{
                    $conn = new PDO("mysql:host=$servername;dbname=pufosa;charset=utf8",$username,$password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
                    $sql = "UPDATE departamento SET departamento_ID=:depID,Nombre=:nom,Ubicacion_ID=:ubicID WHERE departamento_ID=:departamentoIDGuardada;";
        
                    $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':depID', $idDepartamentoGuardado);
                        $stmt->bindParam(':nom', $_REQUEST['nombre']);
                        $stmt->bindParam(':ubicID', $_REQUEST['idUbicacion']);
                        $stmt->bindParam(':departamentoIDGuardada', $idDepartamentoGuardado);
                        
                        if ($stmt->execute()) {
                            header("Location: departamentos.php");
                        }
                }
              
        }catch (PDOException $e) {
            echo 'Conexion fallida'. $e->getMessage();
        }
    }
        $conn=null;
    
    ?>

</body>
</html>