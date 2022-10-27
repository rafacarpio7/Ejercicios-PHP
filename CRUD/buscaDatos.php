<?php
$msg="";
if (isset($_REQUEST['btnEnviar'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=alumnos_dwec;charset=utf8",
        $username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM ALUMNOS WHERE NOMBRE=:nom;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom', $_REQUEST['nombre']);
        $stmt->execute();
        $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($registros)>0) {
            echo "<h2> Alumn@s encontrados que contienen el nombre ".$_REQUEST['nombre']."</h2>";
            echo "<ul>";
            foreach ($registros as $fila) {
                echo "<li>codigo: ".$fila["CODIGO"].", nombre: ".$fila["NOMBRE"]." "
                .$fila["APELLIDOS"].", telefono : ".$fila["TELEFONO"].
                ", correo electronico : ".$fila["CORREO"]."</li>";
            }
            echo "</ul>";
        }else {
            $msg = "No se ha encontrado ningun alumn@ que contenga ".$_REQUEST['nombre']. " en su nombre";

        }
        

    } catch (PDOException $e) {
        echo 'ERROR '. $e->getMessage();
    }
    $conn = null ;
}
?>