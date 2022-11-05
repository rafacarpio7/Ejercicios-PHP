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
    

    $statement = $conexion->prepare("SELECT * FROM ubicacion ");

    $statement->execute();

    


    echo "<table ><th colspan='2'>Ubicacion</th>";
    echo "<tr>
    <th>ID Ubicacion</th>
    <th>Grupo Regional</th>
    
    </tr>";
    while ($registro = $statement->fetch()) {
        

        echo "<tr>
                <td>".$registro['Ubicacion_ID']."</td>
                <td>".$registro['GrupoRegional']."</td>
                


                <td><form action='borraDatosUbicacion.php'><input type='submit' name='btnBorrar' value='Borrar'></td>
                <td><input type='hidden' name='codUbicacion' value='".$registro['Ubicacion_ID']."'></form></td>
                
                
                

            </tr>";

    } 

    echo "</table>";

    ?>
    
</body>
</html>