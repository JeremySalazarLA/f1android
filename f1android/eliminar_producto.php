<?php
include 'conexion.php';
$pro_id=$_POST['id_producto'];


$sql="delete from merch_f1 where id_producto=".$pro_id."";

mysqli_query($conexion,$sql)  or die(mysqli_error())  ;
mysqli_close($conexion);

?>