<?php
require_once 'conexion_p.php';
require_once 'solicitud/enviar_correo.php';

header('content-type: application/json;charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo'];
    if(isset($_POST['siguienteEstado'])) {
        $sql = "SELECT Estado_solicitud FROM solicitud WHERE Codigo_solicitud=$codigo";
        $result = mysqli_query($conexion, $sql);
        $row = mysqli_fetch_assoc($result);
        $estado = $row['Estado_solicitud'];

        $estados = array('Nuevo', 'Visto', 'Procesando', 'Resuelto');

        $i = array_search($estado, $estados);

        $nuevoEstado = $estado;
        if ($i + 1 < count($estados)) {
            $nuevoEstado = $estados[$i + 1];
            enviarCorreo($codigo);
        }

        $sql = "UPDATE solicitud SET Estado_solicitud = '$nuevoEstado' WHERE Codigo_solicitud=$codigo";
        $result = mysqli_query($conexion, $sql);

        echo json_encode(array(
            "estado" => $nuevoEstado
        ));
        exit(0);

    } else {

        $codigo = $_POST['codigo'];
        $sql = "SELECT Estado_solicitud FROM solicitud WHERE Codigo_solicitud=$codigo";
        $result = mysqli_query($conexion, $sql);
        $row = mysqli_fetch_assoc($result);

        echo json_encode(array(
            "estado" => $row['Estado_solicitud']
        ));

        exit(0);
    }
}