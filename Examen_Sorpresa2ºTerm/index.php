
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
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include_once "post.php";
        }
        
    ?>
</body>
</html>