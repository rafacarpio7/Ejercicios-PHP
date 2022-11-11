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
    

    $statement = $conexion->prepare("SELECT * FROM departamento ");

    $statement->execute();

    


    echo "<table ><th colspan='3'>Departamentos</th>";
    echo "<tr>
    <th>ID Departamento</th>
    <th>Nombre</th>
    <th>ID Ubicacion</th>
    <th><button><a href='añadeDepartamentos.php'>Añadir Departamento</button></a></th>
    </tr>";
    while ($registro = $statement->fetch()) {
        

        echo "<tr>
                
                <td>".$registro['departamento_ID']."</td>
                <td>".$registro['Nombre']."</td>
                <td>".$registro['Ubicacion_ID']."</td>
                


                <form action='borraDatosDepartamentos.php'>
                <td><input type='submit' name='btnBorrar' value='Borrar'></td>
                <input type='hidden' name='codDepartamento' value='".$registro['departamento_ID']."'></form>
                <form action='modificaDepartamento.php' >
                <input type='hidden' name='departamentoId' value='".$registro['departamento_ID']."'>
                <input type='hidden' name='nombreDep' value='".$registro['Nombre']."'>
                <input type='hidden' name='ubicacionId' value='".$registro['Ubicacion_ID']."'>
                <td><input type='submit' name='btnEditar' value='Editar'></td>
                </form>
                
                

            </tr>";

    } 

    echo "</table>";
    
    ?>
    <?= $_GET['msg']??" "?>
   
    
</body>
</html>