<?php
include 'conexion.php';
$pro_id=$_POST['id_producto'];
$pro_nombre=$_POST['nombre_producto'];
$pro_escuderia=$_POST['escuderia'];
$pro_precio=$_POST['precio'];
$pro_categoria=$_POST['categoria'];
$pro_stock=$_POST['stock'];
$pro_fecha=$_POST['fecha'];



$sql = "UPDATE merch_f1 SET nombre_producto = '" . $pro_nombre . "', escuderia = '" . $pro_escuderia . "', precio = " . $pro_precio . ", categoria = '" . $pro_categoria . "', stock = " . $pro_stock . ", fecha = '" . $pro_fecha . "' WHERE id_producto = " . $pro_id;

mysqli_query($conexion,$sql)  or die(mysqli_error())  ;
mysqli_close($conexion);

?>