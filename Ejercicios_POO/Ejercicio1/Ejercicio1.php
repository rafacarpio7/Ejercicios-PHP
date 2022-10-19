<!-- Realizar un programa para un Centro Educativo en el que acaban de abrir una tienda de libros y
revistas para comprar y vender de segunda mano. Las clases necesarias serán:
● Clase abstracta ReadingMaterial
○ variables privadas: id, title, pages, price
○ objeto private editor de la clase Publisher (ver descripción de la clase más abajo)
○ debe incluir:
▪ constructor
▪ métodos getter y setter
● Clase pública Book (hija de ReadingMaterial)
○ variables privadas: chapters, authors
○ debe incluir:
▪ constructor
▪ métodos getter y setter
● Clase pública Magazine (hija de ReadingMaterial)
○ variable privada: additionalResources
○ debe incluir:
▪ constructor
▪ métodos getter y setter
● Clase pública Publisher
○ variable privadas: id, name, address, telephone, website
○ debe incluir:
▪ constructor
▪ métodos getter y setter
Crea un objeto un objeto Publisher con el valor de las variables que desees.
Crea un objeto Book y un objeto Magazine con el valor de las variables que desees, muéstralas en una
web php, actualízalas y vuelve a mostrarlas por pantalla.
Añade las siguientes funcionalidades y prueba los métodos con alguna instancia.
a) Incluye una función de ordenación utilizando el algoritmo BubbleSort (ordenación de libros
por precio ascendente o descendente)
b) Realiza un método de ordenación por orden alfabético del título.
c) Ordena por orden alfabético al menos 5 referencias (a introducir en el array de libros o
magazines).
d) Método de búsqueda en el array de libros o magazines por autor.
e) Método de búsqueda en el array de libros o magazines por título. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1 POO</title>
</head>
<body>

    <?php
    include("ReadingMaterial.php");
    include("Book.php");
    include("Magazine.php");
    
    

    $publisher1= new Publisher("Rafa","Calle Marclino Orozco 24",619866709,"www.google.com");
    $publisher2 = new Publisher("Hamza","Calle de su prima",685321685,"facebook.com");

    $book1 = new Book(12081,"asdasd","dasdasda",234,100,$publisher1);
    
    $magazine1 = new Magazine("Pagina WEB","dasdasda",234,100,$publisher2);


    echo "<br>";
    print_r($book1);
    echo "<br>";
    print_r($magazine1);
    echo "<br>";
?>
    
</body>
</html>