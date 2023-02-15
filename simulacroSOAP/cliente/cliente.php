<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form  method="post">
        <select name="zona">
            <option name="zona" value="Norte">Norte</option>
            <option name="zona" value="Sur">Sur</option>
            <option name="zona" value="Este">Este</option>
            <option name="zona" value="Oeste">Oeste</option>
        </select>
        <input type="submit" name="btnEnviar">
    </form>
</body>
<?php
/*
*
* La clave 'uri' se utiliza para identificar de manera única el espacio de nombres del servicio web. 
Este debe ser un identificador único y debe ser el mismo en el cliente y en el servidor.

*La clave 'location' es la URL donde se encuentra el archivo WSDL. Este archivo contiene información 
sobre el servicio web, como los métodos disponibles, los tipos de datos utilizados y la forma en que 
se deben llamar los métodos.
* 
*/
$options = array ('uri'=>"http://localhost/Ejercicios-PHP/simulacroSOAP/Servidor/",
                  'location'=>"http://localhost/Ejercicios-PHP/simulacroSOAP/Servidor/serverSOAP.php");

try{
    $valor = $_POST['zona'];
    $db = [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'db' => 'inmobiliaria'  //Nombre de la BD de datos que tengamos configurada
    ];
    $vivienda = new SoapClient(null,$options);

    //$cone = $vivienda->conexion($db);
    $registros = $vivienda->conteo($db,$valor);
    echo "El numero de viviendas es : ".$registros[0];
    //echo $registros;
    
}catch(SoapFault $e){
    echo "Error: " . $e->getMessage();
}

?>

</html>
