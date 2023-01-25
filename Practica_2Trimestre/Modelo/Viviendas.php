<?php
require_once "../Modelo/CRUD.php";
class Viviendas extends CRUD
{
    private  $id;
    private $tipo;
    private $zona;
    private $direccion;
    private $ndormitorios;
    private $precio;
    private $tamaño;
    private $extras;
    private $observaciones;
    private $conexion;
    private static $TABLA="viviendas";


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
        
        $this->tipo = $_REQUEST["tipo"];
        $this->especie = $_REQUEST["especie"];
        $this->zona = $_REQUEST["zona"];
        $this->direccion = $_REQUEST["direccion"];
        $this->ndormitorios = $_REQUEST["ndormitorios"];
        $this->precio = $_REQUEST["precio"];

        $DateAndTime = date('Y-m-d h:i:s a', time());
        $sql = ("INSERT INTO " .self::$TABLA."(tipo,zona,direccion,ndormitorios,precio,tamaño,extras,observaciones,fecha_anuncio)
                 VALUES (:tipo,:zona,:direccion,:ndormitorios,:precio,:tamaño,:extras,:observaciones,:fecha_anuncio)");
        $stmt = $this->conexion->prepare($sql);
        
        $stmt->bindParam(':tipo', $this->tipo);
        $stmt->bindParam(':zona', $this->zona);
        $stmt->bindParam(':direccion', $this->direccion);
        $stmt->bindParam(':ndormitorios', $this->ndormitorios);
        $stmt->bindParam(':precio', $this->precio);
        $stmt->bindParam(':tamaño', $this->tamaño);
        $stmt->bindParam(':extras', $this->extras);
        $stmt->bindParam(':observaciones', $this->observaciones);
        $stmt->bindParam(':fecha_anuncio', $DateAndTime);

        if($stmt->execute()){
            header("Location:../Vista/vista_viviendas.php");
        }
    }

    public function actualizar()
    {
        $this->id = $_REQUEST["id"];
        $this->tipo = $_REQUEST["tipo"];
        $this->especie = $_REQUEST["especie"];
        $this->zona = $_REQUEST["zona"];
        $this->direccion = $_REQUEST["direccion"];
        $this->ndormitorios = $_REQUEST["ndormitorios"];
        $this->precio = $_REQUEST["precio"];

        $DateAndTime = date('Y-m-d h:i:s a', time());
        $sql = "UPDATE ".self::$TABLA." SET id=:id,tipo=:tipo,
                    zona=:zona,direccion=:direccion,ndormitorios=:ndormitorios,precio=:precio,tamaño=:tamaño,extras=:extras,observaciones=:observaciones,fecha_anuncio=:fecha_anuncio
                    WHERE id=:idAnterior;";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':tipo', $this->tipo);
        $stmt->bindParam(':zona', $this->zona);
        $stmt->bindParam(':direccion', $this->direccion);
        $stmt->bindParam(':ndormitorios', $this->ndormitorios);
        $stmt->bindParam(':precio', $this->precio);
        $stmt->bindParam(':tamaño', $this->tamaño);
        $stmt->bindParam(':extras', $this->extras);
        $stmt->bindParam(':observaciones', $this->observaciones);
        $stmt->bindParam(':fecha_anuncio', $DateAndTime);
        if($stmt->execute()){
            header("Location:../Vista/vista_viviendas.php");
        }
    }

    public function filtroViviendas()
    {
        $sql = "SELECT * FROM ".self::$TABLA ."WHERE tipo=:tipoFiltro 
        AND zona=:zonaFiltro AND direccion=:direccionFiltro AND ndormitorios=:ndormitoriosFiltro
        AND precio=:precioFiltro AND tamano=:tamanoFiltro AND extras=:extrasFiltro";
        $stmt = $this->conexion->prepare($sql);
        if (empty($_REQUEST['selectTipo'])) {
            $stmt->bindParam(':tipoFiltro', "'%'");
        }else {
            $stmt->bindParam(':tipoFiltro', $_REQUEST['selectTipo']);
        }

        if (empty($_REQUEST[''])) {
            $stmt->bindParam(':zonaFiltro', "'%'");
        } else {
            $stmt->bindParam(':zonaFiltro', $_REQUEST['idLogin']);
        }
        

        $stmt->bindParam(':tipoFiltro', $_REQUEST['idLogin']);
        $stmt->bindParam(':zonaFiltro', $_REQUEST['idLogin']);
        $stmt->bindParam(':direccionFiltro', $_REQUEST['idLogin']);
        $stmt->bindParam(':ndormitoriosFiltro', $_REQUEST['idLogin']);
        $stmt->bindParam(':precioFiltro', $_REQUEST['idLogin']);
        $stmt->bindParam(':tamanoFiltro', $_REQUEST['idLogin']);
        $stmt->bindParam(':extrasFiltro', $_REQUEST['idLogin']);

        $stmt->execute();
        $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $registros;
    }

}


?>