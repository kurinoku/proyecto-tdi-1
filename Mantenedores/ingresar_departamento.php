<?php
require_once "_init.php";
require('conexion_p.php');
$Codigo = $_POST['Codigo_dep'];
$Id = $_POST['Id_municipalidad'];
$Rut = $_POST['Rut_encargado'];
$Nombre = $_POST['Nombre_dep'];
$sql = "INSERT INTO departamento VALUES ('$Codigo', '$Id', '$Rut', '$Nombre')";
$result = mysqli_query($conexion, $sql);
sendLocationHeader("Mantenedores/Form_departamento.php");