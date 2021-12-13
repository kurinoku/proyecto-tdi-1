<?php 
require_once "_init.php";
authUser('admin');
require_once "conexion_p.php";
$conn = $conexion;
$columns = array();
if (array_key_exists("Nombre_administrador", $_POST) && $_POST['Nombre_administrador'] != "") {
    $nombre = $_POST["Nombre_administrador"];
    array_push($columns, "`Nombre_administrador`='$nombre'");
}
if (array_key_exists("Numero_administrador", $_POST) && $_POST['Numero_administrador'] != "") {
    $numero = $_POST["Numero_administrador"];
    array_push($columns, "`Numero_administrador`='$numero'");
}
if (array_key_exists("Correo_administrador", $_POST) && $_POST['Correo_administrador'] != "") {
    $correo = $_POST["Correo_administrador"];
    array_push($columns, "`Correo_administrador`='$correo'");
}
if (array_key_exists("Clave_administrador", $_POST) && $_POST['Clave_administrador'] != "") {
    $clavePersona = $_POST["Clave_administrador"];
    $clavePersona = md5($clavePersona);
    array_push($columns, "`Clave_administrador`='$clavePersona'");
}
if (!empty($columns)) {
    $pk = $_SESSION['usuario'];
    $columns = implode(", ", $columns);
    $sql = "UPDATE administrador SET $columns WHERE `Rut_administrador`='$pk'";
    mysqli_query($conn, $sql);
}
sendLocationHeader("Mantenedores/perfil_administrador.php");