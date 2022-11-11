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
            <legend>Modifica Cliente</legend>
            ID Cliente :
            <input type="text" name="idCliente" value="<?=$_REQUEST['idCliente']?>" disabled><br>
            Nombre :
            <input type="text" name="nombre" value="<?=$_REQUEST['nombreCli']?>" required><br>
            Direccion : 
            <input type="text" name="direccion" value="<?=$_REQUEST['direccionCli']?>" required><br>
            Ciudad : 
            <input type="text" name="ciudad" value="<?=$_REQUEST['ciudadCli']?>" required><br>
            Estado : 
            <input type="text" name="estado" value="<?=$_REQUEST['estadoCli']?>" required><br>
            Codigo Postal :
            <input type="text" name="codigoPostal" value="<?=$_REQUEST['codPostalCli']?>" required><br>
            Codigo Area :
            <input type="text" name="codigoArea" value="<?=$_REQUEST['codAreaCli']?>" required><br>
            Telefono : 
            <input type="text" name="telefono" value="<?=$_REQUEST['telefonoCli']?>" required><br>
            Vendedor : 
            <input type="text" name="vendedorID" value="<?=$_REQUEST['vendedorIdCli']?>" required><br>
            Limite de Credito :
            <input type="text" name="limiteCredito" value="<?=$_REQUEST['limCredCli']?>" required><br>
            Comentarios : 
            <input type="text" name="comentarios" value="<?=$_REQUEST['comentarioCli']?>" required><br>
            <input type="submit" name="btnModificar" value="Modificar">
        </fieldset>
    </form>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $sql="";
    $idClienteGuardado = $_REQUEST['idCliente'];
    if (isset($_REQUEST['btnModificar'])) {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=pufosa;charset=utf8",$username,$password);


            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                $sql = "SELECT COUNT(empleado_ID) AS 'cantidad' FROM empleados WHERE empleado_ID='".$_REQUEST['vendedorID']."';";
                $result = $conn->query($sql);
                $num = $result->fetch();
                if (!$num['cantidad']>0) {
                    echo "En el campo Vendedor debe introducir un ID de vendedor valido <br>";
                    $log = fopen("log.csv","a+b");
                    $DateAndTime = date('d-m-Y h:i:s a', time());
                    fwrite($log,"UPDATE;".$_SESSION['sesion'].";$DateAndTime\n");
                    fclose($log);
                }else{
                    $conn = new PDO("mysql:host=$servername;dbname=pufosa;charset=utf8",$username,$password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
                    $sql = "UPDATE CLIENTE SET CLIENTE_ID=:cliId,nombre=:nom,Direccion=:dir,Ciudad=:ciud,
                    Estado=:estad,CodigoPostal=:cp,CodigoDeArea=:cda,Telefono=:tlf,Vendedor_ID=:idVend,Limite_De_Credito=:limCred,Comentarios=:comen WHERE CLIENTE_ID=:clienteIDGuardada;";
        
                    $stmt = $conn->prepare($sql);
                        $stmt->bindParam(':cliId', $_REQUEST['idCliente']);
                        $stmt->bindParam(':nom', $_REQUEST['nombre']);
                        $stmt->bindParam(':dir', $_REQUEST['direccion']);
                        $stmt->bindParam(':ciud', $_REQUEST['ciudad']);
                        $stmt->bindParam(':estad', $_REQUEST['estado']);
                        $stmt->bindParam(':cp', $_REQUEST['codigoPostal']);
                        $stmt->bindParam(':cda', $_REQUEST['codigoArea']);
                        $stmt->bindParam(':tlf', $_REQUEST['telefono']);
                        $stmt->bindParam(':idVend', $_REQUEST['vendedorID']);
                        $stmt->bindParam(':limCred', $_REQUEST['limiteCredito']);
                        $stmt->bindParam(':comen', $_REQUEST['comentarios']);
                        $stmt->bindParam(':clienteIDGuardada', $idClienteGuardado);
                        $log = fopen("log.csv","a+b");
                        $DateAndTime = date('d-m-Y h:i:s a', time());
                        fwrite($log,"UPDATE;".$_SESSION['sesion'].";$DateAndTime\n");
                        fclose($log);
                        if ($stmt->execute()) {
                            header("Location: clientes.php");
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