<?php
if (isset($_REQUEST['btnModificar'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
try {
    $conn = new PDO("mysql:host=$servername;dbname=alumnos_dwec;charset=utf8",
        $username,$password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE ALUMNOS SET NOMBRE =:nom , APELLIDOS=:ape,"
        ."TELEFONO=:tel, CORREO=:correo WHERE codigo=:cod;";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom', $_REQUEST['nombre']);
        $stmt->bindParam(':ape', $_REQUEST['apellidos']);
        $stmt->bindParam(':tel', $_REQUEST['telefono']);
        $stmt->bindParam(':correo', $_REQUEST['correo']);
        $stmt->bindParam(':cod', $_REQUEST['cod']);
        $stmt->execute();

        
    
    } catch (PDOException $e) {
        echo 'ERROR '. $e->getMessage();
    }
    $conn = null ;

}


?>