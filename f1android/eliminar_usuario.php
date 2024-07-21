<?php
include 'conexion.php';
$pro_cedula=$_POST['cedula'];


$sql="delete from usuario where cedula=".$pro_cedula."";

mysqli_query($conexion,$sql)  or die(mysqli_error())  ;
mysqli_close($conexion);

?>
