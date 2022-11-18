<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO</title>
    <style>
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

legend {
    font-size: 22px;
    margin-bottom: 20px;
    margin-top: 20px;
}
    </style>
</head>
<body>
<?php
class Alumno{
    private static $codigo=0;
    private $nombre;
    private $apellido;
    private $telefono;
    private $email;

    public function __construct($nombreC,$apellidoC,$telefonoC,$emailC){
        self::$codigo++;
        $this->nombre=$nombreC;
        $this->apellido=$apellidoC;
        $this->telefono=$telefonoC;
        $this->email=$emailC;
    }
    /*
            
        CREACION DE GETTERS Y SETTERS

    */
    public function getCodigo () {
        return self::$codigo;
    }

    public function setCodigo($codigoP)
    {
        self::$codigo=$codigoP;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombreNuevo)
    {
        $this->nombre=$nombreNuevo;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setApellido($apellidoNuevo)
    {
        $this->apellido=$apellidoNuevo;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefonoNuevo)
    {
        $this->telefono= $telefonoNuevo;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($emailNuevo)
    {
        $this->email=$emailNuevo;
    }

    /*
            
        COMPRUEBA SI EL CORREO PASADO COMO PARAMETRO CONTIENE UNA @ Y UN . 
        DEVUELVE TRUE O FALSE SEGUN LO CUMPLA O NO LA CONDICION

    */
    public function compruebaCorreo($correoParametro)
    {
        if (str_contains($correoParametro,"@") && str_contains($correoParametro,".")) {
            return true;
        } else {
            return false;
        }
        
    }
}

include_once 'identificador.php';
if (isset($_REQUEST['btnRegistro'])) {
    try {
        /*
            
            CREACION DEL ALUMNO A INSERTAR MENOS EL CODIGO PUESTO QUE NO ESTA ESTABLECIDO EN EL CONSTRUCTOR

        */
        $alumnoRegistro = new Alumno($_REQUEST['nombreRegistro'],$_REQUEST['apellidoRegistro'],$_REQUEST['telefonoRegistro'],$_REQUEST['emailRegistro']);
        $conn = new PDO("mysql:host=$servidor;dbname=mibbdd;charset=utf8",$usuario,$clave);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        print_r($alumnoRegistro);
        $alumnoRegistro->setCodigo($fila);

            /*

                ESCRITURA EN LOG SOLO LA OPERACION DE EXTRACCION DEL CODIGO PARA EL ALUMNO

            */
            $log = fopen("log.txt","a+b");
            fwrite($log, $sql."\n");
            fclose($log);
        if ($alumnoRegistro->compruebaCorreo($alumnoRegistro->getEmail())==false) {
            $msg = "CORREO NO VALIDO";
            if ($_REQUEST['intentos']=='') {
                $intentos=1;
                echo " Intentos : ".$intentos;
            }else {
                $intentos = (int)$_REQUEST['intentos']+1;
                echo " Intentos : ".$intentos;
    
            }

            if ( $intentos==3) {
                header("Location: error.php");
            }
        } else {
            /*
            
                BINDEO DE PARAMETROS Y CREACION DE VARIABLES PARA LAS PROPIEDADES PUESTO
                QUE LOS BIND PARAM NO ADMITEN FUNCIONES DENTRO DE SUS PARAMETROS SOLO VARIABLES

            */
            $sql= "INSERT INTO alumnos (CODIGO,NOMBRE,APELLIDOS,TELEFONO,CORREO) " 
            . "VALUES (:cod,:nom,:ape,:tel,:corr)";
            $codigoAlumno = $alumnoRegistro->getCodigo();
            $nombreAlumno=$alumnoRegistro->getNombre();
            $apellidoAlumno = $alumnoRegistro->getApellido();
            $telefonoAlumno = $alumnoRegistro->getTelefono();
            $emailAlumno = $alumnoRegistro->getEmail();
            $contraseña = strtolower($nombreAlumno);
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':cod', $nombreAlumno);
            $stmt->bindParam(':nom', $nombreAlumno);
            $stmt->bindParam(':ape', $apellidoAlumno);
            $stmt->bindParam(':tel', $telefonoAlumno);
            $stmt->bindParam(':corr', $emailAlumno);
            if ($stmt->execute()) {
            /*
            
                ESCRITURA EN LOG LA CONSULTA DE INSERCION DE DATOS
                SI ESTA HA SIDO EJECUTADA

            */
            $msg = "Registro insertado correctamente";
            $log = fopen("log.txt","a+b");
            fwrite($log, $sql."\n");
            fclose($log);
        }else{
            $msg = "Error al insertar el alumno"; 
        }
        }
    } catch (Error $e) {
        echo "Error de conexion ". $e ;
    }
}







?>

    <form action="" method="post">
        <legend>REGISTRO</legend>
        Nombre : 
        <input type="text" placeholder="nombre" name="nombreRegistro" required><br>
        Apellido :
        <input type="text" placeholder="apellido" name="apellidoRegistro" required><br>
        Telefono : 
        <input type="tel" placeholder="telefono" name="telefonoRegistro" required><br>
        Email :
        <input type="text" placeholder="email" name="emailRegistro" required><br>
        <p><?=$msg??''?></p>
        
        <input type="hidden" name="intentos" value="<?=$intentos??''?>">
        <input type="submit" name="btnRegistro" value="REGISTRATE">
    </form>




    
</body>
</html>