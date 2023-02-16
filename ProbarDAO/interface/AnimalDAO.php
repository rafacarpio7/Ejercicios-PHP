<?php

require_once './conexion.php';
require_once './entity/Animal.php';

class AnimalDao
{

    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
    }


    public function getAll()
    {
        $stmt = $this->conexion->conex()->prepare("SELECT * FROM animal");

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $animales = [];
        
        foreach ($result as $row) {
            
            $animal = new Animal($row['id'],$row['nombre'],$row['especie'],$row['raza'],$row['genero'],$row['color'],$row['edad']);
            $animales[] = $animal;
        }

        return $animales;
    }

    /*
    public function getById($id)
    {
        $sql = "SELECT * FROM animales WHERE id = ?";
        $params = [$id];
        $result = $this->db->query($sql, $params);

        if ($result) {
            $animal = new Animal($result['id'], $result['nombre'], $result['email']);
            return $animal;
        } else {
            return null;
        }
    }
    public function save($animal)
    {
        $sql = "INSERT INTO animales (nombre, email) VALUES (?, ?)";
        $params = [$animal->getNombre(), $animal->getEmail()];
        $this->db->execute($sql, $params);
    }

    public function update($animal)
    {
        $sql = "UPDATE animales SET nombre = ?, email = ? WHERE id = ?";
        $params = [$animal->getNombre(), $animal->getEmail(), $animal->getId()];
        $this->db->execute($sql, $params);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM animales WHERE id = ?";
        $params = [$id];
        $this->db->execute($sql, $params);
    }
    */
}
