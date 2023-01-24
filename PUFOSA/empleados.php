<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>PUFOSA - Empleados</title>
</head>
<body>

    <?php
    include_once "CRUD.php";
    try {
        include_once "conexion.php";
    } catch (PDOException $e) {
        echo 'Conexion fallida'. $e->getMessage();
    }
    

    $statement = $conn->prepare("SELECT * FROM empleados");

    $statement->execute();

    


    echo "<table ><th style='font-size: 28px'; colspan='12'>Empleados</th>";
    echo "<tr>
    <th>ID</th>
    <th>Apellido</th>
    <th>Nombre</th>
    <th>Inicial Apellido</th>
    <th>ID Trabajo</th>
    <th>ID Jefe</th>
    <th>Fecha Contrato</th>
    <th>Salario</th>
    <th>Comision</th>
    <th>ID Departamento</th>
    <th><button><a href='añadeEmpleados.php'>Añadir Empleados</button></a></th>
    <th></th>
    </tr>";
    while ($registro = $statement->fetch()) {
        
        // ademas de los propios botones de borrar y modificar tambien insertamos campos de 
        // formularios como hidden donde nos hacen llegar la informacion a los scripts de borrado y modificado
        echo "<tr>
                <td>".$registro['empleado_ID']."</td>
                <td>".$registro['Apellido']."</td>
                <td>".$registro['Nombre']."</td>
                <td>".$registro['Inicial_del_segundo_apellido']."</td>
                <td>".$registro['Trabajo_ID']."</td>
                <td>".$registro['Jefe_ID']."</td>
                <td>".$registro['Fecha_contrato']."</td>
                <td>".$registro['Salario']."</td>
                <td>".$registro['Comision']."</td>
                <td>".$registro['Departamento_ID']."</td>
                


                <form action='borraDatosEmpleados.php'>
                <td><input type='submit' name='btnBorrar' value='Borrar'></td>
                <input type='hidden' name='codEmpleado' value='".$registro['empleado_ID']."'>
                </form>
                <form action='modificaEmpleado.php' >
                <input type='hidden' name='empleadoId' value='".$registro['empleado_ID']."'>
                <input type='hidden' name='apellido' value='".$registro['Apellido']."'>
                <input type='hidden' name='nombreEmp' value='".$registro['Nombre']."'>
                <input type='hidden' name='iniApellido' value='".$registro['Inicial_del_segundo_apellido']."'>
                <input type='hidden' name='trabajoId' value='".$registro['Trabajo_ID']."'>
                <input type='hidden' name='jefeId' value='".$registro['Jefe_ID']."'>
                <input type='hidden' name='fechaContrato' value='".$registro['Fecha_contrato']."'>
                <input type='hidden' name='salarioEmp' value='".$registro['Salario']."'>
                <input type='hidden' name='comision' value='".$registro['Comision']."'>
                <input type='hidden' name='departamentoId' value='".$registro['Departamento_ID']."'>
                <td><input type='submit' name='btnEditar' value='Editar'></td>
                </form>
                
                
                

            </tr>";

    } 

    echo "</table>";

    ?>
    
</body>
</html>