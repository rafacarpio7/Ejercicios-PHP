<?php 
     
     include_once "config.php";
include_once "utils.php";
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
      echo json_encode(  $sql->fetchAll(PDO::FETCH_ASSOC)  );

      exit();
      } else {
        //Mostrar un viviendas
      $sql = $dbConn->prepare("SELECT * FROM viviendas where zona=:zona");
      $sql->bindValue(':zona', $_GET['zona']);
      $sql->execute();
      header("HTTP/1.1 200 OK");
      echo json_encode(  $sql->fetchAll(PDO::FETCH_ASSOC)  );
      exit();
      }
      
	  }else {
      $sql = $dbConn->prepare("SELECT * FROM viviendas");
      $sql->execute();
      $sql->setFetchMode(PDO::FETCH_ASSOC);
      header("HTTP/1.1 200 OK");
      echo json_encode(  $sql->fetchAll(PDO::FETCH_ASSOC)  );

      exit();
    }

}

    
    
    ?>
