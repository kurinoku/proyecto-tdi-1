<?php

require('conexion_p.php');

$Codigo=$_POST['Codigo_dep'];
$Rut=$_POST['Rut_persona'];
$Tipo=$_POST['Tipo_retroalimentacion'];
$Descripcion=$_POST['Descripcion'];
$Estado=$_POST['Estado_msg'];


$sql = "INSERT INTO solicitud (Codigo_dep, Rut_persona, Tipo_retroalimentacion, Descripcion, Estado_msg) VALUES ('$Codigo', '$Rut', '$Tipo', '$Descripcion', '$Estado')";
$result = mysqli_query($conexion, $sql);

header('Location: Form_solicitud.php');

?>