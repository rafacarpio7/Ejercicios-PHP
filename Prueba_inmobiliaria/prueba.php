
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>
<body>
    <form action="" method="post">

    <h1>Modifica tu Vivienda</h1>
        
        Tipo de vivienda : <select name="selectTipo">
                                <option value="Piso">Piso</option>
                                <option value="Chalet" >Chalet</option>
                                <option value="Adosado">Adosado</option>
                                <option value="Casa">Casa</option>
                        </select><br>
        Zona : <select name="selectZona">
            <option value="Norte">Norte</option>
            <option value="Sur">Sur</option>
            <option value="Este">Este</option>
            <option value="Oeste">Oeste</option>
            <option value="Centro">Centro</option>
        </select><br>
        <label for="direccion">Direccion : </label>
        <label for="dormitorios">Numero de dormitorios : </label>
        <input type="radio" id="radio" name="dormitorios" value="1">1
        <input type="radio" id="radio" name="dormitorios" value="2">2
        <input type="radio" id="radio" name="dormitorios" value="3">3
        <input type="radio" id="radio" name="dormitorios" value="4">4
        <input type="radio" id="radio" name="dormitorios" value="5 o más">5 o mas <br>
        Precio : <input type="number" name="precio" id="precio" ><br>
        Tamaño : <input type="number" name="tamano" id="tamano" ><br>

        Observaciones : <br><textarea name="observaciones" id="observaciones" cols="30" rows="10" ></textarea><br>
        Extras : 
            <input type="checkbox" id="checkbox" name="extras[]" value="Piscina">Piscina 
            <input type="checkbox" id="checkbox" name="extras[]" value="Jardin">Jardin
            <input type="checkbox" id="checkbox" name="extras[]" value="Garage">Garaje

        <br>
        <input type="submit" name="btnModificar" id="btnModificar" value="Modificar">
    </form>
    <?php
    if (isset($_REQUEST['btnModificar'])) {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=inmobiliaria;charset=utf8","root","");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE viviendas SET tipo=:tipo,
                            zona=:zona,direccion=:direccion,ndormitorios=:ndormitorios,precio=:precio,tamano=:tamano,extras=:extras,observaciones=:observaciones
                            WHERE id=:idAnterior";
                $stmt = $conn->prepare($sql);
                
                $stmt->bindParam(':tipo', $_REQUEST["selectTipo"]);
                $stmt->bindParam(':zona', $_REQUEST["selectZona"]);
                $stmt->bindParam(':direccion', $_REQUEST["direccion"]);
                $stmt->bindParam(':ndormitorios', $_REQUEST["dormitorios"]);
                $stmt->bindParam(':precio', $_REQUEST["precio"]);
                $stmt->bindParam(':tamano', $_REQUEST["tamano"]);
                
                $actualizaExtras = 0;
                if (isset($_REQUEST['extras'])) {
                    foreach ($_REQUEST['extras'] as $value) {
                        switch ($value) {
                            case 'Piscina':
                                $actualizaExtras +=1;
                                break;
                            case 'Jardin':
                                $actualizaExtras +=2;
                                break;
                            case 'Garage':
                                $actualizaExtras +=4;
                                break;
                        }
                    }
                    $stmt->bindParam(':extras', $actualizaExtras);
                } else {
                    $stmt->bindParam(':extras', $actualizaExtras);
                }
                $stmt->bindParam(':observaciones', $_REQUEST['observaciones']);
                $stmt->bindValue(':idAnterior', 67);
            echo "<pre>";
            echo $stmt->debugDumpParams();
            echo "</pre>";
                $stmt->execute();
        
        } catch (PDOException $th) {
            throw $th;
        }
        
        
        
    } else {
        # code...
    }
    



?>
</body>
</html>