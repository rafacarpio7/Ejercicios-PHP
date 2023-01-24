<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Login</title>
</head>
<body>
    <form action="../Controlador/controlador_login.php" method="post">
            <!-- Formulario de login del usuario con contraseña establecida "1234" -->
            <legend>Login</legend>
            Usuario :
            <input type="text" name="idLogin" required><br>
            Contraseña :
            <input type="password" name="contraseña" required><br>
            <p><?=$mensaje??''?></p>
            <input type="submit" name="btnLogin" value="LOGIN">
            <a href="./registro.php">
            <input type="button" name="btnRegistro" value="REGISTRO">
            </a>
        
    </form>
</body>
</html>