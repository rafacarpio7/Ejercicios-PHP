<?php
include_once "../Modelo/Viviendas.php";

$instanciaViviendas = new Viviendas();

$registrosViviendas = $instanciaViviendas->obtieneTodos();

$arraykeys= $registrosViviendas[0];

if (isset($_REQUEST['btnBuscarViviendas'])) {
    $registrosViviendasFiltro= $instanciaViviendas->filtroViviendas();
} 

if (isset($_REQUEST['btnInsertar'])) {
    $instanciaViviendas->crear();
    if (empty($_FILES['fotos'])) {
        $fotosInsertar=$instanciaViviendas->guardarImagenes();
    $instanciaViviendas->insertarImagendb($fotosInsertar);
    }
}

if (isset($_REQUEST['btnBorrarVivienda'])) {
    $instanciaViviendas->borra($_REQUEST['idBorrarVivienda']);
}


?>