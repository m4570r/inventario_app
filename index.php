<?php
session_start();

// Incluir archivo de configuración de la base de datos
require_once 'config.php';

// Verificar si el usuario ya está autenticado y redirigirlo a la página correspondiente
if (isset($_SESSION['usuario_id'])) {
    if ($_SESSION['nivel_permisos'] === 'admin') {
        header('Location: admin_dashboard.php');
    } else {
        header('Location: empleado_dashboard.php');
    }
    exit;
}

// Procesar el inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Validar las credenciales (esto es un ejemplo básico, en una aplicación real se debe hacer de forma más segura)
    if ($usuario === 'admin' && $contrasena === 'admin123') {
        // Usuario administrador
        $_SESSION['usuario_id'] = 1;
        $_SESSION['nivel_permisos'] = 'admin';
        header('Location: admin_dashboard.php');
    } elseif ($usuario === 'empleado' && $contrasena === 'empleado123') {
        // Usuario empleado
        $_SESSION['usuario_id'] = 2;
        $_SESSION['nivel_permisos'] = 'empleado';
        header('Location: empleado_dashboard.php');
    } else {
        $mensaje_error = 'Credenciales incorrectas. Inténtelo de nuevo.';
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
                <input type="text" id="usuario" name="usuario" required>
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
