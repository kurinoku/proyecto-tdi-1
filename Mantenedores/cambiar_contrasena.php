<?php 
include 'conexion_p.php';

$email = $_POST['email'];
$contrasena = $_POST['password'];

$contrasena_mod = md5($_POST['password']);

$consulta = "UPDATE persona SET Clave_persona='$contrasena_mod' WHERE Correo_persona='$email'";
$conexion->query($consulta);
header("Location: ../login_persona.php");
