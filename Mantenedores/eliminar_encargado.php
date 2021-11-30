<?php
	require('conexion_p.php');
	$Rut=$_GET['seleccionado'];
	$sql = "DELETE FROM encargado WHERE Rut_encargado='$Rut'";
	$result = mysqli_query($conexion, $sql);
	header('Location: Form_encargado.php');
?>