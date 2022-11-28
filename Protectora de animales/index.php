<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include_once "Conexion.php";
    include_once "CRUD.php";
    include_once "Usuario.php";
    
    /*
    $usuario = new Usuario();

    $usuario->__set("id","16");
    $usuario->__set("nombre","Rafa");
    $usuario->__set("apellido","Torralba");
    $usuario->__set("sexo","Masculino");
    $usuario->__set("direccion","calle mi casa");
    $usuario->__set("telefono","678574645");

    $usuario->crear();
    


    print_r($usuario); */

    $usuario = new Usuario();
    while ($registros = $usuario->obtieneTodos()) {
        echo print_r($registros);
    }
   
    
    
    /*foreach ($usuario->obtieneTodos() as $row){
        echo $row;
    }*/


    ?>
</body>
</html>