<?php
include 'conexion.php';
$pro_id=$_GET['cedula'];



$sql="select * from usuario where cedula=".$pro_id."";

$resultado= $conexion -> query($sql);

while($fila = $resultado -> fetch_array())
{
	$producto[] = array_map('utf8_encode', $fila);

}

echo json_encode($producto);
$resultado -> close();


?>