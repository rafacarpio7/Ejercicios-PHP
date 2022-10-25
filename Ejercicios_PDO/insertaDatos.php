<?php
    $tblDatos = null;
    $servername = "localhost";
    $username = "root";
    $password = "";
    $sql="";

    if (isset($_REQUEST['btnEnviar'])) {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=alumnos_dwec;charset=utf8",$username,$password);


            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT COUNT(*) AS 'cantidad' FROM ALUMNOS WHERE correo='".$_REQUEST

                $sql= "INSERT INTO ALUMNOS (nombre,apellidos,telefono,correo) " . "VALUES (:nom,:ape,:tel,:cor)";


                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':nom', $_REQUEST['nombre']);
                $stmt->bindParam(':ape', $_REQUEST['apellidos']);
                $stmt->bindParam(':tel', $_REQUEST['telefono']);
                $stmt->bindParam(':cor', $_REQUEST['mail']);
                $stmt->execute();
                echo 'Conectado correctamente';
        } catch (PDOException $e) {
            echo 'Conexion fallida'. $e->getMessage();
        }
        $conn=null;
    }
?>