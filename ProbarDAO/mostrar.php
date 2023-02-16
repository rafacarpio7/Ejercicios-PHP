<?php

require_once './interface/AnimalDao.php';


$animalDao = new AnimalDao();


$animales = $animalDao->getAll();
//print_r($animales);



foreach ($animales as $animal) {
    echo $animal->getId() . ' - ' . $animal->getNombre() .'<br>';
}

?>