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
    <form action="calculoMonedas.php" method="post">


        <label for="euros">Cantidad a convertir</label>
        <input type="number" name="euros">


        <select name="monedas">
            <option value="bitcoin">Bitcoin</option>
            <option value="dolar">Dolar Americano</option>
            <option value="libra">Libra Esterlina</option>
            <option value="yen">Yen Japones</option>
        </select>
        <p><input type="submit" value="Enviar" name="Enviar"></p>
    </form>

    

</body>

</html>