<?php
include 'conexion.php';

// Obtener los datos del POST
$usu_usuario = $_POST['usuario'];
$usu_password = $_POST['password'];

// Preparar la sentencia SQL para seleccionar el usuario por login
$sentencia = $conexion->prepare("SELECT * FROM usuario WHERE login=?");
$sentencia->bind_param('s', $usu_usuario);
$sentencia->execute();

$resultado = $sentencia->get_result();

// Verificar si se encontró un usuario con el login proporcionado
if ($fila = $resultado->fetch_assoc()) {
    // Primero intentar verificar con el hash
    if (password_verify($usu_password, $fila['pass'])) {
        // Contraseña correcta con hash
        $response = array(
            "success" => true,
            "nivel" => $fila['nivel'] // Campo nivel para redirección
        );
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    } else {
        // Si no coincide, comprobar si la contraseña es la misma en texto plano (para registros sin hash)
        // Nota: Solo deberías usar esta opción como transición. Eventualmente deberías migrar todas las contraseñas a hash.
        if ($fila['pass'] === $usu_password) {
            // Contraseña correcta en texto plano
            // Actualizar la contraseña a hash para futuros inicios de sesión
            $hashed_password = password_hash($usu_password, PASSWORD_DEFAULT);
            $update_stmt = $conexion->prepare("UPDATE usuario SET pass=? WHERE login=?");
            $update_stmt->bind_param('ss', $hashed_password, $usu_usuario);
            $update_stmt->execute();
            $update_stmt->close();

            $response = array(
                "success" => true,
                "nivel" => $fila['nivel'] // Campo nivel para redirección
            );
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
        } else {
            // Contraseña incorrecta
            $response = array("success" => false);
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
        }
    }
} else {
    // Usuario no encontrado
    $response = array("success" => false);
    echo json_encode($response, JSON_UNESCAPED_UNICODE);
}

$sentencia->close();
$conexion->close();
?>

