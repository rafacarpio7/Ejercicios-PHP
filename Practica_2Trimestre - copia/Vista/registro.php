<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Registro</title>
</head>
<body>
<form action="../Controlador/controlador_registro.php" method="post">
        <legend>REGISTRO</legend>
        Nombre : 
        <input type="text" placeholder="usuario" name="usuarioRegistro" required><br>
        Apellido :
        <input type="password" placeholder="contraseña" name="contraseñaRegistro" required><br>
        <input type="submit" name="btnRegistro" value="REGISTRATE">
        <a href="./login.php">
            <input type="button" name="btnLogin" value="LOGIN">
        </a>
    </form>
</body>
</html>