<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>PUFOSA - Clientes</title>
</head>
<body>
    <?php
    include_once "CRUD.php";

    try {
        include_once "conexion.php";

       
    } catch (PDOException $e) {
        echo 'Conexion fallida'. $e->getMessage();
    }
    

    $statement = $conn->prepare("SELECT * FROM cliente ");

    $statement->execute();

    

    // Mostramos los clientes en una tabla
    echo "<table ><th style='font-size: 28px'; colspan='13'>Clientes</th>";
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
    <th></th>
    </tr>";
    while ($registro = $statement->fetch()) {
        
        // ademas de los propios botones de borrar y modificar tambien insertamos campos de 
        // formularios como hidden donde nos hacen llegar la informacion a los scripts de borrado y modificado
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