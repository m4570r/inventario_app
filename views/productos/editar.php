<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <h1>Editar Producto</h1>
    <form method="POST" action="procesar_edicion.php">
        <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
        <div class="form-group">
            <label for="nombre_producto">Nombre del Producto:</label>
            <input type="text" id="nombre_producto" name="nombre_producto" value="<?php echo $producto['nombre_producto']; ?>" required>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" value="<?php echo $producto['cantidad']; ?>" required>
        </div>
        <div class="form-group">
            <label for="ubicacion">Ubicación:</label>
            <input type="text" id="ubicacion" name="ubicacion" value="<?php echo $producto['ubicacion']; ?>" required>
        </div>
        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>
