<?php
if (isset($_GET['Enviar'])) {
    $nombre = $_GET['nombre'];
    $edad = (int)$_GET['edad'];
    if ($edad<18) {
        echo "$nombre es menor de edad y tiene $edad años";
    }else {
        echo "$nombre es mayor de edad y tiene $edad años";
    }
}else {
    echo "No se han introducido valores";
}


?>