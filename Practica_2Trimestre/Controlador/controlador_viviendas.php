<?php
include_once "../Modelo/Viviendas.php";

$instanciaViviendas = new Viviendas();

$registrosViviendas = $instanciaViviendas->obtieneTodos();

$arraykeys= $registrosViviendas[0];

$registrosViviendasFiltro= $instanciaViviendas->filtroViviendas();


?>