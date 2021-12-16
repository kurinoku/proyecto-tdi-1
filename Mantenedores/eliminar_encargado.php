<?php
require_once "_init.php";
require('conexion_p.php');
$Rut = $_GET['seleccionado'];
$sql = "DELETE FROM encargado WHERE Rut_encargado='$Rut'";
$result = mysqli_query($conexion, $sql);
sendLocationHeader('Mantenedores/Form_encargado.php');
