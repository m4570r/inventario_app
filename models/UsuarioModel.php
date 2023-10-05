<?php
class UsuarioModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function obtenerUsuarioPorEmail($email) {
        // Consulta para obtener un usuario por su correo electrónico
        $query = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$email]);

        // Devolver el resultado como un objeto o como sea necesario
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function registrarUsuario($nombre, $email, $contrasena, $nivel_permisos) {
        // Consulta para insertar un nuevo usuario en la base de datos
        $query = "INSERT INTO usuarios (nombre, email, contrasena, nivel_permisos) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$nombre, $email, $contrasena, $nivel_permisos]);
    }
}
?>
