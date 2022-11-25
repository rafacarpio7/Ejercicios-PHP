
<?php
session_start();
if (isset($_REQUEST['btnBorrar'])) {
    include_once "conexion.php";

    try {
        $sql = "SELECT Ubicacion_ID FROM ubicacion WHERE Ubicacion_ID=:idUbicacion;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idUbicacion', $_REQUEST['codUbicacion']);
        $stmt->execute();
        $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($registros)>0) {
            $sql= "DELETE FROM ubicacion WHERE Ubicacion_ID=:idUbicacion; " ;
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':idUbicacion', $_REQUEST['codUbicacion']);
                $stmt->execute();
                $log = fopen("log.csv","a+b");
                $DateAndTime = date('d-m-Y h:i:s a', time());
                fwrite($log,"DELETE;".$_SESSION['sesion'].";$DateAndTime\n");
                fclose($log);
                echo'<script type="text/javascript">
                    alert("La Ubicacion ha sido borrada correctamente");
                    window.location.href="ubicacion.php";
                    </script>';
        }        

    } catch (PDOException $e) {
        echo 'ERROR '. $e->getMessage();
        // Si no se puede borrar por integridad de la base de datos lanzamos un alert
        echo'<script type="text/javascript">
                    alert("La Ubicacion no puede ser borrada");
                    window.location.href="ubicacion.php";
                    </script>';
    }
    $conn = null ;
}

?>
