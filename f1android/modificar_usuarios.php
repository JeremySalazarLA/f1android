<?php
include 'conexion.php';

// Obtener los datos del POST
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['mail'];
$login = $_POST['login'];
$pass = $_POST['pass'];
$nivel = $_POST['nivel'];
$cedula = $_POST['cedula'];

$sql = "UPDATE usuario SET nombre = '" . $nombre . "', apellido = '" . $apellido . "', mail = '" . $email . "', login = '" . $login . "', pass = '" . $pass . "', nivel = " . $nivel . " WHERE cedula = " . $cedula;

mysqli_query($conexion,$sql)  or die(mysqli_error())  ;
mysqli_close($conexion);

?>