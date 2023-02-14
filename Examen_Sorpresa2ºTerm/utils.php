<?php
  //Abrir conexion a la base de datos
  function connect($db)
  {
      try {
          $conn = new PDO("mysql:host={$db['host']};dbname={$db['db']};charset=utf8", $db['username'], $db['password']);
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          return $conn;
      } catch (PDOException $exception) {
          exit($exception->getMessage());
      }
  }

 //Obtener parametros para updates

 function getParams($input)
 {
    $filterParams = [];
    foreach($input as $param => $value)
    {
            $filterParams[] = "$param=:$param";
    }
    return implode(", ", $filterParams);
	}


  //Asociar todos los parametros a un sql
	function bindAllValues($statement, $params)
  {
		foreach($params as $param => $value)
    {
				$statement->bindValue(':'.$param, $value);
		}
		return $statement;
   }
   


   function mostrarTabla($registros)
{
    if (empty($registros)) {
        echo "<h1>NO HAY DATOS CON ESTA CONSULTA</h1>";
    } else {
        $arraykeys= $registros[0];
    echo "<table><tr>";
        foreach ($arraykeys as $key => $value ) {
            echo "<th>".strtoupper($key)."</th>";
        }
        echo "<form action='../Vista/vista_InsertVivienda.php' method='post'>
        <th colspan='2'><input type='submit' name='btnAñadirAdopcion' value='Añadir'></th>
              </form>";
        echo "</tr>";
        foreach ($registros as $key => $value) {
            echo "<tr>";
            foreach($value as $clave => $valor){

                    if ($clave=='fotos') {
                        if (str_contains($valor,",")) {
                        $fotos = explode(",", $valor);
                        echo "<td>";
                        foreach($fotos as $fotoEnlace){
                            echo "<a href='../img/".$fotoEnlace."' target='_blank'>Foto</a><br>";
                        }
                        echo "</td>";
                        } else {
                            echo "<td> <a href='../img/".$valor."' target='_blank'>Foto</a></td>";
                        }
                    } else {
                        echo "<td>".$valor ."</td>";
                    }
            }
            echo "
                    <form action='' method='post'>
                    <td><input type='submit' name='btnBorrarVivienda' value='BORRAR'>
                        <input type='hidden' name='idBorrarVivienda' value='".$registros[$key]->id."'></td>
                    </form>
                    <form action='../Vista/vista_ModificarVivienda.php' method='post'>
                    <td><input type='submit' name='btnModificaVivienda' value='MODIFICAR'>
                        <input type='hidden' name='idModificar' value='".$registros[$key]->id."'></td>
                    </form>  
                ";
            echo "</tr>";
        }
        echo "</table>";
    }
   
}
 ?>