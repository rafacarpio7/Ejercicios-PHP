<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
 @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    text-decoration: none;
    
    
}

li,a,button {
    font-family: 'Ubuntu', sans-serif;
    font-weight: 500;
    font-size: 16px;
    color: black;
    text-decoration: none;
}


header {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    padding: 7px 10%;
    background-color: #fff8f5;

}

.logo-inicio {
    cursor: pointer;
    height: 75px;
    margin-right: auto;
}


.logo {
    cursor: pointer;
    height: 75px;
    margin-right: auto;
    border: 0.5;
    border-radius: 30px;
}

.navbar {
    list-style: none;
    

}

.navbar li{
    display: inline-block;
    padding: 0px 20px;

}

.navbar li a{
    transition: all 0.3 ease 0s;
}

.navbar li a:hover {
    color: burlywood;
}
h1{
    text-align: center; 
    padding-top: 25px; 
    margin-top: 25px;
    font-family: 'Roboto';
}

button {
    margin-left: 40px;
    padding: 9px 25px;
    background-color: rgb(223, 235, 156);
    border: none;
    border-radius: 50px;
    cursor: pointer;
    transition: all 0.3 ease 0s;
}

button:hover {
    background-color:burlywood;
}

body {
    margin: 0;
    background: #f5e0d7;
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
    margin: auto;
    margin-top: 5px;
    width: 800px;
    border-collapse: collapse;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);

}

th,td {
    padding: 15px;
    background-color: rgba(255,255,255,0.2);
    color: rgb(0, 0, 0);
    font-family: 'roboto';
}



th {
    text-align: center;
    
}

    th {
        background-color: #b6e2d3;
    }

form {
    width: 400px;
    background: #b6e2d3;
    padding-left: 20px;
    padding-top: 5px;
    margin: auto;
    margin-top: 75px;
    border-radius: 4px;


}

input {
    width: 150px;
    padding: 7px;
    border-radius: 4px;
    margin-bottom: 15px;
    margin-left: 10px;
    border: 1px solid #49a09d;
    font-family: 'Ubuntu', sans-serif;
}

legend {
    font-size: 22px;
    margin-bottom: 20px;
    margin-top: 20px;
}

.inicio {
    display: flex;
    align-items: center;
    justify-content: center;
    
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
    
    $sql= "SELECT COUNT(*) AS 'cantidad' FROM alumnos";
    $result = $conexion->query($sql);
    $num = $result->fetch();
    $cantidadRegistros = $num['cantidad'];
    $tamañoPagina = 7;

    $numPaginas= ceil($cantidadRegistros/$tamañoPagina);
    if (empty($paginaActual)) {
        $paginaActual=1;
    }
    $inicioLimit=($paginaActual-1)*$tamañoPagina;
    $finalLimit= $paginaActual*$tamañoPagina;

    echo $num['cantidad'];

    $statement = $conexion->prepare("SELECT * FROM alumnos ");

    $statement->execute();

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

            </tr>";

    } 

    echo "</table>";
   /**

    foreach ($consulta as $key => $value) {
        echo 'Codigo'.$key['CODIGO']. 'Nombre'.$key['NOMBRE']. 'Apellidos'.$key['APELLIDOS'].'Telefono'.$key['TELEFONO'].'Correo'.$key['CORREO']; 
    }
        
     */
    echo $numPaginas;
    for ($i=1; $i <=$numPaginas ; $i++) { 
        echo "<a href=".header('Location: paginacion.php?pagina=$paginaActual').">$i</a>";
    }

    ?>
    
</body>
</html>