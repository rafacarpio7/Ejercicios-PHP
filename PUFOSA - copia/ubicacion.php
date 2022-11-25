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
    try {
        include_once "conexion.php";
    } catch (PDOException $e) {
        echo 'Conexion fallida'. $e->getMessage();
    }
    

    $statement = $conn->prepare("SELECT * FROM ubicacion ");

    $statement->execute();

    


    echo "<table ><th style='font-size: 28px'; colspan='4'>Ubicacion</th>";
    echo "<tr>
    <th>ID Ubicacion</th>
    <th>Grupo Regional</th>
    <th><button><a href='añadeUbicacion.php'>Añadir Ubicacion</button></a></th>
    <th></th>
    </tr>";
    while ($registro = $statement->fetch()) {
        
        // ademas de los propios botones de borrar y modificar tambien insertamos campos de 
        // formularios como hidden donde nos hacen llegar la informacion a los scripts de borrado y modificado
        echo "<tr>
                <td>".$registro['Ubicacion_ID']."</td>
                <td>".$registro['GrupoRegional']."</td>
                


                <form action='borraDatosUbicacion.php'>
                <td><input type='submit' name='btnBorrar' value='Borrar'></td>
                <input type='hidden' name='codUbicacion' value='".$registro['Ubicacion_ID']."'>
                </form>
                <form action='modificaUbicacion.php' >
                <input type='hidden' name='ubicacionId' value='".$registro['Ubicacion_ID']."'>
                <input type='hidden' name='grupoRegional' value='".$registro['GrupoRegional']."'>
                <td><input type='submit' name='btnEditar' value='Editar'></td>
                </form>
                
                

            </tr>";

    } 

    echo "</table>";

    ?>
    
</body>
</html>