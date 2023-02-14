<?php
include "config.php";
include "utils.php";
$dbConn =  connect($db);
/*
  listar todos los viviendas o solo uno
 */
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (isset($_GET['id']))
    {
      //Mostrar un viviendas
      $sql = $dbConn->prepare("SELECT * FROM viviendas where id=:id");
      $sql->bindValue(':id', $_GET['id']);
      $sql->execute();
      header("HTTP/1.1 200 OK");
      $datosCodificados = json_encode(  $sql->fetchAll(PDO::FETCH_ASSOC)  );
      $datosDecodificados = json_decode($datosCodificados);
      mostrarTabla($datosDecodificados);
      exit();
	  }
    else {
      //Mostrar lista de viviendas
      $sql = $dbConn->prepare("SELECT * FROM viviendas");
      $sql->execute();
      $sql->setFetchMode(PDO::FETCH_ASSOC);
      header("HTTP/1.1 200 OK");
      $datosCodificados = json_encode(  $sql->fetchAll(PDO::FETCH_ASSOC)  );
      $datosDecodificados = json_decode($datosCodificados);
      mostrarTabla($datosDecodificados);
      exit();
	}
}
// Crear un nuevo viviendas
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $input = $_POST;
    $sql = "INSERT INTO viviendas
          (tipo, zona, direccion, ndormitorios, precio, tamano, extras, observaciones, fecha_anuncio)
          VALUES
          (:tipo, :zona, :direccion, :ndormitorios, :precio, :tamano, :extras, :observaciones, :fecha_anuncio)";
    $statement = $dbConn->prepare($sql);
    bindAllValues($statement, $input);
    $statement->execute();
    $postId = $dbConn->lastInsertId();
    if($postId)
    {
      $input['id'] = $postId;
      header("HTTP/1.1 200 OK");
      echo json_encode($input);
      exit();
	 }
}
//Borrar
if ($_SERVER['REQUEST_METHOD'] == 'DELETE')
{
	$id = $_GET['id'];
  $statement = $dbConn->prepare("DELETE FROM viviendas where id=:id");
  $statement->bindValue(':id', $id);
  $statement->execute();
	header("HTTP/1.1 200 OK");
	exit();
}
//Actualizar
if ($_SERVER['REQUEST_METHOD'] == 'PUT')
{
    $input = $_GET;
    $postId = $input['id'];
    $fields = getParams($input);
    $sql = "
          UPDATE viviendas
          SET $fields
          WHERE id='$postId'
           ";
    $statement = $dbConn->prepare($sql);
    bindAllValues($statement, $input);
    $statement->execute();
    header("HTTP/1.1 200 OK");
    exit();
}
//En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");
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
    <?php 
     
     
    
    
    ?>
</body>
</html>