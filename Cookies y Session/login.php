<?php
$servername = "localhost";
$username = "root";
$password = "";
try {
    $conexion = new PDO("mysql:host=$servername",$username,$password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql= "CREATE DATABASE IF NOT EXISTS mi_restaurante_favorito "
            . "DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;";

    $conexion->exec($sql);

} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

try {
    $conexion = new PDO("mysql:host=$servername;dbname=mi_restaurante_favorito;charset=utf8",$username,$password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE IF NOT EXISTS usuarios( "
            . "id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,"
          ."  usuario VARCHAR(30) NOT NULL,"
           ." contrasena VARCHAR(255) NOT NULL)";

    $conexion->exec($sql);

} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

try {
    $conexion = new PDO("mysql:host=$servername;dbname=mi_restaurante_favorito;charset=utf8",$username,$password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DROP TABLE platos;"
           . "CREATE TABLE IF NOT EXISTS platos( "
            . "id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,"
           ." nombre_plato VARCHAR(30) NOT NULL,"
           ." precio INT(9) NOT NULL, "
           ." categoria VARCHAR(20) NOT NULL,"
           ." CONSTRAINT check_categoria CHECK (categoria IN ('vegano', 'sin gluten', 'sin lactosa', 'normal')))";

    $conexion->exec($sql);

} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

try {
    $conexion = new PDO("mysql:host=$servername;dbname=mi_restaurante_favorito;charset=utf8",$username,$password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO platos(nombre_plato,precio,categoria) VALUES ('croquetas',12,'normal'),('flamenquines',10,'normal'),('lentejas',10,'normal'),('sopa',10,'normal'),('salmorejo',10,'normal')";
    $conexion->exec($sql);

} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <h1>Vamos a Labural</h1>
        Camarero : <input type="text" name="camareroId" id="camarero" required><br>
        Contraseña : <input type="password" name="contraseña" id="contraseña" required><br>
        <input type="submit" name="btnLogin" value="Entrar">
    </form>
</body>
</html>