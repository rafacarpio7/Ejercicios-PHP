<?php
require("../Modelo/Viviendas.php");

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

if(isset($_REQUEST['btnModificaVivienda'])){
    $instanciaViviendas->__set('id', $_REQUEST['idModificar']);
    echo $instanciaViviendas->__get('id');
   if(isset($_REQUEST['btnModificar'])){
        $instanciaViviendas->__set('id', $_REQUEST['idModificar']);
        $instanciaViviendas->actualizar();
   }
}


?>