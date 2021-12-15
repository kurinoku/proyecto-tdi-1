<?php
require('conexion_p.php');
require('../auth_encargado.php');

$titulo=$_POST['Titulo'];
$Foto1=$_POST['Foto1'];
$Cuerpo=$_POST['Cuerpo'];
$Foto2=$_POST['Foto2'];

$user = $_SESSION['usuario'];
$consulta = "SELECT Codigo_dep FROM departamento WHERE Rut_encargado = '$user'";
$resultado = mysqli_query($conexion, $consulta);
$row = mysqli_fetch_assoc($resultado);
$cod = $row['Codigo_dep'];

$sql = "INSERT INTO noticia (Nombre_noticia, Cuerpo_noticia, Ruta_portada, Ruta_foto, Fecha, Codigo_dep) 
VALUES ('$titulo', '$Cuerpo', 'img/noticias/$Foto1', 'img/noticias/$Foto2', CURDATE(), '$cod')";
$result = mysqli_query($conexion, $sql);

// $consulta2 = "SELECT * FROM noticia WHERE Codigo_dep = '$cod' AND Nombre_noticia = '$titulo' ";
// $resultado2 = mysqli_query($conexion, $consulta2);
// $row2 = mysqli_fetch_assoc($resultado2);
// $idnot = $row2['Id_noticia'];


// $sql = "INSERT INTO foto (Id_noticia, Nombre_foto, Portada) VALUES ('$idnot', '$Foto2', 0)";
// $result = mysqli_query($conexion, $sql);
// $sql = "INSERT INTO foto (Id_noticia, Nombre_foto, Portada) VALUES ('$idnot', '$Foto1', 1)";
// $result = mysqli_query($conexion, $sql);

// header('Location: crear_noticia.php');