<!-- Realizar un formulario html con el siguiente aspecto:
El número de veces indicado en el cuadro de texto tendrá que imprimirse la frase “Los bucles
son fáciles”. Para finalizar se escribirá por pantalla la frase “Se acabó”.
• El código php y el código html deberán de estar en dos ficheros distintos.
• Utilizar la sentencia WHILE
• Para recoger el dato metido en el cuadro de texto se utiliza la instrucción $_POST.
Ejemplo: $number = $_POST['number']; siendo number el name puesto al cuadro
de texto.
Ampliación: Repite el programa anterior pero en este caso la sentencia a utilizar debe de ser
FOR y además el código html y php se deberán de encontrar en el mismo fichero. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Ejercicio2_Post.php" method="get">
        <label for="nombre">Nombre : </label>
        <input type="text" name="nombre">
        <label for="edad">Edad : </label>
        <input type="number" name="edad">
        <p><input type="submit" name="Enviar" value="Enviar"></p>
    </form>
</body>
</html>