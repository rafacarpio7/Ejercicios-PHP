<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
    button {
    margin-left: 40px;
    padding: 9px 25px;
    background-color: rgb(223, 235, 156);
    border: none;
    border-radius: 50px;
    cursor: pointer;
    transition: all 0.3 ease 0s;
}

button:hover {
    background-color:burlywood;
}

body {
    margin: 0;
    background: #f5e0d7;
    font-family: sans-serif;
    font-weight: 100;
}
table {
    margin: auto;
    margin-top: 5px;
    width: 800px;
    border-collapse: collapse;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);

}

th,td {
    padding: 15px;
    background-color: rgba(255,255,255,0.2);
    color: rgb(0, 0, 0);
    font-family: 'roboto';
}



th {
    text-align: center;
    
}

    th {
        background-color: #b6e2d3;
    }

form {
    width: 400px;
    background: #b6e2d3;
    padding-left: 20px;
    padding-top: 5px;
    margin: auto;
    margin-top: 75px;
    border-radius: 4px;


}

input {
    width: 150px;
    padding: 7px;
    border-radius: 4px;
    margin-bottom: 15px;
    margin-left: 10px;
    border: 1px solid #49a09d;
    font-family: 'Ubuntu', sans-serif;
}

</style>
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
                echo "<th>".strtoupper($key)."</th>";
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
                echo "<th>".strtoupper($key)."</th>";
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
                echo "<th>".strtoupper($key)."</th>";
            }
            echo "</tr>";
            foreach ($registroUsuarios as $key => $value) {
                echo "<tr>";
                foreach($value as $clave => $valor){
                        echo "<td>".$valor ."</td>";
                        
                }
                echo "<td><form><input type='submit' name='btnBorrarUsuario' value='BORRAR'></form></td>";
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

    <?php
    if (isset($_REQUEST['btnBorrarUsuario'])) {
        
    }
    if (isset($_REQUEST['btnBorrar'])) {
        # code...
    }
    if (isset($_REQUEST['btnBorrar'])) {
        # code...
    }
    ?>
</body>
</html>