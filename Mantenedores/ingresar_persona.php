<?php
require('conexion_p.php');
$rut=$_POST['Rut_persona'];
$municipalidad=$_POST['Id_municipalidad'];
$nombre=$_POST['Nombre_persona'];
$numero=$_POST['Numero_persona'];
$correo=$_POST['Correo_persona'];
$clave=$_POST['Clave_persona'];
$sql = "INSERT INTO ciudadano (Rut_persona, Id_municipalidad, Nombre_persona, Numero_persona, Correo_persona, Clave_persona) VALUES ('$rut', '$municipalidad', '$nombre', '$numero', '$correo', '$clave')";
$result = mysqli_query($conexion, $sql);
header('Location: Form_persona.php');
?>