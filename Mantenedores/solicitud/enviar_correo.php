<?php

require_once __DIR__ . "/../conexion_p.php" ;

const DIR_MAIL_PATH = __DIR__."/../../.MAIL";
$DIRECCION_MAIL = trim(file_get_contents(DIR_MAIL_PATH));

/*
    En carpeta donde se encuentra index.php, crear un archivo llamado .MAIL
    el cual su contenido tiene que ser la direccion de correo desde cual sale
    el mensaje que se envia, por ejemplo municipalidad@example.com
*/

function enviarCorreo($codigo, $extra='') {
    global $conexion, $DIRECCION_MAIL;
    $codigoEsc = mysqli_real_escape_string($conexion, stripslashes($codigo));
    echo $codigoEsc;
    $sql = "SELECT * FROM solicitud WHERE `Codigo_solicitud`='$codigoEsc';";
    $r = mysqli_query($conexion, $sql);
    $row = mysqli_fetch_assoc($r);
    if (!$row) {
        throw new Exception("solicitud no encontrada con Codigo '$codigo'.");
    }

    $tipo = $row['Tipo_solicitud'];
    $rut = $row['Rut_persona'];
    $estado = $row['Estado_solicitud'];
    $codigoDep = $row['Codigo_dep'];

    $codigoDepEsc = mysqli_real_escape_string($conexion, stripslashes($codigoDep));
    $sql = "SELECT * FROM departamento WHERE `Codigo_dep`='$codigoDepEsc';";
    $r = mysqli_query($conexion, $sql);

    $row = mysqli_fetch_assoc($r);
    if (!$row) {
        throw new Exception(
            "departamento no encontrada con Codigo_dep '$codigoDep'"
            . " supuestamente asociado a la solicitud con Codigo '$codigo'.");
    }

    $nombreDep = $row['Nombre_dep'];

    $rutEsc = mysqli_real_escape_string($conexion, stripslashes($rut));
    $sql = "SELECT * FROM persona WHERE `Rut_persona`='$rutEsc';";
    $r = mysqli_query($conexion, $sql);

    $row = mysqli_fetch_assoc($r);
    if (!$row) {
        throw new Exception(
            "persona no encontrada con Rut_persona '$rut'"
            . " supuestamente asociado a la solicitud con Codigo '$codigo'.");
    }

    $nombre = $row['Nombre_persona'];
    $email = $row['Correo_persona'];

    if (!isset($extra)) {
        $extra = "";
    }

    /* 
    puede que el mensaje no se vea muy bonito, pero segun la documentación
    el máximo de tamano de una linea en un mensaje es de 70 caracteres,
    y hacerlo de forma mas avanzada no vale la pena
    */

    $mensaje = "Estimado señor(a) $nombre:\r\n"
             . "Le enviamos este correo para comunicarle que su $tipo\r\n"
             . "para el departamento $nombreDep\r\n"
             . "ha cambiado de estado a $estado.\r\n"
             . "$extra"
             . "Atentamente,\r\n"
             . "  Municipalidad de Concepción\r\n";
    $to = $email;
    $headers = "From: $DIRECCION_MAIL\r\n"
             . "Reply-To: $DIRECCION_MAIL\r\n"
             . "X-Mailer: PHP/" . phpversion() . "\r\n";
    
    $subject = "Noticias sobre su $tipo";

    $enviado = mail($to, $subject, $mensaje, $headers);

    if (!$enviado) {
        throw new Exception("Mensaje no fue aceptado para envio, para solicitud '$codigo'.");
    }
}