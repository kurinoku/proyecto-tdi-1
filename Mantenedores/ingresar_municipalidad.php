<?php
require('conexion_p.php');
$id=$_POST['Id_municipalidad'];
$nombre=$_POST['Nombre_municipalidad'];
$direccion=$_POST['Direccion_municipalidad'];
$numero=$_POST['Numero_municipalidad'];
$sql = "INSERT INTO municipalidad VALUES ('$id', '$nombre', '$direccion', '$numero')";
$result = mysqli_query($conexion, $sql);
header('Location: Form_municipalidad.php');
?>