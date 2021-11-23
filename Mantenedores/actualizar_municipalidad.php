<?php
require_once "conexion_p.php";
$conn = $conexion;
$columns = array();
if (array_key_exists("Nombre_municipalidad", $_POST)) {
    $nombre = $_POST["Nombre_municipalidad"];
    array_push($columns, "`Nombre_municipalidad`='$nombre'");
}
if (array_key_exists("Direccion_municipalidad", $_POST)) {
    $direccion = $_POST["Direccion_municipalidad"];
    array_push($columns, "`Direccion_municipalidad`='$direccion'");
}
if (array_key_exists("Numero_municipalidad", $_POST)) {
    $numero = $_POST["Numero_municipalidad"];
    array_push($columns, "`Numero_municipalidad`='$numero'");
}
if (empty($columns)) {
    header("HTTP/1.1 400 Bad Request", true, 400);
    exit(0);
}
$pk = $_POST["Id_municipalidad"];
$columns = implode(", ", $columns);
$sql = "UPDATE municipalidad SET $columns WHERE `Id_municipalidad`='$pk'";
mysqli_query($conn, $sql);
