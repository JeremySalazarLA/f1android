<?php
include 'conexion.php';

// Consultar el conteo total de usuarios
$sql = "SELECT COUNT(*) AS total FROM usuario";
$resultado = $conexion->query($sql);

// Obtener el resultado y prepararlo para JSON
if ($resultado) {
    $fila = $resultado->fetch_assoc();
    $totalUsuarios = $fila['total'];
    echo json_encode(array("total" => $totalUsuarios));
} else {
    echo json_encode(array("total" => 0));
}

$resultado->close();
$conexion->close();
?>
