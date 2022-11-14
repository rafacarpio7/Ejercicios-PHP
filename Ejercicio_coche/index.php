<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style type="text/css">
        div{
            display: flex;
            width: 10px;
            height: 10px;
            position: relative;
            flex-wrap: wrap;
            
        }
        table, th, td {
        border: 2px solid black;
        border-collapse: collapse;
        }
        td {
        padding: 25px;
        }
        

    </style>
</head>
<body>
    <?php

    $ejeX = range(1,10);
    $ejeY = range(1,10);
    
    foreach ($ejeY as $y) {
        foreach ($ejeX as $x => $value) {
            $tabla10X10[$y][$x]= 0;
        }
    }

    

    for ($i=0; $i < 10; $i++) { 
        $numAleatorio1 = rand(1,10);
        $numAleatorio2 = rand(0,9);
        while ($tabla10X10[$numAleatorio1][$numAleatorio2]=='B') {
            $numAleatorio1 = rand(1,10);
            $numAleatorio2 = rand(0,9);
        }

        $tabla10X10[$numAleatorio1][$numAleatorio2]='B';
    }

    /*
    for ($i=0; $i < 10; $i++) { 
        if ($tabla10X10[rand(1,10)][rand(0,9)]=='B') {
            # code...
        }
    }
    */

    echo "<table>";
    foreach ($tabla10X10 as $key) {
        echo "<tr>";
        foreach ($key as $dato ) {
            switch ($dato) {
                case 'B':
                    echo "<td style='color: red;background-color: green;'>".$dato."</td>" ;
                    break;
                case 'M':
                    echo "<td style='color: grey;'>".$dato."</td>" ;
                    break;
                default:
                    echo "<td>".$dato."</td>" ;
                    break;
            }

           
        }
        echo "</tr>";
    }

    echo "</table>";

    echo "<pre>";
    print_r($tabla10X10);
    echo "</pre>";





    ?>
</body>
</html>