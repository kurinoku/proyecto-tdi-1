<?php
require_once "_init.php";
require('conexion_p.php');
$Codigo = $_GET['seleccionado'];
$sql = "DELETE FROM departamento WHERE Codigo_dep='$Codigo'";
$result = mysqli_query($conexion, $sql);
sendLocationHeader('Mantenedores/Form_departamento.php');
