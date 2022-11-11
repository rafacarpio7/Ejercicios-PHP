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
    include_once "CRUD.php";
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
    <th><button><a href='añadeClientes.php'>Añadir Cliente</button></a></th>
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


                <form action='borraDatosClientes.php'>
                <td><input type='submit' name='btnBorrar' value='Borrar'></td>
                <input type='hidden' name='idCliente' value='".$registro['CLIENTE_ID']."'>
                </form>
                <form action='modificaCliente.php' >
                <input type='hidden' name='idCliente' value='".$registro['CLIENTE_ID']."'>
                <input type='hidden' name='nombreCli' value='".$registro['nombre']."'>
                <input type='hidden' name='direccionCli' value='".$registro['Direccion']."'>
                <input type='hidden' name='ciudadCli' value='".$registro['Ciudad']."'>
                <input type='hidden' name='estadoCli' value='".$registro['Estado']."'>
                <input type='hidden' name='codPostalCli' value='".$registro['CodigoPostal']."'>
                <input type='hidden' name='codAreaCli' value='".$registro['CodigoDeArea']."'>
                <input type='hidden' name='telefonoCli' value='".$registro['Telefono']."'>
                <input type='hidden' name='vendedorIdCli' value='".$registro['Vendedor_ID']."'>
                <input type='hidden' name='limCredCli' value='".$registro['Limite_De_Credito']."'>
                <input type='hidden' name='comentarioCli' value='".$registro['Comentarios']."'>
                <td><input type='submit' name='btnEditar' value='Editar'></td>
                </form>

            </tr>";
    } 

    echo "</table>";

    ?>
    
</body>
</html>