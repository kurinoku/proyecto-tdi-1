<?php
	require('conexion_p.php');
	$Rut=$_GET['seleccionado'];
	$sql = "DELETE FROM administrador WHERE Rut_administrador='$Rut'";
	$result = mysqli_query($conexion, $sql);
	header('Location: Form_administrador.php');
?>