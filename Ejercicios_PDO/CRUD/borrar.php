<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Borrar alumno</h1>
    <p style="color:red;"><?$msg=""?></p>
    <form action="borraDatos.php" method="post">
        <fieldset>
            <legend>Datos del alumno a borrar</legend>
            Codigo del alumno: 
            <input type="text" name="codigo" required>
            <input type="submit" name="btnEnviar" value="Borrar">
        </fieldset>
    </form>

    
</body>
</html>