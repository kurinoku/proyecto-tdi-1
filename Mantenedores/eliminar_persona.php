<?php
require_once "_init.php";
require('conexion_p.php');
$Rut = $_GET['seleccionado'];
$sql = "DELETE FROM persona WHERE Rut_persona='$Rut'";
$result = mysqli_query($conexion, $sql);
sendLocationHeader('Mantenedores/Form_persona.php');
