<?php 

require_once "conexion_p.php";
require('../auth_encargado.php');
$conn = $conexion;
$columns = array();
if (array_key_exists("Nombre_encargado", $_POST) && $_POST['Nombre_encargado'] != "") {
    $nombre = $_POST["Nombre_encargado"];
    array_push($columns, "`Nombre_encargado`='$nombre'");
}
if (array_key_exists("Numero_encargado", $_POST) && $_POST['Numero_encargado'] != "") {
    $numero = $_POST["Numero_encargado"];
    array_push($columns, "`Numero_encargado`='$numero'");
}
if (array_key_exists("Correo_encargado", $_POST) && $_POST['Correo_encargado'] != "") {
    $correo = $_POST["Correo_encargado"];
    array_push($columns, "`Correo_encargado`='$correo'");
}
if (array_key_exists("Clave_encargado", $_POST) && $_POST['Clave_encargado'] != "") {
    $clavePersona = $_POST["Clave_encargado"];
    $clavePersona = md5($clavePersona);
    array_push($columns, "`Clave_encargado`='$clavePersona'");
}
if (!empty($columns)) {
    $pk = $_SESSION['usuario'];
    $columns = implode(", ", $columns);
    $sql = "UPDATE encargado SET $columns WHERE `Rut_encargado`='$pk'";
    mysqli_query($conn, $sql);
}
header("Location: perfil_encargado.php");