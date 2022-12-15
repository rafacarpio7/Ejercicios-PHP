<?php
$servidor= "localhost";
$usuario= "root";
$clave="";
try {
    $conn = new PDO("mysql:host=$servidor;dbname=pufosa;charset=utf8",$usuario,$clave);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Conexion fallida'. $e->getMessage();
}

try {
    
    $sql="CREATE DATABASE IF NOT EXISTS cifrado DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci";
    $conn->exec($sql);

} catch (PDOException $e) {
    echo $sql. "<br>" . $e->getMessage();
}

try {
    $conn = new PDO("mysql:host=$servidor;dbname=pufosa;charset=utf8",$usuario,$clave);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Conexion fallida'. $e->getMessage();;
}

try {
    $sql="CREATE TABLE IF NOT EXISTS usuarios 
    ( codigo INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,"
     . " usuario VARCHAR(15) PRIMARY KEY". " contraseña VARCHAR(30) NOT NULL ) DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci; ";
    $conn->exec($sql);
    echo "tabla creada correctamente";
} catch (PDOException $e) {
    echo $sql. "<br>" . $e->getMessage();
}

try {
    if (isset($_REQUEST['btnLogin'])) {
        
    }
    
} catch (PDOException $e) {
    echo $sql. "<br>" . $e->getMessage();
}

try {
    if (isset($_REQUEST['btnRegistro'])) {
        $cifrado = password_hash($_REQUEST['contraseñaRegistro'],PASSWORD_DEFAULT);
        $sql="INSERT INTO usuarios(usuario,contraseña) VALUES (:user,:contraseña,)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user', $_REQUEST['usuarioRegistro']);
        $stmt->bindParam(':contraseña', $cifrado);
        $stmt->execute();
    }
    
} catch (PDOException $e) {
    echo $sql. "<br>" . $e->getMessage();
}



?>