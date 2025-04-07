<?php
class Database {
    private $host = "localhost";
    private $usuario = "root";
    private $password = "";
    private $database = "empresa";
    private $conexion;

    public function conectar(): mysqli {
        try {
            $this->conexion = new mysqli($this->host, $this->usuario, $this->password, $this->database);
            if ($this->conexion->connect_error) {
                throw new Exception($this->conexion->connect_error);
            }
            return $this->conexion;
        } catch (Exception $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
?>