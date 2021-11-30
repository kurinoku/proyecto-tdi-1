<?php
require('conexion_p.php');
$Codigo=$_POST['Codigo_dep'];
$Rut=$_POST['Rut_persona'];
$Tipo=$_POST['Tipo_solicitud'];
$Descripcion=$_POST['Descripcion_solicitud'];
$Estado=$_POST['Estado_solicitud'];
$sql = "INSERT INTO solicitud (Codigo_dep, Rut_persona, Tipo_solicitud, Descripcion_solicitud, Estado_solicitud) VALUES ('$Codigo', '$Rut', '$Tipo', '$Descripcion', '$Estado')";
$result = mysqli_query($conexion, $sql);
header('Location: Form_solicitud.php');
?>