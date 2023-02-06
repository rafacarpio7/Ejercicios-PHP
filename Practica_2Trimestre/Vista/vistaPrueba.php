<?php
        include "../Modelo/Viviendas.php";
        include_once "../Controlador/controlador_viviendas.php";
        include_once "../Controlador/funciones.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Viviendas</title>
</head>
<body>
    <?php require_once "../Controlador/controlador_CRUD.php";?>
    <?php mostrarTabla($registrosViviendas) ;?>
    
</body>
</html>