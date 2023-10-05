<?php
// Incluir archivo de configuración de la base de datos
require_once 'config.php';

// Comprobar si el usuario actual tiene permisos de administrador
session_start();
if (!isset($_SESSION['nivel_permisos']) || $_SESSION['nivel_permisos'] !== 'admin') {
    // Si el usuario no es administrador, redirigir a una página de error o a otro lugar adecuado
    header('Location: error_permisos.php');
    exit;
}

// Procesar el registro del nuevo usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];
    $nivel_permisos = $_POST['nivel_permisos'];

    // Realizar la inserción del nuevo usuario en la base de datos
    // Aquí deberías escribir el código para insertar el nuevo usuario en la base de datos
    // Asegúrate de hacerlo de manera segura, utilizando consultas preparadas, por ejemplo.
    
    // Después de registrar al usuario, puedes redirigirlo a una página de éxito o a otro lugar adecuado
    header('Location: registro_exitoso.php');
    exit;
}
?>
