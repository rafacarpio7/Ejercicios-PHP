<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

    if (isset($_REQUEST['btnJugar'])) {
        if (empty($_REQUEST['intentos'])) {
            $intentos=1;
        }else {
            $intentos=$_REQUEST['intentos']+1;
        }

        if (empty($_REQUEST['ganaUsuario']) && empty($_REQUEST['ganaMaquina'])) {
            $ganaUsuario= 0;
            $ganaMaquina= 0;
        }else {
            $ganaUsuario =$_REQUEST['ganaUsuario'];
            $ganaMaquina= $_REQUEST['ganaMaquina'];
        }
        

        if ($intentos!=5) {

        $arrayPosiblesJugadas = array('PIEDRA','PAPEL','TIJERA');
        $jugadaMaquina = $arrayPosiblesJugadas[rand(0,2)];
        

        echo "HAS ELEGIDO : ".$_REQUEST['jugada']."<br>";
        echo "JUGADA DE LA MAQUINA :".$jugadaMaquina."<br>";

        
        switch ($_REQUEST['jugada']) {
            case 'PIEDRA':
                if ($jugadaMaquina==$arrayPosiblesJugadas[0]) {
                    echo "EMPATEEEEEEEE";
                    if (empty($_REQUEST['ganaUsuario']) && empty($_REQUEST['ganaMaquina'])) {
                        $ganaUsuario= 0;
                        $ganaMaquina= 0;
                    }else {
                        $ganaUsuario =$_REQUEST['ganaUsuario'];
                        $ganaMaquina= $_REQUEST['ganaMaquina'];
                    }
                } else if($jugadaMaquina==$arrayPosiblesJugadas[1]){
                    echo "HA GANADO EL ORDENADOR";
                    if (empty($_REQUEST['ganaMaquina'])) {
                        $ganaMaquina=1;
                        $ganaUsuario= $_REQUEST['ganaUsuario'];
                    }else {
                        $ganaMaquina= $_REQUEST['ganaMaquina']+1;
                        $ganaUsuario =$_REQUEST['ganaUsuario'];
                    }
                    
                } else{
                    echo "HA GANADO EL JUGADOR";
                    if (empty($_REQUEST['ganaUsuario'])) {
                        $ganaUsuario=1;
                        $ganaMaquina=$_REQUEST['ganaMaquina'];
                    } else {
                        $ganaUsuario =$_REQUEST['ganaUsuario']+1;
                        $ganaMaquina = $_REQUEST['ganaMaquina'];
                    }   
                }

                break;
            case 'PAPEL':
                if ($jugadaMaquina==$arrayPosiblesJugadas[0]) {
                    echo "HA GANADO EL JUGADOR";
                    if (empty($_REQUEST['ganaUsuario'])) {
                        $ganaUsuario=1;
                        $ganaMaquina=$_REQUEST['ganaMaquina'];
                    } else {
                        $ganaUsuario =$_REQUEST['ganaUsuario']+1;
                        $ganaMaquina= $_REQUEST['ganaMaquina'];
                    }
                } else if($jugadaMaquina==$arrayPosiblesJugadas[1]){
                    echo "EMPATEEEEEEEE";
                    if (empty($_REQUEST['ganaUsuario']) && empty($_REQUEST['ganaMaquina'])) {
                        $ganaUsuario= 0;
                        $ganaMaquina= 0;
                    }else {
                        $ganaUsuario =$_REQUEST['ganaUsuario'];
                        $ganaMaquina= $_REQUEST['ganaMaquina'];
                    }
                } else{
                    echo "HA GANADO EL ORDENADOR";
                    if (empty($_REQUEST['ganaMaquina'])) {
                        $ganaMaquina=1;
                        $ganaUsuario =$_REQUEST['ganaUsuario'];
                    }else {
                        $ganaMaquina= $_REQUEST['ganaMaquina']+1;
                        $ganaUsuario =$_REQUEST['ganaUsuario'];
                    }
                }
                
                break;
            case 'TIJERA':
                if ($jugadaMaquina==$arrayPosiblesJugadas[0]) {
                    echo "HA GANADO EL ORDENADOR";
                    if (empty($_REQUEST['ganaMaquina'])) {
                        $ganaMaquina=1;
                        $ganaUsuario =$_REQUEST['ganaUsuario'];
                    }else {
                        $ganaMaquina= $_REQUEST['ganaMaquina']+1;
                        $ganaUsuario =$_REQUEST['ganaUsuario'];
                    }
                } else if($jugadaMaquina==$arrayPosiblesJugadas[1]){
                    echo "HA GANADO EL JUGADOR";
                    if (empty($_REQUEST['ganaUsuario'])) {
                        $ganaUsuario=1;
                        $ganaMaquina= $_REQUEST['ganaMaquina'];
                    } else {
                        $ganaUsuario =$_REQUEST['ganaUsuario']+1;
                        $ganaMaquina= $_REQUEST['ganaMaquina'];
                    }
                } else{
                    echo "EMPATEEEEEEEE";
                    if (empty($_REQUEST['ganaUsuario']) && empty($_REQUEST['ganaMaquina'])) {
                        $ganaUsuario= 0;
                        $ganaMaquina= 0;
                    }else {
                        $ganaUsuario =$_REQUEST['ganaUsuario'];
                        $ganaMaquina= $_REQUEST['ganaMaquina'];
                    }
                    
                }
                break;
                
        }

        

        echo "<br>Recuento maquina ".$ganaMaquina;
        echo "<br>Recuento user ".$ganaUsuario;
        echo "<br>Recuento intentos ".$intentos;
        }else {
            echo "Se termino wey";
          
            echo "<br>Recuento maquina ".$ganaMaquina;
            echo "<br>Recuento user ".$ganaUsuario;
            echo "<br>Recuento intentos ".$intentos;
        }


    }
    ?>
    <h1>Jugador</h1>
    <form action="" method="post">
        <br>
        <label for="piedra">PIEDRA</label>
        <input type="radio" name="jugada" value="PIEDRA">
        
        <label for="pepel">PAPEL</label>
        <input type="radio" name="jugada" value="PAPEL">
        
        <label for="tijera">TIJERA</label>
        <input type="radio" name="jugada" value="TIJERA"><br>
        
        <input type="hidden" name="intentos" value="<?=$intentos??''?>">
        <input type="hidden" name="ganaMaquina" value="<?=$ganaMaquina??''?>">
        <input type="hidden" name="ganaUsuario" value="<?=$ganaUsuario??''?>">
        <input type="submit" name="btnJugar" value="JUEGA"><br>
    </form>

    
    
</body>
</html>