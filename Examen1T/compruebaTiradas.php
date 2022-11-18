<?php
/*
            
    FUNCION FRECUENCIA QUE CALCULA LAS VECES
    QUE UN NUMERO PASADO COMO PARAMETRO
     SE REPITE DENTRO DEL ARRAY 
    Y TE DEVUELVE LAS VECES QUE SE HA REPETIDO

*/

function frecuencia($num,$array)
{
    $veces = 0;
    foreach ($array as $key => $value) {
        if ($value==$num) {
            $veces++;
        }
        
    }
    return $veces;
}

if (isset($_REQUEST['btnNumero']) && $_REQUEST['numeroTiradas']>=1 && !empty($_REQUEST['numeroTiradas'])) {
    $arrayTiradas = array();
    /*
            
        GENERAMOS LAS TIRADAS Y LAS ALMACENAMOS EN EL ARRAY

    */
    for ($i=0; $i <$_REQUEST['numeroTiradas'] ; $i++) { 
        array_push($arrayTiradas,mt_rand(1,6));
    }
    $arrayRepetidos = array();

    echo "<pre>";
    print_r($arrayTiradas); 
    echo "</pre>";

    /*
            
        CREAMOS UN ARRAY DE REPETIDOS CON LOS  
        VALORES DEL ARRAY DE TIRADAS COMO INDICES
         DEL ARRAY REPETIDOS

    */
    foreach ($arrayTiradas as $key => $value) {
        $arrayRepetidos[$value]=0;
    }

    /*
            
        USANDO UN FOREACH RECORREMOS LAS CLAVES DEL ARRAY REPETIDOS
        PARA COMPROBAR LAS VECES QUE SE HAN REPETIDO EN EL ARRAY TIRADAS

    */
    foreach ($arrayRepetidos as $key => $value) {
        $arrayRepetidos[$key]=frecuencia($key,$arrayTiradas);
    }
    /*
            
        MOSTRAMOS EL RESULTADO DE LAS TIRADAS DE CADA NUMERO 
        Y LAS VECES QUE SE HAN REPETIDO
        HE PROBADO A ORDENARLO CON KSROT() CON ASORT()
        CON COLUMNAS Y MULTISORT PERO NO LO CONSIGO
    */
    echo "<br><h1>El resultado de las tiradas es:</h1><br>";
    foreach ($arrayRepetidos as $key => $value) {
        echo "<h2>El numero : ". $key . " aparece ".$value."veces</h2>";
    }; 
} else {
    header("Location: tiradaDados.php");
}


?>