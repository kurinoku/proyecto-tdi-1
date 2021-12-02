
<?php 

require_once "conexion_p.php";
require('../auth_usuario.php');
$conn = $conexion;
$columns = array();
if (array_key_exists("Nombre_persona", $_POST) && $_POST['Nombre_persona'] != "") {
    $nombre = $_POST["Nombre_persona"];
    array_push($columns, "`Nombre_persona`='$nombre'");
}
if (array_key_exists("Numero_persona", $_POST) && $_POST['Numero_persona'] != "") {
    $numero = $_POST["Numero_persona"];
    array_push($columns, "`Numero_persona`='$numero'");
}
if (array_key_exists("Correo_persona", $_POST) && $_POST['Correo_persona'] != "") {
    $correo = $_POST["Correo_persona"];
    array_push($columns, "`Correo_persona`='$correo'");
}
if (array_key_exists("Clave_persona", $_POST) && $_POST['Clave_persona'] != "") {
    $clavePersona = $_POST["Clave_persona"];
    $clavePersona = md5($clavePersona);
    array_push($columns, "`Clave_persona`='$clavePersona'");
}
if (!empty($columns)) {
    $pk = $_SESSION['usuario'];
    $columns = implode(", ", $columns);
    $sql = "UPDATE persona SET $columns WHERE `Rut_persona`='$pk'";
    mysqli_query($conn, $sql);
}
header("Location: perfil_persona.php");
