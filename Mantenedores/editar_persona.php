<?php 
require_once "_init.php";
authUser('admin');
require "conexion_p.php";
$rut = $_GET["seleccionado"];
$consulta = "SELECT * FROM persona WHERE `Rut_persona`='$rut'";
$resultado = mysqli_query($conexion, $consulta);
$row = mysqli_fetch_assoc($resultado);
$idMunicipalidad = $row["Id_municipalidad"];
$nombre = $row["Nombre_persona"];
$numero = $row["Numero_persona"];
$correo = $row["Correo_persona"];
$clavePersona = $row["Clave_persona"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Persona</title>
    <?php
        bootstrapHead();
    ?>
</head>

<body class="d-flex flex-column min-vh-100">
<div class="container-fluid">
    <!-- Barra de navegación -->
    <?php
    require_once "Navbar_administrador.php";
    ?>
    <!-- Contenedor del Formulario-->
    <div class="row flex-lg-row">
        <!-- Formulario -->
        <div class="col-lg-6 col-md-12">
            <form action=<?php echoRutaComillas("Mantenedores/actualizar_persona.php"); ?> method="post">
                <fieldset>
                    <legend class="text-center pt-3">Formulario para editar una persona</legend>
                    <div class="form-group row">
                        <div class="form-group">
                            <label>RUT Persona</label>
                            <input name="Rut_persona" type="text" class="form-control" placeholder="" value="<?php echo ($rut); ?>">
                        </div>
                        <div class="form-group mt-2">
                            <label>Id municipalidad</label>
                            <input name="Id_municipalidad" type="text" class="form-control" placeholder="" value="<?php echo ($idMunicipalidad); ?>">
                        </div>
                        <div class="form-group mt-2">
                            <label>Nombre de la Persona</label>
                            <input name="Nombre_persona" type="text" class="form-control" placeholder="" value="<?php echo ($nombre); ?>">
                        </div>
                        <div class="form-group mt-2">
                            <label>Número</label>
                            <input name="Numero_persona" type="text" class="form-control" placeholder="" value="<?php echo ($numero); ?>">
                        </div>
                        <div class="form-group">
                            <label>Correo</label>
                            <input name="Correo_persona" type="email" class="form-control" placeholder="" value="<?php echo ($correo); ?>">
                        </div>
                        <div class="form-group">
                            <label>Clave</label>
                            <input name="Clave_persona" type="password" class="form-control" placeholder="" value="">
                        </div>
                </fieldset>
                <div class="text-center pb-1">
                    <button type="submit" class="btn btn-primary mt-2">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require('bottom_form_editar.php');