<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palabras</title>
</head>
<body>
    
    <?php
    $log = fopen("log.csv","a+b");
    $DateAndTime = date('d-m-Y h:i:s a');
    
    $arrayPalabras = array("Abajo","Abuela","Adios","Agua","Ali","arbol","Avion","Ayuda",
    "Baila","Ballena","Bañador","Bañera","Bata","Bebe","Boca","Boli","Bonita","Bota",
    "Botella","Buenas noches","Buho","Caballo","Caja","Calle","Cama","Campana","Canta"
    ,"Cantajuegos","Carlos","Chocho","Coche","Codo","Colonia","Copa","Cortina","Cosquillas",
    "Cuchara","Cuchillo","Cuello","Cuento","Culo","Cuna","Dado","Dedo","Diente","Dormir",
    "Ducha","Espalda","Espejo","Esponja","Estrella","Estuche","Galleta","Gato","Globo",
    "Gomilla","Gorra","Guapa","Gusanitos","Helado","Hoja","Hola","Hucha","Huevo","IPad",
    "Jabon","Jesus","Juanlu","Leche","Lengua","Lentejas","Leon","Limon","Limon","Llave",
    "Lluvia","Loli","Luna","Luz","Mama","Mando","Mano","Manta","Maria","Martinez","Mesa",
    "Mimo","Minnie","Mochila","Monica","Mono","Moto","Movil","Nariz","Natalia","Natilla",
    "Navidad","Ojo","Oreja","Osito","Oveja","Pajaro","Pala","Pan","Pantalon","Papa","Papel",
    "Patata","Pata","Pato","Peine","Pelo","Pelota","Pepa","Pepa pig","Pepino","Pepsi","Pez",
    "Pie","Pijama","Pinta","Piña","Pipi","Piscina","Pito","Playa","Pocoyo","Pollito","Pollo",
    "Pompas","Puente","Puerta","Pulpo","Regalo","Reloj","Robe","Rojo","Sevilla","Silla","Suelo",
    "Tablet","Tambor","Tapar","Tarde","Tarta","Tata","Taza","Tele","Tenedor","Tito","Toalla",
    "Tomate","Tortilla","Uña","Vaca","Vaso","Vater","Velazquez","Ventana","Verde","Vestido",
    "Vicente","Vuelta","Yogur","Zapato");

    echo "<form action='' method='get'>
            <input type='submit' name='btnGenerar' value='Generar'>

            </form>";

    if (isset($_GET['btnGenerar'])) {
        
        $palabraAleatoria= $arrayPalabras[rand(0,164)];
        
        
        echo "<h1>".$palabraAleatoria."</h1>";
        echo "<form action='' method='post'>
            <input type='submit' name='btnOk' value='OK'>
            <input type='submit' name='btnNoOk' value='No OK'>
            </form>";
           
        if (isset($_POST['btnOk'])) {
            fwrite($log,$palabraAleatoria.",".$_REQUEST['btnOk'].",".$DateAndTime."\n");
            fclose($log);
        } else if(isset($_POST['btnNoOk'])){
            fwrite($log,$palabraAleatoria.",".$_REQUEST['btnNoOk'].",".$DateAndTime."\n");
            fclose($log);
        }
        
    } 

    
    


   





    


    
        
      
    ?>
</body>
</html>