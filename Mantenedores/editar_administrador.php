<?php 
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body><?php require 'Navbar.html'; ?><div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <h4>Formulario para editar un administrador</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <form action="actualizar_administrador.php" method="post"><label class="form-label d-block">Rut Administrador:</label>
                    <input name="Rut_administrador" type="text" placeholder="" value="<?php echo ($rut); ?>">
                    <label class="form-label d-block">Nombre Administrador:</label>
                    <input name="Nombre_administrador" type="text" placeholder="" value="<?php echo ($nombre); ?>">
                    <label class="form-label d-block">Numero Administrador:</label>
                    <input name="Numero_administrador" type="text" placeholder="" value="<?php echo ($numero); ?>">
                    <label class="form-label d-block">Correo Trabajo:</label>
                    <input name="Correo_administrador" type="text" placeholder="" value="<?php echo ($correo); ?>">
                    <label class="form-label d-block">Clave Ingreso:</label>
                    <input name="Clave_administrador" type="password" placeholder="" value="<?php echo ($clave); ?>">
                    <button type="submit" class="d-block mt-2">Guardar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>