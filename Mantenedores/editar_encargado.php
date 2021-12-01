<?php 
require "conexion_p.php";
$rut = $_GET["seleccionado"];
$consulta = "SELECT * FROM encargado WHERE `Rut_encargado`='$rut'";
$resultado = mysqli_query($conexion, $consulta);
$row = mysqli_fetch_assoc($resultado);
$nombre = $row["Nombre_encargado"];
$numero = $row["Numero_encargado"];
$correo = $row["Correo_encargado"];
$clave = $row["Clave_encargado"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Encargado</title>
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
            <form action="actualizar_encargado.php" method="post">
                <fieldset>
                    <legend class="text-center pt-3">Formulario para editar un encargado</legend>
                    <div class="form-group row">
                        <div class="form-group">
                            <label>RUT</label>
                            <input name="Rut_encargado" type="text" class="form-control" placeholder="" value="<?php echo ($rut); ?>">
                        </div>
                        <div class="form-group mt-2">
                            <label>Nombre</label>
                            <input name="Nombre_encargado" type="text" class="form-control" placeholder="" value="<?php echo ($nombre); ?>">
                        </div>
                        <div class="form-group mt-2">
                            <label>Número de celular</label>
                            <input name="Numero_encargado" type="text" class="form-control" placeholder="" value="<?php echo ($numero); ?>">
                        </div>
                        <div class="form-group mt-2">
                            <label>E-mail</label>
                            <input name="Correo_encargado" type="email" class="form-control" placeholder="" value="<?php echo ($correo); ?>">
                        </div>
                        <div class="form-group mt-2">
                            <label>Contraseña</label>
                            <input name="Clave_encargado" type="password" class="form-control" placeholder="" value="<?php echo ($clave); ?>">
                </fieldset>
                <div class="text-center pb-1">
                    <button type="submit" class="btn btn-primary mt-2">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require('bottom_form.php');
?>