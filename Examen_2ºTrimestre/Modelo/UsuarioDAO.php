<?php
require "InterfazDAO.php";
require "DAO.php";
class UsuarioDAO  extends DAO implements InterfazDAO
{   

    private $conn;
    private static $TABLA = "usuario" ; 

    public function __construct()
    {

        $this->conn=parent::conectar();
        
    }

    public function conexion(){
        $this->conn=parent::conectar();
    }

    //email == id

	public function recuperarUsuario($id,$pass){
        try {
            $sql = 'SELECT Email,Password FROM '.self::$TABLA.' WHERE Email=:id';
            
            $consulta = $this->conn->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }
        catch (PDOException $err) {
            echo $err->getMessage();
        }

    }

	public function validarAcceso($id,$pass){
        $registros = $this->recuperarUsuario($id,$pass);
        if (password_verify($pass, $registros[0]["Password"]) && ($id == $registros[0]["Email"])) {
            session_start();
            $_SESSION['idUsuario']= $id;
            return true;
        }else{
            return false;
        }
    }

    public function registro($instancia) {
        try {


            $contraseña = password_hash($instancia->password, PASSWORD_DEFAULT);
            $nombre = $instancia->nombre;
            $apellidos = $instancia->apellidos;
            $domicilio = $instancia->domicilio;
            $telefono = $instancia->telefono;
            $email = $instancia->email;

            $sql = ("INSERT INTO usuario (Nombre,Apellidos,Domicilio,NumTelefono,Email,Password)
                     VALUES (:nombre,:apellidos,:domicilio,:telefono,:email,:password)");
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellidos',$apellidos );
            $stmt->bindParam(':domicilio', $domicilio);
            $stmt->bindParam(':telefono',$telefono );
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password',$contraseña );
    
            return $stmt->execute();
            
        }catch (PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }
}

?>