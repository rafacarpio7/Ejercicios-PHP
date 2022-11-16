
<?php
session_start();
$error="";
if (isset($_REQUEST['btnBorrar'])) {
    include_once "conexion.php";
    try {
        $sql = "SELECT departamento_ID FROM departamento WHERE departamento_ID=:idDepartamento;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':idDepartamento', $_REQUEST['codDepartamento']);
        $stmt->execute();
        $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($registros)>0) {
            $sql= "DELETE FROM departamento WHERE departamento_ID=:idDepartamento; " ;
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':idDepartamento', $_REQUEST['codDepartamento']);
                $stmt->execute();
                $log = fopen("log.csv","a+b");
                $DateAndTime = date('d-m-Y h:i:s a', time());
                fwrite($log,"DELETE;".$_SESSION['sesion'].";$DateAndTime\n");
                fclose($log);
        }    

        echo'<script type="text/javascript">
        alert("El Departamento borrado correctamente");
        window.location.href="departamentos.php";
        </script>';
    } catch (PDOException $e) {
        echo 'ERROR '. $e->getMessage();
        // Si no se puede borrar por integridad de la base de datos lanzamos un alert
        echo'<script type="text/javascript">
                    alert("El Departamento no puede ser borrado");
                    window.location.href="departamentos.php";
                    </script>';
        
    }
    $conn = null ;
}
//header("Location: departamentos.php?msg=$error");
?>
