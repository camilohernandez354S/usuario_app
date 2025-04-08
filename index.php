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
    } elseif ($opcion == 2) {
        $usuarios = $usuario->listar();

        if (count($usuarios) > 0) {
            echo "\n Lista de Usuarios:\n";
            foreach ($usuarios as $u) {
                $edad = $usuario->calcularEdad($u['fecha_nacimiento']);
                echo "ID: {$u['id']} | Nombre: {$u['nombre']} {$u['apellido']} | Edad: $edad | Tel: {$u['telefono']}\n";
            }
        } else {
            echo " No hay usuarios registrados.\n";
        }

    } elseif ($opcion == 3) {
        echo "ID del usuario a actualizar: ";
        $id = trim(fgets(STDIN));
        echo "Nuevo teléfono: ";
        $telefono = trim(fgets(STDIN));
        echo "Nuevo correo: ";
        $correo = trim(fgets(STDIN));
        echo "Nueva dirección: ";
        $direccion = trim(fgets(STDIN));

        if ($usuario->actualizar($id, $telefono, $correo, $direccion)) {
            echo " Usuario actualizado.\n";
        } else {
            echo " No se pudo actualizar.\n";
        }

    } elseif ($opcion == 4) {
        echo "ID del usuario a eliminar: ";
        $id = trim(fgets(STDIN));

        if ($usuario->eliminar($id)) {
            echo " Usuario eliminado.\n";
        } else {
            echo " No se pudo eliminar.\n";
        }

    } elseif ($opcion == 5) {
        echo " Saliendo...\n";
        break;

    } else {
        echo " Opción no válida. Intenta de nuevo.\n";
    }
}
?>