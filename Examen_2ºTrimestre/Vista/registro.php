<!DOCTYPE html>

<?php
include_once "../Controlador/Controller_registro.php";

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
        Nombre : 
        <input type="text" name="nombre" id=""><br>
        Apellidos : 
        <input type="text" name="apellidos" id=""><br>
        Domicilio : 
        <input type="text" name="domicilio" id=""><br>
        Numero de telefono : 
        <input type="tel" name="telefono" id=""><br>
        Email : 
        <input type="email" name="email" id=""><br>
        Contraseña : 
        <input type="password" name="contraseña" id=""><br>
        <input type="submit" name="btnRegistro" value="Registrate">
        <a href="login.php">
            <input type="button" name="btnLogin" value="Login">
        </a>
    </form>
</body>
</html>