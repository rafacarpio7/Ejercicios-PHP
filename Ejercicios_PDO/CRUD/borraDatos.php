
<?php
$msg="";
if (isset($_REQUEST['codigo'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=alumnos_dwec;charset=utf8",
        $username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT CODIGO FROM ALUMNOS WHERE codigo=:cod;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':cod', $_REQUEST['codigo']);
        $stmt->execute();
        $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($registros)>0) {
            $sql= "DELETE FROM ALUMNOS WHERE codigo=:cod; " ;
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':cod', $_REQUEST['codigo']);
                $stmt->execute();
                $msg="El alumno se ha eliminado correctamente ";
        }else {
            $msg = "No se ha encontrado ningun alumn@ con este codigo:  ".$_REQUEST['codigo'];

        }
        

    } catch (PDOException $e) {
        echo 'ERROR '. $e->getMessage();
    }
    $conn = null ;
}
?>
