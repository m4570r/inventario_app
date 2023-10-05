<?php
require_once 'models/ProductoModel.php';

class ProductoController {
    private $productoModel;

    public function __construct($db) {
        $this->productoModel = new ProductoModel($db);
    }

    public function listar() {
        // Obtener la lista de productos desde el modelo
        $productos = $this->productoModel->listarProductos();

        // Cargar la vista para listar productos
        include 'views/productos/listar.php';
    }

    public function agregar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Procesar el formulario de agregar producto
            $nombre_producto = $_POST['nombre_producto'];
            $cantidad = $_POST['cantidad'];
            $ubicacion = $_POST['ubicacion'];

            // Llamar al modelo para agregar el producto
            $this->productoModel->agregarProducto($nombre_producto, $cantidad, $ubicacion);

            // Redirigir a la lista de productos después de agregar
            header('Location: index.php?action=listar');
        } else {
            // Cargar la vista para agregar producto
            include 'views/productos/agregar.php';
        }
    }

    public function editar($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Procesar el formulario de edición de producto
            $nombre_producto = $_POST['nombre_producto'];
            $cantidad = $_POST['cantidad'];
            $ubicacion = $_POST['ubicacion'];

            // Llamar al modelo para actualizar el producto
            $this->productoModel->actualizarProducto($id, $nombre_producto, $cantidad, $ubicacion);

            // Redirigir a la lista de productos después de editar
            header('Location: index.php?action=listar');
        } else {
            // Obtener el producto por ID desde el modelo
            $producto = $this->productoModel->obtenerProductoPorId($id);

            // Cargar la vista para editar producto
            include 'views/productos/editar.php';
        }
    }

    public function eliminar($id) {
        // Llamar al modelo para eliminar el producto por ID
        $this->productoModel->eliminarProducto($id);

        // Redirigir a la lista de productos después de eliminar
        header('Location: index.php?action=listar');
    }
}
?>
