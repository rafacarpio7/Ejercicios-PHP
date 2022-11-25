<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    
    <title>Pufosa - Inicio</title>
</head>
<body style="background-color: #fff8f5;">
    <?php
    include_once "CRUD.php";

    // incluimos el codigo de nuestro CRUD y mostramos la bienvenida a nuestro usuario
    ?>
    <h1>BIENVENIDO <?=$_SESSION['nombre']." ".$_SESSION['apellido']?> </h1><br>
    <div class="inicio">
       
        <img src="logo.png"  alt="">
        
    </div>

</body>
</html>