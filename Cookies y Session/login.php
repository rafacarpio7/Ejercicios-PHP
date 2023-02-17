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
    $sql = "DROP TABLE IF EXISTS usuarios;" ."CREATE TABLE IF NOT EXISTS usuarios( "
            . "id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,"
          ."  usuario VARCHAR(30) NOT NULL,"
           ." contrasena VARCHAR(255) NOT NULL)";

    $conexion->exec($sql);

} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

// public function registro()
//     {
       
//         $sql = ("INSERT INTO " .self::$TABLA."(id_usuario,password)
//                  VALUES (:nombre,:password)");
//         $stmt = $this->conexion->prepare($sql);
        
//         $stmt->bindParam(':nombre', $_REQUEST["usuarioRegistro"]);
//         $stmt->bindParam(':password', password_hash($_REQUEST['contrasenaRegistro'],PASSWORD_DEFAULT));

//         return $stmt->execute();

//     }



    try {
        $conexion = new PDO("mysql:host=$servername;dbname=mi_restaurante_favorito;charset=utf8",$username,$password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO usuarios(usuario,contrasena) VALUES ('admin','".password_hash('admin',PASSWORD_DEFAULT)."'),('dan','".password_hash('dan',PASSWORD_DEFAULT)."')";
        $conexion->exec($sql);
    
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }





try {
    $conexion = new PDO("mysql:host=$servername;dbname=mi_restaurante_favorito;charset=utf8",$username,$password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql =  "DROP TABLE IF EXISTS platos;" . "CREATE TABLE IF NOT EXISTS platos( "
            . "id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,"
           ." nombre_plato VARCHAR(30) NOT NULL,"
           ." precio INT(9) NOT NULL, "
           ." categoria VARCHAR(20) NOT NULL,"
           ." CONSTRAINT check_categoria CHECK (categoria IN ('vegano', 'sin gluten', 'sin lactosa', 'normal')))";

        if($conexion->exec($sql)){

        }

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
    <form action="mostrarDatos.php" method="post">
        <h1>Vamos a Labural</h1>
        Camarero : <input type="text" name="camareroId" id="camarero" required><br>
        Contraseña : <input type="password" name="contrasena" id="contrasena" required><br>
        <input type="submit" name="btnLogin" value="Entrar">
    </form>
</body>
</html>