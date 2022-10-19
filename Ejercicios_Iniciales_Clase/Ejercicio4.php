<!-- Realiza un programa en php que calcule el sueldo neto de un trabajador al cual se le
aplica una retención del 22%. Supón que el sueldo bruto son 2750€. Mostrar por
pantalla el sueldo inicial, el impuesto aplicado y el sueldo neto. Dar formato html a los
resultados obtenidos.   -->

<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio 4</title>

    </head>

    <body>

        
            <?php
            $sueldoBruto = 2750 ;
            $porcentajeRetencion = 0.25;
            $retencion = $sueldoBruto*$porcentajeRetencion;
            $sueldoNeto = $sueldoBruto-$retencion;
            echo "<h1> El sueldo bruto es : $sueldoBruto  </h1></br>" ;
            echo "<h2> El impuesto aplicado es : $retencion  </h2></br>" ;
            echo "<h3> El sueldo neto es : $sueldoNeto  </h3></br>" ;
            
            ?> 
        
    </body>
</html>