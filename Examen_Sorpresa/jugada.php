<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugada</title>

</head>
<?php
    $msg="";
    if (!empty($_REQUEST['limiteInferior']) &&  !empty($_REQUEST['limiteSuperior'])) {
        $limiteSuperior = $_REQUEST['limiteSuperior'];
        $limiteInferior = $_REQUEST['limiteInferior'];
        if ($_REQUEST['limiteInferior']>$_REQUEST['limiteSuperior']) {
            header("Location: limites.php?msg='El limite inferior debe ser menor que el limite superior'");
        }
    }

        if (isset($_REQUEST['btnJugada'])) {
            echo $limiteInferior;
            echo $limiteSuperior;
            if (empty($_REQUEST['intentos'])) {
               $intentos=1;
            }else {
                $intentos=$_REQUEST['intentos']+1;
            }
            
            if (empty($_REQUEST['numAle'])) {
                $numAle = mt_rand($limiteInferior,$limiteSuperior);
            }else {
                $numAle = $_REQUEST['numAle'];
                echo $numAle;
            }
            if ($_REQUEST['adivinaNumero']>$numAle) {
                $msg='Prueba con un numero mas bajo';
                echo $msg;
            } else if($_REQUEST['adivinaNumero']<$numAle){
                $msg='Prueba con un numero mas alto';
                echo $msg;
            } else {
                $ganado=true;
            }
            echo $intentos;
            
            
        }else {
            $numAle = mt_rand($limiteInferior,$limiteSuperior);
        }
     
    ?>

<body>
    <form action="" method="post">
        <fieldset>
            <legend>Adivina el numero Secreto</legend>
            Prueba un numero :
            <input type="number" name="adivinaNumero" required>
            <input type="hidden" name="intentos" value="<?=$intentos??''?>">
            <input type="hidden" name="limiteSuperior" value="<?=$limiteSuperior?>">
            <input type="hidden" name="limiteInferior" value="<?=$limiteInferior?>">
            <input type="hidden" name="numAle" value="<?=$numAle??''?>">
            <input type="submit" name="btnJugada" value="Prueba">
            
        </fieldset>

    </form>
    <p><? echo $msg;?></p>


</body>

</html>