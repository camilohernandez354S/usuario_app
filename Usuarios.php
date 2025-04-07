<?php
include_once 'database.php';

class Usuario
{
    private $db;

    public function __construct()
    {
        $conexion = new Database();
        $this->db = $conexion->conectar();
    }

    public function crear($nombre, $apellido, $fecha, $telefono, $correo, $direccion)
    {
        $sql = "INSERT INTO usuarios (nombre, apellido, fecha_nacimiento, telefono, correo, direccion)
                VALUES ('$nombre', '$apellido', '$fecha', '$telefono', '$correo', '$direccion')";

        if ($this->db->query($sql)) {
            echo "Usuario guardado.\n";
        } else {
            echo "Error al guardar usuario.\n";
        }
    }

    public function listar()
    {
        $resultado = $this->db->query("SELECT * FROM usuarios");

        while ($fila = $resultado->fetch_assoc()) {
            $nombre = $fila['nombre'] . ' ' . $fila['apellido'];
            $edad = $this->edad($fila['fecha_nacimiento']);
            echo "ID: {$fila['id']} | $nombre | Edad: $edad | Tel: {$fila['telefono']}\n";
        }
    }

    public function actualizar($id, $telefono, $correo, $direccion)
    {
        $sql = "UPDATE usuarios SET telefono='$telefono', correo='$correo', direccion='$direccion' WHERE id=$id";

        if ($this->db->query($sql)) {
            echo "Usuario actualizado.\n";
        } else {
            echo "Error al actualizar.\n";
        }
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM usuarios WHERE id=$id";

        if ($this->db->query($sql)) {
            echo "Usuario eliminado.\n";
        } else {
            echo "Error al eliminar.\n";
        }
    }

    public  function edad($fecha)
    {
        $nacimiento = new DateTime($fecha);
        $hoy = new DateTime();
        $edad = $hoy->diff($nacimiento)->y;
        return $edad;
    }
}

?>