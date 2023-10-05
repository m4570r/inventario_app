-- Crear la base de datos 'inventario_app'
CREATE DATABASE IF NOT EXISTS inventario_app;

-- Usar la base de datos 'inventario_app'
USE inventario_app;

-- Crear la tabla 'usuarios'
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    contrasena VARCHAR(255) NOT NULL,
    nivel_permisos ENUM('admin', 'empleado') NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Crear la tabla 'productos'
CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_producto VARCHAR(100) NOT NULL,
    cantidad INT NOT NULL,
    ubicacion VARCHAR(50) NOT NULL,
    id_usuario INT,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    fecha_ingreso TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    fecha_despacho TIMESTAMP NULL
);

-- Crear la tabla 'tokens'
CREATE TABLE IF NOT EXISTS tokens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    token VARCHAR(255) NOT NULL,
    fecha_expiracion TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

-- Índice único en el campo 'token'
CREATE UNIQUE INDEX idx_token ON tokens (token);

-- Índice para mejorar el rendimiento al buscar tokens por fecha de expiración
CREATE INDEX idx_fecha_expiracion ON tokens (fecha_expiracion);



-- Poblar la tabla 'usuarios' con ejemplos
INSERT INTO usuarios (nombre, email, contrasena, nivel_permisos) VALUES
    ('Administrador', 'admin@example.com', 'contraseña_admin', 'admin'),
    ('Empleado 1', 'empleado1@example.com', 'contraseña_empleado1', 'empleado'),
    ('Empleado 2', 'empleado2@example.com', 'contraseña_empleado2', 'empleado');

-- Poblar la tabla 'productos' con ejemplos
INSERT INTO productos (nombre_producto, cantidad, ubicacion, id_usuario) VALUES
    ('Producto 1', 100, 'Ubicación A', 1),
    ('Producto 2', 50, 'Ubicación B', 2),
    ('Producto 3', 75, 'Ubicación C', 3);

-- Poblar la tabla 'tokens' con ejemplos de tokens Bearer
INSERT INTO tokens (id_usuario, token, fecha_expiracion) VALUES
    (1, 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxIiwibmFtZSI6IkFkbWluaXN0cmFkb3IiLCJpYXQiOjE2MzEyNjA0NjAsImV4cCI6MTYzMTI2MzA2MH0.0JjuLvZUwFW7P8Gg6gktFSDrrT_qil6KAK8F6zNS9w', '2023-12-31 23:59:59'),
    (2, 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIyIiwibmFtZSI6IkVtcGxleW1vIDEiLCJpYXQiOjE2MzEyNjA1MzAsImV4cCI6MTYzMTI2MzEzMH0.VwVLoXz8GOe_0SuvVgqzB_qzJhjwIeSO-PeY4wU8WVo', '2023-12-31 23:59:59'),
    (3, 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIzIiwibmFtZSI6IkVtcGxleW1vIDIiLCJpYXQiOjE2MzEyNjA1NjAsImV4cCI6MTYzMTI2MzE2MH0.1sMGiRbkSlLQmZcMQa33AtsVKhHcbFmlkZZHrLE-UXo', '2023-12-31 23:59:59');

