<?php

class User {
    public $name;
    public $id;

    public function __construct($name, $id = null) {
    $this->name = $name;
    $this->id = $id;
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
        $sql = "SELECT id, name FROM Usuario";

        // Ejecutar la consulta
        if ($result = $connection->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $users[] = new User($row['name'], $row['id']);
            }
            $result->free();
        } else {
            echo "Error en la consulta: " . $connection->error;
        }

        return $users;
    }

    // Método para eliminar
    public static function delete($connection, $id) {
        $sql = "DELETE FROM Usuario WHERE id = ?;";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $id);
    
        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error al eliminar el usuario: " . $stmt->error;
            return false;
        }
    }
}