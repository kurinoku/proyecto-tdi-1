<?php
require_once "_init.php";
authUser('admin');
require "conexion_p.php";
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
        <!-- Contenedor del Formulario y la Tabla -->
        <div class="container w-50 flex-lg-row w-50">
            <!-- Formulario -->
            <div class="col-lg-12 col-md-12">
                <form action=<?php echoRutaComillas("Mantenedores/actualizar_municipalidad.php"); ?> method="post">
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
