<?php

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
                        echo "<td> <a href='../img/".$valor."' target='_blank'>".$valor."</a></td>";
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

function mostrarTablaUsuarios($registros)
{

    $arraykeys= $registros[0];
    echo "<table><tr>";
        foreach ($arraykeys as $key => $value ) {
            echo "<th>".strtoupper($key)."</th>";
        }
        echo "<form action='../Vista/registro.php' method='post'>
        <th colspan='2'><input type='submit' name='btnAñadirAdopcion' value='Añadir'></th>
              </form>";
        echo "</tr>";
        foreach ($registros as $key => $value) {
            echo "<tr>";
            foreach($value as $clave => $valor){
                    echo "<td>".$valor ."</td>";
            }

            if ($valor=="admin") {
                # code...
            }else{
                echo "
                <form action='' method='post'>
                <td><input type='submit' name='btnBorrarAdopcion' value='BORRAR'>
                    <input type='hidden' name='idBorrar' value='".$registros[$key]->id_usuario."'></td>
                </form>
                    ";
                echo "</tr>";
            }
            
        }
        echo "</table>";
}


?>