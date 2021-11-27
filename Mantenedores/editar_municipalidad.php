<?php 
require "conexion_p.php";
$id = $_GET["seleccionado"];
$consulta = "SELECT * FROM municipalidad WHERE `Id_municipalidad`='$id'";
$resultado = mysqli_query($conexion, $consulta);
$row = mysqli_fetch_assoc($resultado);
$nombre = $row["Nombre_municipalidad"];
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

<body><?php require 'Navbar.html'; ?><div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <h4>Formulario para editar un municipalidad</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <form action="actualizar_municipalidad.php" method="post"><label class="form-label d-block">Id Municipalidad:</label>
                    <input name="Id_municipalidad" type="text" placeholder="" value="<?php echo ($id); ?>">
                    <label class="form-label d-block">Nombre Municipalidad:</label>
                    <input name="Nombre_municipalidad" type="text" placeholder="" value="<?php echo ($nombre); ?>">
                    <label class="form-label d-block">Direccion Municipalidad:</label>
                    <input name="Direccion_municipalidad" type="text" placeholder="" value="<?php echo ($direccion); ?>">
                    <label class="form-label d-block">Numero Municipalidad:</label>
                    <input name="Numero_municipalidad" type="text" placeholder="" value="<?php echo ($numero); ?>">
                    <button type="submit" class="d-block mt-2">Guardar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>