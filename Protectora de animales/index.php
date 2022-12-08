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
    include_once "Conexion.php";
    include_once "CRUD.php";
    include_once "Usuario.php";
    include_once "Animal.php";
    include_once "Adopcion.php";

    switch ($_REQUEST['btnTabla']) {
        case 'ANIMALES':
            $animal = new Animal();
            $registroAnimales = $animal->obtieneTodos();
            $arraykeys= $registroAnimales[0];
            echo "<table><tr>";
            foreach ($arraykeys as $key => $value ) {
                echo "<th>$key</th>";
            }
            echo "</tr>";
            foreach ($registroAnimales as $key => $value) {
                echo "<tr>";
                foreach($value as $clave => $valor){
                        echo "<td>".$valor ."</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            break;
        case 'ADOPCIONES':
            $adopciones = new Adopcion();
            $registroAdopciones = $adopciones->obtieneTodos();
            $arraykeys= $registroAdopciones[0];
            echo "<table><tr>";
            foreach ($arraykeys as $key => $value ) {
                echo "<th>$key</th>";
            }
            echo "</tr>";
            foreach ($registroAdopciones as $key => $value) {
                echo "<tr>";
                foreach($value as $clave => $valor){
                        echo "<td>".$valor ."</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            break;
        case 'USUARIOS':
            $usuarios = new Usuario();
            $registroUsuarios = $usuarios->obtieneTodos();
            $arraykeys = $registroUsuarios[0];
            echo "<table><tr>";
            foreach ($arraykeys as $key => $value ) {
                echo "<th>$key</th>";
            }
            echo "</tr>";
            foreach ($registroUsuarios as $key => $value) {
                echo "<tr>";
                foreach($value as $clave => $valor){
                        echo "<td>".$valor ."</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            break;
            break;
        default:
            # code...
            break;
    }


    ?>

    <form action="" method="post">
        <input type="submit" name="btnTabla" value="ANIMALES">
        <input type="submit" name="btnTabla" value="ADOPCIONES">
        <input type="submit" name="btnTabla" value="USUARIOS">
    </form>
</body>
</html>