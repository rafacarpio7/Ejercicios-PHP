<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuentra tu vivienda</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h1>Buscar Viviendas</h1>
    <form id="filtros" action="" method="post">
        <legend>Encuentra tu vivienda Perfecta</legend>
        Tipo de vivienda : <select name="selectTipo">
                                <option value="value1">Value 1</option>
                                <option value="value2" selected>Value 2</option>
                                <option value="value3">Value 3</option>
                           </select><br>
        Zona : <select name="selectTipo">
            <option value="value1">Value 1</option>
            <option value="value2" selected>Value 2</option>
            <option value="value3">Value 3</option>
        </select><br>

        <label for="html">Numero de dormitorios : </label>
        <input type="radio" id="radio" name="" value="HTML"><span>1</span>
        <input type="radio" id="radio" name="" value="HTML">2
        <input type="radio" id="radio" name="" value="HTML">3
        <input type="radio" id="radio" name="" value="HTML">4
        <input type="radio" id="radio" name="" value="HTML">5 o mas <br>

        <label for="html">Precio : </label>
        <input type="radio" id="radio" name="" value="HTML"><100.000
        <input type="radio" id="radio" name="" value="HTML">100.000-200.000
        <input type="radio" id="radio" name="" value="HTML">200.000-300.000
        <input type="radio" id="radio" name="" value="HTML">>300.000
        <br>
        <label>Extras : </label>
            <input type="checkbox" id="checkbox" name="extras[]" value="Piscina">Piscina 
            <input type="checkbox" id="checkbox" name="extras[] value="Jardin"> Jardin
            <input type="checkbox" id="checkbox" name="extras[] value="Garaje"> Garaje
        <br>
        <input type="submit" name="btnBuscarViviendas" value="Buscar Viviendas">
    </form>
</body>
</html>