<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>PUFOSA - Departamentos</title>
</head>
<body>
    <?php
    include_once "CRUD.php";
    

    try {
        include_once "conexion.php";
    } catch (PDOException $e) {
        echo 'Conexion fallida'. $e->getMessage();
    }
    

    $statement = $conn->prepare("SELECT * FROM departamento ");

    $statement->execute();

    


    echo "<table ><th style='font-size: 28px'; colspan='5'>Departamentos</th>";
    echo "<tr>
    <th>ID Departamento</th>
    <th>Nombre</th>
    <th>ID Ubicacion</th>
    <th><button><a href='añadeDepartamentos.php'>Añadir Departamento</button></a></th>
    <th></th>
    </tr>";
    while ($registro = $statement->fetch()) {
        
        // ademas de los propios botones de borrar y modificar tambien insertamos campos de 
        // formularios como hidden donde nos hacen llegar la informacion a los scripts de borrado y modificado
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