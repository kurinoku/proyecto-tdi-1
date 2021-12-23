<?php
require_once "_init.php";
authUser('admin');
require "conexion_p.php";
$rut = $_GET["seleccionado"];
$consulta = "SELECT * FROM administrador WHERE `Rut_administrador`='$rut'";
$resultado = mysqli_query($conexion, $consulta);
$row = mysqli_fetch_assoc($resultado);
$nombre = $row["Nombre_administrador"];
$numero = $row["Numero_administrador"];
$correo = $row["Correo_administrador"];
$clave = $row["Clave_administrador"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Administrador</title>
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
        <div class="container w-50 flex-lg-row">
            <!-- Formulario -->
            <div class="col-lg-12 col-md-12">
                <form action=<?php echoRutaComillas("Mantenedores/actualizar_administrador.php"); ?> method="post">
                    <fieldset>
                        <legend class="text-center pt-3">Formulario para editar un administrador</legend>
                        <div class="form-group row">
                            <div class="form-group">
                                <label>RUT</label>
                                <input name="Rut_administrador" type="text" class="form-control" placeholder="" value="<?php echo ($rut); ?>">
                            </div>
                            <div class="form-group mt-2">
                                <label>Nombre</label>
                                <input name="Nombre_administrador" type="text" class="form-control" placeholder="" value="<?php echo ($nombre); ?>">
                                <div class="invalid-feedback">El nombre ingresado no es válido</div>
                            </div>
                            <div class="form-group mt-2">
                                <label>Número de celular</label>
                                <input name="Numero_administrador" type="text" class="form-control" placeholder="" value="<?php echo ($numero); ?>">
                                <div class="invalid-feedback">El número ingresado no es válido</div>
                            </div>
                            <div class="form-group mt-2">
                                <label>E-mail</label>
                                <input name="Correo_administrador" type="email" class="form-control" placeholder="" value="<?php echo ($correo); ?>">
                                <div class="invalid-feedback">El correo ingresado no es válido</div>
                            </div>
                            <div class="form-group mt-2">
                                <label>Contraseña</label>
                                <input name="Clave_administrador" type="password" class="form-control" placeholder="" value="">
                                <div class="invalid-feedback">La contraseña debe contener entre 8 y 14 carácteres; Debe incluir al menos una mayúscula, una minúscula y un número</div>
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
