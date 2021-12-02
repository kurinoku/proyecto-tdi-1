<?php 
require "conexion_p.php";
require('../auth_admin.php');
$codigo = $_GET["seleccionado"];
$consulta = "SELECT * FROM departamento WHERE `Codigo_dep`='$codigo'";
$resultado = mysqli_query($conexion, $consulta);
$row = mysqli_fetch_assoc($resultado);
$idMunicipalidad = $row["Id_municipalidad"];
$rutEncargado = $row["Rut_encargado"];
$nombre = $row["Nombre_dep"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Departamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="d-flex flex-column min-vh-100">
<div class="container-fluid">
    <?php
    require('Navbar_administrador.html');
    ?>
    <!-- Contenedor del Formulario y la Tabla -->
    <div class="row flex-lg-row">
        <!-- Formulario -->
        <div class="col-lg-6 col-md-12">
            <form action="actualizar_departamento.php" method="post">
                <fieldset>
                    <legend class="text-center pt-3">Formulario para editar un Departamento</legend>
                    <div class="form-group row">
                        <div class="form-group">
                            <label>Codigo del departamento</label>
                            <input name="Codigo_dep" type="text" class="form-control" placeholder="" value="<?php echo ($codigo); ?>">
                        </div>
                        <div class="form-group mt-2">
                            <label>Id municipalidad</label>
                            <input name="Id_municipalidad" type="text" class="form-control" placeholder="" value="<?php echo ($idMunicipalidad); ?>">
                        </div>
                        <div class="form-group mt-2">
                            <label>Rut encargado</label>
                            <input name="Rut_encargado" type="text" class="form-control" placeholder="" value="<?php echo ($rutEncargado); ?>">
                        </div>
                        <div class="form-group mt-2">
                            <label>Nombre departamento:</label>
                            <input name="Nombre_dep" type="text" class="form-control" placeholder="" value="<?php echo ($nombre); ?>">
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

