<?php

$hostname='sql106.infinityfree.com';
$database='if0_36943863_f1android';
$username='si0_36943863';
$password='BxTBxAndroidf1';

$conexion = new mysqli($hostname,$username,$password,$database);
if($conexion -> connect_errno)
{

	echo"Lo sentidos, no hemos podido conectarnos con el servidor de BD";
}


?>