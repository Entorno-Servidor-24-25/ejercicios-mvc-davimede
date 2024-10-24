<?php
// Cargar el modelo de usuario y la conexión a la base de datos
require_once BASE_PATH . '/models/User.php';
require_once BASE_PATH . '/db.php';

class UserController {
    // Método para mostrar el formulario
    public function showForm() {
        // Cargar la vista del formulario
        require_once BASE_PATH . '/views/userForm.php';
    }

    // Método para manejar el guardado de usuario
    public function saveUser() {
        global $connection; // Usamos la conexión a la base de datos

        // Obtener los datos del formulario
        $name = $_POST['name'];

        // Crear un nuevo objeto usuario
        $user = new User($name);

        // Guardar el usuario en la base de datos
        if ($user->save($connection)) {
            require_once BASE_PATH . '/views/userSuccess.php';
        } else {
            echo "Error al guardar el usuario.";
        }
    }

    // Método para mostrar una lista de usuarios
    public function getAllUsers() {
        global $connection;
        $users = User::getAll($connection);
        require_once BASE_PATH . '/views/userList.php';
    }

    // Método para eliminar usuarios
    public function deleteUser() {
        global $connection;
    
        // Verificar si el ID fue enviado por el formulario
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
    
            if (User::delete($connection, $id)) {
                echo "Usuario eliminado correctamente.";
                $this->getAllUsers();
            } else {
                echo "Error al eliminar el usuario.";
            }
        } else {
            echo "ID de usuario no proporcionado.";
        }
    }
}