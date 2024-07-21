<?php
// Configuración de la base de datos
$host = "db4free.net"; // Cambia esto al host de tu base de datos en db4free.net
$dbname = "academicoprr"; // Cambia esto al nombre de tu base de datos
$username = "jeremyprr"; // Cambia esto a tu nombre de usuario
$password = "12345678"; // Cambia esto a tu contraseña

// Crear la conexión
$conexion = new mysqli($host, $username, $password, $dbname);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener el id del producto desde los parámetros GET
$pro_id = $_GET['id_producto'];

// Consultar la base de datos
$sql = "SELECT * FROM merch_f1 WHERE id_producto = $pro_id";

$resultado = $conexion->query($sql);

$producto = array();
while ($fila = $resultado->fetch_assoc()) {
    $producto[] = array_map('utf8_encode', $fila);
}

echo json_encode($producto);

// Cerrar la conexión
$resultado->close();
?>
