<?php
require_once '../../config/config.php';
session_start(); // Iniciar la sesión

// Función para obtener el nombre del usuario a partir del ID de usuario
function obtenerNombreUsuario($conexion, $usuario_id) {
    try {
        $sql = "SELECT nombre FROM usuarios WHERE id = :usuario_id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($resultado && isset($resultado['nombre'])) {
            return $resultado['nombre'];
        } else {
            return "Usuario Desconocido";
        }
    } catch (PDOException $e) {
        // Manejar errores de consulta
        return "Error al obtener el nombre del usuario";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control del Empleado</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
<div class="navbar">
    <span>Bienvenido, <?php echo obtenerNombreUsuario($conexion, $_SESSION['usuario_id']); ?></span>
    <span>Nivel: <?php echo $_SESSION['nivel_permisos']; ?></span>
    <a href="cerrar_sesion.php">Cerrar Sesión</a>
</div>

    <h1>Panel de Control del Empleado</h1>
    <p>Aquí puedes buscar usuarios y gestionar productos.</p>
    <!-- Agrega aquí la funcionalidad y el contenido específico para el empleado -->
</body>
</html>
