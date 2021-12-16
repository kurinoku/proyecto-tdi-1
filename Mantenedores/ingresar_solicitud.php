<?php
require_once "_init.php";
authUser('persona');
require('conexion_p.php');
$Codigo=$_POST['departamento'];
$Rut= $_SESSION['usuario'];
$Tipo=$_POST['retroalimentacion'];
$Descripcion=$_POST['Descripcion_solicitud'];
$sql = "INSERT INTO solicitud (Codigo_dep, Rut_persona, Tipo_solicitud, Descripcion_solicitud, Estado_solicitud) VALUES ('$Codigo', '$Rut', '$Tipo', '$Descripcion', 'Nuevo')";
$result = mysqli_query($conexion, $sql);
sendLocationHeader("Mantenedores/Form_solicitud.php");