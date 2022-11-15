<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Pufosa - Nuevo cliente</title>
</head>
<?php
include_once "CRUD.php";
    ?>
<body>
    <form action="" method="post">
        
            <legend>Nuevo Cliente</legend>
            ID Cliente :
            <input type="number" name="idCliente" required><br>
            Nombre :
            <input type="text" name="nombre" ><br>
            Direccion : 
            <input type="text" name="direccion" ><br>
            Ciudad : 
            <input type="text" name="ciudad" ><br>
            Estado : 
            <input type="text" name="estado" ><br>
            Codigo Postal :
            <input type="text" name="codigoPostal" ><br>
            Codigo Area :
            <input type="text" name="codigoArea" ><br>
            Telefono : 
            <input type="text" name="telefono" ><br>
            Vendedor : 
            <input type="text" name="vendedorID" required><br>
            Limite de Credito :
            <input type="text" name="limiteCredito" ><br>
            Comentarios : 
            <input type="text" name="comentarios" ><br>
            <input type="submit" name="btnAñadir" value="Añadir">
        
    </form>

<?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $sql="";

    if (isset($_REQUEST['btnAñadir'])) {
        try {
            // Conexion con atributos definidos
            $conn = new PDO("mysql:host=$servername;dbname=pufosa;charset=utf8",$username,$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //consulta para comprobar si el cliente introducido existe en la base de datos y coincide con uno existente.
            $sql = "SELECT COUNT(*) AS 'cantidad' FROM cliente WHERE CLIENTE_ID='".$_REQUEST['idCliente']."';";
            $result = $conn->query($sql);
            $num = $result->fetch();

            // Primera comprobacion si el cliente introducido existe en la base de datos no podra ser insertado
            if ($num['cantidad']>0) {
                echo'<script type="text/javascript">
                    alert("No se puede dar de alta el cliente ya existe en la base de datos");
                    window.location.href="añadeClientes.php";
                    </script>';
                //Escritura fichero log
                $log = fopen("log.csv","a+b");
                $DateAndTime = date('d-m-Y h:i:s a', time());
                fwrite($log,"INSERT;".$_SESSION['sesion'].";$DateAndTime\n");
                fclose($log);
                //Comprobacion si en el campo Vendedor_ID hemos introducido un id de empleado valido
            }else {
                $sql = "SELECT COUNT(empleado_ID) AS 'cantidad' FROM empleados WHERE empleado_ID='".$_REQUEST['vendedorID']."';";
                $result = $conn->query($sql);
                $num = $result->fetch();
                if (!$num['cantidad']>0) {
                    echo'<script type="text/javascript">
                    alert("En el campo Vendedor debe introducir un ID de vendedor valido");
                    window.location.href="añadeClientes.php";
                    </script>';
                    //Escritura fichero log
                    $log = fopen("log.txt","a+b");
                $DateAndTime = date('d-m-Y h:i:s a', time());
                fwrite($log,"INSERT;".$_SESSION['sesion'].";$DateAndTime\n");
                fclose($log);
                } else {
                    //consulta preparada insercion correcta
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
                $log = fopen("log.csv","a+b");
                $DateAndTime = date('d-m-Y h:i:s a', time());
                fwrite($log,"INSERT;".$_SESSION['sesion'].";$DateAndTime\n");
                fclose($log);
                echo'<script type="text/javascript">
                    alert("Insertado Correctamente");
                    window.location.href="clientes.php";
                    </script>';
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

