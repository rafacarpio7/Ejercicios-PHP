<?php

    if (isset($_POST['veces'])) {
        $numVeces = (int)$_POST['veces'];
        $cont=0;
        while ($cont!=$numVeces) {
            echo "Los bucles son fáciles<br>";
            $cont ++;
        }
        echo "Se acabo" ;
    }else {
        echo "no existe el numero";
    }
    
    
?>