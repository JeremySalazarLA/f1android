<?php
include 'conexion.php';

// Obtener los datos del POST
$pro_id = $_POST['id_producto'];
$pro_nombre = $_POST['nombre_producto'];
$pro_escuderia = $_POST['escuderia'];
$pro_precio = $_POST['precio'];
$pro_categoria = $_POST['categoria'];
$pro_stock = $_POST['stock'];
$pro_fecha = $_POST['fecha'];

// Verificar si el ID ya está en uso
$check_sql = "SELECT id_producto FROM merch_f1 WHERE id_producto = $pro_id";
$result = mysqli_query($conexion, $check_sql);

if (mysqli_num_rows($result) > 0) {
    // El ID ya está en uso, enviar un mensaje de error
    echo "El ID del producto ya esta en uso.";
} else {
    // El ID no está en uso, proceder con la inserción
    $sql = "INSERT INTO merch_f1 (id_producto, nombre_producto, escuderia, precio, categoria, stock, fecha) 
            VALUES ($pro_id, '$pro_nombre', '$pro_escuderia', $pro_precio, '$pro_categoria', $pro_stock, '$pro_fecha')";

    mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
}

mysqli_close($conexion);
?>
