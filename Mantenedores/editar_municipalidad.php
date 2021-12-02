<?php 
require "conexion_p.php";
require('../auth_admin.php');
$id = $_GET["seleccionado"];
$consulta = "SELECT * FROM municipalidad WHERE `Id_municipalidad`='$id'";
$resultado = mysqli_query($conexion, $consulta);
$row = mysqli_fetch_assoc($resultado);
$nombre = $row["Nombre_municipalidad"];
$Rut = $row['Rut_administrador'];
$direccion = $row["Direccion_municipalidad"];
$numero = $row["Numero_municipalidad"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Municipalidad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="d-flex flex-column min-vh-100">
<div class="container-fluid">
    <!-- Barra de navegación -->
    <?php
    require('Navbar_administrador.html');
    ?>
    <!-- Contenedor del Formulario y la Tabla -->
    <div class="row flex-lg-row">
        <!-- Formulario -->
        <div class="col-lg-6 col-md-12">
            <form action="actualizar_municipalidad.php" method="post">
                <fieldset>
                    <legend class="text-center pt-3">Formulario para editar una municipalidad</legend>
                    <div class="form-group row">
                        <div class="form-group">
                            <label>Id municipalidad</label>
                            <input name="Id_municipalidad" type="text" class="form-control" placeholder="" value="<?php echo ($id); ?>">
                        </div>
                        <div class="form-group mt-2">
                            <label>Nombre municipalidad</label>
                            <input name="Nombre_municipalidad" type="text" class="form-control" placeholder="" value="<?php echo ($nombre); ?>">
                        </div>
                        <div class="form-group mt-2">
                            <label>Rut Administrador</label>
                            <input name="Rut_administrador" type="text" class="form-control" placeholder="" value="<?php echo ($Rut); ?>">
                        </div>
                        <div class="form-group mt-2">
                            <label>Direccion municipalidad</label>
                            <input name="Direccion_municipalidad" type="text" class="form-control" placeholder="" value="<?php echo ($direccion); ?>">
                        </div>
                        <div class="form-group mt-2">
                            <label>Numero municipalidad:</label>
                            <input name="Numero_municipalidad" type="text" class="form-control" placeholder="" value="<?php echo ($numero); ?>">
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