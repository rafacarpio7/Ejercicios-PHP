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
    
    </tr>";
    while ($registro = $statement->fetch()) {
        

        echo "<tr>
                <td>".$registro['departamento_ID']."</td>
                <td>".$registro['Nombre']."</td>
                <td>".$registro['Ubicacion_ID']."</td>
                


                <td><form action='borraDatos.php'><input type='submit' name='btnBorrar' value='Borrar'></td>
                <td><input type='hidden' name='cod' value='".$registro['departamento_ID']."'></form></td>
                
                
                

            </tr>";

    } 

    echo "</table>";

    ?>
    
</body>
</html>