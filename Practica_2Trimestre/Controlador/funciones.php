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
                        if (str_contains($valor,",")) {
                        $fotos = explode(",", $valor);
                        echo "<td>";
                        foreach($fotos as $fotoEnlace){
                            echo "<a href='../img/".$fotoEnlace."' target='_blank'>".$fotoEnlace."</a><br>";
                        }
                        echo "</td>";
                        } else {
                            echo "<td> <a href='../img/".$valor."' target='_blank'>".$valor."</a></td>";
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

    // funciones  paginacion

    

    // dinamizacion paginacion

    // clase paginacion

    // 
    
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




function formFiltros($registros)
{
    $arraykeys= $registros[0];
    
    echo "<form action=''>";
    foreach ($registros as $key => $value) {
        

        foreach ($value as $clave => $valor) {
            print_r($value);
            
            if ($clave='tipo') {
                
            } else {
                # code...
            }
            
            //echo $clave;
           // echo $value->zona;
        }
    }
    
    echo "<label for='dormitorios'>Numero de dormitorios : </label>
    <input type='radio' id='radio' name='dormitorios' value='1'><span>1</span>
    <input type='radio' id='radio' name='dormitorios' value='2'>2
    <input type='radio' id='radio' name='dormitorios' value='3'>3
    <input type='radio' id='radio' name='dormitorios' value='4'>4
    <input type='radio' id='radio' name='dormitorios' value='5'>5 o mas <br>

    <label for='precios'>Precio : </label>
    <input type='radio' id='radio' name='precio' value='opcion1'>-100.000
    <input type='radio' id='radio' name='precio' value='opcion2'>100.000-200.000
    <input type='radio' id='radio' name='precio' value='opcion3'>200.000-300.000
    <input type='radio' id='radio' name='precio' value='opcion4'>+300.000
    <br>
    <label for='extras'>Extras : </label>
        <input type='checkbox' id='checkbox' name='extras[]' value='Piscina'>Piscina 
        <input type='checkbox' id='checkbox' name='extras[] value='Jardin'> Jardin
        <input type='checkbox' id='checkbox' name='extras[] value='Garaje'> Garaje
    <br>
    <input type='submit' name='btnBuscarViviendas' value='Buscar Viviendas'>";
    echo "";
    echo    "</form>";
}

?>