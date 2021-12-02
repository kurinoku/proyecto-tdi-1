<?php

require_once('./Mantenedores/conexion_p.php');
session_start();

if (isset($_SESSION['usuario'])) {
    header("Location: login_persona.php");
}

function tratarLoguear($usuario, $claveMd5, $tipo, $tabla, $rutColumna, $claveColumna) {
    global $conexion;
    $usuario = stripslashes($usuario);
    $usuario = mysqli_real_escape_string($conexion, $usuario);

    $sql = "SELECT * FROM `$tabla` WHERE `$rutColumna`='$usuario' and `$claveColumna`='$claveMd5' LIMIT 1";
    $result = mysqli_query($conexion, $sql);
    if (!$result) {
        return false;
    }

    $rows = mysqli_num_rows($result);

    if ($rows == 1) {
        $_SESSION['tipo'] = $tipo;
        $_SESSION['usuario'] = $usuario;
        return true;
    }
    return false;
}

$clave = $_POST["clave"];
$usuario = $_POST["usuario"];
$mensaje = array( "estado" => "error" );
if ($clave and $usuario and !($clave == "" or $usuario == "")) {
    $clave = md5($clave);
    $logueado = (
        tratarLoguear($usuario, $clave, 'admin', 'administrador', 'Rut_administrador', 'Clave_administrador')
        or tratarLoguear($usuario, $clave, 'encargado', 'encargado', 'Rut_encargado', 'Clave_encargado')
        or tratarLoguear($usuario, $clave, 'persona', 'persona', 'Rut_persona', 'Clave_persona')
    );
    
    if ($logueado) {
        $mensaje['estado'] = 'success';
    } else {
        $mensaje["razon"] = "Usuario o contraseña incorrecta";
    }
} else {
    $mensaje["razon"] = "Usuario o clave en blanco";
}

header('Content-type: application/json');
echo json_encode($mensaje);
exit(0);
