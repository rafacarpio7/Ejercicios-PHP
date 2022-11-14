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
    

    $statement = $conexion->prepare("SELECT * FROM ubicacion ");

    $statement->execute();

    


    echo "<table ><th style='font-size: 28px'; colspan='4'>Ubicacion</th>";
    echo "<tr>
    <th>ID Ubicacion</th>
    <th>Grupo Regional</th>
    <th><button><a href='añadeUbicacion.php'>Añadir Ubicacion</button></a></th>
    <th></th>
    </tr>";
    while ($registro = $statement->fetch()) {
        

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