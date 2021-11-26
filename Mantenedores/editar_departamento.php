<?php 
require "conexion_p.php";
$codigo = $_GET["seleccionado"];
$consulta = "SELECT * FROM departamento WHERE `Codigo_dep`='$codigo'";
$resultado = mysqli_query($conexion, $consulta);
$row = mysqli_fetch_assoc($resultado);
$idMunicipalidad = $row["Id_municipalidad"];
$rutAdministrador = $row["Rut_administrador"];
$nombre = $row["Nombre_dep"];
$encargado = $row["Encargado_departamento"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Departamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body><?php require 'Navbar.html'; ?><div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <h4>Formulario para editar un departamento</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <form action="actualizar_departamento.php" method="post"><label class="form-label d-block">Codigo Dep:</label>
                    <input name="Codigo_dep" type="text" placeholder="" value="<?php echo ($codigo); ?>">
                    <label class="form-label d-block">Id Municipalidad:</label>
                    <input name="Id_municipalidad" type="text" placeholder="" value="<?php echo ($idMunicipalidad); ?>">
                    <label class="form-label d-block">Rut Administrador:</label>
                    <input name="Rut_administrador" type="text" placeholder="" value="<?php echo ($rutAdministrador); ?>">
                    <label class="form-label d-block">Nombre Dep:</label>
                    <input name="Nombre_dep" type="text" placeholder="" value="<?php echo ($nombre); ?>">
                    <label class="form-label d-block">Encargado Departamento:</label>
                    <input name="Encargado_departamento" type="text" placeholder="" value="<?php echo ($encargado); ?>">
                    <button type="submit" class="d-block mt-2">Guardar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>