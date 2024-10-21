<?php

class User {
public $name;

public function __construct($name) {
$this->name = $name;
}

    // Método para guardar el usuario en la base de datos
    public function save($connection) {
    // Insertar el usuario en la base de datos
    $sql = "INSERT INTO Usuario (name) VALUES ('$this->name')";

        if ($connection->query($sql) === TRUE) {
        return true;
        } else {
        return false;
        }
    }

// Método para obtener usuarios
public static function getAll($connection) {
    $users = [];
    $sql = "SELECT * FROM Usuario"; // Consulta SQL

    // Ejecutar la consulta
    if ($result = $connection->query($sql)) { // Cambiado de === TRUE a $result
        while ($row = $result->fetch_assoc()) {
            $users[] = new User($row['name']); // Crear un nuevo objeto User con el nombre
        }
        $result->free(); // Liberar el resultado
    } else {
        // Manejo de errores
        echo "Error en la consulta: " . $connection->error;
    }

    return $users; // Retornar el array de usuarios
    }
}