<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
</head>
<header>
    <a class="logo-inicio" href="index.html" ><img class="logo"  src="logo.png" alt="logo"></a>
        <nav>
            <ul class="navbar">
                <li><a href="clientes.php"> Clientes </a></li>
                <li><a href="empleados.php"> Empleados </a></li>
                <li><a href="trabajos.php"> Trabajos </a></li>
                <li><a href="departamentos.php"> Departamentos </a></li>
                <li><a href="ubicacion.php"> Ubicacion </a></li>
            </ul>
        </nav>
        <a class="tag" target="_blank"  href=""><button>Desconectar</button></a>
    </header>
<body>
    <form action="" method="post">
        <fieldset>
            <legend>Nuevo Cliente</legend>
            ID Cliente :
            <input type="number" name="idCliente" required><br>
            Nombre :
            <input type="text" name="nombre" required><br>
            Direccion : 
            <input type="text" name="direccion" required><br>
            Ciudad : 
            <input type="text" name="ciudad" required><br>
            Estado : 
            <input type="text" name="estado" required><br>
            Codigo Postal :
            <input type="text" name="codigoPostal" required><br>
            Codigo Area :
            <input type="text" name="codigoArea" required><br>
            Telefono : 
            <input type="text" name="telefono" required><br>
            Vendedor : 
            <input type="text" name="vendedorID" required><br>
            Limite de Credito :
            <input type="text" name="limiteCredito" required><br>
            Comentarios : 
            <input type="text" name="comentarios" required><br>
            <input type="submit" name="btnAñadir" value="Añadir">
        </fieldset>
    </form>

<?php
    $tblDatos = null;
    $servername = "localhost";
    $username = "root";
    $password = "";
    $sql="";

    if (isset($_REQUEST['btnAñadir'])) {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=pufosa;charset=utf8",$username,$password);


            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT COUNT(*) AS 'cantidad' FROM cliente WHERE CLIENTE_ID='".$_REQUEST['idCliente']."';";

            

            $result = $conn->query($sql);

            $num = $result->fetch();

            if ($num['cantidad']>0) {
                echo "No se puede dar de alta el cliente ya existe en la base de datos <br>";
                $log = fopen("log.txt","a+b");
                $DateAndTime = date('m-d-Y h:i:s a', time());
                fwrite($log,"....Funcion INSERT.....usuario: ".$_REQUEST['idCliente'].".....$DateAndTime\n");
                fclose($log);
            }else {
                $sql = "SELECT COUNT(empleado_ID) AS 'cantidad' FROM empleados WHERE empleado_ID='".$_REQUEST['vendedorID']."';";
                $result = $conn->query($sql);
                $num = $result->fetch();
                if (!$num['cantidad']>0) {
                    echo "En el campo Vendedor debe introducir un ID de vendedor valido <br>";
                } else {
                    $sql= "INSERT INTO cliente (CLIENTE_ID,nombre,Direccion,Ciudad,Estado,CodigoPostal,CodigoDeArea,Telefono,Vendedor_ID,Limite_De_Credito,Comentarios) " 
                        . "VALUES (:idCli,:nom,:dir,:ciu,:est,:cp,:cde,:tlf,:veID,:limCre,:comen)";


                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':idCli', $_REQUEST['idCliente']);
                $stmt->bindParam(':nom', $_REQUEST['nombre']);
                $stmt->bindParam(':dir', $_REQUEST['direccion']);
                $stmt->bindParam(':ciu', $_REQUEST['ciudad']);
                $stmt->bindParam(':est', $_REQUEST['estado']);
                $stmt->bindParam(':cp', $_REQUEST['codigoPostal']);
                $stmt->bindParam(':cde', $_REQUEST['codigoArea']);
                $stmt->bindParam(':tlf', $_REQUEST['telefono']);
                $stmt->bindParam(':veID', $_REQUEST['vendedorID']);
                $stmt->bindParam(':limCre', $_REQUEST['limiteCredito']);
                $stmt->bindParam(':comen', $_REQUEST['comentarios']);
                $stmt->execute();
                echo "Insertado correctamente";
                }
                
                
            }

                
            
        } catch (PDOException $e) {
            echo 'Conexion fallida'. $e->getMessage();
        }
        $conn=null;
    }
?>
</body>
</html>

