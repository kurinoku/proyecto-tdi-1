<?php
require_once 'conexion_p.php';
require_once('../auth_admin.php');

function obtenerStatsAnualSolicitud($columna, $alias) {
    global $conexion;
    $sql = "SELECT MONTH(`Creada_solicitud`) AS `mes`, `$columna` AS `$alias`, COUNT(*) AS `cantidad` FROM solicitud 
    WHERE YEAR(`Creada_solicitud`) = YEAR(CURDATE()) 
    GROUP BY `mes`, `$alias`";
    $resultado = mysqli_query($conexion, $sql);

    $ret = array();

    while ($row = mysqli_fetch_assoc($resultado)) {
        array_push($ret, $row);
    }

    return $ret;
}

$porEstado = obtenerStatsAnualSolicitud('Estado_solicitud', 'estado');
$porTipo =  obtenerStatsAnualSolicitud('Tipo_solicitud', 'tipo');

header("content-type: application/json");
echo json_encode(array(
    'por_estado' => $porEstado,
    'por_tipo' => $porTipo
), JSON_NUMERIC_CHECK);
