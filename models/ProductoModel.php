<?php
class ProductoModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function listarProductos() {
        // Consulta para obtener todos los productos desde la base de datos
        $query = "SELECT * FROM productos";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        // Devolver los resultados como un array de objetos o como sea necesario
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function obtenerProductoPorId($id) {
        // Consulta para obtener un producto por su ID
        $query = "SELECT * FROM productos WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);

        // Devolver el resultado como un objeto o como sea necesario
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function agregarProducto($nombre_producto, $cantidad, $ubicacion) {
        // Consulta para insertar un nuevo producto en la base de datos
        $query = "INSERT INTO productos (nombre_producto, cantidad, ubicacion) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$nombre_producto, $cantidad, $ubicacion]);
    }

    public function actualizarProducto($id, $nombre_producto, $cantidad, $ubicacion) {
        // Consulta para actualizar un producto en la base de datos
        $query = "UPDATE productos SET nombre_producto = ?, cantidad = ?, ubicacion = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$nombre_producto, $cantidad, $ubicacion, $id]);
    }

    public function eliminarProducto($id) {
        // Consulta para eliminar un producto de la base de datos
        $query = "DELETE FROM productos WHERE id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$id]);
    }
}
?>
