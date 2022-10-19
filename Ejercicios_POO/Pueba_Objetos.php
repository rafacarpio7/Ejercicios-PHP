<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    include("repetidor.php");

    class Alumno
    {
        public $nombre;
        public $apellido;
        const CICLO = "DAW";
        private static $curso = "primero";

        function __construct($nom,$ape)
        {
            $this->nombre=$nom;
            $this->apellido=$ape;

        }

        public function get_nombre () {
            return$this->nombre;
        }

        public function set_nombre ($nom) {
            $this->nombre=$nom;
        }
        public function get_apellido () {
            return $this->apellido;
        }

        public function set_apellido ($ape) {
            $this->apellido=$ape;
        }

        public static function get_curso () {
            return self::$curso;
        }

        public static function set_curso ($cur) {
            self::$curso=$cur;
        }


    }
    $alumno1 = new Alumno('Rafa','Torralba');
    print_r($alumno1);
    echo "<br> El nombre del alumno es " . $alumno1->get_nombre() . " y esta matriculado en " . Alumno::CICLO . " en curso " . $alumno1->get_curso(). "<br>";

    Alumno::set_curso("segundo");
    echo "El nombre del alumno es " . $alumno1->get_nombre() . " y esta matriculado en " . Alumno::CICLO . " en curso " . $alumno1->get_curso(). "<br>";
    
    
    $alumno2 = new Repetidor("BBDD","Hamza","Boukai");

    echo "El nombre del alumno es " . $alumno2->get_nombre() . " y esta matriculado en " . Alumno::CICLO . " en curso " . $alumno2->get_curso(). "y la asignatura repetida es ". $alumno2->get_asignatura(). "<br>";
?>

</body>

</html>