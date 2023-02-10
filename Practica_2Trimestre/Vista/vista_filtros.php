<?php
        
        include "../Modelo/Viviendas.php";
        include_once "../Controlador/controlador_viviendas.php";
        include_once "../Controlador/funciones.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Encuentra tu vivienda</title>
    <link rel="stylesheet" href="../style.css">
    
</head>
<body>
    <?php require_once "../Controlador/controlador_CRUD.php";?>
    <h2>Buscar Viviendas</h2>
    <form id="filtros" action="" method="post">
        <legend>Encuentra tu vivienda Perfecta</legend>
        Tipo de vivienda : <select name="selectTipo">
                                <option value="%" selected>---------</option>
                                <option value="Piso">Piso</option>
                                <option value="Chalet" >Chalet</option>
                                <option value="Adosado">Adosado</option>
                                <option value="Casa">Casa</option>
                           </select><br>
        Zona : <select name="selectZona">
            <option value="%" selected>---------</option>
            <option value="Norte">Norte</option>
            <option value="Sur">Sur</option>
            <option value="Este">Este</option>
            <option value="Oeste">Oeste</option>
            <option value="Centro">Centro</option>
        </select><br>

        <label for="dormitorios">Numero de dormitorios : </label>
        <input type="radio" id="radio" name="dormitorios" value="1">1
        <input type="radio" id="radio" name="dormitorios" value="2">2
        <input type="radio" id="radio" name="dormitorios" value="3">3
        <input type="radio" id="radio" name="dormitorios" value="4">4
        <input type="radio" id="radio" name="dormitorios" value="5">5 o mas <br>

          <label for="precios">Precio : </label>
        <input type="radio" id="radio" name="precio" value="1">-100.000
        <input type="radio" id="radio" name="precio" value="2">100.000-200.000
        <input type="radio" id="radio" name="precio" value="3">200.000-300.000
        <input type="radio" id="radio" name="precio" value="4">+300.000
        <br>
        <label for="extras">Extras : </label>
            <input type="checkbox" id="checkbox" name="extras[]" value="Piscina">Piscina 
            <input type="checkbox" id="checkbox" name="extras[]" value="Jardin">Jardin
            <input type="checkbox" id="checkbox" name="extras[]" value="Garage">Garage
        <br>
        <input type="submit" name="btnBuscarViviendas" value="Buscar Viviendas">
    </form>
    <br>
    <?php 
    if (isset($registrosViviendasFiltro)) {
        mostrarTabla($registrosViviendasFiltro);
    }  
    ?>

    
</body>
</html>