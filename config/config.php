<?php
// Datos de conexión a la base de datos
$host = 'localhost';        // Servidor de la base de datos (generalmente localhost)
$dbname = 'inventario_app'; // Nombre de la base de datos
$username = 'root';         // Nombre de usuario de la base de datos
$password = '';             // Contraseña del usuario de la base de datos (dejar en blanco si no hay contraseña)

try {
    // Crear una instancia de la conexión PDO
    $conexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Configurar PDO para mostrar errores en caso de excepciones
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // En caso de error de conexión, mostrar un mensaje de error
    die("Error de conexión: " . $e->getMessage());
}
?>
