<?php

function mostrarTabla($registros)
{

    $arraykeys= $registros[0];
    echo "<table><tr>";
        foreach ($arraykeys as $key => $value ) {
            echo "<th>".strtoupper($key)."</th>";
        }
        echo "<form action='../Vista/vista_crear_adopcion.php' method='post'>
        <th colspan='2'><input type='submit' name='btnAñadirAdopcion' value='Añadir'></th>
              </form>";
        echo "</tr>";
        foreach ($registros as $key => $value) {
            echo "<tr>";
            foreach($value as $clave => $valor){
                    echo "<td>".$valor ."</td>";
            }
            echo "
                    <form action='' method='post'>
                    <td><input type='submit' name='btnBorrarAdopcion' value='BORRAR'>
                        <input type='hidden' name='idBorrar' value='".$registros[$key]->id."'></td>
                    </form>
                    <form action='../Vista/vista_modificar_adopcion.php' method='post'>
                    <td><input type='submit' name='btnModificaAdopcion' value='MODIFICAR'>
                        <input type='hidden' name='idModificar' value='".$registros[$key]->id."'></td>
                    </form>  
                ";
            echo "</tr>";
        }
        echo "</table>";
}

?>