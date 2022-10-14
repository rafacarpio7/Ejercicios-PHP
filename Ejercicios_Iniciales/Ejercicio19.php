<!-- Busca cuatro imágenes en internet. Crea una página que muestre de forma aleatoria
una de ellas
 -->
 <html>

<head>
    <title>Ejercicio 19</title>
</head>
<body>
    <?php
      
      $arrayimg = array("logo2.jpeg","logo2.png","portada.png");

      echo '<img src='.$arrayimg[rand(0,2)] .' >';
    

    ?>

    
</body>


</html>