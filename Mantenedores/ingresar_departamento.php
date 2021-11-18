<?php

require('conexion_p.php');

$Codigo=$_POST['Codigo_dep'];
$Id=$_POST['Id_municipalidad'];
$Rut=$_POST['Rut_administrador'];
$Nombre=$_POST['Nombre_dep'];
$Encargado=$_POST['Encargado_departamento'];


$sql = "INSERT INTO departamento VALUES ('$Codigo', '$Id', '$Rut', '$Nombre', '$Encargado')";
$result = mysqli_query($conexion, $sql);

header('Location: Form_departamento.php');

?>