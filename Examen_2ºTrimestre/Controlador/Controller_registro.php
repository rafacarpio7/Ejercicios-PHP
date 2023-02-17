<?php


if (isset($_REQUEST['btnRegistro'])) {
    require "../Modelo/UsuarioDAO.php";
    require "../Modelo/Usuario.php";
    $usuarioTO = new Usuario();
    $usuarioDAO = new UsuarioDAO();
    $usuarioDAO->conectar();


    // $opciones = array('uri'=>'https://localhost/Ejercicios-PHP/Examen_2%C2%BATrimestre/SOAP',
    // 'location'=>'https://localhost/Ejercicios-PHP/Examen_2%C2%BATrimestre/SOAP/server.php');
    // $cliente = new SoapClient(null,$opciones);
    
    // if ($cliente->validar($_REQUEST['contraseña'])) {

    $ComprobarSiExiste = $usuarioDAO->recuperarUsuario($_REQUEST['email'],'');

 

        if ($ComprobarSiExiste[0]['Email']==$_REQUEST['email']) {

            echo "El usuario a registrar ya existe en la base de datos";

        } else {
            $usuarioTO->__set('nombre',$_REQUEST['nombre']);
            $usuarioTO->__set('apellidos',$_REQUEST['apellidos']);
            $usuarioTO->__set('domicilio',$_REQUEST['domicilio']);
            $usuarioTO->__set('telefono',$_REQUEST['telefono']);
            $usuarioTO->__set('email',$_REQUEST['email']);
            $usuarioTO->__set('password',$_REQUEST['contraseña']);
            $usuarioDAO->registro($usuarioTO);
            
        }
    
    } else {
        # code...
    }
// } else {
    
// }

?>