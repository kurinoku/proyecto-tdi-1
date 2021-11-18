<?php

require('conexion_p.php');

$Rut=$_POST['Rut_administrador'];
$Nombre=$_POST['Nombre_administrador'];
$Numero=$_POST['Numero_administrador'];
$Correo=$_POST['Correo_trabajo'];
$Clave=$_POST['Clave_ingreso'];


$sql = "INSERT INTO administrador VALUES ('$Rut', '$Nombre', '$Numero', '$Correo', '$Clave')";
$result = mysqli_query($conexion, $sql);

header('Location: Form_administrador.php');

?>