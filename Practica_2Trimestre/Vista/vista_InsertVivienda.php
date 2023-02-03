<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Inmobiliaria</title>
</head>
<body>
<?php require_once "../Controlador/controlador_CRUD.php";?>
    <form action="" method="post">
        <h1>Nueva Vivienda</h1>

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
        Numero de Dormitorios : <input type="number" name="ndormitorios" id="ndormitorios"><br>
        Precio : <input type="number" name="precio" id="precio"><br>
        Extras : 
            <input type="checkbox" id="checkbox" name="extras[]" value="Piscina">Piscina 
            <input type="checkbox" id="checkbox" name="extras[]" value="Jardin">Jardin
            <input type="checkbox" id="checkbox" name="extras[]" value="Garaje">Garaje
        <br>
        <input type="submit" name="btnInsertar" id="btnInsertar" value="Insertar">
    </form>
</body>
</html>