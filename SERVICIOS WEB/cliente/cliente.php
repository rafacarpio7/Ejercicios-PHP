<?php

$options = array ('uri'=>"https://localhost/Ejercicios-PHP/SERVICIOS%20WEB/Servidor/",
                  'location'=>"https://localhost/Ejercicios-PHP/SERVICIOS%20WEB/Servidor/serverSOAP.php");

try{

    $cliente = new SoapClient(null,$options);
    $respuesta = array ('suma'=>$cliente->sumar(9,7),
                    'resta'=>$cliente->restar(9,7),
                    'multiplicación'=>$cliente->multiplicar(9,7),
                    'división'=>$cliente->dividir(9,7));
    print_r($respuesta);
}catch(SoapFault $e){
    echo "ERROR: ". $e->getMessage();
}

?>