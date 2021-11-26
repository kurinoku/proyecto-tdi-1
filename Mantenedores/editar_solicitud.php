<?php 
require "conexion_p.php";
$codigo = $_GET["seleccionado"];
$consulta = "SELECT * FROM solicitud WHERE `Codigo`=$codigo";
$resultado = mysqli_query($conexion, $consulta);
$row = mysqli_fetch_assoc($resultado);
$codigoDep = $row["Codigo_dep"];
$rutPersona = $row["Rut_persona"];
$tipo = $row["Tipo_retroalimentacion"];
$descripcion = $row["Descripcion"];
$estado = $row["Estado_msg"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Solicitud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body><?php require 'Navbar.html'; ?><div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <h4>Formulario para editar un solicitud</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <form action="actualizar_solicitud.php" method="post"><label class="form-label d-block">Codigo:</label>
                    <input name="Codigo" type="text" placeholder="" value="<?php echo ($codigo); ?>">
                    <label class="form-label d-block">Codigo Dep:</label>
                    <input name="Codigo_dep" type="text" placeholder="" value="<?php echo ($codigoDep); ?>">
                    <label class="form-label d-block">Rut Persona:</label>
                    <input name="Rut_persona" type="text" placeholder="" value="<?php echo ($rutPersona); ?>">
                    <label class="form-label d-block">Tipo Retroalimentacion:</label>
                    <input name="Tipo_retroalimentacion" type="text" placeholder="" value="<?php echo ($tipo); ?>">
                    <label class="form-label d-block">Descripcion:</label>
                    <input name="Descripcion" type="text" placeholder="" value="<?php echo ($descripcion); ?>">
                    <label class="form-label d-block">Estado Msg:</label>
                    <input name="Estado_msg" type="text" placeholder="" value="<?php echo ($estado); ?>">
                    <button type="submit" class="d-block mt-2">Guardar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>