
<?php
session_start();
if (isset($_REQUEST['btnBorrar'])) {
    include_once "conexion.php";
    try {
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
                $log = fopen("log.csv","a+b");
                $DateAndTime = date('d-m-Y h:i:s a', time());
                fwrite($log,"DELETE;".$_SESSION['sesion'].";$DateAndTime\n");
                fclose($log);
                echo'<script type="text/javascript">
                    alert("El Empleado ha sido borrado correctamente");
                    window.location.href="empleados.php";
                    </script>';
        }        

    } catch (PDOException $e) {
        echo 'ERROR '. $e->getMessage();
        // Si no se puede borrar por integridad de la base de datos lanzamos un alert
        echo'<script type="text/javascript">
                    alert("El Empleado no puede ser borrado");
                    window.location.href="empleados.php";
                    </script>';
    }
    $conn = null ;
}

?>
