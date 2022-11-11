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
            <legend>Modifica Empleado</legend>
            ID Empleado :
            <input type="text" name="empleadoId" value="<?=$_REQUEST['empleadoId']?>" disabled><br>
            Apellido :
            <input type="text" name="apellido" value="<?=$_REQUEST['apellido']?>" required><br>
            Nombre : 
            <input type="text" name="nombre" value="<?=$_REQUEST['nombreEmp']?>" required><br>
            Inicial Apellido : 
            <input type="text" name="iniApellido" value="<?=$_REQUEST['iniApellido']?>" required><br>
            ID Trabajo : 
            <input type="text" name="trabajoId" value="<?=$_REQUEST['trabajoId']?>" required><br>
            ID Jefe :
            <input type="text" name="jefeId" value="<?=$_REQUEST['jefeId']?>" required><br>
            Fecha Contrato :
            <input type="date" name="fechaContrato" value="<?=$_REQUEST['fechaContrato']?>" ><br>
            Salario : 
            <input type="text" name="salario" value="<?=$_REQUEST['salarioEmp']?>" required><br>
            Comision : 
            <input type="text" name="comision" value="<?=$_REQUEST['comision']?>" required><br>
            ID Departamento :
            <input type="text" name="departamentoId" value="<?=$_REQUEST['departamentoId']?>" required><br>
            <input type="submit" name="btnModificar" value="Modificar">
        </fieldset>
    </form>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $sql="";
    $idEmpleadoGuardado = $_REQUEST['empleadoId'];
    if (isset($_REQUEST['btnModificar'])) {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=pufosa;charset=utf8",$username,$password);


            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "SELECT COUNT(trabajo_ID) AS 'cantidad' FROM trabajos WHERE trabajo_ID='".$_REQUEST['trabajoId']."';";
            $result = $conn->query($sql);
            $num = $result->fetch();
            if (!$num['cantidad']>0) {
                echo "En el campo ID Trabajo debe introducir un ID de trabajo valido <br>";
            } else {
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT COUNT(empleado_ID) AS 'cantidad' FROM empleados WHERE empleado_ID='".$_REQUEST['jefeId']."';";
                $result = $conn->query($sql);
                $num = $result->fetch();
                if (!$num['cantidad']>0) {
                    echo "En el campo ID Jefe debe introducir un ID de empleado valido <br>";
                }else {
                    $sql = "SELECT COUNT(departamento_ID) AS 'cantidad' FROM departamento WHERE departamento_ID='".$_REQUEST['departamentoId']."';";
                $result = $conn->query($sql);
                $num = $result->fetch();
                if (!$num['cantidad']>0) {
                    echo "En el campo ID Departamento debe introducir un ID de Departamento valido <br>";
                }else {
                    $sql= "UPDATE empleados SET empleado_ID=:empID,Apellido=:apell,Nombre=:nom,
                    Inicial_del_segundo_apellido=:iniApe,Trabajo_ID=:trabId,Jefe_ID=:jefeID,
                    Fecha_contrato=:fecha,Salario=:sal,Comision=:comi,Departamento_ID=:depID 
                    WHERE empleado_ID=:empleadoIDGuardada;";


                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':empID', $_REQUEST['empleadoId']);
                    $stmt->bindParam(':apell', $_REQUEST['apellido']);
                    $stmt->bindParam(':nom', $_REQUEST['nombre']);
                    $stmt->bindParam(':iniApe', $_REQUEST['iniApellido']);
                    $stmt->bindParam(':trabId', $_REQUEST['trabajoId']);
                    $stmt->bindParam(':jefeID', $_REQUEST['jefeId']);
                    $stmt->bindParam(':fecha', $_REQUEST['fechaContrato']);
                    $stmt->bindParam(':sal', $_REQUEST['salario']);
                    $stmt->bindParam(':comi', $_REQUEST['comision']);
                    $stmt->bindParam(':depID', $_REQUEST['departamentoId']);
                    $stmt->bindParam(':empleadoIDGuardada', $idEmpleadoGuardado);
                    $stmt->execute();
                    $log = fopen("log.csv","a+b");
                    $DateAndTime = date('d-m-Y h:i:s a', time());
                    fwrite($log,"UPDATE;".$_SESSION['sesion'].";$DateAndTime\n");
                    fclose($log);
                    echo "Modificado correctamente";
                }
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