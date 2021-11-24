<?php
	require('conexion_p.php');
	$Codigo=$_GET['seleccionado'];
	$sql = "DELETE FROM departamento WHERE Codigo_dep='$Codigo'";
	$result = mysqli_query($conexion, $sql);
	header('Location: Form_departamento.php');
?>