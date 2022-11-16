<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Conversor de moneda</title>
</head>
<body>
    <hr>

    <form action="" method="get">
        <label for="cantidad"><b>Cantidad: </b></label>
        <input type="number" name="cantidad" required style="text-align: center;">
        <label for="radio"><b>Tipo moneda: </b></label>
        <select name="moneda[]" style="text-align: center;">
            <option value="bitcoin">Bitcoin</option>
            <option value="dólar_americano">Dólar americano</option>
            <option value="libra_esterlina">Libra esterlina</option>
            <option value="yen_japonés">Yen japonés</option>
        </select>
        <input type="submit" value="Enviar" name="botonEnviar">
    </form>
    
    <hr>

    <form action="" method="get">
        <label for="cantidad"><b>Cantidad: </b></label>
        <input type="number" name="cantidad" required style="text-align: center;">
        <label for="radio"><b>Tipo moneda: </b></label>
        <input type="radio" name="moneda[]" value="bitcoin">Bitcoin
        <input type="radio" name="moneda[]" value="dólar_americano">Dólar americano
        <input type="radio" name="moneda[]" value="libra_esterlina">Libra esterlina
        <input type="radio" name="moneda[]" value="yen_japonés">Yen japonés
        <input type="submit" value="Enviar" name="botonEnviar">
    </form>

    <hr>

    <form action="" method="get">
        <label for="cantidad"><b>Cantidad: </b></label>
        <input type="number" name="cantidad" required style="text-align: center;">
        <label for="radio"><b>Tipo moneda: </b></label>
        <input type="checkbox" name="moneda[]" value="bitcoin">Bitcoin
        <input type="checkbox" name="moneda[]" value="dólar_americano">Dólar americano
        <input type="checkbox" name="moneda[]" value="libra_esterlina">Libra esterlina
        <input type="checkbox" name="moneda[]" value="yen_japonés">Yen japonés
        <input type="submit" value="Enviar" name="botonEnviar">
    </form>

    <hr>

    <?php
    if(isset($_GET["botonEnviar"])){
        foreach ($_GET["moneda"] as $indice => $value) {
            switch ($value) {
                case "bitcoin":
                    echo "<b>Resultado de la conversión: </b>" . $_GET["cantidad"]*0.00012 . " ₿ <br/>";
                    break;
                case "dólar_americano":
                    echo "<b>Resultado de la conversión: </b>" . $_GET["cantidad"]*1.12 . " $ <br/>";
                    break;
                case "libra_esterlina":
                    echo "<b>Resultado de la conversión: </b>" . $_GET["cantidad"]*0.86 . " £ <br/>";
                    break;
                case "yen_japonés":
                    echo "<b>Resultado de la conversión: </b>" . $_GET["cantidad"]*120.82 . " ¥ <br/>";
                    break;
                default:
                    echo "Error.";
            }
        }
    }
    ?>
</body>
</html>