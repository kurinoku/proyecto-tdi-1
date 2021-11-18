<?php
	require('conexion_p.php');
	$Codigo=$_POST['Codigo_dep'];
	$sql = "DELETE FROM departamento WHERE Codigo_dep='$Codigo'";
	$result = mysqli_query($conexion, $sql);
?>