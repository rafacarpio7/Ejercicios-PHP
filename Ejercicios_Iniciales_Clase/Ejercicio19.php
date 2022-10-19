<!-- Busca cuatro imágenes en internet. Crea una página que muestre de forma aleatoria
una de ellas
 -->
 <html>

<head>
    <title>Ejercicio 19</title>
</head>
<body>
    <?php
      
      $arrayimg = array("https://imagenes.heraldo.es/files/image_990_v3/uploads/imagenes/2018/06/28/_meme01_8b7fc387.jpg","https://offloadmedia.feverup.com/madridsecreto.co/wp-content/uploads/2021/09/04054214/194685766_1784934721714875_1347406658621322058_n.jpg","http://blog.tiching.com/wp-content/uploads/2016/02/Meme-educacio%CC%81n-1-547x414.jpg");

      echo '<img src='.$arrayimg[rand(0,2)] .' >';


    ?>
  
    
</body>


</html>