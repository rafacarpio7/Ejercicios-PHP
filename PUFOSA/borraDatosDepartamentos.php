
<?php
session_start();
$error="";
if (isset($_REQUEST['btnBorrar'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=pufosa;charset=utf8",
        $username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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

    } catch (PDOException $e) {
        echo 'ERROR '. $e->getMessage();
        $error ="EL departamento no puede ser borrado";
    }
    $conn = null ;
}
header("Location: departamentos.php?msg=$error");
?>
