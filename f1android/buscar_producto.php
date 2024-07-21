<?php
include 'conexion.php';
$pro_id=$_GET['id_producto'];



$sql="select * from merch_f1 where id_producto=".$pro_id."";

$resultado= $conexion -> query($sql);

while($fila = $resultado -> fetch_array())
{
	$producto[] = array_map('utf8_encode', $fila);

}

echo json_encode($producto);
$resultado -> close();


?>
