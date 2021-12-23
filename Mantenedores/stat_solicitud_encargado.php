<?php

require_once 'conexion_p.php';
require_once '_init.php';
authUser('encargado');
session_start();
$usuario = $_SESSION['usuario'];
error_log("usuario: $usuario");
$sql = "SELECT solicitud.Tipo_solicitud, COUNT(*) AS cantidad FROM solicitud "
. "JOIN departamento ON solicitud.Codigo_dep=departamento.Codigo_dep "
. "JOIN encargado ON departamento.Rut_encargado=encargado.Rut_encargado "
. "WHERE encargado.Rut_encargado='$usuario' "
. "GROUP BY solicitud.Tipo_solicitud";


$resultado = mysqli_query($conexion, $sql);

$ret = array();


while ($row = mysqli_fetch_assoc($resultado)) {
    $tipo = $row["Tipo_solicitud"];
    $ret[$tipo] = $row["cantidad"];
}


header("content-type: application/json");
echo json_encode($ret, JSON_NUMERIC_CHECK);
