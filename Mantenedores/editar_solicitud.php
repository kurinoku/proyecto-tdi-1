<?php 
require_once "_init.php";
require "conexion_p.php";
$codigo = $_GET["seleccionado"];
$consulta = "SELECT * FROM solicitud WHERE `Codigo_solicitud`=$codigo";
$resultado = mysqli_query($conexion, $consulta);
$row = mysqli_fetch_assoc($resultado);
$codigoDep = $row["Codigo_dep"];
$rutPersona = $row["Rut_persona"];
$tipo = $row["Tipo_solicitud"];
$descripcion = $row["Descripcion_solicitud"];
$estado = $row["Estado_solicitud"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Solicitud</title>
    <?php
        bootstrapHead();
    ?>
</head>

<body><?php require 'Navbar.html'; ?><div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <h4>Formulario para editar un solicitud</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <form action=<?php echoRutaComillas("Mantenedores/actualizar_solicitud.php"); ?> method="post"><label class="form-label d-block">Codigo:</label>
                    <input name="Codigo_solicitud" type="text" placeholder="" value="<?php echo ($codigo); ?>">
                    <label class="form-label d-block">Codigo Dep:</label>
                    <input name="Codigo_dep" type="text" placeholder="" value="<?php echo ($codigoDep); ?>">
                    <label class="form-label d-block">Rut Persona:</label>
                    <input name="Rut_persona" type="text" placeholder="" value="<?php echo ($rutPersona); ?>">
                    <label class="form-label d-block">Tipo Retroalimentacion:</label>
                    <input name="Tipo_solicitud" type="text" placeholder="" value="<?php echo ($tipo); ?>">
                    <label class="form-label d-block">Descripcion:</label>
                    <input name="Descripcion_solicitud" type="text" placeholder="" value="<?php echo ($descripcion); ?>">
                    <label class="form-label d-block">Estado Msg:</label>
                    <input name="Estado_solicitud" type="text" placeholder="" value="<?php echo ($estado); ?>">
                    <button type="submit" class="d-block mt-2">Guardar</button>
                </form>
            </div>
        </div>
    </div>
    <?php
    bootstrapBody();
    echoScript('util/util.js');
    echoScript('validacion.js');
?>
<script>
    let valida = new ValidaPaginas();
    valida.magia();
</script>
</body>

</html>