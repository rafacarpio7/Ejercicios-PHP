
<?php
require_once "../Modelo/CRUD.php";
class Usuarios extends CRUD
{
    private  $id_usuarios;
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

    public function crear()
    {
        
        $this->password = $_REQUEST["password"];
        $this->especie = $_REQUEST["especie"];
        $this->foto = $_REQUEST["foto"];
        $this->direccion = $_REQUEST["direccion"];
        $this->ndormitorios = $_REQUEST["ndormitorios"];
        $this->precio = $_REQUEST["precio"];

        $DateAndTime = date('Y-m-d h:i:s a', time());
        $sql = ("INSERT INTO " .self::$TABLA."(id_usuario,password)
                 VALUES (:id_usuario,:password)");
        $stmt = $this->conexion->prepare($sql);
        
        $stmt->bindParam(':id_usuario', $this->password);
        $stmt->bindParam(':password', $this->foto);

        if($stmt->execute()){
            header("Location:../Vista/vista_usuarios.php");
        }
    }

    public function actualizar()
    {
        $this->id_usuarios = $_REQUEST["id_usuarios"];
        $this->password = $_REQUEST["password"];
        $this->especie = $_REQUEST["especie"];
        $this->foto = $_REQUEST["foto"];
        $this->direccion = $_REQUEST["direccion"];
        $this->ndormitorios = $_REQUEST["ndormitorios"];
        $this->precio = $_REQUEST["precio"];

        $DateAndTime = date('Y-m-d h:i:s a', time());
        $sql = "UPDATE ".self::$TABLA." SET id_usuarios=:id_usuarios,password=:password,
                    WHERE id_usuarios=:idAnterior;";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id_usuarios', $this->id_usuarios);
        $stmt->bindParam(':password', $this->password);
        if($stmt->execute()){
            header("Location:../Vista/vista_usuarios.php");
        }
    }

}


?>