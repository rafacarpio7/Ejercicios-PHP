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
        $sql="SELECT MAX(id) from " .self::$TABLA.";";
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
                header("Location: ../Vista/vistaPrueba.php");
            } else {
                header("Location: ../Vista/vistaPrueba.php?mensajeErrorCrear=No se ha creado el registro");
            }
        
        
    }

    public function actualizar()
    {
        
    }

    public function actualizarVivienda()
    {

        $sql = "UPDATE viviendas SET tipo=:tipo,
        zona=:zona,direccion=:direccion,ndormitorios=:ndormitorios,precio=:precio,tamano=:tamano,extras=:extras,observaciones=:observaciones
        WHERE id=:idAnterior";
        
        $stmt = $this->conexion->prepare($sql);
        
        $stmt->bindParam(':tipo', $_REQUEST["selectTipo"]);
        $stmt->bindParam(':zona', $_REQUEST["selectZona"]);
        $stmt->bindParam(':direccion', $_REQUEST["direccion"]);
        $stmt->bindParam(':ndormitorios', $_REQUEST["dormitorios"]);
        $stmt->bindParam(':precio', $_REQUEST["precio"]);
        $stmt->bindParam(':tamano', $_REQUEST["tamano"]);
        
        $actualizaExtras = 0;
        if (isset($_REQUEST['extras'])) {
            foreach ($_REQUEST['extras'] as $value) {
                switch ($value) {
                    case 'Piscina':
                        $actualizaExtras +=1;
                        break;
                    case 'Jardin':
                        $actualizaExtras +=2;
                        break;
                    case 'Garage':
                        $actualizaExtras +=4;
                        break;
                }
            }
            $stmt->bindParam(':extras', $actualizaExtras);
        } else {
            $stmt->bindParam(':extras', $actualizaExtras);
        }
        $stmt->bindParam(':observaciones', $_REQUEST['observaciones']);
        $stmt->bindParam(':idAnterior', $_REQUEST['idViviendaModificar']);

        if ($stmt->execute()) {
            header("Location: ../Vista/vistaPrueba.php");
        } else {
            header("Location: ../Vista/vistaPrueba.php?mensajeErrorModificar=No se ha modificado el registro");
        }
        
        
            
        
    }

    public function filtroViviendas()
    {
        
        $sql = "SELECT viviendas.id, tipo, zona, direccion, ndormitorios, precio, tamano,extras, GROUP_CONCAT(fotos.foto) as fotos,observaciones
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
                ORDER BY fecha_anuncio DESC, viviendas.Id DESC";

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
    public function totalViviendas()
    {
        $stmt = $this->conexion->prepare("SELECT COUNT(*) FROM " .self::$TABLA."");
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function obtieneTodasViviendas($incio, $limite)
    {
        $sql = "SELECT viviendas.id, tipo, zona, direccion, ndormitorios, precio, tamano,extras, GROUP_CONCAT(fotos.foto) as fotos ,observaciones
         FROM ".self::$TABLA ." LEFT JOIN fotos on fotos.id_vivienda = viviendas.id
         GROUP BY viviendas.id
         ORDER BY fecha_anuncio DESC, viviendas.Id DESC LIMIT :inicio, :final";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindValue(":inicio", $incio, PDO::PARAM_INT);
        $stmt->bindValue(":final", $limite, PDO::PARAM_INT);
        $stmt->execute();
        
        $registros = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $registros;
    }

    public function guardarImagenes () {
        $arrayNombre=[];
        $contador=0;
        foreach($_FILES["fotos"]['tmp_name'] as $key => $tmp_name)
        {
            if($_FILES["fotos"]["name"][$key]) {

                $archivonombre =$_FILES["fotos"]["name"][$key]; 
                $fuente = $_FILES["fotos"]["tmp_name"][$key]; 
                
                $carpeta = '../img/'; 
                
                if(!file_exists($carpeta)){
                    mkdir($carpeta, 0777) or die("Hubo un error al crear el directorio de almacenamiento");	
                }
                
                $dir=opendir($carpeta);
                $target_path = $carpeta.$archivonombre; 
                
        
                if(move_uploaded_file($fuente, $target_path)) {	
                    
                }
                closedir($dir); 
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