<?php
include 'conexion.php';




$sql="select count(*) as total from merch_f1;";

$resultado= $conexion -> query($sql);

while($fila = $resultado -> fetch_array())
{
	$producto[] = array_map('utf8_encode', $fila);

}

echo json_encode($producto);
$resultado -> close();


?>