<?php
  


    if (isset($_POST['Enviar'])) {
        switch ($_POST['monedas']) {
            case 'bitcoin':

                $auxBit = (int)$_POST['euros'];
                $conversionBit = $auxBit* 0.00012;
                echo "La conversion de ".((int)$_POST['euros']) ." a Bitcoin es de ". $conversionBit ." Bitcoin";
            break;
            case 'dolar':
                $auxDolar = (int)$_POST['euros'];
                $conversionDolar = $auxDolar* 1.12;
                echo "La conversion de ".((int)$_POST['euros']) ." a dolares americanos es de ". $conversionDolar ." dolares";
            break;
            case 'libra':
                $auxLibra = (int)$_POST['euros'];
                $conversionLibra = $auxBauxLibrait* 0.86;
                echo "La conversion de ".((int)$_POST['euros']) ." a libras esterlinas es de ". $conversionLibra ." libras";
            break;
            case 'yen':
                $auxYen = (int)$_POST['euros'];
                $conversionYen = $auxYen* 120.82;
                echo "La conversion de ".((int)$_POST['euros']) ." a yenes es de ". $conversionYen ." yenes";
            break;
            
        }
        
    }else {
        echo "No se han enviado los datos correctamente";
    }
    ?>