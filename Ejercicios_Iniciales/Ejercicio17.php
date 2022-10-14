<!-- Crea un array asociativo que contenga la siguiente información:
Array supermercado:
Fruta (Pera, Manzana, Plátano)
Verdura (Berenjena, Calabacín)
Lácteos (leche, yogur, queso, kéfir)
Muestra el array en pantalla haciendo uso del bucle foreach.
 -->
 <html>

<head>
    <title>Ejercicio 17</title>
</head>

<body>
    <?php
    
    $supermercado = array("Fruta" => array("Pera","Manzana","Platano"),
                        "Verdura" => array("Berenjena","Calabacin"),
                        "Lacteos" => array("leche","yogur","queso","kefir"));
    print_r($supermercado);

    foreach ($supermercado as $key => $value) {

        if (array_key_exists(0,$value) ||  ) {
            # code...
        }
        echo "<h1>$key ($value[0],$value[1],$value[2],$value[3])</h1>";
    }

    

    ?>
</body>


</html>