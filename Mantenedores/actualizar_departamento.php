<?php
require_once "conexion_p.php";
$conn = $conexion;
$columns = array();
if (array_key_exists("Id_municipalidad", $_POST)) {
    $idMunicipalidad = $_POST["Id_municipalidad"];
    array_push($columns, "`Id_municipalidad`='$idMunicipalidad'");
}
if (array_key_exists("Rut_administrador", $_POST)) {
    $rutAdministrador = $_POST["Rut_administrador"];
    array_push($columns, "`Rut_administrador`='$rutAdministrador'");
}
if (array_key_exists("Nombre_dep", $_POST)) {
    $nombre = $_POST["Nombre_dep"];
    array_push($columns, "`Nombre_dep`='$nombre'");
}
if (array_key_exists("Encargado_departamento", $_POST)) {
    $encargado = $_POST["Encargado_departamento"];
    array_push($columns, "`Encargado_departamento`='$encargado'");
}
if (empty($columns)) {
    header("HTTP/1.1 400 Bad Request", true, 400);
    exit(0);
}
$pk = $_POST["Codigo_dep"];
$columns = implode(", ", $columns);
$sql = "UPDATE departamento SET $columns WHERE `Codigo_dep`='$pk'";
mysqli_query($conn, $sql);
