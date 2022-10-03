<!--Crear un array asociativo de dos dimensiones. La clave de la primera dimensión será el
código de empleado que tendrá el formato “CExxxx” donde xxxx es un número de 4
cifras.
La segunda dimensión contiene un array asociativo con claves “nombre”, “edad” y
“salario” cuyo contenido será el nombre, la edad y el salario del empleado.
Hacer una función en PHP que reciba como parámetros el nombre, la edad y el salario
de un empleado, y calcula un nuevo salario para esa persona en base a su situación:
o Si el salario es mayor de 2.000€, no cambiará.
o Si el salario está entre 1.000 y 2.000€:
▪ Si además la edad es mayor de 45 años se sube un 4%.
▪ Si la edad es menor o igual que 45 años se sube un 10%
o Si el salario es menor de 1.000€:
▪ Los menores de 30 años cobrarán a partir de entonces exactamente 1.500€.
▪ De 30 a 45 años sube un 3%.
▪ A los mayores de 45 años sube un 15%.
La función debe actualizar en el array los valores en caso de cambio y mostrar en
pantalla los nombres y el nuevo salario de los que han sufrido modificaciones. -->

<!DOCTYPE html>
< <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Ejercicio 22</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <?php
        function calculoNuevoSalario($nombreP,$edadP,$salarioP){

            if (in_array($nombreP,$arrayEmpleados) {
                
                if (1000>$salarioP>2000) {
                    if ($edadP>45) {
                        $salarioP = $salarioP+ $salarioP*0.04;
                    }else {
                        $salarioP = $salarioP+ $salarioP*0.1;
                    }
                } else {
                    if ($edadP<30) {
                        $salarioP = 1500;
                    } elseif (30<$edadP<45) {
                        $salarioP = $salarioP+ $salarioP*0.15;
                    }
                    
                }

            } else {
                echo "No existe el empleado $nombreP en nuestro array";
            }
            

            
            
        }
        ?>

    </head>

    <body>
        <?php
        $arrayEmpleados = ('CE0001'=>array('nombre'=> "Jose",'edad'=> 22,'salario'=> 2100),
                            'CE0002'=>array('nombre'=> "Pedro",'edad'=> 25,'salario'=> 2200),
                            'CE0003'=>array('nombre'=> "Manuel",'edad'=> 30,'salario'=> 1200),
                            'CE0004'=>array('nombre'=> "Migue",'edad'=> 40,'salario'=> 1600),
                            'CE0005'=>array('nombre'=> "Andres",'edad'=> 18,'salario'=> 1100));
        print_r($arrayEmpleados);                    
        calculoNuevoSalario($arrayEmpleados[0][0],$arrayEmpleados[0][1],$arrayEmpleados[0][2]);


        
        ?>

    </body>

    </html>