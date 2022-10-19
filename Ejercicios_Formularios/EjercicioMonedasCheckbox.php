<!--Realiza una aplicación web que realice conversión de una cantidad de euros que se
introducirá por teclado al tipo de moneda que se seleccione.
• El formulario debe permitir elegir un tipo de moneda de entre bitcoin, dólar
americano, libra esterlina y yen japonés utilizando un tipo select.
• El formulario se enviará a otro archivo PHP que será el que haga el cálculo y muestre el
resultado por pantalla.
• La tasa de cambio a aplicar es:
✓ 1€= 0,00012 ₿ (Bitcoin)
✓ 1€= 1,12 $ (dólar americano)
✓ 1€= 0,86 £ (libra esterlina)
✓ 1€= 120,82¥ (yen japonés)
Uso de formularios desde PHP
❑ Ejercicio propuesto: Conversor de moneda
Ampliación: Cambia el código del ejercicio de conversión de moneda para que se
pueda elegir más de un tipo de moneda a convertir (checkbox). El programa
mostrará el cambio en todos los tipos de moneda seleccionados. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">


        <label for="euros">Cantidad a convertir</label>
        <input type="number" name="euros">

        <fieldset>
            <legend>Selecciona las monedas a convertir</legend>
            <input type="checkbox" name="bitcoin" value="0.00012">Bitcoin<br>
            <input type="checkbox" name="dolar" value="1.12">Dola Americano<br>
            <input type="checkbox" name="libra" value="0.86">Libra Esterlina<br>
            <input type="checkbox" name="yen" value="120.82">Yen Japones<br>
        </fieldset>

        <p><input type="submit" value="Enviar" name="Enviar"></p>
    </form>

    <?php
  

        if (isset($_POST['Enviar'])) {
            if (isset($_POST['bitcoin'])) 
                $auxBit = (int)$_POST['euros'];
                $conversionBit = $auxBit* 0.00012;
                echo "La conversion de ".((int)$_POST['euros']) ." a Bitcoin es de ". $conversionBit ." Bitcoin<br>";
            if (isset($_POST['dolar'])) 
                $auxDolar = (int)$_POST['euros'];
                $conversionDolar = $auxDolar* 1.12;
                echo "La conversion de ".((int)$_POST['euros']) ." a dolares americanos es de ". $conversionDolar ." dolares<br>";
            if (isset($_POST['libra'])) 
                $auxLibra = (int)$_POST['euros'];
                $conversionLibra = $auxLibra* 0.86;
                echo "La conversion de ".((int)$_POST['euros']) ." a libras esterlinas es de ". $conversionLibra ." libras<br>";
            if (isset($_POST['yen'])) 
                $auxYen = (int)$_POST['euros'];
                $conversionYen = $auxYen* 120.82;
                echo "La conversion de ".((int)$_POST['euros']) ." a yenes es de ". $conversionYen ." yenes<br>";
        }else {
            echo "No se han enviado los datos correctamente";
        }
        ?>



</body>

</html>