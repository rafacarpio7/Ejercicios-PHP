<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Limites</title>
</head>
<body>
    <form action="jugada.php" method="post">
        <fieldset>
        <legend>Juego Limites</legend>
            Limite Inferior :
            <input type="number" name="limiteInferior" required>
            Limite Superior :
            <input type="number" name="limiteSuperior" required>
            <input type="submit" name="btnEnviar" value="Empezar">
            
        </fieldset>
    </form>

    <p><?= $_GET['msg']??" "?></p>
    
    

</body>
</html>