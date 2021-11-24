<?php

require_once('./Mantenedores/conexion_p.php');

$esLoginPersona = !array_key_exists("adminLogin", $_POST);

$clave = $_POST["clave"];
$usuario = $_POST["usuario"];
$mensaje = array( "estado" => "error" );
if ($clave and $usuario and !($clave == "" or $usuario == "")) {
    if ($esLoginPersona)
    {
        $dest = "index.php"; // la idea es que vaya a la pagina principal para personas
        $sql = "SELECT `Clave_persona` FROM ciudadano WHERE `Rut_persona`='$usuario'";
    } else {
        $dest = "Mantenedores/index_administrador.php"; // idem, tiene que ser cambiado despues
        $sql = "SELECT `Clave_ingreso` FROM administrador WHERE `Rut_administrador`='$usuario'";
    }
    
    $result = mysqli_query($conexion, $sql);
    if ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
        $claveObtenida = $row[0];
        if (strcmp($claveObtenida, $clave) == 0) {
            $mensaje["estado"] = "success";
            $mensaje["location"] = $dest;
        } else {
            $mensaje["razon"] = "Clave no coincide";
        }
    } else {
        $mensaje["razon"] = "Usuario no encontrado";
    }
} else {
    $mensaje["razon"] = "Usuario o clave en blanco";
}

header('Content-type: application/json');
echo json_encode($mensaje);
exit(0);
