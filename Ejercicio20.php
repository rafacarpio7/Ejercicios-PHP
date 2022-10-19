<!-- 
 -->
 <html>

<head>
    <title>Ejercicio 20</title>


</head>
<body>
    <?php
    
    
    for ($i=0; $i <=2000; $i++) { 
      $colorPrimario = rand(0,255);  
    $colorSecundario = rand(0,255);  
    $colorTerciario = rand(0,255); 
    $botton = rand(0,100); 
    $left = rand(0,100);
      echo "<div style='weight: 50px;height:50px; width:50px; position : absolute; bottom: $botton% ; left : $left%; background-color: rgb($colorPrimario,$colorSecundario,$colorTerciario)'></div>";
    }
    

    ?>

    
</body>


</html>