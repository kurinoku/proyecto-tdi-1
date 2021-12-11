<?php
require_once 'conexion_p.php';
require_once 'solicitud/enviar_correo.php';


// modificado de https://stackoverflow.com/a/16296170
// necesario para enviar el mensaje y el correo
// debido a que el codigo del correo puede tardar mucho tiempo
// se debe enviar la respuesta antes de tratar de enviar el correo
function enviarYCerrarOutput($stringToOutput){   
    set_time_limit(0);
    ignore_user_abort(true);
    header('content-type: application/json;charset=UTF-8');
    header("Connection: close\r\n");
    ob_start();          
    echo $stringToOutput;   
    $size = ob_get_length();   
    header("Content-Length: $size",TRUE);  
    ob_end_flush();
    ob_flush();
    flush();   
} 

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
        $esUltimoEstado = $i + 1 >= count($estados);
        if (!$esUltimoEstado) {
            $nuevoEstado = $estados[$i + 1];
            $sql = "UPDATE solicitud SET Estado_solicitud = '$nuevoEstado' WHERE Codigo_solicitud=$codigo";
            $result = mysqli_query($conexion, $sql);
        }

        $payload = array(
            "estado" => $nuevoEstado
        );

        enviarYCerrarOutput(json_encode($payload));

        if (!$esUltimoEstado) {
            enviarCorreo($codigo);
        }

        exit(0);

    } else {

        $codigo = $_POST['codigo'];
        $sql = "SELECT Estado_solicitud FROM solicitud WHERE Codigo_solicitud=$codigo";
        $result = mysqli_query($conexion, $sql);
        $row = mysqli_fetch_assoc($result);

        $payload = array(
            "estado" => $row['Estado_solicitud']
        );
        enviarYCerrarOutput(json_encode($payload));

        exit(0);
    }
}