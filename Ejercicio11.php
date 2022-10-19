<!--Realiza un programa en php donde dada la cadena: “Estamos dando nuestros primeros
pasos en programación utilizando el lenguaje php” imprima por pantalla:
• La longitud de la cadena.
• La primera ocurrencia de “os”.
• La búsqueda de la palabra “nuestros”.
• La subcadena “lenguaje php”.
• La subcadena “nuestros primeros pasos”.
• El reemplazo de las palabras estamos por estoy y nuestros por mis.
• Todas las letras de la cadena en minúsculas.
• Todas las letras de la cadena en mayúsculas
• La frase con todas las letras iniciales de cada palabra en mayúscula.-->
<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio 11</title>

    </head>

    <body>

            
            
    <?php
        $cadena = "Estamos dando nuestros primeros pasos en programación utilizando el lenguaje php";
        $subcadena = "os";
        $tamaño = mb_strlen($cadena);
        $primeraOcurrencia = mb_strpos($cadena,$subcadena);
        $busquedaPalabra = mb_strpbrk("estamos" , $cadena);


        echo "$tamaño</br>" ;
        echo "$primeraOcurrencia</br>";
        echo "$busquedaPalabra</br>" ;


    ?>
        
    </body>
</html>
