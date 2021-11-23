<?php
require_once "conexion_p.php";
$conn = $conexion;
$columns = array();
if (array_key_exists("Id_municipalidad", $_POST)) {
    $idMunicipalidad = $_POST["Id_municipalidad"];
    array_push($columns, "`Id_municipalidad`='$idMunicipalidad'");
}
if (array_key_exists("Nombre_persona", $_POST)) {
    $nombre = $_POST["Nombre_persona"];
    array_push($columns, "`Nombre_persona`='$nombre'");
}
if (array_key_exists("Numero_persona", $_POST)) {
    $numero = $_POST["Numero_persona"];
    array_push($columns, "`Numero_persona`='$numero'");
}
if (array_key_exists("Correo_persona", $_POST)) {
    $correo = $_POST["Correo_persona"];
    array_push($columns, "`Correo_persona`='$correo'");
}
if (array_key_exists("Clave_persona", $_POST)) {
    $clavePersona = $_POST["Clave_persona"];
    array_push($columns, "`Clave_persona`='$clavePersona'");
}
if (empty($columns)) {
    header("HTTP/1.1 400 Bad Request", true, 400);
    exit(0);
}
$pk = $_POST["Rut_persona"];
$columns = implode(", ", $columns);
$sql = "UPDATE persona SET $columns WHERE `Rut_persona`='$pk'";
mysqli_query($conn, $sql);
