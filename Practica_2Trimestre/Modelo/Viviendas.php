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
        $sql="SELECT MAX(id) from viviendas;";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        $registros=$stmt->fetch();
        $this->Id=$registros[0]+1;

        $sql = ("INSERT INTO " .self::$TABLA."(tipo,zona,direccion,ndormitorios,precio,tamano,extras,observaciones)
                 VALUES (:tipo,:zona,:direccion,:ndormitorios,:precio,:tamano,:extras,:observaciones)");
        $stmt = $this->conexion->prepare($sql);
        

        $stmt->bindParam(':tipo', $_REQUEST["selectTipo"]);
        $stmt->bindParam(':zona', $_REQUEST["selectZona"]);
        $stmt->bindParam(':direccion', $_REQUEST["direccion"]);
        $stmt->bindParam(':ndormitorios', $_REQUEST["dormitorios"]);
        $stmt->bindParam(':precio', $_REQUEST["precio"]);
        $stmt->bindParam(':tamano', $_REQUEST["tamano"]);
        $insertExtras = 0;
        if (isset($_REQUEST['extras'])) {
            foreach ($_REQUEST['extras'] as $value) {
                switch ($value) {
                    case 'Piscina':
                        $insertExtras +=1;
                        break;
                    case 'Jardin':
                        $insertExtras +=2;
                        break;
                    case 'Garage':
                        $insertExtras +=4;
                        break;
                }
            }
            $stmt->bindParam(':extras', $insertExtras);
        } else {
            $stmt->bindParam(':extras', $insertExtras);
        }
        
        
        
        $stmt->bindParam(':observaciones', $_REQUEST["observaciones"]);

        
        if ($stmt->execute()) {
           // header("Location: ../Vista/vistaPrueba.php");
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
            //header("Location:../Vista/vista_viviendas.php");
        }
    }

    public function filtroViviendas()
    {
        
        $sql = "SELECT viviendas.id, tipo, zona, direccion, ndormitorios, precio, tamano,extras, GROUP_CONCAT(fotos.foto) as fotos
         FROM ".self::$TABLA ." LEFT JOIN fotos on fotos.id_vivienda = viviendas.id
          WHERE tipo LIKE :tipoFiltro AND zona LIKE :zonaFiltro AND ndormitorios LIKE :ndormitoriosFiltro AND precio BETWEEN :precioFiltro1 AND :precioFiltro2 
          ";

          if (isset($_REQUEST['extras'])) {
            switch (count($_REQUEST['extras'])) {
                case 1:
                    $entradaExtras = "AND find_in_set('".$_REQUEST['extras'][0]."',extras)>0 ";
                    break;
                case 2:
                    $entradaExtras ="AND find_in_set('".$_REQUEST['extras'][0]."',extras)>0 "."AND find_in_set('".$_REQUEST['extras'][1]."',extras)>0 ";
                    break;
                case 3:
                    $entradaExtras = "AND find_in_set('".$_REQUEST['extras'][0]."',extras)>0 "."AND find_in_set('".$_REQUEST['extras'][1]."',extras)>0 "."AND find_in_set('".$_REQUEST['extras'][2]."',extras)>0 ";
                    break;
            }

            $sql = $sql .$entradaExtras;
        }else {
            $sql = $sql ."AND extras LIKE '%' ";
         }

        $sql = $sql . "GROUP BY viviendas.id
                ORDER BY fecha_anuncio DESC  ";

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

        

        if ($stmt->execute()) {
            $registros = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $registros; 
        }

    }

    public function obtieneTodos()
    {
        $sql = "SELECT viviendas.id, tipo, zona, direccion, ndormitorios, precio, tamano,extras, GROUP_CONCAT(fotos.foto) as fotos
         FROM ".self::$TABLA ." LEFT JOIN fotos on fotos.id_vivienda = viviendas.id
         GROUP BY viviendas.id
         ORDER BY fecha_anuncio DESC ";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        
        $registros = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $registros;
    }

    public function guardarImagenes () {
        $arrayNombre=[];
        $contador=0;
        foreach($_FILES["fotos"]['tmp_name'] as $key => $tmp_name)
        {
            //condicional si el fuchero existe
            if($_FILES["fotos"]["name"][$key]) {
                // Nombres de archivos de temporales
                $archivonombre =$_FILES["fotos"]["name"][$key]; 
                $fuente = $_FILES["fotos"]["tmp_name"][$key]; 
                
                $carpeta = 'img/'; //Declaramos el nombre de la carpeta que guardara los archivos
                
                if(!file_exists($carpeta)){
                    mkdir($carpeta, 0777) or die("Hubo un error al crear el directorio de almacenamiento");	
                }
                
                $dir=opendir($carpeta);
                $target_path = '../'.$carpeta.'/'.$archivonombre; //indicamos la ruta de destino de los archivos
                
        
                if(move_uploaded_file($fuente, $target_path)) {	
                    echo "Los archivos $archivonombre se han cargado de forma correcta.<br>";
                    } else {	
                    echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
                }
                closedir($dir); //Cerramos la conexion con la carpeta destino
            }
            $arrayNombre[$contador]=$archivonombre;
            $contador++;
        }
        return $arrayNombre;
    }

    public function insertarImagendb($arrayNombre) {
        foreach($arrayNombre as $valor){
            $sql = ("INSERT INTO fotos (id_vivienda,foto) VALUES (:A, :B)");
            $stmt = $this->conexion->prepare($sql);
            $stmt->bindParam(':A', $this->Id);
            $stmt->bindParam(':B', $valor);
            try{
            $stmt->execute();
            }catch(PDOException $e){
                echo $e;
            }
        }
    }
}


?>