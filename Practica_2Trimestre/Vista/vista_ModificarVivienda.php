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
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<?php require_once "../Controlador/controlador_CRUD.php";?>
<body>
    <form action="" method="post">

    <h1>Modifica tu Vivienda</h1>
        
        Tipo de vivienda : <select name="selectTipo">
        <?php
            echo "<option value='".$registrosParaModificar[0]->tipo."' selected>".$registrosParaModificar[0]->tipo."</option>";
        ?>
                                <option value="Piso">Piso</option>
                                <option value="Chalet" >Chalet</option>
                                <option value="Adosado">Adosado</option>
                                <option value="Casa">Casa</option>
                        </select><br>
        Zona : <select name="selectZona">

        <?php
            echo "<option value='".$registrosParaModificar[0]->zona."' selected>".$registrosParaModificar[0]->zona."</option>";
        ?>
            <option value="Norte">Norte</option>
            <option value="Sur">Sur</option>
            <option value="Este">Este</option>
            <option value="Oeste">Oeste</option>
            <option value="Centro">Centro</option>
        </select><br>
        <label for="direccion">Direccion : </label>
        <input type="text" name="direccion" id="direccion" value='<?=$registrosParaModificar[0]->direccion?? ''?>'><br>
        <label for="dormitorios">Numero de dormitorios : </label>
        <?php echo "<input type='radio' id='radio' name='dormitorios' value='".$registrosParaModificar[0]->ndormitorios."' checked>".$registrosParaModificar[0]->ndormitorios ;?>
        <input type="radio" id="radio" name="dormitorios" value="1">1
        <input type="radio" id="radio" name="dormitorios" value="2">2
        <input type="radio" id="radio" name="dormitorios" value="3">3
        <input type="radio" id="radio" name="dormitorios" value="4">4
        <input type="radio" id="radio" name="dormitorios" value="5 o más">5 o mas <br>
        Precio : <input type="number" name="precio" id="precio" value='<?=$registrosParaModificar[0]->precio?? ''?>'><br>
        Tamaño : <input type="number" name="tamano" id="tamano" value='<?=$registrosParaModificar[0]->tamano?? ''?>'><br>
        Observaciones : <br><textarea name="observaciones" id="observaciones" cols="30" rows="10" ><?=$registrosParaModificar[0]->observaciones?></textarea><br>
        Extras : 

        <?php $extras =  $registrosParaModificar[0]->extras;
                if (str_contains($extras, 'Piscina') ) {
                    echo "<input type='checkbox' id='checkbox' name='extras[]' value='Piscina' checked>Piscina ";
                }else{
                    echo "<input type='checkbox' id='checkbox' name='extras[]' value='Piscina'>Piscina ";
                }

                if (str_contains($extras, 'Jardín')) {
                    echo "<input type='checkbox' id='checkbox' name='extras[]' value='Jardin' checked>Jardin ";
                } else {
                    echo "<input type='checkbox' id='checkbox' name='extras[]' value='Jardin' >Jardin ";
                }
                
                if (str_contains($extras, 'Garage')) {
                    echo "<input type='checkbox' id='checkbox' name='extras[]' value='Garage' checked>Garage ";
                } else {
                    echo "<input type='checkbox' id='checkbox' name='extras[]' value='Garage' >Garage ";
                }
        ?>
        <input type="hidden" name="idViviendaModificar" id="idViviendaModificar" value="<?=$registrosParaModificar[0]->id?>">
        <br>
        <input type="submit" name="btnModificar" id="btnModificar" value="Modificar">
    </form>
    <?php print_r($_REQUEST) ?>
</body>
</html>