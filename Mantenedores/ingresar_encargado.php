<?php
require('conexion_p.php');
$Rut=$_POST['Rut_encargado'];
$Nombre=$_POST['Nombre_encargado'];
$Numero=$_POST['Numero_encargado'];
$Correo=$_POST['Correo_encargado'];
$Clave=$_POST['Clave_encargado'];
$sql = "INSERT INTO encargado VALUES ('$Rut', '$Nombre', '$Numero', '$Correo', '$Clave')";
$result = mysqli_query($conexion, $sql);
header('Location: Form_encargado.php');
?>