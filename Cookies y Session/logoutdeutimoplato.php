<?php

session_start();
//setcookie("trend", $_SESSION, time()+60*60*24,'/');

unset($_SESSION['idUsuario']);
// Ordenamos el array de sesiones de mayor a menor valor numérico
arsort($_SESSION);

// Tomamos los tres primeros valores del array (con las llaves)
//$sesiones_mas_altas = array_slice($_SESSION, 0, 3, true);

// Verificamos si existe la cookie
if (isset($_COOKIE['sesiones_altas'])) {

    // Si existe la cookie, la deserializamos y la guardamos en un array
    $sesiones_cookie = unserialize($_COOKIE['sesiones_altas']);
    
    // Unimos las sesiones del array y las nuevas sesiones, y las ordenamos por valor numérico
    $todas_sesiones = $sesiones_cookie + $_SESSION;
    arsort($todas_sesiones);
    
    // Tomamos solo las tres sesiones más altas y las guardamos en la cookie
    //$sesiones_mas_altas = array_slice($todas_sesiones, 0, 3, true);
    
}  else {
    
    setcookie('sesiones_altas', serialize($_SESSION));
    
    
}

// Serializamos el array con las sesiones más altas y lo guardamos en la cookie


session_destroy();
header("Location: login.php");



?>