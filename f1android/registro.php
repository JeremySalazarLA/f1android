<?php
include 'conexion.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$mail = $_POST['mail'];
$login = $_POST['login'];
$pass = $_POST['pass'];
$cedula = $_POST['cedula'];

// Encriptar la contraseña
$pass_hash = password_hash($pass, PASSWORD_BCRYPT);

// Establecer el nivel como 3 automáticamente
$nivel = 3;

$sentencia = $conexion->prepare("INSERT INTO usuario (nombre, apellido, mail, login, pass, nivel, cedula) VALUES (?, ?, ?, ?, ?, ?, ?)");
$sentencia->bind_param('sssssis', $nombre, $apellido, $mail, $login, $pass_hash, $nivel, $cedula);

if ($sentencia->execute()) {
    echo json_encode(array("mensaje" => "Usuario registrado exitosamente"));
} else {
    echo json_encode(array("mensaje" => "Error al registrar usuario"));
}

$sentencia->close();
$conexion->close();
?>

