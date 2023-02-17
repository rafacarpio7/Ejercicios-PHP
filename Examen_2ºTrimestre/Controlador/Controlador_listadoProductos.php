<?php
if (session_status()==PHP_SESSION_NONE) {
    session_start();

    if (isset($_SESSION['idUsuario'])) {
        require "../Modelo/DAO.php";
$DAOmostrar = new DAO();
$DAOmostrar->conectar();
$registrosMostrar = $DAOmostrar->obtenerTODO('producto');

function mostrarTabla($registros)
    {
    if (empty($registros)) {
        echo "<h1>NO HAY DATOS CON ESTA CONSULTA</h1>";
    } else {
        $arraykeys= $registros[0];
    echo "<form><table><tr>";
        foreach ($arraykeys as $key => $value ) {
            echo "<th>".strtoupper($key)."</th>";
        }
        echo "</tr>";
        foreach ($registros as $key => $value) {
            echo "<tr>";
            foreach($value as $clave => $valor){
                        echo "<td>".$valor ."</td>";
                        
            }
            echo "<td><input type='checkbox' name='productos[]' value='".$valor."' ></td>";
        }
            
            echo "</tr>";
        }
        echo "</table><input type='submit' name='añadir' value='Añadir'><br>
        <input type='submit' name='eliminar' value='Eliminar'><br>
        <input type='submit' name='eliminarTodo' value='Eliminar Carrito'><br>
        <input type='submit' name='cerrarPedido' value='Cerrar Pedido'><br>
        </form>";
}
    } else {
        header("Location: ../Vista/login.php");
    }
    
} else {
    # code...
}




?>