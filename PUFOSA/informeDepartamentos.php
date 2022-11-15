<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>PUFOSA - Informes</title>
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
    

    $statement = $conexion->prepare("SELECT departamento.Nombre AS nomDep,GrupoRegional ,COUNT(empleado_id),MAX(Salario),MIN(Salario),AVG(Salario) FROM empleados
    INNER JOIN departamento ON departamento.departamento_ID=empleados.Departamento_ID
    INNER JOIN ubicacion ON ubicacion.Ubicacion_ID=departamento.Ubicacion_ID
    GROUP BY departamento.Nombre,ubicacion.GrupoRegional;");

    $statement->execute();

    


    echo "<table ><th style='font-size: 28px'; colspan='6'>Informe de Departamentos</th>";
    echo "<tr>
    <th>Nombre Departamento</th>
    <th>Grupo Regional</th>
    <th>Empleados</th>
    <th>Salario Maximo</th>
    <th>Salario Minimo</th>
    <th>Media de Salario</th>
    
    </tr>";
    while ($registro = $statement->fetch()) {
        
        // Mostramos la informacion de departamentos solo para los user presidentes
        echo "<tr>
                <td>".$registro['nomDep']."</td>
                <td>".$registro['GrupoRegional']."</td>
                <td>".$registro['COUNT(empleado_id)']."</td>
                <td>".$registro['MAX(Salario)']."</td>
                <td>".$registro['MIN(Salario)']."</td>
                <td>".$registro['AVG(Salario)']."</td>
                
                
                
                

            </tr>";

    } 

    echo "</table>";

    ?>
    <p><?= $_GET['msg']??" "?></p>
    
</body>
</html>