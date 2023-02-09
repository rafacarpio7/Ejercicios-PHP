<?php
        include_once "../Controlador/funciones.php";
        include "../Modelo/Usuarios.php";
        include_once "../Controlador/controlador_registro.php";
?>
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

<?php require_once "../Controlador/controlador_CRUD.php";?>
<form action="" method="post">
        <legend>REGISTRO</legend>
        Id Usuario : 
        <input type="text" placeholder="usuario" name="usuarioRegistro" required><br>
        
        <input type="hidden" name="contraseñaRegistro" value=<?=generadorContraseña()?>><br>
        <input type="submit" name="btnRegistro" value="REGISTRATE">
    </form>

    <?php
     if (isset($_REQUEST['contraseñaRegistro'])) {
        echo "<h2>Su contraseña autogenerada es ".$_REQUEST['contraseñaRegistro']." </h2>";
        echo "<h2>No se olvide de apuntarla antes de continuar</h2>";
     }
     
    ?>
</body>
</html>