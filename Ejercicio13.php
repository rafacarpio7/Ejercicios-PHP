<!--Realiza un programa en php en el que se declare un vector de 5 posiciones. Cada
posición tomará como valor un color distinto (azul, rojo, verde, rosa, naranja). A
continuación, deberá de comprobar si el valor rosa se encuentra almacenado en el array.
Si es así, deberá de borrar el elemento del array.-->
<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio 13</title>

    </head>

    <body>

            
            
    <?php
        $vector5posiciones = array("azul" , "rojo" , "verde" , "rosa" , "naranja");
        
        echo "Borrar la palabra 'rosa' dentro del array: </br>";
        if (($key = array_search("rosa", $vector5posiciones)) != false) {
            unset($vector5posiciones[$key]);
            print_r($vector5posiciones);
        }

    ?>
        
    </body>
</html>
