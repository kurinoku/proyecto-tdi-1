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
if (array_key_exists("Correo_trabajo", $_POST)) {
    $correo = $_POST["Correo_trabajo"];
    array_push($columns, "`Correo_trabajo`='$correo'");
}
if (array_key_exists("Clave_ingreso", $_POST)) {
    $clave = $_POST["Clave_ingreso"];
    array_push($columns, "`Clave_ingreso`='$clave'");
}
if (empty($columns)) {
    header("HTTP/1.1 400 Bad Request", true, 400);
    exit(0);
}
$pk = $_POST["Rut_administrador"];
$columns = implode(", ", $columns);
$sql = "UPDATE administrador SET $columns WHERE `Rut_administrador`='$pk'";
mysqli_query($conn, $sql);
