<?php
include_once 'Database.php';

class Usuario {
    private $db;

    public function __construct() {
        $conexion = new Database();
        $this->db = $conexion->conectar();
    }

    public function crear($nombre, $apellido, $fecha, $telefono, $correo, $direccion) {
        $sql = "INSERT INTO usuarios (nombre, apellido, fecha_nacimiento, telefono, correo, direccion)
                VALUES ('$nombre', '$apellido', '$fecha', '$telefono', '$correo', '$direccion')";

        if ($this->db->query($sql)) {
            echo "Usuario guardado.\n";
        } else {
            echo "Error al guardar usuario.\n";
        }
    }
}
?>
