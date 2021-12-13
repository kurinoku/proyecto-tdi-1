<?php
require_once "_init.php";
require('conexion_p.php');
$Rut=$_POST['Rut_administrador'];
$Nombre=$_POST['Nombre_administrador'];
$Numero=$_POST['Numero_administrador'];
$Correo=$_POST['Correo_administrador'];
$Clave=md5($_POST['Clave_administrador']);
$sql = "INSERT INTO administrador VALUES ('$Rut', '$Nombre', '$Numero', '$Correo', '$Clave')";
$result = mysqli_query($conexion, $sql);
sendLocationHeader("Mantenedores/Form_administrador.php");