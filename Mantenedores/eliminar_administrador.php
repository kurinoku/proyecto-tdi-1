<?php
	require('conexion_p.php');
	$Rut=$_POST['Rut_administrador'];
	$sql = "DELETE FROM administrador WHERE Rut_administrador='$Rut'";
	$result = mysqli_query($conexion, $sql);
?>