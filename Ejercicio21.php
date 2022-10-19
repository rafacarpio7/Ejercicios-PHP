<!--Funciones Relacionadas -->
<!DOCTYPE html>
<html>
    <head>
        <title>Funciones Relacionadas</title>

        <?php
        function comprobarEmail($correo){
            $emailCorrecto = array('@gmail.com','@educa.madrid.or','@yahoo.com','@hotmail.com');
            $validado =false;
            foreach ($emailCorrecto as $key => $value) {
                if (!str_ends_with($correo,$value)) {
                    $validado=true;
                }
            }
            return $validado;
            
        }
        ?>

    </head>

    <body>

            
            
    <?php
        $arrayAgenda = array( array('Nombre'=> "Jorge",'Direccion'=> "Madrid",'Telefono'=> 999999999,'Correo'=> "jorge@correo.com")
        ,1 =>array('Nombre'=> "Jorge",'Direccion'=> "Madrid",'Telefono'=> 999999999,'Correo'=> "jorge@correo.com")
        ,2 =>array('Nombre'=> "Jorge",'Direccion'=> "Madrid",'Telefono'=> 999999999,'Correo'=> "jorge@correo.com")
        ,3 =>array('Nombre'=> "Jorge",'Direccion'=> "Madrid",'Telefono'=> 999999999,'Correo'=> "jorge@correo.com"));
        
        
    echo "<table border= '1'><th colspan='3'>Agenda</th>";
    foreach ($arrayAgenda as $a => $valor1) {
        echo "<tr>
                <th rowspan='4'>$a</th>
            ";
        foreach ($valor1 as $b => $valor2) {
            echo "<td>
                    $b
                </td>
                <td>
                    $valor2
                </td></tr>";
        }   
    }
    echo "</table>";
    

    ?>
        <tab
    </body>
</html>
