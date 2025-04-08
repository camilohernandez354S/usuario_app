<?php
require_once 'Usuarios.php';

$usuario = new Usuario();

while (true) {
    echo "\n--- Menú de Usuarios ---\n";
    echo "1. Crear usuario\n";
    echo "2. Listar usuarios\n";
    echo "3. Actualizar usuario\n";
    echo "4. Eliminar usuario\n";
    echo "5. Salir\n";
    echo "Selecciona una opción: ";

    $opcion = trim(fgets(STDIN));

    if ($opcion == 1) {
        echo "Nombre: ";
        $nombre = trim(fgets(STDIN));
        echo "Apellido: ";
        $apellido = trim(fgets(STDIN));
        echo "Fecha nacimiento (YYYY-MM-DD): ";
        $fecha = trim(fgets(STDIN));
        echo "Teléfono: ";
        $telefono = trim(fgets(STDIN));
        echo "Correo: ";
        $correo = trim(fgets(STDIN));
        echo "Dirección: ";
        $direccion = trim(fgets(STDIN));

        if ($usuario->crear($nombre, $apellido, $fecha, $telefono, $correo, $direccion)) {
            echo " Usuario creado con éxito.\n";
        } else {
            echo " Error al crear usuario.\n";
        }
    }
}
?>
