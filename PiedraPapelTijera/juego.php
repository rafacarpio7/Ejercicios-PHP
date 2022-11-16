<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <h1>Jugador</h1>
    <form action="" method="post">
        <br>
        <label for="piedra">PIEDRA</label>
        <input type="radio" name="jugada" value="PIEDRA">
        
        <label for="pepel">PAPEL</label>
        <input type="radio" name="jugada" value="PAPEL">
        
        <label for="tijera">TIJERA</label>
        <input type="radio" name="jugada" value="TIJERA"><br>
        
        <input type="submit" name="btnJugar" value="JUEGA">
        <input type="hidden" name="intentos" value="<?=$intentos?? 0?>">
    </form>

    <?php
    if (isset($_REQUEST['btnJugar'])) {
        $arrayPosiblesJugadas = array('PIEDRA','PAPEL','TIJERA');
        $jugadaMaquina = $arrayPosiblesJugadas[rand(0,2)];
        

        echo "HAS ELEGIDO : ".$_REQUEST['jugada']."<br>";
        echo "JUGADA DE LA MAQUINA :".$jugadaMaquina."<br>";
        switch ($_REQUEST['jugada']) {
            case 'PIEDRA':
                if ($jugadaMaquina==$arrayPosiblesJugadas[0]) {
                    echo "EMPATEEEEEEEE";
                } else if($jugadaMaquina==$arrayPosiblesJugadas[1]){
                    echo "HA GANADO EL ORDENADOR";
                } else{
                    echo "HA GANADO EL JUGADOR";
                }
                break;
            case 'PAPEL':
                if ($jugadaMaquina==$arrayPosiblesJugadas[0]) {
                    echo "HA GANADO EL JUGADOR";
                } else if($jugadaMaquina==$arrayPosiblesJugadas[1]){
                    echo "EMPATEEEEEEEE";
                } else{
                    echo "HA GANADO EL ORDENADOR";
                }
                break;
            case 'TIJERA':
                if ($jugadaMaquina==$arrayPosiblesJugadas[0]) {
                    echo "HA GANADO EL ORDENADOR";
                } else if($jugadaMaquina==$arrayPosiblesJugadas[1]){
                    echo "HA GANADO EL ORDENADOR";
                } else{
                    echo "EMPATEEEEEEEE";
                }
                break;
            default:
                $_REQUEST['intentos']++;
            break;
            
        }

        echo $intentos;

        


    }
    ?>
</body>
</html>