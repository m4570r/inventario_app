<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Productos</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <h1>Listar Productos</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Producto</th>
                <th>Cantidad</th>
                <th>Ubicación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aquí puedes usar PHP para generar filas de datos de productos desde la base de datos -->
            <!-- Por ejemplo: -->
            <!-- <?php foreach ($productos as $producto): ?> -->
            <!--     <tr> -->
            <!--         <td><?php echo $producto['id']; ?></td> -->
            <!--         <td><?php echo $producto['nombre_producto']; ?></td> -->
            <!--         <td><?php echo $producto['cantidad']; ?></td> -->
            <!--         <td><?php echo $producto['ubicacion']; ?></td> -->
            <!--         <td> -->
            <!--             <a href="editar.php?id=<?php echo $producto['id']; ?>">Editar</a> -->
            <!--             <a href="eliminar.php?id=<?php echo $producto['id']; ?>">Eliminar</a> -->
            <!--         </td> -->
            <!--     </tr> -->
            <!-- <?php endforeach; ?> -->
        </tbody>
    </table>
    <a href="agregar.php">Agregar Producto</a>
</body>
</html>
