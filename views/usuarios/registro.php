<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <div class="registro-container">
        <h2>Registro de Usuario</h2>
        <?php if (isset($mensaje_error)): ?>
            <p class="error-message"><?php echo $mensaje_error; ?></p>
        <?php endif; ?>
        <form method="POST" action="procesar_registro.php">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required>
            </div>
            <div class="form-group">
                <label for="nivel_permisos">Nivel de Permisos:</label>
                <select id="nivel_permisos" name="nivel_permisos" required>
                    <option value="admin">Administrador</option>
                    <option value="empleado">Empleado</option>
                </select>
            </div>
            <button type="submit">Registrar Usuario</button>
        </form>
    </div>
</body>
</html>
