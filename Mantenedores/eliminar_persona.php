<?php
	require('conexion_p.php');
	$Rut=$_GET['Rut_persona'];
	$sql = "DELETE FROM ciudadano WHERE Rut_persona='$Rut'"
	$result = mysqli_query($conexion, $sql);
?>