<?php
include 'conexion_p.php';

$email = $_POST["email"];
$bytes = random_bytes(5);
$token = bin2hex($bytes);

$existe = 0;
$consulta1 = "SELECT * FROM persona WHERE Correo_persona='$email'";
$resultado = $conexion->query($consulta1);

$row = $resultado->fetch_assoc();

if (isset($row["Correo_persona"])) {
    $existe = 1;
    include 'enviar_codigo_rest_contrasena.php';
    $consulta2 = "INSERT INTO restablecer_contrasenas(email,token,codigo) VALUES ('$email','$token','$codigo')";
    $conexion->query($consulta2) or die($conexion->error);
    header("Location:form_restablecer_contrasena.php?existe=$existe");
} else {
    $existe = 0;
    header("Location:form_restablecer_contrasena.php?existe=$existe");
}
