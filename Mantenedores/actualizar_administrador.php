<?php
require_once "conexion_p.php";
$conn = $conexion;
$columns = array();
if (array_key_exists("Nombre_administrador", $_POST)) {
    $nombre = $_POST["Nombre_administrador"];
    array_push($columns, "`Nombre_administrador`='$nombre'");
}
if (array_key_exists("Numero_administrador", $_POST)) {
    $numero = $_POST["Numero_administrador"];
    array_push($columns, "`Numero_administrador`='$numero'");
}
if (array_key_exists("Correo_administrador", $_POST)) {
    $correo = $_POST["Correo_administrador"];
    array_push($columns, "`Correo_administrador`='$correo'");
}
if (array_key_exists("Clave_administrador", $_POST)) {
    $clave = $_POST["Clave_administrador"];
    $clave = md5($clave);
    array_push($columns, "`Clave_administrador`='$clave'");
}
if (empty($columns)) {
    header("HTTP/1.1 400 Bad Request", true, 400);
    exit(0);
}
$pk = $_POST["Rut_administrador"];
$columns = implode(", ", $columns);
$sql = "UPDATE administrador SET $columns WHERE `Rut_administrador`='$pk'";
mysqli_query($conn, $sql);
header("Location: Form_administrador.php");
