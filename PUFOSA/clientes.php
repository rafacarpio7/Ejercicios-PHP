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
    

    $statement = $conexion->prepare("SELECT * FROM cliente ");

    $statement->execute();

    


    echo "<table ><th colspan='11'>Clientes</th>";
    echo "<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Direccion</th>
    <th>Ciudad</th>
    <th>Estado</th>
    <th>Codigo Postal</th>
    <th>Codigo Area</th>
    <th>Telefono</th>
    <th>Vendedor</th>
    <th>Limite de Credito</th>
    <th>Comentarios</th>
    </tr>";
    while ($registro = $statement->fetch()) {
        

        echo "<tr>
                <td>".$registro['CLIENTE_ID']."</td>
                <td>".$registro['nombre']."</td>
                <td>".$registro['Direccion']."</td>
                <td>".$registro['Ciudad']."</td>
                <td>".$registro['Estado']."</td>
                <td>".$registro['CodigoPostal']."</td>
                <td>".$registro['CodigoDeArea']."</td>
                <td>".$registro['Telefono']."</td>
                <td>".$registro['Vendedor_ID']."</td>
                <td>".$registro['Limite_De_Credito']."</td>
                <td>".$registro['Comentarios']."</td>


                <td><form action='borraDatos.php'><input type='submit' name='btnBorrar' value='Borrar'></td>
                <td><input type='hidden' name='cod' value='".$registro['CLIENTE_ID']."'></form></td>
                
                
                

            </tr>";

    } 

    echo "</table>";

    ?>
    
</body>
</html>