<!--Crear un array bidimensional asociativo en el que la clave de la primera dimensión será
el nombre de los equipos de la primera división de la liga de fútbol. Cada equipo
contendrá un array de dos elementos, el primero, con clave “puntos” contiene la
puntuación obtenida en la pasada liga. El segundo elemento con clave “posición”
contendrá en número la posición en la tabla en la que finalizó el equipo la liga.
Utilizando los bucles que necesites muestra en pantalla los nombres de los equipos, los
puntos y la posición de los equipos que terminaron en las tres primeras posiciones de la
liga.  -->
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <?php
        $arrayEquipos = array('Barcelona'=> array('puntos'=> 22 , 'posicion'=> 1),
                                'Madrid'=> array('puntos'=> 14 , 'posicion'=> 5),
                                'Betis'=> array('puntos'=> 16 , 'posicion'=> 3),
                                'Sevilla'=> array('puntos'=> 10 , 'posicion'=> 6),
                                'Bilbao'=> array('puntos'=> 5 , 'posicion'=> 7),
                                'Rayo'=> array('puntos'=> 21 , 'posicion'=> 2),
                                'Girona'=> array('puntos'=> 15 , 'posicion'=> 4));

        print_r($arrayEquipos);
        
        foreach ($arrayEquipos as $key => $value) {
            switch ($value['posicion']) {
                case 1:
                    # code...
                    break;
                
                default:
                    # code...
                    break;
            }
            
            echo $value['puntos'];
         }

        ?>


    </body>
</html>