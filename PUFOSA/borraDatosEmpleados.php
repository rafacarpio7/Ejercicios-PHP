
<?php

if (isset($_REQUEST['btnBorrar'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=pufosa;charset=utf8",
        $username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT empleado_ID FROM empleados WHERE empleado_ID=:idEmpleado;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idEmpleado', $_REQUEST['codEmpleado']);
        $stmt->execute();
        $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($registros)>0) {
            $sql= "DELETE FROM empleados WHERE empleado_ID=:idEmpleado; " ;
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':idEmpleado', $_REQUEST['codEmpleado']);
                $stmt->execute();
                
        }        

    } catch (PDOException $e) {
        echo 'ERROR '. $e->getMessage();
    }
    $conn = null ;
}
header("Location: empleados.php");
?>
