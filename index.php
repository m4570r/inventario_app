<?php
session_start();

// Incluir archivo de configuración de la base de datos
require_once('config/config.php');


// Verificar si el usuario ya está autenticado y redirigirlo a la página correspondiente
if (isset($_SESSION['usuario_id'])) {
    if ($_SESSION['nivel_permisos'] === 'admin') {
        header('Location: views/usuarios/admin_dashboard.php');
    } else {
        header('Location: views/usuarios/empleado_dashboard.php');
    }
    exit;
}

// Procesar el inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $contrasena = $_POST['contrasena'];
    echo $nombre;
    echo "<br>";
    echo $contrasena;

    // Validar las credenciales (esto es un ejemplo básico, en una aplicación real se debe hacer de forma más segura)
// Obtener el nombre de usuario y contraseña ingresados por el usuario

// Consultar la base de datos para obtener el hash de la contraseña correspondiente al nombre de usuario
$sql = "SELECT id, contrasena FROM usuarios WHERE nombre = :nombre";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':nombre', $nombre);
$stmt->execute();

$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

if ($resultado) {
    // Comparar la contraseña ingresada con la contraseña almacenada en la base de datos (sin hashear)
    if ($contrasena === $resultado['contrasena']) {
        // Autenticación exitosa
        $_SESSION['usuario_id'] = $resultado['id'];
        $_SESSION['nivel_permisos'] = obtenerNivelPermisos($conexion, $resultado['id']); // Implementa esta función para obtener el nivel de permisos

            if ($_SESSION['nivel_permisos'] === 'admin') {
                header('Location: views/usuarios/admin_dashboard.php');
            } else {
                header('Location: views/usuarios/empleado_dashboard.php');
            }
            exit;

    } else {
        $mensaje_error = 'Credenciales incorrectas. Inténtelo de nuevo.';
    }
} else {
    $mensaje_error = 'Usuario no encontrado.';
}


}

function obtenerNivelPermisos($conexion, $usuario_id) {
    // Realiza una consulta SQL para obtener el nivel de permisos del usuario
    $sql = "SELECT nivel_permisos FROM usuarios WHERE id = :usuario_id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
    $stmt->execute();
    
    // Obtiene el resultado de la consulta
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Verifica si se encontró un resultado y devuelve el nivel de permisos
    if ($resultado) {
        return $resultado['nivel_permisos'];
    } else {
        // Si no se encontró el usuario, puedes manejarlo según tus necesidades, por ejemplo, devolver un valor predeterminado o lanzar una excepción.
        return 'desconocido'; // Cambia esto según tu lógica real
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <?php if (isset($mensaje_error)): ?>
            <p class="error-message"><?php echo $mensaje_error; ?></p>
        <?php endif; ?>
        <form method="POST">
            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required>
            </div>
            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>
