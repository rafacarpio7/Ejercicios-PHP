<!-- Escribe una clase Cuenta para representar una cuenta bancaria. Los datos de la cuenta son:
nombre del cliente (String), número de cuenta (String), tipo de interés (double) y saldo (double).
La clase contendrá los siguientes métodos:
• Constructor con todos los parámetros
• Métodos setters/getters para asignar y obtener los datos de la cuenta.
• Métodos ingreso y reintegro. Un ingreso consiste en aumentar el saldo en la cantidad
que se indique. Esa cantidad no puede ser negativa. Un reintegro consiste en disminuir
el saldo en una cantidad pero antes se debe comprobar que hay saldo suficiente. La
cantidad no puede ser negativa. Los métodos ingreso y reintegro devuelven true si la
operación se ha podido realizar o false en caso contrario.
Crea 2 instancias para validar el funcionamiento del programa. -->

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
    include("Cuenta.php");
    $cuentaAyax = new Cuenta("Ajax Gonzalez","ES05-6987-6890-978909876",3.2,3000.00);
    $cuentaHamza = new Cuenta("HAMZA","ES05-6987-6890-109876542",4.5,6030.00);


    $cuentaAyax->printCaracteristicas($cuentaAyax);
    echo "<br>";

    if ($cuentaAyax->ingreso(200)) {
        $cuentaAyax->printCaracteristicas($cuentaAyax);
    }

    echo "<br>";

    if ($cuentaAyax->reintegro(200)) {
        $cuentaAyax->printCaracteristicas($cuentaAyax);
    } else {
        echo "No se ha realizado el reintegro";
    }
    
    echo "<br>";

    $cuentaAyax->transferencia(1500,$cuentaHamza);




    $cuentaAyax->printCaracteristicas($cuentaAyax);
    
    echo "<br>";
    $cuentaHamza->printCaracteristicas($cuentaHamza);

    echo "<br>";
    ?>
    
</body>
</html>