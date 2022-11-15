<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>PUFOSA - Trabajos</title>
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
    

    $statement = $conexion->prepare("SELECT * FROM trabajos ");

    $statement->execute();

    


    echo "<table ><th style='font-size: 28px'; colspan='4'>Trabajos</th>";
    echo "<tr>
    <th>ID Trabajo</th>
    <th>Funcion</th>
    <th><button><a href='añadeTrabajos.php'>Añadir Trabajos</button></a></th>
    <th></th>
    </tr>";
    while ($registro = $statement->fetch()) {
        
        // ademas de los propios botones de borrar y modificar tambien insertamos campos de 
        // formularios como hidden donde nos hacen llegar la informacion a los scripts de borrado y modificado
        echo "<tr>
                <td>".$registro['Trabajo_ID']."</td>
                <td>".$registro['Funcion']."</td>
                <form action='borraDatosTrabajos.php'>
                <td><input type='submit' name='btnBorrar' value='Borrar'></td>
                <input type='hidden' name='codTrabajo' value='".$registro['Trabajo_ID']."'>
                </form>
                <form action='modificaTrabajo.php' >
                <input type='hidden' name='trabajoId' value='".$registro['Trabajo_ID']."'>
                <input type='hidden' name='funcion' value='".$registro['Funcion']."'>
                <td><input type='submit' name='btnEditar' value='Editar'></td>
                </form>
            </tr>";

    } 

    echo "</table>";

    ?>
    
</body>
</html>