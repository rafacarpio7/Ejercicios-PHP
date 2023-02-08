<?php
include_once "../Modelo/Viviendas.php";

$instanciaViviendas = new Viviendas();
$inicio = 0;
$limite = 5;

if (isset($_GET['pagina'])) {
    if(!is_numeric($_GET['pagina']) || $_GET['pagina']<0){
        $inicio = 0;
    }else {
        $inicio = ($_GET['pagina']) * $limite;
    }
    
}else{
    $inicio = 0;
}




$totalViviendas =$instanciaViviendas->totalViviendas();

$paginasTotales = ceil($totalViviendas / $limite);

$registrosViviendas = $instanciaViviendas->obtieneTodasViviendas($inicio,$limite);


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
    $registrosParaModificar = $instanciaViviendas->obtieneDeID($_REQUEST['idModificar']);
    
   if(isset($_REQUEST['btnModificar'])){
        $instanciaViviendas->actualizar();
   }else{

   }
}


?>