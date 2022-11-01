<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
    html,body {
	height: 100%;
    }

    body {
        margin: 0;
        background: linear-gradient(45deg, #49a09d, #5f2c82);
        font-family: sans-serif;
        font-weight: 100;
    }

    .container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    table {
        width: 800px;
        border-collapse: collapse;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }

    th,td {
        padding: 15px;
        background-color: rgba(255,255,255,0.2);
        color: #fff;
    }

    th {
        text-align: left;
    }

        th {
            background-color: #55608f;
        }
        

    
    </style>
    <title>Document</title>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conexion = new PDO("mysql:host=$servername;dbname=alumnos_dwec;charset=utf8",$username,$password);

        $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

       
    } catch (PDOException $e) {
        echo 'Conexion fallida'. $e->getMessage();
    }
    
    // $consulta = $conexion->query("SELECT * FROM alumnos");


    //statement

    $statement = $conexion->prepare("SELECT * FROM Alumnos ");

    $statement->execute();



    echo "<table ><th colspan='5'>Alumnos</th>";
    echo "<tr>
    <th>Codigo</th>
    <th>Nombre</th>
    <th>Apellidos</th>
    <th>Telefono</th>
    <th>Correo</th>
    </tr>";
    while ($registro = $statement->fetch()) {
        

        echo "<tr>
                <td>".$registro['CODIGO']."</td>
                <td>".$registro['NOMBRE']."</td>
                <td>".$registro['APELLIDOS']."</td>
                <td>".$registro['TELEFONO']."</td>
                <td>".$registro['CORREO']."</td>
                <td><form action='borraDatos.php'><input type='submit' name='btnBorrar' value='Borrar'></td>
                <td><input type='hidden' name='cod' value='".$registro['CODIGO']."'></form></td>".
                /*
                <td><form action='modificaDatos.php'><input type='submit' name='btnModificar' value='Modificar'></td>
                <td><input type='hidden' name='cod' value='".$registro['CODIGO']."'>
                <input type='hidden' name='nombre' value='".$registro['nombre']."'>
                <input type='hidden' name='apellidos' value='".$registro['apellido']."'>
                <input type='hidden' name='telefono' value='".$registro['telefono']."'>
                <input type='hidden' name='correo' value='".$registro['correo']."'></form></td>
                <td><input type='submit' name='btnCopiar' value='Copiar'></td>*/
                

            "</tr>";

    } 

    echo "</table>";

    echo "<pre>";


   
    ?>
</body>
</html>