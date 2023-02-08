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

    <link rel="stylesheet" href="../style.css">
    <title>Viviendas</title>
</head>
<body>
    <?php require_once "../Controlador/controlador_CRUD.php";?>
    <?php mostrarTabla($registrosViviendas) ;


    echo "<nav aria-label='Page navigation example'>
            <ul class='pagination justify-content-center'>";
                    

                for ($i=0; $i < $paginasTotales ; $i++) { 
                    echo "<li class='page-item'><a class='page-link' href='../Vista/vistaPrueba.php?pagina=".$i."'>".$i."</a></li>";
                }    
    echo "            
            </ul>
        </nav>";?>

        
</body>
</html>