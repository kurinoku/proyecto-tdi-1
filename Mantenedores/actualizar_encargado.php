<?php
require_once "_init.php";
require_once "conexion_p.php";
$conn = $conexion;
$columns = array();
if (array_key_exists("Nombre_encargado", $_POST)) {
    $nombre = $_POST["Nombre_encargado"];
    array_push($columns, "`Nombre_encargado`='$nombre'");
}
if (array_key_exists("Numero_encargado", $_POST)) {
    $numero = $_POST["Numero_encargado"];
    array_push($columns, "`Numero_encargado`='$numero'");
}
if (array_key_exists("Correo_encargado", $_POST)) {
    $correo = $_POST["Correo_encargado"];
    array_push($columns, "`Correo_encargado`='$correo'");
}
if (array_key_exists("Clave_encargado", $_POST) and $_POST["Clave_encargado"] != "") {
    $clave = $_POST["Clave_encargado"];
    $clave = md5($clave);
    array_push($columns, "`Clave_encargado`='$clave'");
}
if (empty($columns)) {
    header("HTTP/1.1 400 Bad Request", true, 400);
    exit(0);
}
$pk = $_POST["Rut_encargado"];
$columns = implode(", ", $columns);
$sql = "UPDATE encargado SET $columns WHERE `Rut_encargado`='$pk'";
mysqli_query($conn, $sql);
sendLocationHeader("Mantenedores/Form_encargado.php");
