<?php 
require "conexion_p.php";
$rut = $_GET["seleccionado"];
$consulta = "SELECT * FROM ciudadano WHERE `Rut_persona`='$rut'";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body><?php require 'Navbar.html'; ?><div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <h4>Formulario para editar un persona</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <form action="actualizar_persona.php" method="post"><label class="form-label d-block">Rut Persona:</label>
                    <input name="Rut_persona" type="text" placeholder="" value="<?php echo ($rut); ?>">
                    <label class="form-label d-block">Id Municipalidad:</label>
                    <input name="Id_municipalidad" type="text" placeholder="" value="<?php echo ($idMunicipalidad); ?>">
                    <label class="form-label d-block">Nombre Persona:</label>
                    <input name="Nombre_persona" type="text" placeholder="" value="<?php echo ($nombre); ?>">
                    <label class="form-label d-block">Numero Persona:</label>
                    <input name="Numero_persona" type="text" placeholder="" value="<?php echo ($numero); ?>">
                    <label class="form-label d-block">Correo Persona:</label>
                    <input name="Correo_persona" type="text" placeholder="" value="<?php echo ($correo); ?>">
                    <label class="form-label d-block">Clave Persona:</label>
                    <input name="Clave_persona" type="password" placeholder="" value="<?php echo ($clavePersona); ?>">
                    <button type="submit" class="d-block mt-2">Guardar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>