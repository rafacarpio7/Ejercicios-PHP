<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>PUFOSA</title>
</head>
<body>
<?php
    session_start();

    if (!empty($_SESSION['presidente'])) {
        echo '<header>
        <a class="logo-inicio" href="CRUD.php" ><img class="logo"  src="logo.png" alt="logo"></a>
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
        <a class="logo-inicio" href="CRUD.php" ><img class="logo"  src="logo.png" alt="logo"></a>
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
        <a class="logo-inicio" href="CRUD.php" ><img class="logo"  src="logo.png" alt="logo"></a>
            <nav>
                <ul class="navbar">
                    <li><a href="clientes.php"> Clientes </a></li>
                </ul>
            </nav>
            <a class="tag"   href="logout.php"><button>Desconectar</button></a>
        </header>';
    }


    
    ?>
    

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conexion = new PDO("mysql:host=$servername;dbname=pufosa;charset=utf8",$username,$password);

        $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

       
    } catch (PDOException $e) {
        echo 'Conexion fallida'. $e->getMessage();
    }
    

    $statement = $conexion->prepare("SELECT departamento.Nombre AS nomDep,GrupoRegional ,COUNT(empleado_id),MAX(Salario),MIN(Salario),AVG(Salario) FROM empleados
    INNER JOIN departamento ON departamento.departamento_ID=empleados.Departamento_ID
    INNER JOIN ubicacion ON ubicacion.Ubicacion_ID=departamento.Ubicacion_ID
    GROUP BY departamento.Nombre,ubicacion.GrupoRegional;");

    $statement->execute();

    


    echo "<table ><th colspan='6'>Informe de Departamentos</th>";
    echo "<tr>
    <th>Nombre Departamento</th>
    <th>Grupo Regional</th>
    <th>Empleados</th>
    <th>Salario Maximo</th>
    <th>Salario Minimo</th>
    <th>Media de Salario</th>
    
    </tr>";
    while ($registro = $statement->fetch()) {
        

        echo "<tr>
                <td>".$registro['nomDep']."</td>
                <td>".$registro['GrupoRegional']."</td>
                <td>".$registro['COUNT(empleado_id)']."</td>
                <td>".$registro['MAX(Salario)']."</td>
                <td>".$registro['MIN(Salario)']."</td>
                <td>".$registro['AVG(Salario)']."</td>
                
                
                
                

            </tr>";

    } 

    echo "</table>";

    ?>
    <p><?= $_GET['msg']??" "?></p>
    
</body>
</html>