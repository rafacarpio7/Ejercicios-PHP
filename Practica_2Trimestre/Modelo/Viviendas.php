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
        $this->zona = $_REQUEST["zona"];
        $this->direccion = $_REQUEST["direccion"];
        $this->ndormitorios = $_REQUEST["ndormitorios"];
        $this->precio = $_REQUEST["precio"];
        $this->tamaño = $_REQUEST["tamaño"];
        $this->extras = $_REQUEST["extras"];
        $this->observaciones = $_REQUEST["observaciones"];

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
        $sql = "SELECT viviendas.id, tipo, zona, direccion, ndormitorios, precio, tamano, GROUP_CONCAT(fotos.foto) as fotos
         FROM ".self::$TABLA ." LEFT JOIN fotos on fotos.id_vivienda = viviendas.id
          WHERE tipo LIKE :tipoFiltro AND zona LIKE :zonaFiltro AND ndormitorios LIKE :ndormitoriosFiltro AND precio BETWEEN :precioFiltro1 AND :precioFiltro2 
          GROUP BY viviendas.id
         ORDER BY fecha_anuncio DESC "; // AND FIND_IN_SET(':extrasFiltro',extras)>0
        $stmt = $this->conexion->prepare($sql);
        
        if (isset($_REQUEST['selectTipo'])) {
            $stmt->bindParam(':tipoFiltro', $_REQUEST['selectTipo']);
        } else {
            $stmt->bindValue(':tipoFiltro', "%");
        }
        
        if (isset($_REQUEST['selectZona'])) {
            $stmt->bindParam(':zonaFiltro', $_REQUEST['selectZona']);
        } else {
            $stmt->bindValue(':zonaFiltro', "%");
        }
        
        
        if (isset($_REQUEST['dormitorios'])) {
            $stmt->bindParam(':ndormitoriosFiltro', $_REQUEST['dormitorios']);
        } else {
            $stmt->bindValue(':ndormitoriosFiltro', "%");
        }

        if (isset($_REQUEST['precio'])) {
            switch ($_REQUEST['precio']) {
                case '1':
                    $stmt->bindValue(':precioFiltro1', 0);
                    $stmt->bindValue(':precioFiltro2', 100000);
                    break;
                case '2':
                    $stmt->bindValue(':precioFiltro1', 100000);
                    $stmt->bindValue(':precioFiltro2', 200000);
                    break;
                case '3':
                    $stmt->bindValue(':precioFiltro1', 200000);
                    $stmt->bindValue(':precioFiltro2', 300000);
                    break;
                case '4':
                    $stmt->bindValue(':precioFiltro1', 300000);
                    $stmt->bindValue(':precioFiltro2', 1000000000);
                    break;
            }
        }else {
            $stmt->bindValue(':precioFiltro1', 0);
            $stmt->bindValue(':precioFiltro2', 1000000000);
        }
        
        // if (isset($_REQUEST['extras'])) {
        //     $stmt->bindParam(':extrasFiltro', $_REQUEST['extras'][0]);
        // } else {
        //     $stmt->bindValue(':extrasFiltro', "%");
        // }
        
    
        $stmt->execute();
        
        $registros = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $registros;
    }

    public function obtieneTodos()
    {
        $sql = "SELECT viviendas.id, tipo, zona, direccion, ndormitorios, precio, tamano, GROUP_CONCAT(fotos.foto) as fotos
         FROM ".self::$TABLA ." LEFT JOIN fotos on fotos.id_vivienda = viviendas.id
         GROUP BY viviendas.id
         ORDER BY fecha_anuncio DESC ";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        
        $registros = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $registros;
    }
}


?>