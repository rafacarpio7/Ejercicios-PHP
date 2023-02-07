
<?php
require_once "../Modelo/CRUD.php";
class Usuarios extends CRUD
{
    private $nombre;
    private $password;
    private $conexion;
    private static $TABLA="usuarios";


    public function __construct()
    {
        parent::__contruct(self::$TABLA);
        $this->conexion=parent::nuevaConexion();
    }

    public function __get($propiedad){
        return $this->$propiedad;
    }

    public function __set($propiedad,$nuevoValor)
    {
        $this->$propiedad=$nuevoValor;
    }

    public function registro()
    {
       
        $sql = ("INSERT INTO " .self::$TABLA."(id_usuario,password)
                 VALUES (:nombre,:password)");
        $stmt = $this->conexion->prepare($sql);
        
        $stmt->bindParam(':nombre', $_REQUEST["usuarioRegistro"]);
        $stmt->bindParam(':password', password_hash($_REQUEST['contraseñaRegistro'],PASSWORD_DEFAULT));

        return $stmt->execute();

    }
    
    public function obtieneSinPass()
    {
        $statement = $this->conexion->prepare("SELECT id_usuario FROM ".self::$TABLA." ");
        if ($statement->execute()) {
            return $statement->fetchAll(PDO::FETCH_OBJ);
        }

    }

    public function login()
    {

        $sql = "SELECT id_usuario, password FROM usuarios WHERE id_usuario = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(1, $_REQUEST['idLogin']);
        $stmt->execute();
        $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $registros;
    }


    public function crear()
    {
        
    }

    public function actualizar()
    {
        $sql = "SELECT id_usuario, password FROM usuarios WHERE id_usuario = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(1, $this->nombre);
        $stmt->execute();
        $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $registros;
        
    }

}


?>