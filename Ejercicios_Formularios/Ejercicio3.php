<!--Solicitar que se introduzca por teclado el nombre de una persona y disponer tres
controles de tipo radio que nos permitan seleccionar si la persona:
1) no tiene estudios
2) estudios primarios
3) estudios secundarios
Mostrar un mensaje con los datos introducidos.  -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="get">
        <label for="nombre">Nombre : </label>
        <input type="text" name="nombre">
        <fieldset>
            <legend>Nivel de estudios</legend>
            <input type="radio" name="opcion" value=1 /> no tiene estudios<br />
            <input type="radio" name="opcion" value=2 /> estudios primarios<br />
            <input type="radio" name="opcion" value=3 /> estudios secundario<br />
        </fieldset>
        <p><input type="submit" name="Enviar" value="Enviar"></p>
    </form>

    <?php
    if (isset($_GET['Enviar'])) {
        $nombre = $_GET['nombre'];
        switch ($_GET['opcion']) {
            case 1:
                $opcion = "no tiene estudios";
                break;
            case 1:
                $opcion = "estudios primarios";
                break;
            case 1:
                $opcion = "estudios secundario";
                break;
        }

        echo "$nombre $opcion";
    }else {
        echo "No se han introducido valores";
    }

    ?>
</body>

</html>