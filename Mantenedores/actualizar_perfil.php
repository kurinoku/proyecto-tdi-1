<?php 

require('conexion_p.php');
require('../auth_usuario.php');

$user = $_SESSION['usuario'];
$rut=$_POST['rut'];
$nombre=$_POST['nombre'];
$numero=$_POST['numero'];
$correo=$_POST['correo'];
$clave=md5($_POST['clave']);
$sql = "UPDATE persona SET Rut_persona = '$rut', Nombre_persona = '$nombre', Numero_persona = '$numero', Correo_persona = '$correo', Clave_persona = '$clave' WHERE Rut_persona = '$user'";
$result = mysqli_query($conexion, $sql);
$_SESSION['usuario'] = $rut;
header('Location: perfil_persona.php');
?>