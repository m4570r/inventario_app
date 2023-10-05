<?php
require_once 'models/UsuarioModel.php';

class UsuarioController {
    private $usuarioModel;

    public function __construct($db) {
        $this->usuarioModel = new UsuarioModel($db);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Procesar el formulario de inicio de sesión
            $email = $_POST['email'];
            $contrasena = $_POST['contrasena'];

            // Llamar al modelo para verificar las credenciales y autenticar al usuario
            $usuario = $this->usuarioModel->obtenerUsuarioPorEmail($email);

            if ($usuario && password_verify($contrasena, $usuario->contrasena)) {
                // Iniciar sesión y redirigir al panel correspondiente
                session_start();
                $_SESSION['usuario_id'] = $usuario->id;
                $_SESSION['nivel_permisos'] = $usuario->nivel_permisos;

                if ($usuario->nivel_permisos === 'admin') {
                    header('Location: admin_dashboard.php');
                } else {
                    header('Location: empleado_dashboard.php');
                }
            } else {
                // Credenciales incorrectas, mostrar un mensaje de error
                $mensaje_error = 'Credenciales incorrectas. Inténtelo de nuevo.';
                include 'views/usuarios/login.php';
            }
        } else {
            // Mostrar la vista de inicio de sesión
            include 'views/usuarios/login.php';
        }
    }

    public function registro() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Procesar el formulario de registro de usuario
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $contrasena = password_hash($_POST['contrasena'], PASSWORD_BCRYPT);
            $nivel_permisos = $_POST['nivel_permisos'];

            // Llamar al modelo para registrar al nuevo usuario
            $this->usuarioModel->registrarUsuario($nombre, $email, $contrasena, $nivel_permisos);

            // Redirigir a la página de inicio de sesión después del registro
            header('Location: login.php');
        } else {
            // Mostrar la vista de registro de usuario
            include 'views/usuarios/registro.php';
        }
    }
}
?>
