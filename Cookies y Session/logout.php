<?php
session_start();
//setcookie("trend", $_SESSION, time()+60*60*24,'/');
// echo "Array inicial: ";
print_r($_SESSION);
// echo "<br>";
unset($_SESSION['idUsuario']);
// Ordenamos el array de sesiones de mayor a menor valor numérico
arsort($_SESSION);
echo "pepepe";
 print_r($_SESSION);
// echo "<br>";


// Tomamos los tres primeros valores del array (con las llaves)
//$sesiones_mas_altas = array_slice($_SESSION, 0, 3, true);

// print_r($sesiones_mas_altas);
// Verificamos si existe la cookie
if (isset($_COOKIE['sesiones_altas'])) {

    // Si existe la cookie, la deserializamos y la guardamos en un array
    $sesiones_cookie = unserialize($_COOKIE['sesiones_altas']);
    //$sesiones_mas_altas = array_slice($_SESSION, 1, sizeof($sesiones_mas_altas), true);
    
    // Unimos las sesiones del array y las nuevas sesiones, y las ordenamos por valor numérico
    $todas_sesiones = array();
    // $todas_sesiones = $sesiones_cookie + $_SESSION;


    // foreach ($sesiones_cookie as $keyCookie => $valorCookie) {
    //     echo "sesionesCookie";
    //  print_r($todas_sesiones)   ;
    //  echo "<br>";
    //     foreach ($_SESSION as $keySession => $valorSession) {
    //         echo "Sesion";
    //         print_r($todas_sesiones);
    //         echo "<br>";
    //         if ($keyCookie==$keySession) {
    //             echo $keyCookie . $keySession;
    //             $todas_sesiones[$keySession]=$valorCookie+$valorSession;
    //         }else {
    //             $todas_sesiones[$keySession]=$valorSession;
    //         }
    //     }
    // }


    if (sizeof($sesiones_cookie)>sizeof($_SESSION)) {  //es count ()
        foreach ($sesiones_cookie as $key => $value) {
            if (array_key_exists($key,$_SESSION)) {
                $sesiones_cookie[$key]= $value + $_SESSION[$key];
            } else {
                $sesiones_cookie[$key]= $value;
            }
        }
    } else {
        foreach ($_SESSION as $key => $value) {
            if (array_key_exists($key,$sesiones_cookie)) {
                $sesiones_cookie[$key]= $value + $sesiones_cookie[$key];
            } else {
                $sesiones_cookie[$key]= $value;
            }
        }
    }
    

    // foreach ($sesiones_cookie as $key => $value) {
    //     if (array_key_exists($key,$_SESSION)) {
    //         $sesiones_cookie[$key]= $value + $_SESSION[$key];
    //     } else {
    //         $sesiones_cookie[$key]= $value;
    //     }
    // }

    $todas_sesiones = $sesiones_cookie;
    
    print_r($todas_sesiones);
    setcookie('sesiones_altas', serialize($todas_sesiones));
    // Tomamos solo las tres sesiones más altas y las guardamos en la cookie
    // $sesiones_mas_altas = array_slice($todas_sesiones, 0, 3, true);
    
} else {
    setcookie('sesiones_altas', serialize($_SESSION));
    
    
}

// Serializamos el array con las sesiones más altas y lo guardamos en la cookie



session_destroy();
header("Location: login.php");
?>