<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acierto</title>
</head>
    <?php
    
    if (isset($_REQUEST['btnJugada'])) {
        
        if ($_REQUEST['adivinaNumero']>$_REQUEST['numAle']) {
            header("Location: jugada.php?msg='Tu numero es mayor que el que buscamos'");
        }else if ($_REQUEST['adivinaNumero']<$_REQUEST['numAle']) {
            header("Location: jugada.php?msg='Tu numero es menor que el que buscamos'");
        }else {
            header("Location : acierto.php");
        }
    }
    ?>



<body>

    <h1>Bien Hecho</h1>
    <?php

    echo "Has realizado un total de ".$_REQUEST[''];

    ?>

    <button><a href="limites.php">Empezar</a></button>
    
</body>
</html>