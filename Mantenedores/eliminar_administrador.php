<?php
require_once "_init.php";
require('conexion_p.php');
$Rut = $_GET['seleccionado'];
$sql = "DELETE FROM administrador WHERE Rut_administrador='$Rut'";
$result = mysqli_query($conexion, $sql);
sendLocationHeader('Mantenedores/Form_administrador.php');
