<?php
include_once 'database.php';

class Usuario {
    private $db;

    public function __construct() {
        $conexion = new Database();
        $this->db = $conexion->conectar();
    }

    public function crear($nombre, $apellido, $fecha, $telefono, $correo, $direccion) {
        $sql = "INSERT INTO usuarios (nombre, apellido, fecha_nacimiento, telefono, correo, direccion)
                VALUES ('$nombre', '$apellido', '$fecha', '$telefono', '$correo', '$direccion')";

        return $this->db->query($sql);
    }

    public function listar() {
        $resultado = $this->db->query("SELECT * FROM usuarios");
        $usuarios = [];

        while ($fila = $resultado->fetch_assoc()) {
            $usuarios[] = [
                'id' => $fila['id'],
                'nombre' => $fila['nombre'],
                'apellido' => $fila['apellido'],
                'telefono' => $fila['telefono'],
                'fecha_nacimiento' => $fila['fecha_nacimiento']
            ];
        }

        return $usuarios;
    }

    public function actualizar($id, $telefono, $correo, $direccion) {
        $sql = "UPDATE usuarios SET telefono='$telefono', correo='$correo', direccion='$direccion' WHERE id=$id";
        return $this->db->query($sql);
    }

    public function eliminar($id) {
        $sql = "DELETE FROM usuarios WHERE id=$id";
        return $this->db->query($sql);
    }

    public function calcularEdad($fecha) {
        $nacimiento = new DateTime($fecha);
        $hoy = new DateTime();
        return $hoy->diff($nacimiento)->y;
    }
}
?>
