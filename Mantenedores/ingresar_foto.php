<?php
require('conexion_p.php');
require('../auth_encargado.php');

$titulo = $_POST['Titulo'];
$ruta = $_POST['Ruta'];

$user = $_SESSION['usuario'];
$consulta = "SELECT Codigo_dep FROM departamento WHERE Rut_encargado = '$user'";
$resultado = mysqli_query($conexion, $consulta);
$row = mysqli_fetch_assoc($resultado);
$cod = $row['Codigo_dep'];

$sql = "INSERT INTO foto (Nombre_foto, Ruta_foto, Fecha, Codigo_dep) 
VALUES ('$titulo', 'img/galeria/$ruta.jpg', CURDATE(), '$cod')";
$result = mysqli_query($conexion, $sql);

header('Location: crear_foto.php');
