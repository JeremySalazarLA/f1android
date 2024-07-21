<?php
include 'conexion.php';

// Verificar si las variables POST están definidas
if (isset($_POST['nombre'], $_POST['apellido'], $_POST['mail'], $_POST['login'], $_POST['pass'], $_POST['nivel'], $_POST['cedula'])) {

    // Obtener los datos del POST y sanitizarlos
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($conexion, $_POST['apellido']);
    $mail = mysqli_real_escape_string($conexion, $_POST['mail']);
    $login = mysqli_real_escape_string($conexion, $_POST['login']);
    $pass = mysqli_real_escape_string($conexion, $_POST['pass']);
    $nivel = intval($_POST['nivel']); // Asumir que nivel es un número entero
    $cedula = mysqli_real_escape_string($conexion, $_POST['cedula']);

    // Preparar la consulta para verificar si la cédula ya está en uso
    $check_sql = "SELECT id FROM usuario WHERE cedula = ?";
    $stmt = mysqli_prepare($conexion, $check_sql);
    mysqli_stmt_bind_param($stmt, "s", $cedula);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        // La cédula ya está en uso, enviar un mensaje de error
        echo "La cedula ya esta en uso.";
    } else {
        // La cédula no está en uso, proceder con la inserción
        $sql = "INSERT INTO usuario (nombre, apellido, mail, login, pass, nivel, cedula) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conexion, $sql);
        mysqli_stmt_bind_param($stmt, "sssssss", $nombre, $apellido, $mail, $login, $pass, $nivel, $cedula);

        if (mysqli_stmt_execute($stmt)) {
            echo "Usuario registrado con éxito";
        } else {
            // Manejar error en la inserción
            echo "Error en el registro: " . mysqli_error($conexion);
        }
    }

    // Cerrar la declaración y la conexión
    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
} else {
    echo "Datos incompletos.";
}
?>



