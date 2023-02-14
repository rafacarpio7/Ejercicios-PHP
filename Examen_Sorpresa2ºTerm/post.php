<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>


<form action="" method="get">
  <select name="zona" >
    <option value="vacio" select>--------</option>
    <option value="Norte">Norte</option>
    <option value="Sur">Sur</option>
    <option value="Este">Este</option>
    <option value="Oeste">Oeste</option>
    <option value="Centro">Centro</option>
  </select>
  <input type="submit" name="btnEnviar" value="Enviar">

</form>
    <?php 
     
     include "config.php";
include "utils.php";
$dbConn =  connect($db);
/*
  listar todos los viviendas o solo uno
 */
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{   
  
  
    if (isset($_GET['zona']))
    {
      if ($_GET['zona']=="vacio") {
        $sql = $dbConn->prepare("SELECT * FROM viviendas");
      $sql->execute();
      $sql->setFetchMode(PDO::FETCH_ASSOC);
      header("HTTP/1.1 200 OK");
      $datosCodificados = json_encode(  $sql->fetchAll(PDO::FETCH_ASSOC)  );
      $datosDecodificados = json_decode($datosCodificados);
      mostrarTabla($datosDecodificados);
      exit();
      } else {
        //Mostrar un viviendas
      $sql = $dbConn->prepare("SELECT * FROM viviendas where zona=:zona");
      $sql->bindValue(':zona', $_GET['zona']);
      $sql->execute();
      header("HTTP/1.1 200 OK");
      $datosCodificados = json_encode(  $sql->fetchAll(PDO::FETCH_ASSOC)  );
      $datosDecodificados = json_decode($datosCodificados);
      mostrarTabla($datosDecodificados);
      exit();
      }
      
	  }

}
//En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");
    
    
    ?>
</body>
</html>